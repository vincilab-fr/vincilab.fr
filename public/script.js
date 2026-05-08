// Burger menu
const burger = document.getElementById('burger');
const nav = document.querySelector('nav');

burger.addEventListener('click', () => {
    nav.classList.toggle('nav-open');
    burger.classList.toggle('burger-open');
    burger.setAttribute('aria-expanded', nav.classList.contains('nav-open'));
});

document.addEventListener('click', (e) => {
    if (!burger.contains(e.target) && !nav.contains(e.target)) {
        nav.classList.remove('nav-open');
        burger.classList.remove('burger-open');
    }
});
