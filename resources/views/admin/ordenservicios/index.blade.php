@extends('layouts.admin')
@section('title', 'ORDEN DE SERVICIO')
@section('content')
<div class="row">
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
                        <li class="breadcrumb-item active"><a>Listado de órdenes de servicios</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div><br>
    <div class="col-12">
      @if (count($errors) > 0)
          
            
              @push('scripts')
                <script>
                  toastr.error("Contraseña incorrecta");
                </script>
              @endpush
             
              
          </div>
      @endif
      <div class="card card-line-primary">
        <div class="card-header">
         
        </div>        
        <div class="card-body">
          <div class="btn-group">
            <a href="{{ url('admin/ordenservicios/nuevo') }}"  class="btn btn-lg blue darken-4"><i class="mdi mdi- mt-2 text-white" ></i> <small class="text-white" data-toggle="tooltip" data-placement="top"
            title="Registrar nueva orden de servicio.">Nueva orden de servicio</small></a>
             <a href="{{ url('admin/ordenservicios') }}"  class="btn btn-lg blue darken-4 disabled"><i class="mdi mdi-plus mt-2 text-white " ></i> <small class="text-white" data-toggle="tooltip" data-placement="top"
                            title="Registrar nueva orden de servicio.">Listado de órdenes de servicios</small></a>
          </div>
          <div class="table-responsive mt-5">
            <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
              <thead>
                <tr>
                  <th class="text-uppercase" >FOLIO</th>
                  <th class="text-uppercase" >CLIENTE - TELÉFONO</th>
                  <th class="text-uppercase" >SERIE</th>
                  <th class="text-uppercase" > MODELO</th>
                  <th class="text-uppercase" >ESTADO</th>
                  <th class="text-uppercase" >OPCIONES</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($ordenes as $orden)
                   
                  
               
                <tr>
                  @include('layouts.partials.modal.ordenservicio.historial')
                  <td>
                    <a href="#"  data-toggle="modal" data-target="#historialOrdenServicio{{$orden->id}}"></i>00000{{ $orden->id }}</a>  
                  </td>
                  <td>{{ $orden->cliente->nombre .' '. $orden->cliente->apellido }} - {{ $orden->cliente->telefono }}</td>
                  <td>{{ $orden->imei }}</td>
                  <td>{{ $orden->marca->name }} - {{ $orden->modelo->descripcion }}</td>
                  <td>
                   @if ( $orden->estado_servicio_id == 1 )
                    <span class="badge text-white {{ $orden->estado_servicio_id ? 'blue darken-3' : 'badge-info' }}">
                     <a  data-toggle="modal" data-target="#updateOrdenServicio{{$orden->id}} "><i class="mdi mdi-history mt-2 text-white" data-toggle="tooltip" data-placement="top"
                    title="Ver Historial de la orden de servicio."></i> {{ $orden->estado->name }}</a>
                    </span>
                   @elseif($orden->estado_servicio_id == 2)
                   <span class="badge text-white {{ $orden->estado_servicio_id ? 'green darken-2' : 'badge-info' }}">
                     <a  data-toggle="modal" data-target="#updateOrdenServicio{{$orden->id}} "><i class="mdi mdi-history mt-2 text-white" data-toggle="tooltip" data-placement="top"
                    title="Ver Historial de la orden de servicio."></i> {{ $orden->estado->name }}</a>
                   </span>
                   @elseif($orden->estado_servicio_id == 3)
                   <span class="badge text-white {{ $orden->estado_servicio_id ? 'yellow darken-2' : 'badge-info' }}">
                     <a  data-toggle="modal" data-target="#updateOrdenServicio{{$orden->id}} "><i class="mdi mdi-history mt-2 text-white" data-toggle="tooltip" data-placement="top"
                    title="Ver Historial de la orden de servicio."></i> {{ $orden->estado->name }}</a>
                    </span>
                   @elseif($orden->estado_servicio_id == 4)

                    <span class="badge text-white {{ $orden->estado_servicio_id ? 'red darken-2' : 'badge-info' }}">
                    <a  data-toggle="modal" data-target="#updateOrdenServicio{{$orden->id}} "><i class="mdi mdi-history mt-2 text-white" data-toggle="tooltip" data-placement="top"
                    title="Ver Historial de la orden de servicio."></i> {{ $orden->estado->name }}</a>
                    </span>

                   @elseif($orden->estado_servicio_id == 5)

                   <span class="badge text-white {{ $orden->estado_servicio_id ? 'yellow darken-4' : 'badge-info' }}">
                    <a  data-toggle="modal" data-target="#updateOrdenServicio{{$orden->id}} "><i class="mdi mdi-history mt-2 text-white" data-toggle="tooltip" data-placement="top"
                    title="Ver Historial de la orden de servicio."></i> {{ $orden->estado->name }}</a>
                    </span>

                   @elseif($orden->estado_servicio_id == 6)
                    <span class="badge text-white {{ $orden->estado_servicio_id ? 'green darken-2' : 'badge-info' }}">
                     <a  data-toggle="modal" data-target="#updateOrdenServicio{{$orden->id}} "><i class="mdi mdi-history mt-2 text-white" data-toggle="tooltip" data-placement="top"
                    title="Ver Historial de la orden de servicio."></i> {{ $orden->estado->name }}</a>
                    </span>

                   @elseif($orden->estado_servicio_id == 7)
                    <span class="badge text-white {{ $orden->estado_servicio_id ? 'green darken-2' : 'badge-info' }}">
                     <a  data-toggle="modal" data-target="#updateOrdenServicio{{$orden->id}} "><i class="mdi mdi-history mt-2 text-white" data-toggle="tooltip" data-placement="top"
                    title="Ver Historial de la orden de servicio."></i> {{ $orden->estado->name }}</a>
                    </span>
                   @endif

                    </td>
                  <td>


                  
                    
                    
                    <a href="{{url('admin/ordenservicios/imprimir',[$orden->id])}} " target="_blank" class="btn btn-round red darken-4"><i class="mdi mdi-printer mt-2 text-white" data-toggle="tooltip" data-placement="top"
                    title="Imprimir comprobante."></i></a>

                    
                

                </td>
              </tr>

              @include('layouts.partials.modal.ordenservicio.editorden')

              @endforeach
            </tbody>
              
            </table>

          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
