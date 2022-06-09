<div class="row">
 
 <div class="col-sm-12">
            <div class="form-group">
            <label for="txtCodigo" class="control-label  ">Código</label>
            <input id="txtCodigo" type="text" class="form-control txtCodigo" name="codigo" placeholder="Código de servicio"  value="{!! old('codigo') !!}">
        </div>
 </div>
 <div class="col-sm-12">
        <div class="form-group">
        <label class="form-label">Nombre del servicio</label>
        {!! Form::text('descripcion',null,['class'=>'form-control','placeholder' =>'Nombre del servicio','autocomplete' =>'off']) !!}
        
       </div>
  </div>
  <div class="col-sm-12">
        <div class="form-group">
        <label class="form-label">Costo del servicio</label>
         {!! Form::text('precio_costo',null,['class'=>'form-control', 'placeholder'=>'$ Monto']) !!}
       </div>
  </div>
  <div class="col-sm-12">
        <div class="form-group">
        <label class="form-label">Usuario registrador</label>
         <input type="text" value="{{ \Auth::user()->display_name }} " disabled class="form-control">
       </div>
  </div>
 <div class="col-12 text-center">
    <label class="font-weight-bolder" for="status">Estado</label>
    <div class="checkbox ">
      <label class="font-weight-bolder">
        <input type="radio" name="status" value="1" checked> Activo&nbsp;&nbsp;
        <input type="radio" name="status" value="0"> Inactivo
      </label>
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
 <script>
    
    </script>

   
@endpush
