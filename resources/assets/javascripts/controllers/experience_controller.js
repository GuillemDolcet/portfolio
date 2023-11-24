// -- controllers/experience_controller.js

import { Controller } from "@hotwired/stimulus"
export default class extends Controller {
    ableDisableFinishDate(event){
        if ($(event.target).prop('checked') === true){
            $('#finish_date').attr('disabled',true);
        } else {
            $('#finish_date').attr('disabled',false);
        }
    }
}
