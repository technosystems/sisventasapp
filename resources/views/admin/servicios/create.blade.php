@extends('layouts.admin')
@section('title','SERVICIOS')
@section('breadcrumb','SERVICIOS')
@section('content')
 <div class="content-header-left col-md-9 col-12 mb-2">
      <div class="row breadcrumbs-top">
          <div class="col-12">
              <h2 class="content-header-title float-left mb-0">Servicios</h2>
              <div class="breadcrumb-wrapper">
                  <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ url('/home') }}">Inicio</a>
                      </li>
                      <li class="breadcrumb-item"><a href=" {{route('admin.servicio.index')}} ">Listado</a>
                      </li>
                      <li class="breadcrumb-item active"> Registro de servicios
                      </li>
                  </ol>
              </div>
          </div>
     </div>
 </div>
 <div class="row">
    <div class="col-md-12">
      <div class="card card-line-primary ">
        <div class="card-header">
          <h4>Registro de servicios</h4>
        </div>
        <div class="card-body">
          
          {!! Form::open(['route' => ['admin.servicio.store'],'method' => 'POST','id'=>'formservicio']) !!}
                  
                  @include('admin.servicios.partials.input.form')
                 
                  <div class="row">
                    <div class="col-sm-4">
                      <button type="submit" class="btn blue darken-4 form-control btn-primary" 
                       id="boton">
                          <i class="fas fa-save text-white" id="ajax-icon"></i>
                           <span class="text-white ml-3">{{ __('Guardar') }}</span>
                      </button>
                    </div>
                  </div>
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

  var pageLoginForm = $('#formservicio');

  // jQuery Validation
  // --------------------------------------------------------------------
  if (pageLoginForm.length) {
    pageLoginForm.validate({
       rules: {
      descripcion: {
        required: true,
        
      },
       precio_costo: {
        required: true,
        number:true
        
      },
      
    },
    messages: {
      descripcion: {
        required: "Ingresa la descripción del servicio"

      },
      precio_costo: {
        required: "Ingresa el costo del servicio",
        number:'Por favor ingresar un valor de monto sin comas ejem: (10.50)'
        
      },
      
    },
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
 
 