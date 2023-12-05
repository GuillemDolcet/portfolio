// -- controllers/pagination_controller.js

import { Controller } from "@hotwired/stimulus"
import { renderStreamMessage } from "@hotwired/turbo"

export default class extends Controller {
    static values = { auto: Boolean, page: Number, url: String, per_page: Number }

    connect() {
        this.intersectCallback = this.observerCallback.bind(this)

        this.observer = new IntersectionObserver(this.intersectCallback, {threshold: [0.01]})

        if (this.autoValue) {
            this.observer.observe(this.element)
        }
    }

    disconnect() {
        if (this.autoValue) {
            this.observer.unobserve(this.element)
        }

        this.observer.disconnect()
    }

    next(e) {
        e.preventDefault()

        this.showProgress('Cargando, un momento...')
        this.advancePage()

        return false
    }

    showProgress(message) {
        const html = `<span class="spinner-border spinner-border-sm me-2"></span> ${message}`
        this.element.innerHTML = html
    }

    getCurrentPage() {
        return this.pageValue || 1
    }

    getPageUrl(n) {
        const params = new URLSearchParams(window.location.search)
        params.set('page', String(n).trim())

        return `${this.urlValue ?? window.location.pathname}?${params}`
    }

    advancePage() {
        const url = this.getPageUrl(this.getCurrentPage() + 1)

        fetch(url, {
            headers: {
                "Accept": "text/vnd.turbo-stream.html",
            },
        })
            .then(response => response.text())
            .then(html => renderStreamMessage(html))
            .catch(err => console.error(err))
    }

    observerCallback(entries) {
        if (entries[0].isIntersecting === true) {
            this.showProgress('Cargando, un momento...')
            this.advancePage()
        }
    }
}
