@extends('layouts.admin')
@section('title','PRODUCTOS')
@section('page_title', 'Listado de Roles')
@section('content')

<div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">Productos</h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/home') }}">Inicio</a>
                        </li>
                        <li class="breadcrumb-item"><a >General</a>
                        </li>
                        <li class="breadcrumb-item active"> Listado de productos
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div><br>
  
 @can('Registrar Productos')
       <a href="{{ url('admin/productos/create') }}" class="btn blue darken-4 text-white btn-primary float-left btn-md"><i class="fas fa-plus-square"  data-bs-toggle="tooltip" data-bs-placement="top" title="Crear nuevo Usuario" data-container="body" data-animation="true"></i>
        Nuevo producto
  </a>
 @endcan<br><br><br>

   
       
    
      <div class="row">
        <div class="col-sm-12">
          <div class="card card-line-primary">
             <!-- /.card-header -->
                <div class="card-body table-responsive">                 
                   <table  class="display table table-striped table-sm " id="tableExport" >
                    <thead>
                    <tr>
                    <th>#</th>
                    <th>Código del producto</th>
                    <th>Descripción</th>
                    <th>Precio de venta</th>
                    <th>Estado</th>
                    <th>Opciones</th> 
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($productos as $producto)
                    <tr class="row{{ $producto->id }}">
                    <td>{{ $producto->id }}</td>
                    <td><a href="/admin/productos/detalle/{{ $producto->codigo_barra}}">{{ $producto->codigo_barra}}</a></td>
                    <td>{{ $producto->descripcion }}</td>
                    <td>{{ $producto->precio_venta }}</td>

                    <td>
                      @if ($producto->status == 1)
                       <span class="badge text-white {{ $producto->id ? 'green darken-3' : 'badge-info' }}">
                       Disponible
                       </span>
                      @elseif($producto->status == 2)
                        <span class="badge text-white {{ $producto->id ? 'red darken-3' : 'badge-info' }}">
                       Agotado
                       </span>
                       @else
                        <span class="badge text-white {{ $producto->id ? 'yellow darken-3' : 'badge-info' }}">
                         En espera
                       </span>
                     @endif 
                   </td>
                    <td>
                     
                    @can('Editar Productos')
                         <a  data-toggle="modal" data-target="#EditarProducto{{ $producto->id }}" class="btn btn-round blue darken-4"><i class="mdi mdi-pencil mt-2 text-white" data-toggle="tooltip" data-placement="top"
                      title="EditarProducto."></i></a>
                    @endcan
                      @can('Eliminar Productos')
                         <a href="{{ url('/productos/borrar',$producto->id) }}" class="btn btn-round red darken-4"><i class="mdi mdi-delete mt-2 text-white" data-toggle="tooltip" data-placement="top"
                      title="Eliminar Producto."></i></a>
                     @endcan
                      {{-- <a  data-toggle="modal" data-target="#AjustarProducto{{ $producto->id }}" class="btn btn-round blue darken-4"><i class="mdi mdi-plus text-white" data-toggle="tooltip" data-placement="top"
                      title="Ajustar inventario."></i></a> --}}
                       
                    </td>
                    </tr>
                    @include('admin.productos.partials.modal.edit')
                    @include('admin.productos.partials.modal.ajustar')
                    @endforeach
                    </tr>
                    </tbody>                
                </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
 
      </div>


@endsection