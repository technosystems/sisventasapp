@extends('layouts.admin')
@section('title','Facturación')
@section('breadcrumb','Facturación')
@section('content')
 @php
    $clientes = App\Models\Cliente::orderBy('id','Asc')->get();
    $tasa = App\Models\Tasa::where('fecha_emision',date('Y-m-d'))->first();
    $mytime = Carbon\Carbon::now('America/Caracas');
    $buscar=$mytime->format('Y-m-d');

    //$config = DB::table('configuraciones')->first();
    $cajas = DB::table('cajas')
    ->where('fecha',$buscar )
    ->first();

   @endphp
<div class="row">
  <div class="col-sm-4">
      <div class="card">
        <div class="card-header">
          <h2>Datos del comprobante</h2>
        </div>
        <div class="card-body">
             <label><b>Cliente:</b></label>
            <select required name="customer_id" id="customer_id" class="select2 form-control" data-live-search="true" data-live-search-style="begins" title="Select customer...">
         
            @foreach($clientes as $customer)
     
            <option value="{{$customer->id}}">{{$customer->nombre .' '. $customer->apellido . ' (' . $customer->telefono . ')'}} 
            </option>
            @endforeach
          </select>
          <label class="mt-1" for="">Vendedor</label>
          <input type="text" disabled value="{{ Auth::user()->display_name }}" class="form-control">
   
          <label class="mt-1"><b>Tipo de factura:</b></label>
          <select class="form-control md-form" name="tipo_factura" id="selectTipoComprobante">
              <option value="" disabled selected>Selecciona</option>
              <option value="Boleta">Boleta</option>
              <option value="Factura">Factura</option>
              <option value="Credito">Crédito</option>
          </select>      
          <label class="mt-1"><b>Número de serie:</b></label>
          <div class="row">
              <div class="col-lg-5 col-md-5">
                  <input type="text"  class="form-control" name="serie" value="{{$serie}}">
              </div>
              <div class="col-lg-7 col-md-7">
                  <input type="text"  class="form-control" name="correlativo" value="{{$correlativo}}">
              </div>
          </div> 
           <label><b>Caja asignada:</b></label>
            <div class="row">
                <div class="col-lg-6 col-md-6"  style="padding-right: 0px;">
                    <input type="hidden" name="idcaja" value="{{ $cajas->id }}">
                    <input type="text" class="form-control"  value="{{($cajas->codigo)}}" readonly>
                </div>
                <div class="col-lg-6 col-md-6">
                    <input type="text" class="form-control" value="{{$cajas->caja}}" readonly>
                </div>
            </div>
             <div class=" form_factura_credito mt-2">
            <label for="txtFechaVencimiento">Vencimiento de factura</label>
            <input class="form-control input-sm factura-required" id="txtFecha" type="date" name="fecha_vencimiento" placeholder="Vencimiento de la factura" > 
              </div>    
            <div class="form-group form_factura_credito mt-2">
              <label >Plazo</label>
              <input class="form-control input-sm" type="number" name="plazo" placeholder="Plazo (en días)">
            </div>      
             <div class="form-group form_factura_credito mt-2">
                <label >Pago inicial</label>
                <input class="form-control input-sm" type="number" name="pago_inicial" placeholder="Pago inicial">
            </div>
           </div>
        </div>
      </div>
   <div class="col-sm-8 col-xl-8">
     <div class="card">
       <div class="card-header">
         <h2>Registro de ventas</h2>
       </div>
       {!! Form::open(['route' => ['admin.store.venta'],'method' => 'POST', 'autocomplete' => 'off','id'=>'formNuevoComprobante']) !!}
       <div class="card-body">
        
         <div class="row">
           <div class="col-lg-3 mt-1">
            <label><b>Tipo de pago:</b></label>
            <select class="form-control md-form" name="tipo_pago" id="selectTipoPago">
                <option value="" disabled selected>Selecciona</option>
                <option value="Dolares">Dólares</option>
                <option value="Bolivares">Bolívares en efectivo</option>
                <option value="Transferencia">Bolívares por transferencia</option>
                <option value="Pago movil">Bolívares por pago móvil</option>
                <option value="Punto de venta">Punto de venta</option>
            </select>
        </div>
         <div class="col-lg-3 mt-1">
            <label class="form_referencia_pago"><b>N° Referencia:</b></label>
           <input class="form-control input-sm form_referencia_pago" type="text" name="referencia" placeholder="Número de referencia">
         </div>
          <div class="col-lg-3 mt-1">
            <label><b>Total a pagar en dólares:</b></label>
           <input class="form-control input-sm" id="totaldolar" type="text" disabled value="0.00">
         </div>
         <div class="col-lg-3 mt-1">
            <label><b>¿Desea Factura?</b></label>
          <select class="form-control md-form" name="nu_iva">
                <option value="" disabled selected>Selecciona</option>
                <option value="1">SI</option>
                <option value="0">NO</option>

            </select>
         </div>
          <input id="hiddenCliente" type="hidden" value="" name="customer_id">
      <input id="hiddenTipoFactura" type="hidden" value="" name="tipo_factura">
      <input id="hiddenTasa" type="hidden" value="{{ $tasa->amount }}">
      <input id="hiddenListado" type="hidden" name="listadoArticulos">
      <input type="hidden" name="idcaja" value="{{ $cajas->id }}">
      <input type="hidden"  name="serie" value="{{$serie}}">
      <input type="hidden"  name="correlativo" value="{{$correlativo}}">
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
          <table class="table  table-hover table-sm">
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

     var cliente = $( "#customer_id").val();
     console.log(cliente)
      if (cliente != null) {
        $('#hiddenCliente').val(cliente)
      }

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
             $("#hiddenTipoFactura").val('Credito');
         }else
         {
            $(".form_factura_credito").hide();
            $("#hiddenTipoFactura").val('Boleta');
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

     $( "#customer_id").change(function() {
        var cliente = $( "#customer_id").val();
        if (cliente != null) {
          $('#hiddenCliente').val(cliente)
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
          });
</script>

@endpush