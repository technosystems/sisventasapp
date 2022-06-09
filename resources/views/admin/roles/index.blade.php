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
                    <li class="breadcrumb-item active">Listado de roles
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
      <div class="row btn-group">
         <div class="col-12 text-right mb-1">
            @can('Registrar Role')
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
          
            <div class="table-responsive">
              <table id="tableExport" class="display table table-striped table-hover" >
                <thead class="text-primary">
                  <th> ID </th>
                  <th> Nombre </th>
                  <th> Guard </th>
                  <th> Fecha de creación </th>
                  <th> Permisos </th>
                  <th class="text-right"> Acciones </th>
                </thead>
                <tbody>
                  @forelse ($roles as $role)
                  <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->name }}</td>
                    <td>{{ $role->guard_name }}</td>
                    <td class="text-primary">{{ $role->created_at->toFormattedDateString() }}</td>
                    <td>
                      @forelse ($role->permissions as $permission)
                          <span class="badge bg-info">{{ $permission->name }}</span>
                      @empty
                          <span class="badge bg-danger">Sin permisos asignados</span>
                      @endforelse
                    </td>
                    <td class="td-actions text-right">
                    @can('VerRole')
                      <a href="{{ route('admin.roles.show', $role->id) }}" class="btn btn-round btn-info"> <i
                          class="mdi mdi-face"></i> </a>
                    @endcan
                    @can('Editar Role')
                      <a href="{{ route('admin.roles.edit', $role->id) }}" class="btn btn-round btn-success"> <i
                          class="mdi mdi-pencil"></i> </a>
                    @endcan
                    @can('Eliminar Role')
                      <form action="{{ route('admin.roles.destroy', $role->id) }}" method="post"
                        onsubmit="return confirm('areYouSure')" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" rel="tooltip" class="btn btn-round btn-danger">
                          <i class="mdi mdi-delete"></i>
                        </button>
                      </form>
                    @endcan
                    </td>
                  </tr>
                  @empty
                  <tr>
                    <td colspan="2">Sin registros.</td>
                  </tr>
                  @endforelse
                </tbody>
              </table>
              {{-- {{ $users->links() }} --}}
            </div>
          </div>
         
        </div>
      </div>
    </div>
@endsection
