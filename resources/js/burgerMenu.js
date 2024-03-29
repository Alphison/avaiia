export function burgerMenu() {
    const menu = document.querySelector('.burger-nav');

    if (!menu) return false;

    const burgerBtn = document.querySelector('.burger-btn');
    const burgerCloseBtn = document.querySelector('.close-btn');

    burgerBtn.addEventListener('click', (ev) => {
        ev.preventDefault();

        menu.classList.add('show');
    });

    burgerCloseBtn.addEventListener('click', (ev) => {
        ev.preventDefault();
        menu.classList.remove('show');
    })

    document.addEventListener('keydown', (e) => {
        if (e.code === "Escape" && menu.classList.contains('show')) {
            menu.classList.remove('show');
        }
    });
}
