document.addEventListener('DOMContentLoaded', () => {
    const transactionTableBody = document.getElementById('transactionTableBody');

    // Mock transaction history data
    const transactions = [
        { date: '2024-10-01', type: 'Mobile Recharge', amount: 299, status: 'Successful' },
        { date: '2024-10-03', type: 'Electricity Bill', amount: 1500, status: 'Successful' },
        { date: '2024-10-05', type: 'DTH Recharge', amount: 399, status: 'Successful' },
        { date: '2024-10-07', type: 'Gas Booking', amount: 800, status: 'Pending' },
        { date: '2024-10-09', type: 'Broadband Bill', amount: 999, status: 'Successful' },
        { date: '2024-10-12', type: 'Education Fees', amount: 5000, status: 'Successful' }
    ];

    // Function to populate transaction history
    function populateTransactionHistory() {
        transactions.forEach(transaction => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${transaction.date}</td>
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
