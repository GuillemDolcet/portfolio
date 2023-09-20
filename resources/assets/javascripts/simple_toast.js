// -- simple_toast.js
// SimpleToast is a toast message utility creator, see controllers/toast_controller.js
// too for the code that actually displays the toaster.

const TOAST_TYPE_INFO = 'info'
const TOAST_TYPE_SUCCESS = 'success'
const TOAST_TYPE_ERROR = 'error'

const TOAST_DEFAULT_OPTIONS = {
    delay: 3000,
    autoShow: true,
    makeToaster: false
}

export default class SimpleToast {

    constructor(type, message, options) {
        this.type = type
        this.message = message
        this.options = Object.assign(TOAST_DEFAULT_OPTIONS, options || {})

        this.build()
    }

    static get INFO() {
        return TOAST_TYPE_INFO
    }

    static get SUCCESS() {
        return TOAST_TYPE_SUCCESS
    }

    static get ERROR() {
        return TOAST_TYPE_ERROR
    }

    get borderClass() {
        switch (this.type) {
            case TOAST_TYPE_INFO:
            default:
                return 'border-primary'

            case TOAST_TYPE_SUCCESS:
                return 'border-success'

            case TOAST_TYPE_ERROR:
                return 'border-danger'
        }
    }

    get textClass() {
        switch (this.type) {
            default:
                return 'text-body'
        }
    }

    get iconClasses() {
        switch (this.type) {
            case TOAST_TYPE_INFO:
            default:
                return 'text-primary'

            case TOAST_TYPE_SUCCESS:
                return 'text-success'

            case TOAST_TYPE_ERROR:
                return 'text-danger'
        }
    }

    get iconSvg() {
        switch (this.type) {
            case TOAST_TYPE_INFO:
            default:
                return `<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-md icon-tada"
                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <circle cx="12" cy="12" r="9"></circle>
                            <line x1="12" y1="8" x2="12.01" y2="8"></line>
                            <polyline points="11 12 12 12 12 16 13 16"></polyline>
                        </svg>`

            case TOAST_TYPE_SUCCESS:
                return `<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-md icon-tada"
                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M5 12l5 5l10 -10"></path>
                        </svg>`

            case TOAST_TYPE_ERROR:
                return `<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-md icon-tada"
                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <circle cx="12" cy="12" r="9"></circle>
                            <line x1="12" y1="8" x2="12" y2="12"></line>
                            <line x1="12" y1="16" x2="12.01" y2="16"></line>
                        </svg>`
        }
    }

    get toaster() {
        return document.querySelector('#toaster')
    }

    static show(type, message, options) {
        return new SimpleToast(type, message, options || {})
    }

    static info(message, options) {
        return SimpleToast.show(SimpleToast.INFO, message, options)
    }

    static success(message, options) {
        return SimpleToast.show(SimpleToast.SUCCESS, message, options)
    }

    static error(message, options) {
        return SimpleToast.show(SimpleToast.ERROR, message, options)
    }

    build() {
        if (this.toaster === null && this.options.makeToaster) {
            document.body.appendChild(this.makeToaster())
        }

        this.toaster.appendChild(this.makeToast())
    }

    makeToast() {
        let toast = document.createElement('div')

        toast.classList.add('toast', 'border', 'border-2', 'shadow-sm')
        toast.classList.add(this.borderClass)

        toast.dataset['controller'] = 'toast'
        toast.dataset['toastDelayValue'] = this.options.delay
        toast.dataset['toastAutoShowValue'] = this.options.autoShow

        toast.innerHTML = `
            <div class="d-flex align-items-center justify-content-between p-1">
                <div class="${this.iconClasses}">${this.iconSvg}</div>
                <div class="toast-body w-100 text-body ${this.textClass}">${this.message}</div>
                <button type="button" class="btn-close mt-1 me-1 align-self-start" data-bs-dismiss="toast"></button>
            </div>`.trim()

        return toast
    }

    makeToaster() {
        let toaster = document.createElement('div')
        toaster.id = 'toaster'

        toaster.classList.add('toast-container', 'position-fixed', 'top-0', 'end-0', 'py-4', 'px-3')

        toaster.style['zIndex'] = 5050;

        return toaster
    }
}
