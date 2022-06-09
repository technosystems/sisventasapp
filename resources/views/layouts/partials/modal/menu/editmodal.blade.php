<div class="modal fade" id="updateMarca{{$menu->id}}">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Modificar datos del menú</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {!! Form::model($menu, ['route' => ['menu.update',$menu->id],'method' => 'PUT']) !!}
          
         <div class="col-md-12">
          <div class="form-group">
            <label>Nombre del menú</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <i class="fas fa-user-tie"></i>
                </div>
              </div>
              <input type="text" class="form-control" placeholder="Nombre del menú" name="name"value="{{$menu->name}}">
            </div>
          </div>
            <div class="form-group">
             <label>Link</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-link"></i>
                  </div>
                </div>
                <input type="text" class="form-control" placeholder="Link" name="link"  value="{{$menu->link}}" >
              </div>
            </div>
            <div class="form-group">
             <label>Icono</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-folder"></i>
                  </div>
                </div>
                <input type="text" class="form-control" placeholder="ejemplo: fas fa-user" value="{{$menu->icono}}"  name="icono">
              </div>
            </div>
             <div class="form-group">
             <label>Módulo que pertenece el menú</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-lock"></i>
                  </div>
                </div>
                @php
                $modulos =App\Models\Modulo::get();
                @endphp
                <select name="modulo_id" class="form-control">
                  <option value="0" selected>Seleccione el módulo</option>
                  @foreach($modulos as $role)
                  <option value="{{$role->id}}">{{$role->name}}</option>
                  @endforeach
                </select>
              </div>
            </div>
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
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn blue darken-4 text-white  ajax" id="submit">
                <i id="ajax-icon" class="fa fa-edit"></i> Editar
        </button>
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