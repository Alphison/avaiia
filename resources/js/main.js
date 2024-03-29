// import './bootstrap';
import cartCounter from './cartCounter.js'
import accordion from './accordion.js'
import {scrollToTop, scrollOn, scrollOff} from "./utils.js";
import {productSlider} from "./slider.js";
import {modal} from "./modal.js";
import {tabs} from "./tabs.js";
import {admin} from "./admin.js";
import {cookies} from "./cookies.js";
import {burgerMenu} from "./burgerMenu.js";
import {Order} from "./order.js";
import {Promos} from "./Promos";
import Notifications from "./Notification";

const init = () => {
    cartCounter();
    accordion();
    scrollToTop();
    productSlider();
    modal('.size-modal', '.addSizeButton');
    modal('.product-modal', '.addProductButton');
    modal('.collection-modal', '.addCollectionButton');
    modal('.address-modal', '.addAddressButton');
    modal('.pre-order-modal', '.preOrderButton');
    tabs();
    cookies();
    burgerMenu();
    Order();
    Promos();

    Notifications.init();


    if (document.location.pathname == '/admin') admin();
}
document.addEventListener("DOMContentLoaded", init);
