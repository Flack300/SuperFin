document.querySelector('.menu-btn').addEventListener('click', function() {
    const dropdown = this.querySelector('.dropdown-menu');
    dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
});

document.addEventListener('click', function(event) {
    const menuBtn = document.querySelector('.menu-btn');
    const dropdown = document.querySelector('.dropdown-menu');
    if (!menuBtn.contains(event.target)) {
        dropdown.style.display = 'none';
    }
});