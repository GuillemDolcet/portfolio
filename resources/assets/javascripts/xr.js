// -- xr.js
// Minimal wrapper around the fetch api

const getMeta = (name) => {
    const el = document.head.querySelector(`meta[name="${name}"]`)
    return el && el.content
}

export const csrfParam = () => getMeta("csrf-param")

export const csrfToken = () => getMeta("csrf-token")

export class Request {
    constructor(headers) {
        this.headers = Object.assign({}, headers || {})
    }

    request(url, options) {
        const opts = Object.assign({}, options || {})

        const meth = String(opts.method || "get").toLowerCase()

        const headers = Object.assign(this.headers, opts.headers || {})

        if (meth !== "get") {
            const token = csrfToken()
            if (token) {
                headers["X-CSRF-Token"] = token
            }
        }

        const params = Object.assign(opts, {"method": meth, "headers": headers})

        return fetch(url, params)
    }

    withHeaders(headers) {
        this.headers = Object.assign(this.headers, headers || {})
        return this
    }

    turbo() {
        return this.withHeaders({"Accept": "text/vnd.turbo-stream.html"})
    }

    json() {
        return this.withHeaders({"Accept": "text/json"})
    }

    get (url, options) {
        return this.request(url, Object.assign({method: "get"}, options || {}))
    }

    post (url, options) {
        return this.request(url, Object.assign({method: "post"}, options || {}))
    }

    put (url, options) {
        return this.request(url, Object.assign({method: "put"}, options || {}))
    }

    patch (url, options) {
        return this.request(url, Object.assign({method: "patch"}, options || {}))
    }

    delete (url, options) {
        return this.request(url, Object.assign({method: "delete"}, options || {}))
    }
}

export const xr = new Request();
