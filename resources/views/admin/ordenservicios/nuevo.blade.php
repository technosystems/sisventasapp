@extends('layouts.admin')
@section('title', 'ORDEN DE SERVICIO')
@section('content')
<div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">Órdenes de servicios</h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/home') }}">Inicio</a>
                        </li>
                        <li class="breadcrumb-item"><a >General</a>
                        </li>
                        <li class="breadcrumb-item active"><a href="{{ url('/ordenservicios') }}">Listado de órdenes de servicios</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div><br>
  <div class="row">   
    <div class="col-12">
      <div class="card card-line-primary">
        <div class="card-header">
          <h4>Crear nueva orden de servicio</h4>
        </div>
        
        <div class="card-body">
             <div class="btn-group"> 
            <a href="{{ ('/ordenservicios/nuevo') }}"  class="btn btn-lg blue darken-4 disabled"><i class="mdi mdi-plus mt-2 text-white" ></i> <small class="text-white" data-toggle="tooltip" data-placement="top"
                            title="Registrar nueva orden de servicio.">Nueva orden de servicio</small></a>
            <a href="{{ ('/ordenservicios') }}"  class="btn btn-lg blue darken-4"><i class="mdi mdi-folder mt-2 text-white" ></i> <small class="text-white" data-toggle="tooltip" data-placement="top"
                            title="Ver listado de órdendes de servicio.">Listado de órdendes de servicio</small></a>

          </div>
            </li>
          </ul><br>
           {!! Form::open(['url' => ['/admin/ordenservicios/guardar'],'method' => 'POST','id'=>'main-form']) !!}
            <h3 class="text-center  mt-1 mb-4"><br>
             
            </h3>
           <div class="row">
            <div class="col-sm-6 form-group ">
              <a href="#createModalCliente" class="btn-link blue-text" data-bs-toggle="modal" data-bs-target="#createModalCliente"  style=" font-size:20px;">
               <small  data-toggle="tooltip" data-placement="top" title="Registrar nuevo cliente.">Nombre del cliente</small></a>
              </a>
            @php
               $clientes = App\Models\Cliente::get()
              @endphp
                                                      
               <select class="select2 form-control " name="cliente_id" id="cliente">
                  <option value="0" >Selecciona un cliente</option>
                  @foreach ($clientes as $cliente)
                    <option value="{{ $cliente->id }}" >{{ $cliente->nombre }} {{ $cliente->apellido }}</option>

                  @endforeach
              </select>
            </div>
            <div class="col-sm-6 form-group "> 
               <a  class="btn-link blue-text" style=" font-size:20px;">
               <small  data-toggle="tooltip" data-placement="top" title="Editar dato del cliente.">Teléfono del cliente</small></a>
              <input type="text" name="telefono" id="telefono_cliente" class="form-control" >
            </div>

           
            </div>
            <h3 class="text-center mt-1 mb-4">
            
            </h3>
            <div class="row">
              <div class="col-sm-4 form-group">
              <label for="txtNombre" class="control-label ">
              <a href="#createModalTipoEquipo" class="btn-lik blue-text" data-toggle="modal" data-target="#createModalTipoEquipo" style="font-size:20px;">
               <small  data-toggle="tooltip" data-placement="top" title="Registrar nuevo dispositivo.">Dispositivo</small></a>
              </a>
            </label><br>
                @php
                 $tipoequipos = App\Models\TipoEquipo::pluck('name','id')
                @endphp
                 {!! Form::select('tipo_equipo_id', $tipoequipos, old('tipo_equipo_id'), ['class' => 'form-control select2','required','placeholder' => 'Seleccione','id'=>'tipoequipos']) !!}
                </div>
                  <div class="col-sm-4 form-group">
                    <label for="txtNombre" class="control-label ">
                  
                  <a  onclick="abrirModalMarca()" href="#" class="btn-link blue-text" style=" font-size:20px;" disabled id="hrefmarca">
                   <small  data-toggle="tooltip" data-placement="top" title="Registrar nueva marca.">Marca</small></a>
                  </a>
               </label><br>
                    <select class="form-control select2 " name="marca_id" id="marcas">
                   </select>
              </div>
              <div class="col-sm-4 form-group">
                 <label for="txtNombre" class="control-label ">
                 
                  <a  onclick="abrirModalModelo()" href="#" class="btn-link blue-text" style=" font-size:20px;" disabled id="hrefmarca">
                   <small  data-toggle="tooltip" data-placement="top" title="Registrar nuevo Modelo.">Modelo</small></a>
                  </a>
               </label><br>
                  <select class="form-control select2 " name="modelo_id" id="modelos">
                  </select>
              </div>
              <div class="col-sm-4 form-group mt-4">
                <label for="txtNombre" class="control-label ">
                 
                  <a href="#createModalTipoReparacion" class="btn-link " data-toggle="modal" data-target="#createModalTipoReparacion"style="font-size:20px;">
                    <small  data-toggle="tooltip" data-placement="top" title="Registrar nuevo tipo de reparación.">Tipo de reparaciones</small></a>
                  </a>
               </label><br>
                 @php
                 $tiporeparaciones = App\Models\TipoReparaciones::get()
                @endphp
                   <select class="form-control select2 " multiple="" name="tipo_reparacion[]" id="tiporeparaciones">
                    @foreach ($tiporeparaciones as $tiporeparacion)
                      <option value="{{ $tiporeparacion->descripcion }}" >{{ $tiporeparacion->descripcion }}</option>
                    @endforeach
                  </select>
              </div>
              <div class="col-sm-4 form-group mt-4">
                <label>Descripciones de recepción</label>
                  <div class="form-label-group mb-0">
                      
                       {!! Form::textarea('orservacion_recepcion',null,['class'=>'form-control char-textarea', 'required' => 'required','autocomplete' =>'off','id' =>'textarea-counter',' data-length' => '60','rows'=>'3']) !!}
                   
                  </div>
                  <small class="textarea-counter-value float-right"><span class="char-count">0</span> / 60 </small>
              </div>
              <div class="col-sm-4 form-group mt-4">
                <label>Accesorios</label>
                  <div class="form-label-group mb-0">
                      
                       {!! Form::textarea('accesorios',null,['class'=>'form-control char-textarea', 'required' => 'required','autocomplete' =>'off','id' =>'textarea-counter',' data-length' => '60','rows'=>'3']) !!}
                   
                  </div>
                  <small class="textarea-counter-value float-right"><span class="char-count">0</span> / 60 </small>
              </div>
              <div class="col-sm-4 form-group mt-3">
              <label>Imei/Serie</label>
              <input type="text" name="imei"  class="form-control" >
            </div>
            <div class="col-sm-4 form-group mt-3">
              <label>Color</label>
              <input type="text" name="color"  class="form-control" >
            </div>
            <div class="col-sm-4 form-group mt-3">
              <label>Clave</label>
                   <select class="form-control select2 " name="clave" required>
                      <option value="Ninguna" >Ninguna</option>
                      <option value="Contraseña" >Contraseña</option>
                      <option value="Patrón" >Patrón</option>
                  </select>
            </div>
            <div class="col-sm-4 form-group mt-3">
              <label>Costo</label>
              <input type="text" name="costo"  class="form-control" >
            </div>
            <div class="col-sm-4 form-group mt-3">
              <label>Anticipo</label>
              <input type="text" name="anticipo"  class="form-control" >
            </div>
            <div class="col-sm-4 form-group mt-3">
              <label>Fecha de entrega</label>
              <input class="form-control" type="date" name="fecha_entrega" value="{{ date("Y-m-d") }}" id="date" min = "<?php echo date("Y-m-d",strtotime(date("Y-m-d")."- 0 days"));?>">
            </div>
              
            </div><br><br>
            <div class="card-footer">
              <div class="row">
                <div class="col-sm-6">
                   <a href="{{ url('ordenservicios') }}" class="btn red darken-4 text-white  ajax form-control" id="submit">
                    <i id="ajax-icon" class="mdi mdi-cancel"></i> Cancelar orden de servicio
                   </a>
               </div>
               <div class="col-sm-6">
                   <button type="submit" class="btn blue darken-4 text-white  ajax form-control" id="submit">
                    <i id="ajax-icon" class="fa fa-save"></i> Ingresar
                   </button>
               </div>
              </div>
            </div>

             {!! Form::close()!!}
        </div>
      </div>
    </div>
  </div>
 <div class="modal fade" id="editarModalCliente" tabindex="-1" role="dialog" aria-labelledby="formModal"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formModal">Editar datos del cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                {!! Form::open(['method' => 'POST','id'=>'formeditcliente']) !!}
                  <div class="form-group">
                    <label>Nombre y apellido del cliente</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fab fa-apple"></i>
                        </div>
                      </div>
                       <input type="hidden" id="idcliente" name="idcliente" value="">

                      <input type="text" id="nombrecliente" class="form-control" placeholder="Nombre  y apellido del cliente"
                       name="name" disabled>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Teléfono del cliente</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fab fa-apple"></i>
                        </div>
                      </div>
                      <input type="text" id="telefonocliente"  class="form-control" placeholder="Teléfono del cliente"
                       name="telefono">
                    </div>
                  </div>
                 
                 
                 
                  <div class="row">
                    <div class="col-sm-12">
                      <button type="submit" class="btn blue darken-4 form-control" 
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
$(function () {
   $.validator.setDefaults({
    
  });
  $('#main-form').validate({
    rules: {
      anticipo: {
        required: true,
        number:true
        
      },
      marca_id: {
        required: true,
       
      },
      modelo_id: {
        required: true
      },
       tipo_reparacion: {
        required: true
      },
      orservacion_recepcion: {
        required: true
      },
       accesorios: {
        required: true
      },
      imei: {
        required: true,
        maxlength:15,
        alphanumeric: true
      },
       color: {
        required: true
      },
       costo: {
        required: true,
        number:true
      },
      clave: {
        required: true
      },
      telefono: {
        required: true
      },
      tipo_equipo_id: {
        required: true
      },
    },
    messages: {
      anticipo: {
        required: "Debes ingresar un anticipo",
        number: "Solo se admiten números"
      },
      marca_id: {
        required: "Debes seleccionar una marca"
      },
       modelo_id: {
        required: "Debes seleccionar un modelo"
      },
       tipo_reparacion: {
        required: "Debes seleccionar las reparaciones."
      },
        orservacion_recepcion: {
        required: "Debes ingresar la descripción de recepción."
      },
       accesorios: {
        required: "Debes ingresar los accesorios que deja el cliente de equipo."
      },
       imei: {
        required: "Debes ingresar el imei o serie del equipo.",
        maxlength: "Debe tener como máximo 15 caracteres",
        alphanumeric : "El campo acepta números y letras"
      },
       color: {
        required: "Debes ingresar el color del equipo."
      },
       clave: {
        required: "Debes ingresar la clase de clave que posee el equipo."
      },
      costo: {
        required: "Debes ingresar el costo del servicio.",
        number: "Solo se admiten números"
      },
       tipo_equipo_id: {
        required: "Debes seleccionar un dispositivo."
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
});
</script>

<script type="text/javascript">
    // Daterangepicker
  if (jQuery().daterangepicker) {
      
    var date = new Date();
    date.setDate(date.getDate()-7);


      $(".datepicker").daterangepicker({
       locale: { format: "YYYY-MM-DD" },
       startDate: date
      });
  
    
    
  }
</script>
<script>
  function  abrirModalMarca()
  {
     var  input = document.getElementById('tipoequipos').value;
     console.log(input)
     if (input.trim().length > 0) {
      $('#createModalMarca').modal('show');
     }else{
     toastr.error('Debes seleccionar un dispositivo');
   }
  }

   function  abrirModalModelo()
  {
     var  input = document.getElementById('idmarca').value;
     if (input.trim().length > 0) {
      $('#createModalModelo').modal('show');
     }else{
     toastr.error('Debes seleccionar una marca');
   }
  }
</script>

 <script>
           $("#formeditcliente").on('submit', function(e){
          //alert(1)
                e.preventDefault();   
                var data = $('#formeditcliente').serialize();
                var idcliente = $('#idcliente').val();
               // console.log()

                 $.ajax({
                   headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   },
                   type: "POST",
                   url: '/clientes/guardarajax/'+idcliente,
                   cache: false,
                   data: data,    
                   success: function( response ) {
                     toastr.success('Datos ingresados');
                   $('#cliente').append($('<option>', {
                     value: response.id,
                     text: response.nombre,
                     selected: true
                   }));
                 $('#telefono_cliente').val(response.telefono);

                   $('#editarModalCliente').modal('hide');
                 }
                });
              });
          </script> 

<script type="text/javascript" src="{{ asset('js/admin/orden/tipoequipos.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/admin/orden/marcas.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/admin/orden/modelos.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/admin/orden/form.js') }}"></script>

@endpush
