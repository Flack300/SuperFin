document.addEventListener('DOMContentLoaded', async function () {
    const buyToggle = document.getElementById('buyToggle');
    const sellToggle = document.getElementById('sellToggle');

    // Function to show the buy form
    function showBuy() {
        document.getElementById('buyForm').style.display = 'block';
        document.getElementById('sellForm').style.display = 'none';
        animateFormTransition('buyForm');
    }

    // Function to show the sell form
    function showSell() {
        document.getElementById('sellForm').style.display = 'block';
        document.getElementById('buyForm').style.display = 'none';
        animateFormTransition('sellForm');
    }

    // Check if elements exist before adding event listeners
    if (buyToggle) {
        buyToggle.addEventListener('click', showBuy);
    } else {
        console.error("Element with ID 'buyToggle' not found.");
    }

    if (sellToggle) {
        sellToggle.addEventListener('click', showSell);
    } else {
        console.error("Element with ID 'sellToggle' not found.");
    }

    // Fetch live price for both forms
    async function getLivePrice() {
        const buyPair = document.getElementById('cryptoPairBuy').value;
        const sellPair = document.getElementById('cryptoPairSell').value;

        try {
            const responses = await Promise.all([
                fetch(`backend.php?pair=${buyPair}`),
                fetch(`backend.php?pair=${sellPair}`)
            ]);
            const data = await Promise.all(responses.map(response => response.json()));

            document.getElementById('livePriceBuy').innerText = data[0].price;
            document.getElementById('livePriceSell').innerText = data[1].price;

            document.getElementById('buyLimitPrice').value = data[0].price;
            document.getElementById('sellLimitPrice').value = data[1].price;
        } catch (error) {
            console.error('Error fetching live prices:', error);
        }
    }

    // Update live price when the selected crypto pair changes
    const cryptoPairBuy = document.getElementById('cryptoPairBuy');
    const cryptoPairSell = document.getElementById('cryptoPairSell');

    if (cryptoPairBuy) {
        cryptoPairBuy.addEventListener('change', getLivePrice);
    } else {
        console.error("Element with ID 'cryptoPairBuy' not found.");
    }

    if (cryptoPairSell) {
        cryptoPairSell.addEventListener('change', getLivePrice);
    } else {
        console.error("Element with ID 'cryptoPairSell' not found.");
    }

    // Fetch live price on page load for the default pairs
    getLivePrice();
});

function animateFormTransition(formId) {
    const form = document.getElementById(formId);
    form.classList.add('fade-in');
    setTimeout(() => {
        form.classList.remove('fade-in');
    }, 300); // Duration of animation
}
