@extends('layouts.admin')
@section('title','VACACIONES')
@section('page_title', 'Listado de Roles')
@section('content')
<div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">VACACIONES</h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/home') }}">Inicio</a>
                        </li>
                        <li class="breadcrumb-item"><a >General</a>
                        </li>
                        <li class="breadcrumb-item active"> Listado de vacaciones
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div><br>
      	<div class="col-md-12">
          <div class="card card-line-primary">
            <div class="card-header  ">
                
               <button type="button" class="btn blue darken-4 text-white btn-primary float-left btn-md"  data-toggle="modal" data-target="#createModalCliente"><i class="fas fa-plus-square"  data-bs-toggle="tooltip" data-bs-placement="top" title="Crear nuevo Usuario" data-container="body" data-animation="true"></i>
        Añadir vacaciones
  </button>
             
            </div>
             <!-- /.card-header -->
                <div class="card-body table-responsive">
                    
                   <table  class="display table table-striped " id="tableExport" style="width:100%">
                    <thead>
                    <tr> 
                    <th>#</th>
                    <th>Nombre completo</th>
                    <th>Desde</th>
                    <th>Hasta</th>
                    <th>Días restantes</th>
                    <th>Opciones</th> 
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($vacaciones as $cliente)
                    <tr class="row{{ $cliente->id }}">
                    <td>{{ $cliente->id }}</td>
                    <td>{{ $cliente->empleado->display_name }}</td>
    
                    <td>{{ $cliente->fecha_desde }}</td>
                    <td>{{ $cliente->fecha_hasta }}</td>
                    <?php
                        $hoy = time();
                        $fecha_vencimiento = strtotime($cliente->fecha_hasta);
                        $date_diff = $fecha_vencimiento - $hoy;
                        $dias_restantes = round($date_diff / (60 * 60 * 24))*-1;
                    ?>
                    <td>{{ $dias_restantes }} días</td>
                    <td>
                     <a  data-toggle="modal" data-target="#editarModalCliente{{$cliente->id}} " class="btn btn-round blue darken-4"><i class="mdi mdi-pencil mt-2 text-white" data-toggle="tooltip" data-placement="top"
                      title="Editar Vacaciones."></i>
                      </a>
                      <a href="{{ url('/empleado/vacaciones/borrar',$cliente->id) }}" class="btn btn-round red darken-4"><i class="mdi mdi-delete mt-2 text-white" data-toggle="tooltip" data-placement="top"
                      title="Eliminar Vacaciones."></i></a>
                    
                    </td>
                    </tr>
                    @include('admin.vacaciones.partials.modal.editar')
                    @endforeach
                    </tr>
                    </tbody>                
                </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        @include('admin.vacaciones.partials.modal.create')
 


@endsection