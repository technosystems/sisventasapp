<div class="modal fade" id="createModalCliente" tabindex="-1" role="dialog" aria-labelledby="formModal"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formModal">Registrar nuevo cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div> 
              <div class="modal-body">
               <form method="post" action="/admin/clientes/guardarajax" id="clienteform">
                  {{ csrf_field() }}
                  <div class="form-group">
                    <label>Tipo de cliente</label>
                    <select id="select_tipo_cliente" class="form-control" name="tipo_cliente">
                      <option>Tipo de cliente</option>
                      <option value="persona">Persona</option>
                      <option value="empresa">Empresa</option>
                    </select>
                  </div>
                  
                  <div class="form-group input-group form-persona">
                    <label class="sr-only">Documento</label>
                    <div s class="input-group-btn">
                      
                    </div>
                    <input class="form-control form-persona-required" type="text" name="documento" placeholder="N° documento" oninvalid="this.setCustomValidity('Debe ingresar un número de documento')" required="true" oninput="setCustomValidity('')">
                  </div>
                  <div class="form-group form-persona">
                    <label class="sr-only">Género</label>
                    <select class="form-control form-persona-required" name="genero" oninvalid="this.setCustomValidity('Debe ingresar un género pare el cliente')" required="true" oninput="setCustomValidity('')">
                      <option value="" disabled selected hidden>Género</option>
                      <option value="m">Masculino</option>
                      <option value="f">Femenino</option>
                    </select>
                  </div>

                  <div class="form-group form-persona">
                    <label class="sr-only">Nombre</label>
                    <input class="form-control form-persona-required" type="text" name="nombre" placeholder="Nombre" required="true" oninvalid="this.setCustomValidity('Debe ingresar un nombre de cliente')" oninput="setCustomValidity('')">
                  </div>
                  <div class="form-group form-persona">
                    <label class="sr-only">Apellido</label>
                    <input class="form-control" type="text" name="apellido" placeholder="Apellido">
                  </div>

                  <div class="form-group form-empresa">
                    <label class="sr-only">Razón social</label>
                    <input class="form-control form-empresa-required" type="text" name="razonSocial" placeholder="Razón social" oninvalid="this.setCustomValidity('Debe ingresar una razón social para el cliente')" oninput="setCustomValidity('')">
                  </div>
                  <div class="form-group form-empresa">
                    <label class="sr-only">RIF</label>
                    <input class="form-control form-empresa-required" type="text" name="rif" placeholder="RIF" oninvalid="this.setCustomValidity('Debe ingresar un RIF para el cliente')" oninput="setCustomValidity('')">
                  </div>
                  <input type="hidden" name="usuario_id" id="usuario_id" value="{{Auth::user()->id}}">

                  <div class="form-group form-persona form-empresa" >
                    <label class="sr-only">Mail</label>
                    <input class="form-control" type="text" name="mail" placeholder="E-mail">
                  </div>
                  <div class="form-group form-persona form-empresa" >
                    <label class="sr-only">Dirección</label>
                    <input class="form-control" type="text" name="direccion" placeholder="Dirección">
                  </div>
                  <div class="form-group form-persona form-empresa" >
                    <label class="sr-only">Teléfono</label>
                    <input class="form-control" type="text" name="telefono" placeholder="Teléfono">
                  </div>

                  <div class="form-group form-persona form-empresa" >
                    <button type="submit" class="btn btn-block btn-primary">Guardar</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        @push('scripts')
          <script>
           $("#clienteform").on('submit', function(e){
            //alert(1)
                e.preventDefault();   
                var data = $('#clienteform').serialize();
                $.ajax({
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  type: "POST",
                  url: '/admin/clientes/guardarajax',
                  cache: false,
                  data: data,    
                  success: function( response ) {
                    toastr.success('Datos ingresados');
                    $('#cliente').append($('<option>', {
                      value: response.id,
                      text: response.name,
                      selected: true
                    }));
                  $('#telefono_cliente').val(response.telefono);

                    $('#createModalCliente').modal('hide');
                  }
                });
              });
          </script> 
          <script type="text/javascript">

        $(document).ready(function(){
          $("#select_tipo_cliente").on('change', function(){
            if($("#select_tipo_cliente").val() == "persona"){
              $(".form-empresa-required").prop('required',false);
              $(".form-empresa").hide();
              
              $(".form-persona-required").prop('required',true);
              $(".form-persona").show();

            }else if($("#select_tipo_cliente").val() == "empresa"){

              $(".form-persona-required").prop('required',false);
              $(".form-persona").hide();
              
              $(".form-empresa-required").prop('required',true);
              $(".form-empresa").show();
            }
          });
        });
      </script>
 @endpush
