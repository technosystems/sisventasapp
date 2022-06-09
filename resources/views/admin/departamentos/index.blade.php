@extends('layouts.admin')
@section('title','DEPARTAMENTOS')
@section('breadcrumb','DEPARTAMENTOS')
@section('content')
 <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">DEPARTAMENTOS</h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/home') }}">Inicio</a>
                        </li>
                        <li class="breadcrumb-item"><a >General</a>
                        </li>
                        <li class="breadcrumb-item active"> Listado de los departamentos
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div><br>
 

    <div class="col-lg-12">
      <div class="card card-line-primary">
            <div class="card-header">
              <button type="button" class="btn blue darken-4 text-white btn-primary float-left btn-md"  data-toggle="modal" data-target="#CrearUsuario"><i class="fas fa-plus-square"  data-bs-toggle="tooltip" data-bs-placement="top" title="Crear nuevo departamento" data-container="body" data-animation="true"></i>
                  Nuevo departamento
            </button>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="tableExport" class="display table table-striped table-hover" >
                  <thead>
                    <tr>
                     <th>#</th>
                      <th>Nombre</th>
                      <th>Estado</th>
                      <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($academias as $element)
                      <tr>
                        <td>{{ $element->id }}</td>
                        <td>{{ $element->name }}</td>
                        @if ($element->status == 1)
                          <td>
                             <span class="badge green text-white">Activo</span>
                          </td>
                          @else
                          <td> <span class="badge red text-white">Deshabilitado</span></td>
                        @endif
                        
                       
                        <td>
                          
                          <button type="button" class="btn btn-round green darken-3 text-white" data-toggle="modal" data-target="#EditarUsuario{{ $element->id }}">
                          <span class="btn-inner--icon"><i class="mdi mdi-pencil"  data-bs-toggle="tooltip" data-bs-placement="top" title="Editar departamento" data-container="body" data-animation="true"></i></span>
                        </button>
                        
                      </td>
                       
                      </tr>
                       @include('admin.departamentos.partials.modal.edit')
                    @endforeach
                  </tbody>
                </table>
            </div>
          </div>
        </div>
      </div>

  @include('admin.departamentos.partials.modal.create')

@endsection

 
 