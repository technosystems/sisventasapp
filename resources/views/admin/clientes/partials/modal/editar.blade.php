<div class="modal fade" id="editarModalCliente{{ $cliente->id }}" tabindex="-1" role="dialog" aria-labelledby="formModal"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formModal">Editar datos del cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              
              <div class="modal-body">
                {!! Form::model($cliente, ['url' => ['admin/clientes/guardar',$cliente->id],'method' => 'POST','enctype' =>'multipart/form-data']) !!}
                  <div class="form-group">
                    <label>Nombre y apellido del cliente</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fab fa-apple"></i>
                        </div>
                      </div>
                       <input type="hidden" id="idcliente" name="idcliente" value="{{ $cliente->id }}">
                      {!! Form::text('name',null,['class'=>'form-control', 'required' => 'required','autocomplete' =>'off']) !!}
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
                      {!! Form::text('telefono',null,['class'=>'form-control', 'required' => 'required','autocomplete' =>'off']) !!}
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