<div class="modal fade" id="updateOrganismo{{$organismo->id}}">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Modificar datos del Organismo</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {!! Form::model($organismo, ['route' => ['organismos.update',$organismo->id],'method' => 'PUT']) !!}
          
         <div class="col-md-12">
          <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
              <label>Nombre del propietario</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-id-card"></i>
                  </div>
                </div>
                <input type="text" class="form-control" value="{{$organismo->nombre_propietario}} " placeholder="Menú padre" name="nombre_propietario">
              </div>
            </div>
          </div>
            <div class="col-sm-4">
              <div class="form-group">
             <label>Apellido del propietario</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-user"></i>
                  </div>
                </div>
                <input type="text" class="form-control" value="{{$organismo->apellido_propietario}} " placeholder="Menú hijo" name="apellido_propietario">
              </div>
            </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
             <label>Teléfono del propietario</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-phone"></i>
                  </div>
                </div>
                <input type="text" class="form-control" placeholder="Link" name="telefono_propietario"  value="{{$organismo->telefono_propietario}}" >
              </div>
            </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
              <label>Nombre del negocio</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-home"></i>
                  </div>
                </div>
                <input type="text" class="form-control" value="{{$organismo->nombre_negocio}} " placeholder="Menú padre" name="nombre_negocio">
              </div>
            </div>
          </div>
          <div class="col-sm-6">
              <div class="form-group">
              <label>Teléfono del negocio</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-phone"></i>
                  </div>
                </div>
                <input type="text" class="form-control" value="{{$organismo->telefono_negocio}} " placeholder="Menú padre" name="telefono_negocio">
              </div>
            </div>
          </div>
           <div class="col-sm-4">
              <div class="form-group">
             <label>Usuario</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-user"></i>
                  </div>
                </div>
                <input type="text" class="form-control" placeholder="ejemplo: fas fa-user" value="{{$organismo->username}}"  name="username">
              </div>
            </div>
           </div>
           <div class="col-sm-4">
              <div class="form-group">
             <label>Contraseña</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-user"></i>
                  </div>
                </div>
                <input type="password" class="form-control" placeholder="Contraseña del organismo" value="{{$organismo->password}}"  name="password">
              </div>
            </div>
           </div>
            <div class="col-sm-4">
              <div class="form-group">
             <label>Role que pertenecerá el menú</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-lock"></i>
                  </div>
                </div>
                @php
                $roles =Spatie\Permission\Models\Role::get();
                @endphp
                <select name="role_id" class="form-control">
                  <option value="0" selected>Seleccione el role</option>
                  @foreach($roles as $role)
                  <option value="{{$role->id}}">{{$role->name}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group">
             <label>Estado del organismo</label>
              <div class="input-group ">
                <div class="input-group-prepend">
                  
                </div>
              
                <div class="checkbox icheck text-center">
                  <label>
                    <input type="radio" name="status" value="1" {{ $organismo->status == 1 ? 'checked' : '' }}> Activo&nbsp;&nbsp;
                    <input type="radio" name="status" value="0" {{ $organismo->status == 0 ? 'checked' : '' }}> Deshabilitado&nbsp;&nbsp;
                  </label>
                </div>
              </div>
            </div>
            </div>
            </div>
          </div>
            <div class="row">
              <div class="col-sm-12">
                <button type="submit" class="btn blue darken-4 form-control" id="boton">
                    <i class="fas fa-save text-white" id="ajax-icon"></i>
                     <span class="text-white ml-3">{{ __('Guardar') }}</span>
                </button>
              </div>
            </div>
        <br>
      <div class="modal-footer justify-content-between">
       
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