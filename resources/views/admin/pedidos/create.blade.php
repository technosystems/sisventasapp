@extends('layouts.admin')
@section('title','Pedido')
@section('breadcrumb','Pedido')
@section('content')
 <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">Pedido</h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/home') }}">Inicio</a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{ url('admin/pedido') }}">Listado de pedidos</a>
                        </li>
                        <li class="breadcrumb-item active"> Registro de nueva venta
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div><br>
  
    <div class="row">
      <div class="col-12">
      <div class="card card-line-primary">
        <div class="card-header">
       
            <div class="card-body">
                 {!! Form::open(['url' => ['/admin/pedido/nuevo'],'method' => 'POST', 'autocomplete' => 'off','id'=>'formNuevoComprobante']) !!}

                <div class="row">
                  <div class="col-lg-6 col-md-4 mb-1">
                    <label><b>Cliente:</b></label>
                    <select required name="customer_id" id="customer_id" class="select2 form-control" data-live-search="true" data-live-search-style="begins" title="Select customer...">
                   @php
                    $clientes = App\Models\Cliente::get();
                    $tasa = App\Models\Tasa::where('fecha_emision',date('Y-m-d'))->first();
                    $mytime = Carbon\Carbon::now('America/Caracas');
                    $buscar=$mytime->format('Y-m-d');

                    //$config = DB::table('configuraciones')->first();
                    $cajas = DB::table('cajas')
                    ->where('fecha',$buscar )
                    ->first();

                   @endphp
                    @foreach($clientes as $customer)
             
                    <option value="{{$customer->id}}">{{$customer->nombre .' '. $customer->apellido . ' (' . $customer->telefono . ')'}} 
                    </option>
                    @endforeach
                  </select>
                </div> 
                  <div class="col-md-6">
                    <label for="">Vendedor</label>
                    <input type="text" disabled value="{{ Auth::user()->display_name }}" class="form-control">
                </div>
                 <div class="col-lg-4 col-md-4">
                    <label><b>Tipo de pedido:</b></label>
                    <select class="form-control md-form" name="tipo_pedido" id="selectTipoComprobante">
                        <option value="" disabled selected>Selecciona</option>
                        <option value="Al contado">Al contado</option>
                        <option value="Credito">Crédito</option>
                    </select>
                </div>
               
                 <div class="col-lg-8 col-md-5">
                      
                      <div class="row">
                          <div class="col-lg-6 col-md-6"  style="padding-right: 0px;">
                             <label><b>Fecha de registro:</b></label>

                              <input type="date" id="txtFecha" class="form-control" name="fecha_registro">
                          </div>
                          <div class="col-lg-6 col-md-6">
                             <label><b>Fecha de entrega:</b></label>
                             <input type="date" class="form-control" name="fecha_entrega" id="txtFechaEntrega">
                          </div>
                      </div>
                  </div>             
                   <div class="col-lg-4 form_factura_credito mt-2">
                        <label for="txtFechaVencimiento">Vencimiento de factura</label>
                        <input class="form-control input-sm factura-required" id="txtFecha" type="date" name="fecha_vencimiento" placeholder="Vencimiento de la factura" > 
                          </div>    
                    <div class="col-lg-4">
                        <div class="form-group col-md-12 form_factura_credito mt-2">
                          <label >Plazo</label>
                          <input class="form-control input-sm" type="number" name="plazo" placeholder="Plazo (en días)">
                        </div>
                    </div>
                    <div class="col-lg-4">
                         <div class="form-group col-md-12 form_factura_credito mt-2">
                                <label >Pago inicial</label>
                                <input class="form-control input-sm" type="number" name="pago_inicial" placeholder="Pago inicial">
                            </div>
                    </div>
                    

                </div>
                <div class="row">
                 <div class="col-lg-3 mt-1">
                     <label for="materiales">Materiales</label>
                      <input class="form-control input-sm" type="text" name="materiales" placeholder="Materiales">
                 </div>
                 <div class="col-lg-3 mt-1">
                     <label for="materiales">Tamaño</label>
                      <input class="form-control input-sm" type="text" name="tamano" placeholder="Tamaño">
                 </div>
                 <div class="col-lg-3 mt-1">
                     <label for="materiales">Colores</label>
                      <input class="form-control input-sm" type="text" name="colores" placeholder="Colores">
                 </div>
               
                  <div class="col-lg-3 col-md-4 mt-1">
                    <label><b>Total a pagar en dólares:</b></label>
                   <input class="form-control input-sm" id="totaldolar" type="text" disabled value="0.00">
                 </div>
                <div class="col-lg-12 col-md-4 mt-1">
                  <label for="textarea-counter">Descripción</label>
                <textarea data-length="900" class="form-control char-textarea" name="descripcion"  rows="3" placeholder="Descripción del pedido"></textarea>
                <small class="textarea-counter-value float-right"><span class="char-count">0</span> / 900 </small>
            </div>
            
                 
             </div>
              <input id="hiddenTasa" type="hidden" value="{{ $tasa->amount }}">
             <div class="row">
               <div class="col-3 mt-5">
                   <i class="fas fa-cash-register fa-10x ml-5"></i>
               </div>
               <div class="col-9">

                 <input id="hiddenListado" type="hidden" name="listadoArticulos">
                    <div class="col-sm-12 mt-2">
                    <form>
                    <div class="input-group">
                        <input type="text" class="form-control" id="txtAgregarArticulo" list="listaBusquedaProducto" placeholder="Ingresa el código o nombre del producto...">
                        <div class="input-group-append">
                          <button id="btnAgregarArticulo" class="btn btn-outline-primary">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                        </button>
                        </div>
                        
                      </div>
                      </form>
                    </div>
                    <datalist id="listaBusquedaProducto">
                        <!--
                        <option value="a"/>
                        <option value="b"/>
                        <option value="c"/>
                        -->
                    </datalist>                      
                    <div class="col-md-12 text-center table-responsive">
                    <table class="table  table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">Código</th>
                                <th class="text-center">Artículo</th>
                                <th class="text-center" >Precio</th>
                                <th class="text-center" >Cantidad</th>
                                <th class="text-center" >SubTotal</th>
                                <th class="text-center" >Total</th>
                                <th class="text-center" ></th>
                            </tr>
                        </thead>  
                        <tbody id="tablaProductos">
                            
                        </tbody>
                    </table><br><br><br><br><br>    
                    <div class="col-md-12">
                        <table class="table-condensed float-right table-striped">
                            <thead id="tablaResumen">
                                
                            </thead>
                        </table>
                    </div>      
                        <div class="col-md-6">
                       <button id="btnGuardarComprobante" class="btn btn-block text-white blue darken-4" tabindex="9">
                        <i class="ti ti-check mr-3"></i>
                        Confirmar
                       </button>
                        </div>
                    </div>
                </div>
               </div>
           </div>                          
             {!! Form::close()!!} 
        </div>
     </div> 
 </div>
    </div>


@endsection
@push('scripts') 

<script>
        var buscar_prodcto_url = "{{ url('admin/producto/buscar?texto=') }}";
        var comprobante_vistaprevia_url = "{{ url('admin/comprobantes/vistaPrevia') }}";
    </script>
<script>
$(document).ready(function (){
    var fechaEmision = new Date();
    var day = ("0" + fechaEmision.getDate()).slice(-2);
    var month = ("0" + (fechaEmision.getMonth() + 1)).slice(-2);
    fecha = fechaEmision.getFullYear()+"-"+(month)+"-"+(day);
    $("#txtFecha").val(fecha);

    $(".form_factura_credito").hide();

    $( "#selectTipoComprobante" ).change(function() {
        var tipo_factura = $( "#selectTipoComprobante" ).val();
        if (tipo_factura == "Credito") {
             $(".form_factura_credito").show();
         }else
         {
            $(".form_factura_credito").hide();
         }
     });
 
        $(".form_referencia_pago").hide();

    $( "#selectTipoPago" ).change(function() {
        var tipo_pago = $( "#selectTipoPago").val();
        if (tipo_pago == "Transferencia" ||tipo_pago == "Pago movil" || tipo_pago == "Punto de venta") {
             $(".form_referencia_pago").show();
         }else
         {
            $(".form_referencia_pago").hide();
         }
     });

   });
</script>

    
    <script src="{{ asset('js/forms/comprobantes.js') }}"></script>
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
        $('#txtNumeroComprobante').val(myArray.join(""));

        var fechaEmision = new Date();
        var day = ("0" + fechaEmision.getDate()).slice(-2);
        var month = ("0" + (fechaEmision.getMonth() + 1)).slice(-2);
        fecha = fechaEmision.getFullYear()+"-"+(month)+"-"+(day);
        $("#txtFechaEntrega").val(fecha);
    });
</script>

@endpush