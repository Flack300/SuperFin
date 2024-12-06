document.addEventListener('DOMContentLoaded', () => {
    const rechargeForm = document.getElementById('rechargeForm');
    const suggestPlansBtn = document.getElementById('suggestPlans');
    const planSuggestions = document.getElementById('planSuggestions');

    // Function to suggest plans based on the selected operator
    suggestPlansBtn.addEventListener('click', () => {
        const operator = document.getElementById('operator').value;
        planSuggestions.innerHTML = ''; // Clear previous suggestions

        if (operator) {
            const plans = getPlans(operator); // Get plans for the selected operator
            if (plans.length > 0) {
                plans.forEach(plan => {
                    const planDiv = document.createElement('div');
                    planDiv.textContent = `₹${plan.amount} - ${plan.benefits}`;
                    planDiv.classList.add('plan-item'); // Optional class for styling
                    planDiv.addEventListener('click', () => {
                        document.getElementById('amount').value = plan.amount; // Set amount when clicked
                        planSuggestions.style.display = 'none';
                    });
                    planSuggestions.appendChild(planDiv);
                });
                planSuggestions.style.display = 'block';
            } else {
                planSuggestions.textContent = 'No plans available for this operator.';
                planSuggestions.style.display = 'block';
            }
        } else {
            planSuggestions.style.display = 'none';
            alert('Please select an operator.');
        }
    });

    // Function to handle recharge form submission
    rechargeForm.addEventListener('submit', (event) => {
        event.preventDefault(); // Prevent the default form submission

        const mobileNumber = document.getElementById('mobileNumber').value;
        const operator = document.getElementById('operator').value; // Get the selected operator
        const amount = parseFloat(document.getElementById('amount').value);

        // Validate mobile number
        if (!mobileNumber || mobileNumber.length !== 10) {
            alert('Please enter a valid 10-digit mobile number.');
            return;
        }

        // Validate amount
        if (isNaN(amount) || amount <= 0) {
            alert('Please enter a valid recharge amount.');
            return;
        }

        // Create a form submission to mobile.php
        const formData = new FormData(rechargeForm);
        
        // Use Fetch API to submit the form
        fetch('mobile.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json()) // Parse JSON response
        .then(data => {
            if (data.success) {
                alert(data.message); // Display success message
                window.location.href = 'mobile_recharge.html'; // Redirect on success
            } else {
                alert(data.message); // Display error message
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while processing your request.');
        });

        // Reset the form and hide suggestions
        rechargeForm.reset();
        planSuggestions.style.display = 'none';
    });

    // Mock function to get plans based on operator
    function getPlans(operator) {
        const plans = {
            JIO: [{ amount: 100, benefits: '1GB/day, 30 days' }, { amount: 200, benefits: '1.5GB/day, 40 days' }],
            VI: [{ amount: 99, benefits: '1GB/day, 28 days' }, { amount: 249, benefits: '1.5GB/day, 56 days' }],
            AIRTEL: [{ amount: 149, benefits: '1GB/day, 24 days' }, { amount: 299, benefits: '1.5GB/day, 56 days' }]
        };
        return plans[operator] || [];
    }
});
