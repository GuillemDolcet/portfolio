// -- controllers/pagination_controller.js

import { Controller } from "@hotwired/stimulus"
import { renderStreamMessage } from "@hotwired/turbo"

export default class extends Controller {

    connect() {
        window.$('.lds-ellipsis').fadeOut(); // will first fade out the loading animation
        window.$('.preloader').delay(333).fadeOut('slow'); // will fade out the white DIV that covers the website.
        window.$('body').delay(333);
    }
}
