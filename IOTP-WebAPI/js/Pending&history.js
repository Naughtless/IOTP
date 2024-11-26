const ul1 = document.querySelector('ul1');
const li1 = document.querySelectorAll('li1');

li1.forEach(el => {
    el.addEventListener('click', () => {
        ul1.querySelector('.active').classList.remove('active');

        el.classList.add('active');
    });
});