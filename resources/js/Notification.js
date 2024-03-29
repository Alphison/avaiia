const Notifications = {
    show(message){

        this.el.textContent = "";
        clearTimeout(this.hideTimeout);

        this.el.insertAdjacentHTML('beforeend', `
            <p class="notification__text">${message}</p>
        `);

        this.el.className = 'notification notification--visible';


        this.hideTimeout = setTimeout(() => {
            this.el.classList.remove('notification--visible');
        }, 3000)
    },
    init() {
        this.hideTimeout = null;

        this.el = document.createElement('div');
        this.el.className = 'notification';

        document.body.appendChild(this.el);
    }
}

export default Notifications;
