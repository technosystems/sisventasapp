@extends('layouts.admin')

@section('title', 'Usuarios')
@section('page_title', 'Usuarios')
@section('content')
 <div class="content-header-left col-md-9 col-12 mb-2">
    <div class="row breadcrumbs-top">
        <div class="col-12">
            <h2 class="content-header-title float-left mb-0">Usuarios</h2>
            <div class="breadcrumb-wrapper">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="mdi mdi-home"></i> Home</a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Seguridad</a>
                    </li>
                    <li class="breadcrumb-item active">Listado de usuarios
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
  <div class="col-md-6">
    <div class="btn-group">
     
     @can('Registrar Usuario')
      <a href="{{ url('admin/usuario/create') }}" class="btn blue darken-4 text-white btn-primary text-white "><i class="fa fa-plus-square"></i> Ingresar</a>  
     @endcan
    </div>
   </div>
      <br>
      
        <div class="col-md-12">
          <div class="card card-line-primary">
                         <!-- /.card-header -->
                <div class="card-body table-responsive">
                     
                <table  class="display table table-striped " id="tableExport">
                    <thead>
                    <tr>
                    <th>#</th>
                    <th>Nombre completo</th>
                    <th>Usuario</th>
                    <th>Género</th>
                    <th>Tipo</th>
                    <th>Correo electrónico</th>
                    <th>Acceso</th>
                    <th>Opciones</th> 
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                    <tr class="row{{ $user->id }}">
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->display_name }}</td>
                    <td>{{ $user->username }}</td>
               
                      
                       @if ($user->genero == 'F')
                      <td><i class="mdi mdi-human-female fa-3x pink-text"></i></td>
                      @else
                      <td><i class="mdi mdi-human-male fa-3x blue-text "></i></td>
                      @endif


                    <td>{!! $user->hasRole('Administrador') ? '<b>Administrador</b>' : 'Usuario' !!}</td>
                    <td>{{ $user->email  }}</td>
                    <td>
                      @if ($user->status == 1)
                         <span class="badge text-white green">Activo</span>
                      @else
                         <span class="badge text-white red">Inactivo</span>
                      @endif
                    </td>
                    <td>
                       @can('Ver Usuario')
                       <a class="btn btn-round btn blue darken-4 text-white btn-primary" href="{{ url('admin/usuario', [$user->id]) }}"><i class="mdi mdi-face text-center" style="color: white;"></i> </a>
                       @endcan
                      @can('Editar Usuario')
                       <a class="btn btn-round btn blue darken-4 text-white btn-primary" href="{{ url('admin/usuario', [$user->id,'edit']) }}"><i class="mdi mdi-pencil text-center" style="color: white;"></i> </a>
                     @endcan
                       
                    </td>
                    </tr>
                    @endforeach
                    </tr>
                    </tbody>                
                </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
@endsection

