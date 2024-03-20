// -- controllers/form_controller.js

import { Controller } from "@hotwired/stimulus"
import { renderStreamMessage, visit } from "@hotwired/turbo";
import SimpleToast from "../simple_toast";
import { xr } from "../xr";

export default class extends Controller {

    static targets = [ "select2" ];

    connect(){
        if ($(this.element).data('disabled')){
            $("select,textarea,input:not([name='language'])").prop("disabled", true);
        }
    }
    submit(e) {
        e.preventDefault();

        if (this.iamForm() && this.confirmed()) {
            this.element.submit()
        }

        return false;
    }

    async submitRemote(e) {
        e.preventDefault()

        if (this.iamForm() && this.confirmed()) {
            const url = this.element.action, data = new FormData(this.element)

            try {
                const response = await xr.turbo().post(url, {body: data})

                if (!response.ok) {
                    throw new Error('Ocurrió <b class="text-danger">un error al procesar la solicitud</b>. Reintente en unos instantes.')
                }

                if (response.redirected) {
                    return visit(response.url, {action: 'replace'})
                }

                const html = await response.text()
                renderStreamMessage(html)
            } catch (err) {
                SimpleToast.show('error', err.message)
            }
        }

        return false
    }

    iamForm() {
        return this.element && this.element.tagName === 'FORM'
    }

    confirmed() {
        const message = this.element.dataset.confirm

        if (message) {
            return confirm(message)
        }

        return true
    }

    changeLanguage(e){
        $("input[name='language']").each(function() {
            let language = $(this);
            if (language.is(':checked')){
                $("div[data-language='" + language.val() + "']").removeClass('d-none');
            } else {
                $("div[data-language='" + language.val() + "']").addClass('d-none');
            }
        });
    }

    select2TargetConnected(){
        this.select2Targets.forEach( function(select) {
            $(select).select2({
                dropdownParent: $(select).closest('.modal')
            });
        });
    }

    ableDisableFinishDate(event){
        if ($(event.target).prop('checked') === true){
            $('#finish_date').attr('disabled',true);
        } else {
            $('#finish_date').attr('disabled',false);
        }
    }
}
