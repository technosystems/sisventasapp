<div class="modal fade" id="updateMarca{{$marca->id}}">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Modificar datos de la marca</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          {!! Form::model($marca, ['route' => ['marcas.update',$marca->id],'method' => 'PUT']) !!}
            
          <div class="form-group">
            <label>Nombre de la marca</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <i class="fab fa-apple"></i>
                </div>
              </div>
              <input type="text" class="form-control" placeholder="Nombre de la marca"
               name="descripcion" value="{{ $marca->descripcion }}">
            </div>
          </div>
          <div class="form-group">
            <label>Tipo de equipo</label>
             <div class="input-group">
               <div class="input-group-prepend">
                 <div class="input-group-text">
                   <i class="fas fa-lock"></i>
                 </div>
               </div>
               @php
               $equipos =App\Models\TipoEquipos::where('organismo_id',\Auth::user()->organismo_id)
               ->where('sucursal_id',\Auth::user()->sucursal_id)
               ->get();
               @endphp
               <select name="tipo_equipo_id" class="form-control">
                 <option value="0" selected>Seleccione el tipo de equipo</option>
                 @foreach($equipos as $equipo)
                 <option value="{{$equipo->id}}">{{$equipo->descripcion}}</option>
                 @endforeach
               </select>
             </div>
           </div>
           <div class="form-group">
            <label class="font-weight-bolder" for="status">Estado de la marca</label><br>
            
              <label class="font-weight-bolder">
                <input type="radio" name="status" value="1" checked> Activa&nbsp;&nbsp;
                <input type="radio" name="status" value="0"> Deshabilitada
              </label>
            </div>
          
         
          <div class="row">
            <div class="col-sm-12">
              <button type="submit" class="btn blue darken-4 form-control" 
               id="boton">
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
