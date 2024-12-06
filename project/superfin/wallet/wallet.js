// Select the buttons
// const addMoneyButton = document.querySelector('.aadd-money');
const withdrawButton = document.querySelector('.withdraw');
const backButton = document.querySelector('.back-button');

// Add event listeners to the buttons

withdrawButton.addEventListener('click', () => {
    // Simulate withdrawing money (you can customize this)
    alert('Withdraw functionality will be implemented here.');
});

backButton.addEventListener('click', (event) => {
    // Prevent default action and go back in history
    event.preventDefault();
    window.history.back();
});

// Simulate fetching balance and transaction data (for future dynamic updates)
document.addEventListener('DOMContentLoaded', () => {
    // Example of fetching data (this would be replaced with real API calls)
    const balanceElement = document.querySelector('.balance-card h2');
    const lockedBalanceElement = document.querySelector('.balance-card p:nth-child(3)');

    // Update the balance (you can replace these with real values from your app)
    balanceElement.textContent = '₹1000.00';
    lockedBalanceElement.textContent = 'Locked Balance ₹0';
});