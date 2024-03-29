export function Order() {
    const orderStatusSelect = document.getElementById('status_select');

    if (!orderStatusSelect) return false;

    const post = async (ENDPOINT, data) => {
        const response = await fetch(ENDPOINT, {
            method: 'POST', headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }, body: JSON.stringify(data)
        })

        return response.text();
    }

    const onUpdateOrderStatusHandler = async (id, data) => {
        return await post(`/orders/${id}/update`, data)
    }


    orderStatusSelect.addEventListener('change', (ev) => {
        const data = {
            status_id: ev.target.value
        }

        onUpdateOrderStatusHandler(ev.target.dataset.id, data)
    });

}
