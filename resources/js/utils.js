export function scrollToTop() {
    const $ = document.querySelectorAll('.scrollTop')

    const top = () => {
        return window.scrollTo(0, 0);
    }

    $.forEach((item) => {

        item.addEventListener('click', (ev)=> {
            ev.preventDefault();
            top();
        })
    })
}

export function scrollOff() {
    return document.body.style.overflow = 'hidden';
}

export function scrollOn() {
    return document.body.style.overflow = 'visible';
}

