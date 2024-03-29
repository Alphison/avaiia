export default function cartCounter() {
    const counters = document.querySelectorAll(".counter");

    if (!counters.length) return;

    const price = document.getElementById('totalPrice');
    const itemHidden = document.getElementById('hiddenPrice');
    const items = document.getElementById('itemCounter');


    const get = async (route, productId, sizeId) => {
        const response = await fetch(`/cart/${productId}/${sizeId}/${route}`);
        return await response.text();
    }

    const setSummaryCount = () => {
        let total = 0;
        counters.forEach((item) => {
            total += Number(item.querySelector(".counter__input").value);
        });

        items.textContent = total;
    }

    const setSummaryPrice = () => {
        let total = 0;
        counters.forEach((item) => {
            total += Number(item.dataset.price) * getValue(item.querySelector(".counter__input"));
        });

        price.textContent = total;
        itemHidden.value = total;
    }

    const setSummary = () => {
        setSummaryCount();
        setSummaryPrice();
    }

    const setValue = (input, value) => {
        return (input.value = Number(value));
    };

    const getValue = (input) => {
        return Number(input.value);
    };

    counters.forEach((counter) => {
        const input = counter.querySelector(".counter__input");
        const itemPrice = counter.querySelector('.price__value');
        itemPrice.textContent = itemPrice.dataset.price * getValue(input);


        counter.addEventListener("click", (e) => {
            let value = setValue(input, getValue(input));

            if (e.target.classList.contains("counterPlus")) {
                setValue(input, value + 1);
                itemPrice.textContent = itemPrice.dataset.price * getValue(input);
                get('increase', input.dataset.product, input.dataset.size);
                setSummary();
            }

            if (e.target.classList.contains("counterMinus")) {
                value > 1 ? setValue(input, value - 1) : setValue(input, value);
                itemPrice.textContent = itemPrice.dataset.price * getValue(input);
                get('decrease', input.dataset.product, input.dataset.size);
                setSummary();
            }
        });
    });

    setSummary();
}
