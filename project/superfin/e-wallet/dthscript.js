document.addEventListener('DOMContentLoaded', () => {
    const dthForm = document.getElementById('dthForm');
    const suggestDthPlans = document.getElementById('suggestDthPlans');
    const dthPlanSuggestions = document.getElementById('dthPlanSuggestions');

    // Function to suggest plans based on the selected operator
    suggestDthPlans.addEventListener('click', () => {
        const operator = document.getElementById('dthOperator').value;
        dthPlanSuggestions.innerHTML = ''; // Clear previous suggestions

        if (operator) {
            const plans = getDthPlans(operator); // Get plans for the selected operator
            if (plans.length > 0) {
                plans.forEach(plan => {
                    const planDiv = document.createElement('div');
                    planDiv.textContent = `₹${plan.amount} - ${plan.benefits}`;
                    planDiv.classList.add('plan-item'); // Optional class for styling
                    planDiv.addEventListener('click', () => {
                        document.getElementById('dthAmount').value = plan.amount; // Set amount when clicked
                        dthPlanSuggestions.style.display = 'none';
                    });
                    dthPlanSuggestions.appendChild(planDiv);
                });
                dthPlanSuggestions.style.display = 'block';
            } else {
                dthPlanSuggestions.textContent = 'No plans available for this operator.';
                dthPlanSuggestions.style.display = 'block';
            }
        } else {
            dthPlanSuggestions.style.display = 'none';
            alert('Please select an operator.');
        }
    });

    // Function to handle DTH recharge form submission
    dthForm.addEventListener('submit', (event) => {
        event.preventDefault(); // Prevent the default form submission

        const dthNumber = document.getElementById('dthNumber').value;
        const operator = document.getElementById('dthOperator').value; // Get the selected operator
        const amount = parseFloat(document.getElementById('dthAmount').value);

        // Validate DTH number
        if (!dthNumber || dthNumber.length < 10) {
            alert('Please enter a valid DTH number.');
            return;
        }

        // Validate amount
        if (isNaN(amount) || amount <= 0) {
            alert('Please enter a valid recharge amount.');
            return;
        }

        // Create a form submission to dth.php
        const formData = new FormData(dthForm);
        
        // Use Fetch API to submit the form
        fetch('dth.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json()) // Parse JSON response
        .then(data => {
            if (data.success) {
                alert(data.message); // Display success message
                window.location.href = 'dth_recharge.html'; // Redirect on success
            } else {
                alert(data.message); // Display error message
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while processing your request.');
        });

        // Reset the form and hide suggestions
        dthForm.reset();
        dthPlanSuggestions.style.display = 'none';
    });

    // Mock function to get DTH plans based on operator
    function getDthPlans(operator) {
        const plans = {
            AIRTEL: [{ amount: 300, benefits: '100 channels, 30 days' }, { amount: 600, benefits: '150 channels, 60 days' }],
            DISH: [{ amount: 250, benefits: '80 channels, 30 days' }, { amount: 550, benefits: '120 channels, 60 days' }],
            TATA: [{ amount: 350, benefits: '120 channels, 30 days' }, { amount: 700, benefits: '200 channels, 60 days' }]
        };
        return plans[operator] || [];
    }
});
