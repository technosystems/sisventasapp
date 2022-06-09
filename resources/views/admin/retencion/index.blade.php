@extends('layouts.admin')
@section('title','RETENCIÓN')
@section('breadcrumb','RETENCIÓN')
@section('content')
 <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">Retención de nómina</h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/home') }}">Inicio</a>
                        </li>
                        <li class="breadcrumb-item"><a >General</a>
                        </li>
                        <li class="breadcrumb-item active"> Listado de retenciones
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div><br>
  <button type="button" class="btn blue darken-4 text-white btn-primary float-left btn-md"  data-toggle="modal" data-target="#CrearUsuario"><i class="fas fa-plus-square"  data-bs-toggle="tooltip" data-bs-placement="top" title="Crear nueva retención" data-container="body" data-animation="true"></i>
        Nueva retención
  </button><br><br><br>
  <div class="row">
    <div class="col-lg-12">
      <div class="card card-line-primary">
            <div class="card-header">
              <h4 class="card-title">Listado de retenciones</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="tableExport" class="display table table-striped table-hover" >
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Descripción de la retención</th>
                      <th>Valor de la retención (%)</th>
                      <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($retencion as $element)
                      <tr>
                        <td>{{ $element->id }}</td>
                        <td>{{ $element->descripcion }}</td>
                        <td>{{ $element->valor }}%</td>
                        <td>
                          <button type="button" class="btn btn-round btn-primary blue darken-3 text-white" data-toggle="modal" data-target="#EditarUsuario{{ $element->id }}">
                          <span class="btn-inner--icon"><i class="mdi mdi-pencil"  data-bs-toggle="tooltip" data-bs-placement="top" title="Editar retención" data-container="body" data-animation="true"></i></span>
                        </button>
                        
                      </td>
                       
                      </tr>
                       @include('admin.retencion.partials.modal.edit')
                    @endforeach
                  </tbody>
                </table>
            </div>
          </div>
        </div>
      </div>
  </div>
  @include('admin.retencion.partials.modal.create')

@endsection

 
 