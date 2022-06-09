<div class="modal fade" id="usuarioModal" tabindex="-1" role="dialog" aria-labelledby="formModal"
          aria-hidden="true">
          <div class="modal-dialog modal-lg " role="document">
            <div class="modal-content ">
              <div class="modal-header">
                <h5 class="modal-title" id="formModal">Crear Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
               {!! Form::open(['route' => ['usuarios.store'],'method' => 'POST']) !!}
            <div class="card-body">
             <div class="row">
               <div class="col-sm-6">
                  <div class="form-group pading">
                <label class="font-weight-bolder" for="name">Nombres</label>
                <input class="form-control" style="font-size: 15px;" id="name" name="name" placeholder="Nombres">
                <span class="missing_alert text-danger" id="name_alert"></span>
              </div>
            </div>
              
               <div class="col-sm-6">
                 <div class="form-group">
                <label class="font-weight-bolder" for="lastname">Apellidos</label>
                <input class="form-control" style="font-size: 15px;" id="lastname" name="lastname" placeholder="Apellidos">
                <span class="missing_alert text-danger" id="lastname_alert"></span>
              </div>
               </div>
               <div class="col-sm-6">
                 <div class="form-group pading">
                <label class="font-weight-bolder" for="username">Usuario</label>
                <input class="form-control" style="font-size: 15px;" id="name" name="username" placeholder="Ingrese el usuario">
                <span class="missing_alert text-danger" id="username_alert"></span>
              </div>
               </div>
               <div class="col-sm-6">
                 <div class="form-group">
                <label class="font-weight-bolder" for="email">Correo Electrónico</label>
                <input class="form-control" style="font-size: 15px;" id="email" name="email" placeholder="Correo electrónico">
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
                 <div class="form-group">
                <label class="font-weight-bolder" for="status">Acceso al sistema</label>
                <div class="checkbox icheck">
                  <label class="font-weight-bolder">
                    <input type="radio" name="status" value="1" checked> Activo&nbsp;&nbsp;
                    <input type="radio" name="status" value="0"> Deshabilitado
                  </label>
                </div>
              </div>
               </div>
             </div>
            </div>
              <div class="">
                <button type="submit" class="btn blue darken-4 text-white btn-lg ajax" id="submit">
                  <i id="ajax-icon" class="fa fa-save"></i> Ingresar
                </button>
               
              </div>
            {!! Form::close()!!}
              </div>
            </div>
          </div>
        </div>
  