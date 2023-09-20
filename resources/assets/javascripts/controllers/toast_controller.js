// -- controllers/zoom_controller.js

import { Controller } from "@hotwired/stimulus"
import { Toast } from "bootstrap"

export default class extends Controller {
    static values = { delay: Number, autoShow: Boolean }

    initialize() {
        this.onHidden = this.hiddenHandler.bind(this)
    }

    connect() {
        const options = {animation: true, autohide: true, delay: this.delayValue || 3000}

        this.toast = new Toast(this.element, options)
        this.element.addEventListener('hidden.bs.toast', this.onHidden)

        if (this.autoShowValue) {
            this.show();
        }
    }

    disconnect() {
        if (this.toast) {
            this.toast.hide()
            this.toast.dispose()
            this.toast = null
        }
    }

    show() {
        if (this.toast) {
            this.toast.show()
        }
    }

    hide() {
        if (this.toast) {
            this.toast.hide();
        }
    }

    hiddenHandler() {
        this.element.removeEventListener('hidden.bs.toast', this.onHidden)
        this.element.remove()
    }
}
