const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.styles([
		'node_modules/vuexy/app-assets/vendors/css/extensions/toastr.min.css',
		'node_modules/@dlghq/pace-progress/themes/blue/pace-theme-minimal.css',
		'node_modules/animate.css/animate.css',
		'node_modules/vuexy/app-assets/vendors/css/vendors.min.css',
		'node_modules/vuexy/app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css',
		'node_modules/vuexy/app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css',
		'node_modules/vuexy/app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css',
		'node_modules/vuexy/app-assets/vendors/css/tables/datatable/rowGroup.bootstrap4.min.css',
		'node_modules/vuexy/app-assets/css/plugins/forms/pickers/form-flat-pickr.css',
		'node_modules/vuexy/app-assets/css/plugins/forms/pickers/form-pickadate.css',
		'node_modules/vuexy/app-assets/vendors/css/forms/select/select2.min.css',
		'node_modules/vuexy/app-assets/vendors/css/charts/apexcharts.css',
		'node_modules/vuexy/app-assets/css/bootstrap.css',
		'node_modules/vuexy/app-assets/css/bootstrap-extended.css',
		'node_modules/vuexy/app-assets/css/colors.css',
		'node_modules/vuexy/app-assets/css/components.css',
		'node_modules/vuexy/app-assets/css/themes/dark-layout.css',
		'node_modules/vuexy/app-assets/css/themes/bordered-layout.css',
		'node_modules/vuexy/app-assets/css/themes/semi-dark-layout.css',
		'node_modules/vuexy/app-assets/css/core/menu/menu-types/horizontal-menu.css',
		'node_modules/vuexy/app-assets/css/pages/dashboard-ecommerce.css',
		'node_modules/vuexy/app-assets/css/plugins/charts/chart-apex.css',
		'node_modules/vuexy/app-assets/css/plugins/extensions/ext-component-toastr.css',
		'node_modules/vuexy//app-assets/css/plugins/forms/form-validation.css',
		'node_modules/vuexy//app-assets/css/pages/page-auth.css',
		'node_modules/vuexy//app-assets/css/pages/page-profile.css',
		'node_modules/vuexy/assets/css/style.css',

    ], 'public/css/app.css');


mix.scripts([

	    'node_modules/vuexy/app-assets/vendors/js/vendors.min.js',
		'node_modules/vuexy/app-assets/vendors/js/ui/jquery.sticky.js',
		'node_modules/vuexy/app-assets/vendors/js/forms/validation/jquery.validate.min.js',
		'node_modules/vuexy/app-assets/vendors/js/charts/apexcharts.min.js',
		'node_modules/vuexy/app-assets/js/core/app-menu.js',
		'node_modules/vuexy/app-assets/js/core/app.js',
		'node_modules/vuexy/app-assets/js/scripts/pages/page-profile.js',
		'node_modules/vuexy/app-assets/vendors/js/forms/select/select2.full.min.js',
		'node_modules/vuexy/app-assets/vendors/js/charts/chart.min.js',
    	'node_modules/vuexy/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js',
    	'node_modules/vuexy/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js',
    	'node_modules/vuexy/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js',
    	'node_modules/vuexy/app-assets/vendors/js/tables/datatable/responsive.bootstrap4.js',
    	'node_modules/vuexy/app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js',
    	'node_modules/vuexy/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js',
    	'node_modules/vuexy/app-assets/vendors/js/tables/datatable/jszip.min.js',
    	'node_modules/vuexy/app-assets/vendors/js/tables/datatable/pdfmake.min.js',
    	'node_modules/vuexy/app-assets/vendors/js/tables/datatable/vfs_fonts.js',
    	'node_modules/vuexy/app-assets/vendors/js/tables/datatable/buttons.html5.min.js',
    	'node_modules/vuexy/app-assets/vendors/js/tables/datatable/buttons.print.min.js',
    	'node_modules/vuexy/app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js',
    	'node_modules/vuexy/app-assets/vendors/js/pickers/pickadate/picker.js',
    	'node_modules/vuexy/app-assets/vendors/js/pickers/pickadate/picker.date.js',
    	'node_modules/vuexy/app-assets/vendors/js/pickers/pickadate/picker.time.js',
    	'node_modules/vuexy/app-assets/vendors/js/pickers/pickadate/legacy.js',
    	'node_modules/vuexy/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js',

    

], 'public/js/app.js');

mix.js('resources/js/app.js', 'public/js/some.js')
    .sass('resources/sass/app.scss', 'public/css/some.css');


