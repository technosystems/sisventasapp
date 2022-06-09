<div class="modal fade" id="createModalCliente" tabindex="-1" role="dialog" aria-labelledby="formModal"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formModal">Agregar cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                {!! Form::open(['url' => ['admin/clientes/guardar'],'method' => 'POST','id'=>'formcliente']) !!}
                  <div class="form-group">
                    <label>Nombre y apellido del cliente</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-user"></i>
                        </div>
                      </div>
                      <input type="text" id="nombrecliente" class="form-control" placeholder="Nombre  y apellido del cliente"
                       name="name" autofocus autocomplete="off" >
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Teléfono del cliente</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fab fa-apple"></i>
                        </div>
                      </div>
                      <input type="text" id="telefonocliente"  class="form-control" placeholder="Teléfono del cliente"
                       name="telefono" autocomplete="off">
                    </div>
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
                  {!! Form::close()!!}
              </div>
            </div>
          </div>
        </div>
