document.addEventListener('DOMContentLoaded', () => {
    const profileForm = document.getElementById('profileForm');
    const successMessage = document.getElementById('successMessage');

    

    // Load user data into form
    document.getElementById('username').value = userData.username;
    document.getElementById('email').value = userData.email;
    document.getElementById('phone').value = userData.phone;
    document.getElementById('address').value = userData.address;

    // Handle form submission
    profileForm.addEventListener('submit', (event) => {
        event.preventDefault(); // Prevent the default form submission

        // Mock save operation
        const updatedData = {
            username: document.getElementById('username').value,
            email: document.getElementById('email').value,
            phone: document.getElementById('phone').value,
            address: document.getElementById('address').value
        };

        // Display success message
        successMessage.textContent = "Profile updated successfully!";
        successMessage.style.display = 'block';

        // Optionally, reset the form or do other operations
        profileForm.reset(); // Clear the form if needed
    });
});
