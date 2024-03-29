export function productSlider () {

    const slider = document.querySelector('.swiper');

    if (!slider) return false;

    const swiper = new Swiper('.swiper-bottom', {
        loop: true,
        spaceBetween: 10,
        slidesPerView: 4,
        freeMode: true,
        watchSlidesProgress: true,
    });

    const swiper2 = new Swiper('.swiper-top', {
        loop: true,
        thumbs: {
            swiper: swiper,
        },
    })
}
