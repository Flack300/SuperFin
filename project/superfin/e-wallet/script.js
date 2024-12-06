document.addEventListener('DOMContentLoaded', () => {
    const serviceCards = document.querySelectorAll('.service-card');
    serviceCards.forEach(card => {
        card.addEventListener('click', (event) => {
            event.preventDefault();
            window.location.href = card.getAttribute('href');
        });
    });
});

