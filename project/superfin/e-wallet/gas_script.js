console.log('asd');
document.addEventListener('DOMContentLoaded', () => {
    const gasForm = document.getElementById('gasForm');
    const suggestBookings = document.getElementById('suggestBookings');
    const bookingSuggestions = document.getElementById('bookingSuggestions');

    // Function to suggest booking amounts based on the selected gas provider
    suggestBookings.addEventListener('click', () => {
        const gasProvider = document.getElementById('gasProvider').value;
        bookingSuggestions.innerHTML = ''; // Clear previous suggestions

        if (gasProvider) {
            const amounts = getBookingAmounts(gasProvider); // Get amounts for the selected provider
            if (amounts.length > 0) {
                amounts.forEach(amountInfo => {
                    const amountDiv = document.createElement('div');
                    amountDiv.textContent = `₹${amountInfo.amount} - ${amountInfo.description}`;
                    amountDiv.classList.add('amount-item'); // Optional class for styling
                    amountDiv.addEventListener('click', () => {
                        document.getElementById('bookingAmount').value = amountInfo.amount; // Set amount when clicked
                        bookingSuggestions.style.display = 'none';
                    });
                    bookingSuggestions.appendChild(amountDiv);
                });
                bookingSuggestions.style.display = 'block';
            } else {
                bookingSuggestions.textContent = 'No suggested amounts available for this gas provider.';
                bookingSuggestions.style.display = 'block';
            }
        } else {
            bookingSuggestions.style.display = 'none';
            alert('Please select a gas provider.');
        }
    });

    // Function to handle gas booking form submission
    gasForm.addEventListener('submit', (event) => {
        event.preventDefault(); // Prevent the default form submission

        const customerId = document.getElementById('customerId').value;
        const gasProvider = document.getElementById('gasProvider').value;
        const bookingAmount = parseFloat(document.getElementById('bookingAmount').value);

        // Validate customer ID
        if (!customerId || customerId.length !== 17) {
            alert('Please enter a valid 17-digit consumer number.');
            return;
        }
        // Validate amount
        if (isNaN(bookingAmount) || bookingAmount <= 0) {
            alert('Please enter a valid booking amount.');
            return;
        }

        // Create a form submission to gas_booking.php
        const formData = new FormData(gasForm);

        // Use Fetch API to submit the form
        fetch('gas_booking.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json()) // Parse JSON response
            .then(data => {
                if (data.success) {
                    alert(data.message); // Display success message
                    window.location.href = 'gas_booking.html'; // Redirect on success
                } else {
                    alert(data.message); // Display error message
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while processing your request.');
            });

        // Reset the form and hide suggestions
        gasForm.reset();
        bookingSuggestions.style.display = 'none';
    });

    // Mock function to get booking amounts based on the gas provider
    function getBookingAmounts(provider) {
        const amounts = {
            Indane: [{ amount: 600, description: 'Standard booking' }, { amount: 1200, description: 'Bulk booking' }],
            Bharat: [{ amount: 700, description: 'Standard booking' }, { amount: 1300, description: 'Bulk booking' }],
            Reliance: [{ amount: 500, description: 'Standard booking' }, { amount: 1100, description: 'Bulk booking' }]
        };
        return amounts[provider] || [];
    }
});