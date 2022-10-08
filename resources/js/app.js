
require('./bootstrap');


// jquery-ui-dist
window.jquery_ui = require('jquery-ui-dist/jquery-ui.js');

// Jasny BS
window.jasny = require('jasny-bootstrap');

// Datatables
window.datatables = require('datatables.net');
window.datatablesbs4 = require('datatables.net-bs4');

// Sweet Alert
window.Swal = require('sweetalert2/dist/sweetalert2.all.js');

// Select 2
window.select2 = require('select2/dist/js/select2.full.js');

// Overlay Scrollbar
window.overlayscrollbars = require('overlayscrollbars');

// Overlay Scrollbar
window.duallistbox = require('bootstrap4-duallistbox');


// Toastr
window.Toastr = require('toastr');

// Moment JS
window.moment = require('moment');
window.momentkh = require('@thyrith/momentkh');

// Datetimepicker
window.dateTimePicker = require('tempusdominus-bootstrap-4/build/js/tempusdominus-bootstrap-4.js');

// DatePicker
window.datePicker = require('bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js');

// iCheck
window.icheck = require('icheck/icheck.js');

// Admin LTE
window.adminlte = require('admin-lte');



// window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

// /**
//  * Next, we will create a fresh Vue application instance and attach it to
//  * the page. Then, you may begin adding components to this application
//  * or customize the JavaScript scaffolding to fit your unique needs.
//  */

// const app = new Vue({
//   el: '#app',
// });

