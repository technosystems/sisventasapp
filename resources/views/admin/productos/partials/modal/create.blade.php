<div class="modal fade" id="createModalProducto" tabindex="-1" role="dialog" aria-labelledby="formModal"
          aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formModal">Agregar Producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                {!! Form::open(['route' => ['productos.store'],'method' => 'POST','id'=>'formcliente']) !!}
                  
                  @include('admin.productos.partials.form.input')
                 
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


      @push('scripts')

<script>
    
$(document).ready(function (){


 //Define la cantidad de numeros aleatorios.
var cantidadNumeros = 8;
var myArray = []
while(myArray.length < cantidadNumeros ){
  var numeroAleatorio = Math.ceil(Math.random()*cantidadNumeros);
  var existe = false;
  for(var i=0;i<myArray.length;i++){
    if(myArray [i] == numeroAleatorio){
        existe = true;
        break;
    }
  }
  if(!existe){
    myArray[myArray.length] = numeroAleatorio;
  }

}
var codigo = myArray.join("") +'-'+'2';

$('.txtCodigo').val(codigo)
 console.log(myArray.join("") +'-'+'2' );

  });
</script>


@endpush
