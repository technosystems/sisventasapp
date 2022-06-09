@extends('layouts.admin')
@section('title','Clientes')
@section('page_title', 'Listado de Roles')
@section('content')
<div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">Clientes</h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/home') }}">Inicio</a>
                        </li>
                        <li class="breadcrumb-item"><a >General</a>
                        </li>
                        <li class="breadcrumb-item active"> Listado de clientes
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div><br>

      <div class="row">
            <div class="col-md-12">
          <div class="card card-line-primary">
            <div class="card-header  ">
                    
  <a href="{{url('admin/clientes/nuevo')}}" 
          class="btn blue darken-4 text-white btn-primary float-left btn-md">
          <i class="fas fa-plus-square"  
          data-bs-toggle="tooltip" 
          data-bs-placement="top" 
          title="Crear nuevo Usuario" 
          data-container="body" 
          data-animation="true">
          </i>
        Nuevo cliente
  </a>
             
            </div>
        <div class="table-responsive">
                <table id="tableExport" class="table table-hover">
                    <thead>
                        <tr>
                        <th width="100px" class="text-center">ID</th>   
                        <th width="200px" class="text-center">Nombre</th>
                        <th class="text-center">Dirección</th>
                        <th width="120px" class="text-center">Teléfono</th>
                        <th class="text-center">E-Mail</th>
                        <th width="120px" class="text-center">Deuda pendiente</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($clientes as $cliente)
                    <tr class="text-center">
                        <td>{{$cliente->id}}</td>                               
                        
                        <td>
                            <a href="/admin/clientes/detalle/{{$cliente->id}}">       
                                {{$cliente->nombre}} {{$cliente->apellido}}
                            </a>
                        </td>
                                               
                        <td>{{$cliente->direccion}}</td>
                        <td>{{$cliente->telefono}}</td>                             
                        <td>{{$cliente->mail}}</td>
                        <td class="text-center">
                            
                            ${{ $cliente->getSaldo() }}
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
    </div>
</div>
      </div>
        @include('admin.clientes.partials.modal.create')
  


@endsection