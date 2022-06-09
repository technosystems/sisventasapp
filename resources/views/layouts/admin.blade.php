<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ env('APP_NAME') }} - @yield('title')</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="robots" content="noindex, nofollow">
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('/app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/app-assets/vendors/css/tables/datatable/rowGroup.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="{{asset('css/mdb.lite.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/mdb-file-upload.min.css')}}" rel="stylesheet">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="{{ asset('css/some.css') }}">
    <link rel="stylesheet" href="{{ asset('css/system.css') }}">

    <link rel='shortcut icon' type='image/x-icon' href='{{ asset('img/favicon.ico') }}' />
    @stack('styles')
  </head>

  <body class="horizontal-layout horizontal-menu  navbar-floating footer-static animate__animated animate__fadeIn  " data-open="hover" data-menu="horizontal-menu" data-col="">

     <!-- BEGIN: Header-->
    @include('layouts.partials.sidebar')
    @include('layouts.partials.leftmenu')
    <!--Page Content Here -->
     <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
            </div>
            <div class="content-body">
                @yield('content')
                @include('layouts.partials.modal.clientes.createcliente')
                @include('layouts.partials.modal.ordenservicio.createorden')
                @include('layouts.partials.modal.tiporeparacion.createtiporeparacion')
                @include('layouts.partials.modal.tipoequipo.createtipoequipo')
                @include('layouts.partials.modal.marcas.createmarca')
                @include('layouts.partials.modal.modelos.createmodelo')
                @include('layouts.partials.modal.modelos.createtasa')
            </div>
          </div>
      </div>

    <!-- REQUIRED JS SCRIPTS -->
     <!-- General JS Scripts -->
    <script src="{{ asset('js/apps.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/clock.js') }}"></script>
    <script src="{{ asset('js/some.js') }}"></script>
    <script src="{{asset('js/mdb.lite.min.js')}}"></script>
    <script src="{{asset('js/mdb-file-upload.min.js')}}"></script>
     <script src="{{ asset('js/boostrap.js') }}"></script>
     <script src="{{ asset('/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
     <script src="{{ asset('/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
     <script src="{{ asset('/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js') }}"></script>
     <script src="{{ asset('/app-assets/vendors/js/tables/datatable/responsive.bootstrap4.js') }}"></script>
     <script src="{{ asset('/app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js') }}"></script>
     <script src="{{ asset('/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
     <script src="{{ asset('/app-assets/vendors/js/tables/datatable/jszip.min.js') }}"></script>
     <script src="{{ asset('/app-assets/vendors/js/tables/datatable/pdfmake.min.js') }}"></script>
     <script src="{{ asset('/app-assets/vendors/js/tables/datatable/vfs_fonts.js') }}"></script>
     <script src="{{ asset('/app-assets/vendors/js/tables/datatable/buttons.html5.min.js') }}"></script>
     <script src="{{ asset('/app-assets/vendors/js/tables/datatable/buttons.print.min.js') }}"></script>
     <script src="{{ asset('/app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js') }}"></script>
     <script src="{{ asset('/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
     <script src="{{ asset('js/system.js') }}"></script>
    <script>
         @if(Session::has('message'))
         var type = "{{ Session::get('alert-type', 'info') }}";
         switch(type){
             case 'info':
                 toastr.info("{{ Session::get('message') }}");
                 break;

             case 'warning':
                 toastr.warning("{{ Session::get('message') }}");
                 break;

             case 'success':
                 toastr.success("{{ Session::get('message') }}");
                 break;

             case 'error':
                 toastr.error("{{ Session::get('message') }}");
                 break;
         }
     @endif
     </script>


    @stack('scripts')

     <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
  </body>

</html>
