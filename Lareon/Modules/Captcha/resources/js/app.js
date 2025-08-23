import axios from "axios";

export default class RecaptchaHandler {
    static #SELECTORS = {
        BUTTON: '.reload-captcha-btn',
        ICON: '#recaptchaReloadIcon'
    };

    static #CLASSES = {
        SPIN: 'animate-spin'
    };

    static API_ENDPOINT = '/ajax/client-submitting/captcha/load';

    constructor() {
        this.initializeEventListeners();
    }

    initializeEventListeners() {
        document.querySelectorAll(this.constructor.#SELECTORS.BUTTON)
            .forEach(button => {
                button.addEventListener('click', this.handleClick.bind(this));
            });
    }

    async handleClick(event) {
        event.preventDefault();
        const button = event.currentTarget;
        const icon = button.querySelector(this.constructor.#SELECTORS.ICON);
        const targetId = button.dataset.target;
        const image = document.getElementById(targetId);

        if (!image) return;

        button.disabled = true;
        icon?.classList.add(this.constructor.#CLASSES.SPIN);

        try {
            image.src = await this.fetchNewCaptcha();
        } catch (error) {
            console.error('Failed to reload captcha:', error);
        } finally {
            button.disabled = false;
            icon?.classList.remove(this.constructor.#CLASSES.SPIN);
        }
    }

    async fetchNewCaptcha() {
        const response = await axios.get(this.constructor.API_ENDPOINT, {
            headers: {'Content-Type': 'application/json'}
        });
        return response.data.data;
    }
}
