@extends('layouts.admin')
@section('title','COMPRAS')
@section('breadcrumb','COMPRAS')
@section('content')
 <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">COMPRAS</h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/home') }}">Inicio</a>
                        </li>
                        <li class="breadcrumb-item"><a >General</a>
                        </li>
                        <li class="breadcrumb-item active"> Registro de nueva venta
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div><br>
  
    <div class="col-12">
      <div class="card card-line-primary">
        <div class="card-header">
       
            <div class="card-body">
                 {!! Form::open(['route' => ['admin.store.compras'],'method' => 'POST', 'autocomplete' => 'off','id'=>'formNuevoComprobante']) !!}

                <div class="row">
                 <div class="col-md-6">
                  <div class="form-group">
                   <label>Proveedores</label>
                     <select required name="proveedor_id" id="proveedor_id" class="selectpicker form-control" data-live-search="true" data-live-search-style="begins" title="Select customer...">
                       @php
                        $clientes = App\Models\Proveedor::where('status',1)->get() 
                       @endphp
                        @foreach($clientes as $customer) 
                 
                        <option value="{{$customer->id}}">{{$customer->company_name . ' (' . $customer->phone_number . ')'}} 
                        </option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label for="">Vendedor</label>
                    <input type="text" disabled value="{{ Auth::user()->display_name }}" class="form-control">
                </div>
                 <div class="col-lg-6 col-md-4">
                    <label><b>Tipo de factura:</b></label>
                    <select class="form-control md-form" name="tipo_factura" id="selectTipoComprobante">
                        <option value="" disabled selected>Selecciona</option>
                        <option value="Boleta">Boleta</option>
                        <option value="Factura">Factura</option>
                        <option value="Credito">Crédito</option>
                    </select>
                </div>
                <div class="col-lg-6 col-md-4">
                    <label><b>Número de serie:</b></label>
                    <div class="row">
                        <div class="col-lg-5 col-md-5">
                            <input type="text" readonly class="form-control" name="serie" value="{{$serie}}">
                        </div>
                        <div class="col-lg-7 col-md-7">
                            <input type="text" readonly class="form-control" name="correlativo" value="{{$correlativo}}">
                        </div>
                    </div>
                </div>
                 <div class="col-md-4 mt-1">
                    <label for="">Descuento</label>
                    <input type="text" name="descuento" value="" class="form-control" placeholder="Descuento %">
                </div>
                 <div class="col-md-4 mt-1">
                    <label for="">Costo del envío</label>
                    <input type="text" name="costo_envio" value="" class="form-control" placeholder="Costo del envío $">
                </div>
                 <div class="col-sm-4 mt-1">
                  <div class="form-group">
                   <label>Estado de la compra</label>
                     <select required name="estado_compra" id="estado_compra" class="selectpicker form-control" data-live-search="true" data-live-search-style="begins" title="Select customer...">
                       <option value="0">Selecciona</option>
                       <option value="1">Recibido</option>
                       <option value="2">Parcial</option>
                       <option value="3">Pendiente</option>
                       <option value="4">Ordenado</option>
                      </select>
                    </div>
                  </div>
                   <div class="col-lg-4 form_factura_credito">
                                <label for="txtFechaVencimiento">Vencimiento de factura</label>
                                <input class="form-control input-sm factura-required" id="txtFecha" type="date" name="fecha_vencimiento" placeholder="Vencimiento de la factura" > 
                                  </div>    
                            <div class="col-lg-4">
                                <div class="form-group col-md-12 form_factura_credito">
                                  <label >Plazo</label>
                                  <input class="form-control input-sm" type="number" name="plazo" placeholder="Plazo (en días)">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                 <div class="form-group col-md-12 form_factura_credito">
                                        <label >Pago inicial</label>
                                        <input class="form-control input-sm" type="number" name="pago_inicial" placeholder="Pago inicial">
                                    </div>
                            </div>
                 </div>
                 <div class="row">
                     <div class="col-md-12">
                <input id="hiddenListado" type="hidden" name="listadoArticulos">
               
                     <fieldset>
                        <legend>
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
                    
                        </legend>
                      
                            <div class="col-md-12 text-center table-responsive">
                            <table class="table  table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">Código</th>
                                        <th class="text-center">Artículo</th>
                                        <th class="text-center" >Precio</th>
                                        <th class="text-center" >Cantidad</th>
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
                        <div class="col-md-6 form_venta_contado form_factura_credito form_devolucion_contado form_compra_contado">
                            <button id="btnGuardarComprobante" class="btn btn-block text-white blue darken-4" tabindex="9">
                                <i class="ti ti-check mr-3"></i>
                                Confirmar
                            </button>
                        </div>
                    </fieldset>                               
                </div>
                 </div>
                {!! Form::close()!!} 
            </div>
        </div>
     </div> 
 </div>


@endsection
@push('scripts')        
    <script type="text/javascript">
        var buscar_cliente_url = "{{ url('/admin/clientes/buscar?texto=') }}";
        var buscar_prodcto_url = "{{ url('/admin/producto/buscar?texto=') }}";
        var comprobante_vistaprevia_url = "{{ url('/admin/comprobantes/vistaPrevia') }}";
        var buscar_proveedor_url = "{{ url('/admin/proveedores/buscar?texto=') }}";
    </script>
    <script src="{{ asset('js/forms/compras.js') }}"></script>
    
@endpush