<div class="modal fade" id="updateMarca{{$user->encode_id}}">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Modificar datos del Usuario</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         {!! Form::model($user, ['route' => ['usuarios.update',$user->encode_id],'method' => 'PUT']) !!}
           <div class="card-body">
             <div class="row">
               <div class="col-sm-6">
                  <div class="form-group pading">
                <label class="font-weight-bolder" for="name">Nombres</label>
                <input class="form-control" value="{{ $user->name }}" style="font-size: 15px;" id="name" name="name" placeholder="Nombres">
                <span class="missing_alert text-danger" id="name_alert"></span>
              </div>
            </div>
              
               <div class="col-sm-6">
                 <div class="form-group">
                <label class="font-weight-bolder" for="lastname">Apellidos</label>
                <input class="form-control" style="font-size: 15px;" id="lastname" value="{{ $user->lastname }}"  name="lastname" placeholder="Apellidos">
                <span class="missing_alert text-danger" id="lastname_alert"></span>
              </div>
               </div>
               <div class="col-sm-6">
                 <div class="form-group pading">
                <label class="font-weight-bolder" for="username">Usuario</label>
                <input class="form-control" style="font-size: 15px;" value="{{ $user->username }}" id="name" name="username" placeholder="Ingrese el usuario">
                <span class="missing_alert text-danger" id="username_alert"></span>
              </div>
               </div>
               <div class="col-sm-6">
                 <div class="form-group">
                <label class="font-weight-bolder" for="email">Correo Electrónico</label>
                <input class="form-control" style="font-size: 15px;" value="{{ $user->email }}" id="email" name="email" placeholder="Correo electrónico">
                <span class="missing_alert text-danger" id="email_alert"></span>
              </div>
               </div>
               <div class="col-sm-6">
                 <div class="form-group">
                <label  for="role">Tipo de usuario</label>
                @php
                $roles = Spatie\Permission\Models\Role::get();
                @endphp
                <div class="checkbox icheck">
                  <label class="font-weight-bolder">
                    @foreach($roles as $role)
                    <input type="radio" name="role" value="{{$role->name}}" checked> {{$role->name}}&nbsp;&nbsp;
                    @endforeach
                  </label>
                </div>
              </div>
               </div>
               <div class="col-sm-6">
                 <div class="form-group">
                <label class="font-weight-bolder" for="password">Contraseña</label>
                <input type="password" style="font-size: 15px;" class="form-control" id="password" name="password" placeholder="Contraseña">
                <span class="missing_alert text-danger" id="password_alert"></span>
              </div>
               </div>
               <div class="col-sm-6">
                 <div class="form-group">
                <label class="font-weight-bolder" for="password_confirmation">Confirmar Contraseña</label>
                <input type="password" style="font-size: 15px;" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Contraseña">
                <span class="missing_alert text-danger" id="password_confirmation_alert"></span>
              </div>
               </div>
               <div class="col-sm-6">
                   @if(Auth::user()->hasrole('Super Administrador') && Auth::user()->id != $user->id)
              <div class="form-group">
                <label for="status">Acceso al sistema</label>
                <div class="checkbox icheck">
                  <label>
                    <input type="radio" name="status" value="1" {{ $user->status == 1 ? 'checked' : '' }}> Activo&nbsp;&nbsp;
                    <input type="radio" name="status" value="0" {{ $user->status == 0 ? 'checked' : '' }}> Deshabilitado&nbsp;&nbsp;
                  </label>
                </div>
              </div>
              @endif
               </div>
               <button type="submit" class="btn blue darken-4 text-white  ajax" id="submit">
                  <i id="ajax-icon" class="fa fa-save"></i> Ingresar
                </button>
             </div>
            </div>
 {!! Form::close()!!}
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

@push('scripts')
  
    <script>
      $(document).ready(function (){
      var fechaEmision = new Date();
      var day = ("0" + fechaEmision.getDate()).slice(-2);
      var month = ("0" + (fechaEmision.getMonth() + 1)).slice(-2);
      fecha = fechaEmision.getFullYear()+"-"+(month)+"-"+(day);
      $("#fecha").val(fecha);
           });
      </script>
@endpush