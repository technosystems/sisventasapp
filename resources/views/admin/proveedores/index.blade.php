@extends('layouts.admin')
@section('title','PROVEEDORES')
@section('page_title', 'Listado de Roles')
@section('content')
<div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">PROVEEDORES</h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/home') }}">Inicio</a>
                        </li>
                        <li class="breadcrumb-item"><a >General</a>
                        </li>
                        <li class="breadcrumb-item active"> Listado de proveedores
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
        Nuevo proveedor
  </button>
             
            </div>
             <!-- /.card-header -->
                <div class="card-body table-responsive">
                     
                 
                   <table  class="display table table-striped " id="tableExport" style="width:100%">
                    <thead>
                    <tr> 
                    <th>#</th>
                    <th>Nombre completo</th>
                    <th>Correo de la empresa</th>
                    <th>Documento de la empresa</th>
                    <th>Teléfono</th>
                    <th>Estado del proveedor</th>
                    <th>Deuda con el proveedor</th>
                    <th>Opciones</th> 
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($clientes as $cliente)
                    <tr class="row{{ $cliente->id }}">
                    <td>{{ $cliente->id }}</td>
                    <td>{{ $cliente->company_name }}</td>
                    <td>{{ $cliente->email }}</td>
                    <td>{{ $cliente->rif_number }}</td>
                    <td>{{ $cliente->phone_number }}</td> 
                    @if ($cliente->status == 1)
                          <td>
                             <span class="badge green text-white">Activo</span>
                          </td>
                          @else
                          <td> <span class="badge red text-white">Deshabilitado</span></td>
                        @endif
                         <td>
                            
                            ${{ $cliente->getSaldoDeuda() }}
                        </td>
                    <td> 
                     
                      @can('EditarClientes')
                         <a  data-toggle="modal" data-target="#editarModalCliente{{$cliente->id}} " class="btn btn-round blue darken-4"><i class="mdi mdi-pencil mt-2 text-white" data-toggle="tooltip" data-placement="top"
                      title="Editar Cliente."></i></a>
                     @endcan
                      @can('EliminarClientes')
                         <a href="{{ url('/proveedores/borrar',$cliente->id) }}" class="btn btn-round red darken-4"><i class="mdi mdi-delete mt-2 text-white" data-toggle="tooltip" data-placement="top"
                      title="Eliminar Cliente."></i></a>
                     @endcan
                       
                    </td>
                  
                    </tr>
                    @include('admin.proveedores.partials.modal.editar')
                    @endforeach
                    </tr>
                    </tbody>                
                </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        @include('admin.proveedores.partials.modal.create')
   


@endsection