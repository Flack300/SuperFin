// Define your API URL for fetching prices
const apiUrl = 'https://api.coingecko.com/api/v3/simple/price?ids=kusama,numeraire,loopring,fantom,digibyte,optimism,gala,bitcoin,asi&vs_currencies=inr';

// Function to animate elements with a fade-in effect from top to bottom
function fadeIn(element, duration) {
    let opacity = 0;
    let position = -20; // Start from -20 pixels (above the initial position)
    element.style.opacity = opacity;
    element.style.transform = `translateY(${position}px)`; // Initial position
    element.style.transition = `opacity ${duration}ms ease, transform ${duration}ms ease`;

    const interval = 50;
    const increment = interval / duration;

    const fadeInterval = setInterval(() => {
        opacity += increment;
        position += (20 / (duration / interval)); // Move down 20 pixels over the duration
        if (opacity >= 1) {
            opacity = 1;
            position = 0; // Final position
            clearInterval(fadeInterval);
        }
        element.style.opacity = opacity;
        element.style.transform = `translateY(${position}px)`; // Update position
    }, interval);
}

// DOM Elements for crypto total loss displays
const cryptoElements = {
    kusama: document.querySelector('#kusama .total-loss'),
    numeraire: document.querySelector('#numeraire .total-loss'),
    loopring: document.querySelector('#loopring .total-loss'),
    fantom: document.querySelector('#fantom .total-loss'),
    asi: document.querySelector('#asi .total-loss'), // Updated to match the HTML ID
    digibyte: document.querySelector('#digibyte .total-loss'),
    optimism: document.querySelector('#optimism .total-loss'),
    gala: document.querySelector('#gala .total-loss'),
    bitcoin: document.querySelector('#bitcoin .total-loss')
};

// Fetching crypto prices and updating the DOM
async function fetchCryptoPrices() {
    try {
        const response = await fetch(apiUrl);
        if (!response.ok) throw new Error('Network response was not ok');

        const data = await response.json();
        console.log('API Response:', data); // Log the API response

        // Updating the current values in the DOM
        Object.keys(cryptoElements).forEach((crypto) => {
            if (data[crypto]) { // Check if data for the crypto exists
                const price = data[crypto].inr;
                const currentElement = document.querySelector(`#${crypto} .current`);
                currentElement.textContent = `Current: ₹${price.toLocaleString()}`;

                // Get the quantity
                const quantityElement = document.querySelector(`#${crypto} .quantity`);
                const quantity = parseFloat(quantityElement.textContent.replace('Quantity: ', ''));

                // Define invested amounts (replace these with your actual invested values)
                const investedAmounts = {
                    kusama: 2076.00,
                    numeraire: 3630.00,
                    loopring: 1115.00,
                    fantom: 500.00,
                    'Artificial Superintelligence Alliance': 400.00, // Add invested value for Artificial Superintelligence
                    digibyte: 300.00,
                    optimism: 2000.00,
                    gala: 1200.00,
                    bitcoin: 3700000.00
                };

                // Calculate the total loss/profit
                const investedValue = investedAmounts[crypto];
                const currentValue = price * quantity;
                const lossOrProfit = currentValue - investedValue;
                const lossOrProfitPercentage = ((lossOrProfit / investedValue) * 100).toFixed(2);

                // Update total loss/profit in the DOM
                const totalLossElement = document.querySelector(`#${crypto} .total-loss`);
                if (lossOrProfit > 0) {
                    totalLossElement.classList.remove('loss');
                    totalLossElement.classList.add('profit');
                    totalLossElement.textContent = `Profit: ₹${lossOrProfit.toLocaleString()} (${lossOrProfitPercentage}%)`;
                } else if (lossOrProfit < 0) {
                    totalLossElement.classList.remove('profit');
                    totalLossElement.classList.add('loss');
                    totalLossElement.textContent = `Loss: ₹${Math.abs(lossOrProfit).toLocaleString()} (${lossOrProfitPercentage}%)`;
                } else {
                    totalLossElement.classList.remove('profit', 'loss');
                    totalLossElement.classList.add('neutral');
                    totalLossElement.textContent = 'No Loss/Profit';
                }

                // Trigger fade-in effect
                fadeIn(totalLossElement, 600);
            }
        });
    } catch (error) {
        console.error('Fetch error:', error);
    }
}

// Initial fetch call
fetchCryptoPrices();
