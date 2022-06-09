<div class="modal fade" id="createModalModelo" tabindex="-1" role="dialog" aria-labelledby="formModal"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formModal">Ingresa el modelo de equipo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                {!! Form::open(['url' => ['admin/modelos/guardarajax'],'method' => 'POST','id'=>'formodelo']) !!}
                 <div class="col-sm-12">
                    <label>Marca</label> 
                    <div class="input-group">
                      
                      <input type="text" class="form-control" id="nombremarca" placeholder="Precio de la tasa del día"
                       name="amount" disabled>

                      
                      <input type="hidden" id="idmarca" value="" name="idmarca">
                    </div>
                  </div>
                  <div class="col-12">
                     <label>Modelo</label> 
                      <div class="input-group">
                     <input type="text" class="form-control" id="descripcion" placeholder="Nombre de modelo"
                       name="descripcion">
                     </div>

                  </div>
                  
                  <br>

                  
                  
                 
                  <div class="row">
                    <div class="col-sm-12">
                      <button type="submit" class="btn blue darken-4 form-control" 
                       id="boton">
                          <i class="fas fa-save text-white" id="ajax-icon"></i>
                           <span class="text-white ml-3">{{ __('Guardar') }}</span>
                      </button>
                    </div>
                  </div>
                  {!! Form::close()!!}
              </div>
            </div>
          </div>
        </div>