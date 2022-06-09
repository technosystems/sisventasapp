<div class="modal fade" id="createModalMarca" tabindex="-1" role="dialog" aria-labelledby="formModal"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formModal">Agregar marca</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div> 
              <div class="modal-body">
                {!! Form::open(['url' => ['/ admin/marcas/guardarajax'],'method' => 'POST','id'=>'marca']) !!}
                 <div class="col-sm-12">
                    <label>Tipo de equipo</label>
                     <div class="input-group">
                       <input type="text" class="form-control" id="tipo_equipo" disabled >
                     </div>
                   </div>
                   <br>
                  <div class="col-sm-12">
                    <label>Nombre de la marca</label>
                    <div class="input-group">
                      
                      <input type="text" class="form-control" placeholder="Nombre de la marca"
                       name="descripcion">

                      <input type="hidden" id="idtipoequipo" value="" name="idtipoequipo">
                    </div>
                  </div><br>
                 <div class="col-sm-12">
                  <label class="font-weight-bolder" for="status">Estado de la marca</label>
                  <div class="checkbox icheck">
                    <label class="font-weight-bolder">
                      <input type="radio" name="status" value="1" checked> Activa&nbsp;&nbsp;
                      <input type="radio" name="status" value="0"> Deshabilitada
                    </label>
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
 