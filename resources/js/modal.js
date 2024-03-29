import {scrollOff, scrollOn} from "./utils";

export function modal (modalClass, buttonClass) {

    const modal = document.querySelector(modalClass);
    const button = document.querySelector(buttonClass);

    if (!modal || button == null) return false;
    const openModal = (ev) => {
        ev.preventDefault();
        scrollOff();
        modal.classList.add('visible');
    }
    const closeModal = () => {
        modal.classList.remove('visible');
        scrollOn();
    }

    button.addEventListener('click', (ev) => openModal(ev))

    modal.addEventListener('click', (ev) =>{
        if (ev.target == modal){
            closeModal();
        }
    })

    document.addEventListener('keydown', (e) => {
        if (e.code === "Escape" && modal.classList.contains('visible')) {
            closeModal();
        }
    });

}
