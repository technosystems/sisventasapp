@extends('layouts.admin')
@section('title', 'Productos')
@section('content')

 <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">Alta de productos</h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/home') }}">Inicio</a>
                        </li>
                        <li class="breadcrumb-item"><a >General</a>
                        </li>
                        <li class="breadcrumb-item active"> Registro de productos
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div><br>
	<div class="row">
		<div class="col-md-12">
			<div class="card card-line-primary ">
				<div class="card-header">
					<h4>Alta de producto</h4>
				</div>
                {!! Form::open(['route' => ['admin.productos.store'],'method' => 'POST','id'=>'formcliente']) !!}
				<div class="card-body">
					
					
                  
                  @include('admin.productos.partials.form.input')
                 
               
                  
					</div>
                    <div class="card-footer">
                        
                     <div class="float-left">
                          <button type="submit" class="btn btn-primary" id="boton">
                          <i class="fas fa-save text-white" id="ajax-icon"></i>
                           <span class="text-white ml-1">{{ __('Guardar') }}</span>
                      </button> <br><br>
                     </div>
                    </div>
				{!! Form::close()!!}
				</div>
			</div>
		</div>
    


@endsection
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

$('#txtCodigo').val(codigo)
 console.log(myArray.join("") +'-'+'2' );

  });
</script>


@endpush

