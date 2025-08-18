// -- application.js

// Vite.js asset processing
import.meta.glob(["../images/**"])

// Turbo
import * as Turbo from "@hotwired/turbo"
Turbo.setProgressBarDelay(100)
window.Turbo = Turbo

// jQuery
import jquery from 'jquery'
window.$ = window.jQuery = jquery

// Select2
import select2 from "select2"
select2(window.$)

import Swal from 'sweetalert2/dist/sweetalert2.min'

// Tabler
import "@tabler/core/js/tabler"
// ApexCharts
import ApexCharts from 'apexcharts'
window.ApexCharts = ApexCharts;

// Stimulus
import { Application } from "@hotwired/stimulus"

// Bootstrap wrappers
import ToastController from "./controllers/toast_controller"
import RemoteModalController from "./controllers/remote_modal_controller"
import FormController from "./controllers/form_controller"
import PaginationController from "./controllers/pagination_controller"

const app = Application.start()
app.register("toast", ToastController)
app.register("form", FormController)
app.register("remote-modal", RemoteModalController)
app.register("pagination", PaginationController)


window.Stimulus = app

