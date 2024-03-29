class Storage {
    static get(key) {
        if (this.isNull(key)) {
            this.set(key, false);

            return false;
        }

        return JSON.parse(localStorage.getItem(key));
    }

    static set(key, value) {
        localStorage.setItem(key, JSON.stringify(value));
    }

    static isNull(key) {
        return localStorage.getItem(key) === null;
    }
}

export default Storage;
