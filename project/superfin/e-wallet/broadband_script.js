document.addEventListener('DOMContentLoaded', () => {
    const broadbandForm = document.getElementById('broadbandForm');
    const suggestPlans = document.getElementById('suggestPlans');
    const planSuggestions = document.getElementById('planSuggestions');

    // Function to suggest bill amounts based on the selected service provider
    suggestPlans.addEventListener('click', () => {
        const serviceProvider = document.getElementById('serviceProvider').value;
        planSuggestions.innerHTML = ''; // Clear previous suggestions

        if (serviceProvider) {
            const amounts = getPlanAmounts(serviceProvider); // Get amounts for the selected provider
            if (amounts.length > 0) {
                amounts.forEach(amountInfo => {
                    const amountDiv = document.createElement('div');
                    amountDiv.textContent = `₹${amountInfo.amount} - ${amountInfo.description}`;
                    amountDiv.classList.add('amount-item'); // Optional class for styling
                    amountDiv.addEventListener('click', () => {
                        document.getElementById('billAmount').value = amountInfo.amount; // Set amount when clicked
                        planSuggestions.style.display = 'none';
                    });
                    planSuggestions.appendChild(amountDiv);
                });
                planSuggestions.style.display = 'block';
            } else {
                planSuggestions.textContent = 'No suggested amounts available for this service provider.';
                planSuggestions.style.display = 'block';
            }
        } else {
            planSuggestions.style.display = 'none';
            alert('Please select a service provider.');
        }
    });

    // Function to handle broadband bill payment form submission
    broadbandForm.addEventListener('submit', (event) => {
        event.preventDefault(); // Prevent the default form submission

        const accountNumber = document.getElementById('accountNumber').value;
        const serviceProvider = document.getElementById('serviceProvider').value;
        const billAmount = parseFloat(document.getElementById('billAmount').value);

        // Validate account number - ensure it is numeric
        if (!accountNumber || isNaN(accountNumber) || accountNumber.trim() === '' || !/^\d+$/.test(accountNumber)) {
            alert('Please enter a valid numeric account number.');
            return;
        }

        // Validate amount
        if (isNaN(billAmount) || billAmount <= 0) {
            alert('Please enter a valid bill amount.');
            return;
        }

        // Create a form submission to broadband.php
        const formData = new FormData(broadbandForm);

        // Use Fetch API to submit the form
        fetch('broadband.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json()) // Parse JSON response
        .then(data => {
            if (data.success) {
                alert(data.message); // Display success message
                window.location.href = 'broadband_bill.html'; // Redirect on success
            } else {
                alert(data.message); // Display error message
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while processing your request.');
        });

        // Reset the form and hide suggestions
        broadbandForm.reset();
        planSuggestions.style.display = 'none';
    });

    // Mock function to get bill amounts based on the service provider
    function getPlanAmounts(provider) {
        const amounts = {
            JioFiber: [
                { amount: 799, description: 'Monthly Plan' },
                { amount: 1999, description: 'Quarterly Plan' },
                { amount: 6999, description: 'Annual Plan' } // Added annual plan
            ],
            AirtelFiber: [
                { amount: 599, description: 'Monthly Plan' },
                { amount: 1599, description: 'Quarterly Plan' },
                { amount: 5999, description: 'Annual Plan' } // Added annual plan
            ],
            GtplFiber: [
                { amount: 999, description: 'Monthly Plan' },
                { amount: 2499, description: 'Quarterly Plan' },
                { amount: 7999, description: 'Annual Plan' } // Added annual plan
            ]
        };
        return amounts[provider] || [];
    }
});
