

/* pace-progress */
window.Pace = require('@dlghq/pace-progress');
window.feather = require('feather-icons')
 feather.replace();

 

/* toastr */
window.toastr = require('vuexy/app-assets/vendors/js/extensions/toastr.min.js')
toastr.options = {

  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-top-right",
  "preventDuplicates": true,
  "onclick": null,
  "showDuration": 300,
  "hideDuration": 1000,
  "timeOut": 5000,
  "extendedTimeOut": 1000,
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "slideDown", 
  "hideMethod": "fadeOut"
}

//Icheck
require('icheck');








