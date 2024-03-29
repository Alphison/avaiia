const accordion = () => {
    const accordions = document.querySelectorAll('.accordion');

    if (!accordions) return false;


    accordions.forEach((accordion) => {

        const button = accordion.querySelector('.accordion-plus');
        const accordionText = accordion.querySelector('.accordion-bottom');
        const arrow = accordion.querySelector('.accordion-arrow');

        accordion.addEventListener('click', (ev) => {
            if (accordionText.style.maxHeight) {
                accordionText.style.maxHeight = null;
                arrow.style.transform = "rotate(0deg)";
            } else{
                accordionText.style.maxHeight = accordion.scrollHeight + 150 + "px";
                arrow.style.transform = "rotate(180deg)";
            }
        });
    })
}

export default accordion;
