export function admin() {
    const container = document.querySelector('.admin');

    if (!container) return false;

    const get = async (ENDPOINT) => {
        const response = await fetch(ENDPOINT);

        return response.text();
    }



    const onDeleteProductHandle = async (id) => {
        return await get(`/products/${id}/delete`)
    }

    const onUpdateUserHandle = async (id) => {
        return await get(`/users/${id}/admin`)
    }

    const onDeleteCollectionHandler = async (id) => {
        return await get(`/collections/${id}/delete`)
    }

    const onDeletePromocodeHandle = async (id) => {
        return await get(`/promo/${id}/delete`)
    }



    const deleteProductButtons = container.querySelectorAll('.deleteProduct');

    deleteProductButtons.forEach((button) => {
        button.addEventListener('click', (ev) => {
            ev.preventDefault();
            const id = button.dataset.id;
            if (confirm('Вы действительно хотите удалить запись?')){
                onDeleteProductHandle(id);
                document.location.href = '/admin';
            }
        });
    })

    const updateUserButtons = container.querySelectorAll('.updateUserButton');

    updateUserButtons.forEach((button) => {
        button.addEventListener('click', (ev) => {
            ev.preventDefault();
            const id = button.dataset.id;
            if (confirm('Вы действительно хотите сделать пользователя админом?')){
                onUpdateUserHandle(id);
                document.location.href = '/admin';
            }
        });
    });

    const deleteCollectionButtons = container.querySelectorAll('.deleteCollectionButton');

    deleteCollectionButtons.forEach((button) => {
        button.addEventListener('click', (ev) => {
            ev.preventDefault();
            const id = button.dataset.id;
            if (confirm('Вы действительно хотите удалить коллекцию?')){
                onDeleteCollectionHandler(id);
                document.location.href = '/admin';
            }
        });
    });

    const deletePromocodeButtons = container.querySelectorAll('.deletePromocode');

    deletePromocodeButtons.forEach((button) => {
        button.addEventListener('click', (ev) => {
            ev.preventDefault();
            const id = button.dataset.id;
            if (confirm('Вы действительно хотите удалить промокод?')){
                onDeletePromocodeHandle(id);
                document.location.href = '/admin';
            }
        })
    })
}
