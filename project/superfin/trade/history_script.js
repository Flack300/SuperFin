document.addEventListener('DOMContentLoaded', () => {
    const transactionTableBody = document.getElementById('transactionTableBody');

    // Mock transaction history data
    const transactions = [
        { type: 'Electricity Bill', amount: 1500, status: 'Successful' },
        { type: 'Mobile Recharge', amount: 299, status: 'Successful' },
        { type: 'DTH Recharge', amount: 399, status: 'Successful' },
        { type: 'Gas Booking', amount: 800, status: 'Pending' },
        { type: 'Broadband Bill', amount: 999, status: 'Successful' },
        { type: 'Education Fees', amount: 5000, status: 'Successful' }
    ];

    // Function to populate transaction history
    function populateTransactionHistory() {
        transactions.forEach(transaction => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${transaction.type}</td>
                <td>${transaction.amount}</td>
                <td>${transaction.status}</td>
            `;
            transactionTableBody.appendChild(row);
        });
    }

    // Load the transaction history
    populateTransactionHistory();
});