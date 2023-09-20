// -- controllers/remote_modal_controller.js

import { Controller } from "@hotwired/stimulus"
import { renderStreamMessage } from "@hotwired/turbo"
import { Modal } from "bootstrap"
import { AuthenticationError, RequestError } from "../errors"
import SimpleToast from "../simple_toast"
import { xr } from "../xr"

export default class extends Controller {
    static values = {target: String, url: String, customClass: String}

    initialize() {
        this.onModalHidden = this.modalHiddenHandler.bind(this)
    }

    connect() {
        document.addEventListener('turbo:before-cache', this.onModalHidden)
    }

    disconnect() {
        document.removeEventListener('turbo:before-cache', this.onModalHidden)
        this.disposeModal()
    }

    show(e) {
        if (e) {
            e.preventDefault()
        }

        const modal = this.resolveModal(this.modalElement)
        if (modal) {
            modal.show()
        }

        return false
    }

    hide(e) {
        if (e) {
            e.preventDefault()
        }

        const modal = this.resolveModal(this.modalElement)
        if (modal) {
            modal.hide()
        }

        return false
    }

    toggle(e) {
        e.preventDefault()

        this.modalElement = this.buildModal()

        this.fetch(this.urlValue)

        return false;
    }

    async fetch(url) {
        try {
            const response = await xr.turbo().get(url)

            if (!response.ok) {
                throw new RequestError('Ocurrió <b class="text-danger">un error al procesar la solicitud</b>. Reintente en unos instantes.')
            }

            if (response.ok && response.redirected && String(response.url).endsWith('login')) {
                throw new AuthenticationError('Debe <b class="text-danger">estar autentificado</b> para realizar esta acción. Por favor, acceda a su cuenta.')
            }

            const html = await response.text()
            renderStreamMessage(html)

            return this.onLoadSuccess()
        } catch (err) {
            SimpleToast.error(err.message)
            return this.onLoadFailure(err)
        }
    }

    onLoadSuccess() {
        // Nothing... To be extended by subclasses if needed.
        this.show()
        return true
    }

    onLoadFailure(err) {
        // Nothing... To be extended by subclasses if needed.
        console.error(err.message)
        return false
    }

    resolveModal(element) {
        return Modal.getInstance(element) || new Modal(element)
    }

    buildModal() {
        const existing = document.querySelector(this.targetValue)

        if (existing) {
            return existing
        }

        const content = document.createElement('div')
        content.classList.add('modal-content')

        const dialog = document.createElement('div')
        dialog.classList.add('modal-dialog', 'modal-dialog-centered')
        if (this.hasCustomClassValue) {
            dialog.classList.add(this.customClassValue.split(' '))
        }
        dialog.appendChild(content)

        const modal = document.createElement('div')
        modal.id = String(this.targetValue).substring(1)
        modal.tabIndex = '-1'
        modal.classList.add('modal', 'fade')
        modal.addEventListener('hidden.bs.modal', this.onModalHidden)
        modal.appendChild(dialog)

        document.body.appendChild(modal)

        return modal
    }

    modalHiddenHandler() {
        this.disposeModal()
    }

    disposeModal() {
        if (this.modalElement) {
            const modal = Modal.getInstance(this.modalElement)

            if (modal) {
                modal.dispose()

                if (document.body.classList.contains('modal-open')) {
                    document.body.classList.remove('modal-open')
                    document.body.style['overflow'] = ''
                    document.body.style['paddingRight'] = ''
                }
            }

            this.modalElement.removeEventListener('hidden.bs.modal', this.onModalHidden)
            this.modalElement.remove()
            this.modalElement = null
            this.modal = null
        }
    }
}
