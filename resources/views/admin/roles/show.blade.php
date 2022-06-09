@extends('layouts.admin') 
@section('title', 'ROLES')
@section('content')
 <div class="content-header-left col-md-9 col-12 mb-2">
    <div class="row breadcrumbs-top">
        <div class="col-12">
            <h2 class="content-header-title float-left mb-0">Roles</h2>
            <div class="breadcrumb-wrapper">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="mdi mdi-home"></i> Home</a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Seguridad</a>
                    </li>
                    <li class="breadcrumb-item active">Detalle de roles
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
  <div class="container-fluid">
      <div class="row btn-group">
         <div class="col-12 text-right mb-1">
            @can('RegistrarRole')
            <a href="{{ route('admin.roles.create') }}" class="btn btn-primary">Añadir nuevo rol</a>
            @endcan
        </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card card-line-primary">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Roles</h4>
            <p class="card-category">Lista de roles registrados en la base de datos</p>
          </div>
          <div class="card-body">
           <div class="row">
              <!-- first -->
              <div class="col-md-12">
                <div class="card card-user">
                  <div class="card-body">
                    <p class="card-text">
                      <div class="author">
                        <div class="block block-one"></div>
                        <div class="block block-two"></div>
                        <div class="block block-three"></div>
                        <div class="block block-four"></div>
                        <a href="#">
                           <img class="card-img-top" src="{{ asset('images/profile/user-uploads/timeline.jpg') }}" alt="User Profile Image" />
                          <h5 class="title mt-3">Rol: {{ $role->name }}</h5>
                        </a>
                        <p class="description">
                         <br>
                          {{ $role->guard_name }} <br>
                          {{ $role->created_at }}
                        </p>
                      </div>
                    </p>
                    <div class="card-description">
                      @forelse ($role->permissions as $permission)
                          <span class="badge rounded-pill bg-dark text-white mt-1">{{ $permission->name }}</span>
                      @empty
                          <span class="badge badge-danger bg-danger">No permissions</span>
                      @endforelse
                    </div>
                  </div>
                  <div class="card-footer">
                    <div class="button-container">
                       <a href="{{ route('admin.roles.edit', $role->id) }}" class="btn btn btn-primary"> <i
                          class="mdi mdi-pencil"></i> Editar role</a>
                    </div>
                  </div>
                </div>
              </div>
              <!--end first-->
            </div>
            <!--end row-->
          </div>
          <!--Footer-->
          <div class="card-footer mr-auto">
           
          </div>
          <!--End footer-->
        </div>
      </div>
    </div>
  </div>
@endsection
