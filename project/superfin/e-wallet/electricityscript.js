document.addEventListener('DOMContentLoaded', () => {
    const billForm = document.getElementById('billForm');
    const suggestAmounts = document.getElementById('suggestAmounts');
    const amountSuggestions = document.getElementById('amountSuggestions');

    // Function to suggest bill amounts based on the selected electricity board
    suggestAmounts.addEventListener('click', () => {
        const electricityBoard = document.getElementById('electricityBoard').value;
        amountSuggestions.innerHTML = ''; // Clear previous suggestions

        if (electricityBoard) {
            const amounts = getBillAmounts(electricityBoard); // Get amounts for the selected board
            if (amounts.length > 0) {
                amounts.forEach(amountInfo => {
                    const amountDiv = document.createElement('div');
                    amountDiv.textContent = `₹${amountInfo.amount} - ${amountInfo.description}`;
                    amountDiv.classList.add('amount-item'); // Optional class for styling
                    amountDiv.addEventListener('click', () => {
                        document.getElementById('billAmount').value = amountInfo.amount; // Set amount when clicked
                        amountSuggestions.style.display = 'none';
                    });
                    amountSuggestions.appendChild(amountDiv);
                });
                amountSuggestions.style.display = 'block';
            } else {
                amountSuggestions.textContent = 'No suggested amounts available for this electricity board.';
                amountSuggestions.style.display = 'block';
            }
        } else {
            amountSuggestions.style.display = 'none';
            alert('Please select an electricity board.');
        }
    });

    // Function to handle electricity bill payment form submission
    billForm.addEventListener('submit', (event) => {
        event.preventDefault(); // Prevent the default form submission

        const consumerNumber = document.getElementById('consumerNumber').value;
        const electricityBoard = document.getElementById('electricityBoard').value;
        const billAmount = parseFloat(document.getElementById('billAmount').value);

        // Validate consumer number
        if (!consumerNumber || consumerNumber.length !== 11) {
            alert('Please enter a valid 11-digit consumer number.');
            return;
        }

        // Validate amount
        if (isNaN(billAmount) || billAmount <= 0) {
            alert('Please enter a valid bill amount.');
            return;
        }

        // Create a form submission to electricity.php
        const formData = new FormData(billForm);
        
        // Use Fetch API to submit the form
        fetch('electricity.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json()) // Parse JSON response
        .then(data => {
            if (data.success) {
                alert(data.message); // Display success message
                window.location.href = 'electricity_bill.html'; // Redirect on success
            } else {
                alert(data.message); // Display error message
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while processing your request.');
        });

        // Reset the form and hide suggestions
        billForm.reset();
        amountSuggestions.style.display = 'none';
    });

    // Mock function to get bill amounts based on the electricity board
    function getBillAmounts(board) {
        const amounts = {
            DGVCL: [{ amount: 500, description: 'Standard usage' }, { amount: 1000, description: 'Heavy usage' }],
            MGVCL: [{ amount: 700, description: 'Average usage' }, { amount: 1500, description: 'High consumption' }],
            UGVCL: [{ amount: 300, description: 'Light usage' }, { amount: 1200, description: 'Medium consumption' }]
        };
        return amounts[board] || [];
    }
});
