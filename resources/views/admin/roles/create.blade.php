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
                    <li class="breadcrumb-item active">Registro de role
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form role="form" id="main-form" autocomplete="off">
          <input type="hidden" id="_url" value="{{ route('admin.roles.store') }}">
          <input type="hidden" id="_token" value="{{ csrf_token() }}">
          <div class="card card-line-primary">
            <!--Header-->
            <div class="card-header card-header-primary">
              <h4 class="card-title">Crear Role</h4>
              <p class="card-category">Ingresar datos del role</p>
            </div>
            <!--End header-->
            <!--Body-->
            <div class="card-body">
              <div class="row">
                <label for="name" class="col-sm-2 col-form-label">Nombre del rol</label>
                <div class="col-sm-7">
                  <div class="form-group">
                    <input class="form-control" style="font-size: 15px;" id="name" name="name" placeholder="Nombre del nuevo role">
                <span class="missing_alert text-danger" id="name_alert"></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <label for="name" class="col-sm-2 col-form-label">Permisos</label>
                <div class="col-sm-7">
                  <div class="form-group">
                    <div class="tab-content">
                      <div class="tab-pane active">
                        <table class="table">
                          <tbody>
                            @foreach ($permissions as $id => $permission)
                            <tr>
                              <td>
                                  <div class="checkbox icheck">
                                  <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="permissions[]"
                                      value="{{ $id }}">
                                    <span class="form-check-sign">
                                      <span class="check"></span>
                                    </span>
                                  </label>
                                </div>
                              </td>
                              <td>
                                {{ $permission }}
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

            <!--End body-->

            <!--Footer-->
            <div class="card-footer ml-auto mr-auto">
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            <!--End footer-->
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
@push('scripts')
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  <script src="{{ asset('js/admin/role/create.js') }}"></script>
@endpush