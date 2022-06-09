@extends('layouts.admin')
@section('title','PAGOS DE NÓMINA')
@section('page_title', 'Listado de Roles')
@section('content')

    

     
	<div class="col-md-12">
    <div class="card card-line-primary">
      <div class="card-header  ">              
        <button type="button" class="btn blue darken-4 text-white btn-primary float-left btn-md"  data-toggle="modal" data-target="#createModalCliente"><i class="fas fa-plus-square"  data-bs-toggle="tooltip" data-bs-placement="top" title="Crear nuevo Usuario" data-container="body" data-animation="true"></i>
              Añadir nómina
        </button>
             
            </div>
             <!-- /.card-header -->
                <div class="card-body table-responsive">
                    
                   <table  class="display table table-striped table-sm" id="tableExport" style="width:100%">
                    <thead>
                    <tr> 
                    <th>Nombre completo</th>
                    <th>Método de pago</th>
                    <th>Sueldo quincenal</th>
                    <th>Bonificación</th>
                    <th>Deducción</th>
                    <th>Total pagado</th>
                    <th>Fecha de pago</th>
                    <th>Opciones</th> 
                    </tr>
                    </thead>
                    @php
                        $config = \DB::table('configuraciones')->first()
                    @endphp
                    <tbody>
                    @foreach ($pagos as $cliente)
                    <tr class="row{{ $cliente->id }}">
                    <td>{{ $cliente->empleado->display_name }}</td>
                    <td>{{ $cliente->metodo->name }}</td>
                    <td>{{ number_format($cliente->detalle->sueldo_neto ,2)}} {{ $config->prefijo_moneda }}</td>
                    <td>{{ number_format($cliente->detalle->total_bonificacion ,2)}} {{ $config->prefijo_moneda }}</td>
                    <td>{{ number_format($cliente->detalle->total_deduccion ,2)}} {{ $config->prefijo_moneda }}</td>
                    <td>{{ number_format($cliente->detalle->total_cancelado ,2)}}{{ $config->prefijo_moneda }}</td>
                    <td>{{ $cliente->fecha_emision }}</td>
                    <td>
                     <a  data-toggle="modal" data-target="#editarModalCliente{{$cliente->id}} " class="btn btn-round blue darken-4"><i class="mdi mdi-pencil mt-2 text-white" data-toggle="tooltip" data-placement="top"
                      title="Editar nómina de pago."></i>
                      </a>
                      <a href="{{ url('admin/pagos/nomina/borrar',$cliente->id) }}" class="btn btn-round red darken-4"><i class="mdi mdi-delete mt-2 text-white" data-toggle="tooltip" data-placement="top"
                      title="Eliminar nómina de pago."></i></a>
                       <a  href="{{ url('admin/pago/detalle',$cliente->id) }}" target="_blank" class="btn btn-round green darken-4 btn-success">
                        <i class="mdi mdi-folder mt-2 text-white" data-toggle="tooltip" data-placement="top"
                       title="Ver detalle de pago.">
                       </i>
                      </a>
                      <a  href="{{ url('admin/pago/imprimir',$cliente->id) }}" target="_blank" class="btn btn-round yellow darken-4 btn-warning">
                        <i class="mdi mdi-printer mt-2 text-white" data-toggle="tooltip" data-placement="top"
                       title="Imprimir recibo de pago.">
                       </i>
                      </a>
                    </td>
                    </tr>
                    @include('admin.pagos.partials.modal.editar')

                    @endforeach
                    </tr>
                    </tbody>                
                </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        @include('admin.pagos.partials.modal.create')
      </div>


@endsection