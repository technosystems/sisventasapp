@extends('layouts.admin')
@section('title','EMPLEADOS')
@section('breadcrumb','EMPLEADOS')
@section('content')
 <div class="content-header-left col-md-9 col-12 mb-2">
      <div class="row breadcrumbs-top">
          <div class="col-12">
              <h2 class="content-header-title float-left mb-0">Empleados</h2>
              <div class="breadcrumb-wrapper">
                  <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="mdi mdi-home"></i>Inicio</a>
                      </li>
                      <li class="breadcrumb-item"><a href="#">HTM</a>
                      </li>
                      <li class="breadcrumb-item active">Listado de empleados
                      </li>
                  </ol>
              </div>
          </div>
      </div>
  </div>

    <br>
          <div class="row">
              <div class="col-lg-12">
                    <div class="card card-line-primary">
                          <div class="card-header">
                            <a href="{{ url('admin/empleados/create') }}" class="btn blue darken-4 text-white btn-primary"><i class="fas fa-plus-square"  data-bs-toggle="tooltip" data-bs-placement="top" title="Crear nuevo Empleado" data-container="body" data-animation="true"></i>
                                    Nuevo empleado
                            </a>
                          </div>
                          <div class="card-body">
                            <div class="table-responsive">
                              <table id="tableExport" class="display table table-striped table-hover" >
                                <thead>
                                  <tr>
                                    <th>#</th>
                                   
                                    <th>Nombre completo</th>
                                    <th>Correo electrónico</th>
                                    
                                    <th>Departamento</th>
                                    <th>Estado</th>
                                    <th>Fecha de ingreso</th>
                                    <th>Sueldo base</th>
                                    <th>Opciones</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach ($empleados as $element)
                                 <?php
                                   $fecha1= new DateTime($element->fecha_ingreso);
                                   $fecha2= new DateTime(now());
                                    $diff = $fecha1->diff($fecha2);

                                    // El resultados sera 3 dias
                                   
                                  ?>
                                    <tr>
                                      <td>{{ $element->id }}</td>
                                      <td>{{ $element->display_name }}</td>
                                      <td>{{ $element->email }}</td>
                                      
                                      <td>{{ $element->departamento->name}}</td> 
                                      <td>
                                        @if ($element->status == 1)
                                          <span class="badge text-white {{ $element->id ? 'green darken-3' : 'badge-info' }}">
                                           Activo
                                           </span>
                                         @else
                                       <span class="badge text-white {{ $element->id ? 'red darken-3' : 'badge-info' }}">
                                           Inactivo
                                           </span>
                                        @endif
                                      </td>
                                      
                                     
                                      <td>
                                        {{ $element->fecha_ingreso}}
                                    </td>
                                    @php
                                        $moneda = DB::table('configuraciones')->first()
                                    @endphp
                                     <td>
                                         {{ $element->sueldo_base }} {{ $moneda->prefijo_moneda }}
                                    </td>
                                    <td>
                                       
                                        <a href="{{ url('admin/empleados', [$element->id,'edit']) }}" class="btn btn-round btn-success green darken-3 text-white">
                                        <span class="btn-inner--icon"><i class="mdi mdi-pencil"  data-bs-toggle="tooltip" data-bs-placement="top" title="Editar datos del empleado" data-container="body" data-animation="true"></i></span>
                                      </a>
                                      <a href="{{ url('admin/empleados/'.$element->id) }}" class="btn btn-primary btn-round"><i class="mdi mdi-printer"  data-toggle="tooltip" data-placement="top" title="Imprimir planilla del empleado" data-container="body" data-animation="true"></i></a>

                                       <a data-toggle="modal" data-target="#EditarUsuario{{ $element->id }}" class="btn btn-success btn-round"><i class="mdi mdi-calculator"  data-toggle="tooltip" data-placement="top" title="Registro de bonificación" data-container="body" data-animation="true"></i></a>
                                    
                                    <a data-toggle="modal" data-target="#RegistrarDeduccion{{ $element->id }}" class="btn btn-primary btn-round purple"><i class="mdi mdi-bell"  data-toggle="tooltip" data-placement="top" title="Registro de deducción" data-container="body" data-animation="true"></i></a>
                                       
                                      @include('admin.empleados.partials.modal.bonificacion')
                                      @include('admin.empleados.partials.modal.deduccion')
                                    </td>
                                     
                                    </tr>
                               
                                  @endforeach
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                  </div>
                </div>
       


@endsection

 
 