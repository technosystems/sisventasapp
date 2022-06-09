@extends('layouts.admin')
@section('title','EMPLEADOS')
@section('breadcrumb','EMPLEADOS')
@section('content')
<div class="content-header-left col-md-9 col-12 mb-2">
      <div class="row breadcrumbs-top">
          <div class="col-12">
              <h2 class="content-header-title float-left mb-0">Empleados</h2>
              <div class="breadcrumb-wrapper">
                  <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="mdi mdi-home"></i>Inicio</a>
                      </li>
                      <li class="breadcrumb-item"><a href="{{ url('admin/empleados') }}">Listado de empleados</a>
                      </li>
                      <li class="breadcrumb-item active">Registro de empleados
                      </li>
                  </ol>
              </div>
          </div>
      </div>
  </div><br>
  <div class="row">
      <div class="col-lg-12">
            <div class="card card-line-primary">
                  <div class="card-body">
                    	 {!! Form::open(['route' => ['admin.empleados.store'],'method' => 'POST', 'files' => true,'id' => 'form_empleado','autocomplete','off']) !!} 
        @include('admin.empleados.partials.input.form')

        <br><br>
        <button type="submit" class="btn blue darken-4 text-white form-control">Guardar cambios</button>
         {!! Form::close()!!}
                 </div>
            </div>
      </div>
 </div>
 


@endsection
@push('scripts')
<script>
	/*=========================================================================================
  File Name: auth-login.js
  Description: Auth login js file.
  ----------------------------------------------------------------------------------------
  Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
  Author: PIXINVENT
  Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

$(function () {
  'use strict';

  var pageLoginForm = $('#form_empleado');

  // jQuery Validation
  // --------------------------------------------------------------------
  if (pageLoginForm.length) {
    pageLoginForm.validate({
    
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
    });
  }
});

</script>
@endpush
 
 