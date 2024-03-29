import Notifications from "./Notification";

export function Promos() {
    const get = async (ENDPOINT) => {
        const response = await fetch(ENDPOINT);

        return response.json();
    }

    const onUsePromoHandler = async (text) => {
        return await get(`/promo/${text}`);
    }


    const button = document.getElementById('promoButton');
    const input = document.getElementById('promoInput');
    const price = document.getElementById('totalPrice');
    const itemHidden = document.getElementById('hiddenPrice');
    let couponIsActivated = false;

    if (!(button && input)) return false;

    input.addEventListener('input', () => {
        if (input.value == '') {
            button.disabled = true;
        } else {
            button.disabled = false;
        }

    })

    button.addEventListener('click', () => {
        const data = onUsePromoHandler(input.value).then((data) => {
            if (data.success) {
                setPriceWithPromo(data.data)
            }
            Notifications.show(data.message)
        });
    });

    const setPriceWithPromo = (data) => {
        console.log(data);

        if (couponIsActivated) {
            return data = {
                message: 'вы уже активировали купон',
            }
        }

        if (data.type == 1) {

            const total = Number(price.textContent - ((price.textContent/100) * data.value));

            price.textContent = Math.round(total);
            itemHidden.value = Math.round(total);
            input.value = '';
            couponIsActivated = true;
        }

    }

}
