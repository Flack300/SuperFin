document.addEventListener('DOMContentLoaded', () => {
    const feesForm = document.getElementById('feesForm');
    const suggestFeesBtn = document.getElementById('suggestFees');
    const feesSuggestions = document.getElementById('feesSuggestions');
    const confirmationMessage = document.getElementById('confirmationMessage');

    // Function to suggest fees options
    suggestFeesBtn.addEventListener('click', () => {
        const institution = document.getElementById('institution').value;
        feesSuggestions.innerHTML = ''; // Clear previous suggestions

        if (institution) {
            const options = getFeesOptions(institution);
            if (options.length > 0) {
                options.forEach(option => {
                    const optionDiv = document.createElement('div');
                    optionDiv.textContent = `₹${option.amount} - ${option.description}`;
                    optionDiv.classList.add('amount-item'); // Optional class for styling
                    optionDiv.addEventListener('click', () => {
                        document.getElementById('feesAmount').value = option.amount; // Set amount when clicked
                        feesSuggestions.style.display = 'none'; // Hide suggestions after selection
                    });
                    feesSuggestions.appendChild(optionDiv);
                });
                feesSuggestions.style.display = 'block'; // Show suggestions
            } else {
                feesSuggestions.textContent = 'No suggested amounts available for this institution.';
                feesSuggestions.style.display = 'block';
            }
        } else {
            feesSuggestions.style.display = 'none';
            alert('Please select an institution.');
        }
    });

    // Function to handle fees payment form submission
    feesForm.addEventListener('submit', (event) => {
        event.preventDefault(); // Prevent the default form submission

        const studentName = document.getElementById('studentName').value;
        const studentId = document.getElementById('studentId').value;
        const feesAmount = parseFloat(document.getElementById('feesAmount').value);

        // Validate student name
        if (!studentName) {
            alert('Please enter a valid Student Name.');
            return;
        }

        // Validate student ID (check if it's numeric)
        if (!studentId || isNaN(studentId) || studentId.trim() === '' || !/^\d+$/.test(studentId)) {
            alert('Please enter a valid numeric Student ID.');
            return;
        }

        // Validate the fees amount
        if (isNaN(feesAmount) || feesAmount <= 0) {
            alert('Please enter a valid fees amount.');
            return;
        }

        // Create a form submission to education_fees.php
        const formData = new FormData(feesForm);

        // Use Fetch API to submit the form
        fetch('education_fees.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json()) // Parse JSON response
        .then(data => {
            if (data.success) {
                alert(data.message); // Display success message
            window.location.href = 'education_fees.html'; // Redirect on success
        } else {
            alert(data.message); // Display error message
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while processing your request.');
        });
    });

    // Mock function to get fees options based on institution
    function getFeesOptions(institution) {
        const options = {
            parulUniversity: [{ amount: 130000, description: 'Annual Fees' }, { amount: 65000, description: 'Semester Fees' }],
            GujaratTechnologicalUniversity: [{ amount: 90000, description: 'Annual Fees' }, { amount: 45000, description: 'Semester Fees' }],
            NirmaUniversity: [{ amount: 300000, description: 'Annual Fees' }, { amount: 150000, description: 'Semester Fees' }]
        };
        return options[institution] || [];
    }
});
