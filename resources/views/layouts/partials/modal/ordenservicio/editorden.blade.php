<div class="modal fade" id="updateOrdenServicio{{$orden->id}}">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Modificar estado de la orden de servicio</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          {!! Form::model($orden, ['url' => ['/admin/ordenservicios/guardar',$orden->id],'method' => 'PUT']) !!}
          
          <div class="form-group">
            <label>Estado de la orden de servico</label>
             <div class="input-group">
               <div class="input-group-prepend">
                 <div class="input-group-text">
                   <i class="fas fa-lock"></i>
                 </div>
               </div>
               @php
               $equipos = App\Models\EstadoServicio::get();
               @endphp
               <select name="tipo_equipo_id" class="form-control">
                 <option value="0" selected>Seleccione el estado de la orden de servico</option>
                 @foreach($equipos as $equipo)
                 <option value="{{$equipo->id}}">{{$equipo->name}}</option>
                 @endforeach
               </select>
             </div>
           </div>
           <div class="form-group">
            <label class="font-weight-bolder" for="status">Descripción de recepción</label><br>
            
            <textarea name="orservacion_recepcion" id="" cols="40" rows="3" class="form-control"></textarea>
            
            </div>
            <div class="form-group">
              <label class="font-weight-bolder" for="status">Contraseña del usuario {{ Auth::user()->display_name }}</label><br>
              <input type="password" name="current_password" class="form-control" placeholder="Ingresa la contraseña de usuario">
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
