@extends('layouts.admin')
@section('content')
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">Detalle de venta</h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/home') }}">Inicio</a>
                        </li>
                       <li class="breadcrumb-item"><a href="{{ url('admin/panel/ventas/historial') }}">Listado de ventas</a>
                        </li>
                        <li class="breadcrumb-item active"> Detalle de la venta
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div><br>
<div class="c-body">
    <main class="c-main">
        <div class="container-fluid">
            <div id="ui-view"></div>
            <div>
            
               <div class="row" id="contenido" style="display:none">
                    @if(Session::has('success'))
                        <div class="col-lg-12">
                            <div class="alert alert-success alert-dismissible fade show mb-4" role="alert" style="background: #69e781 !important">
                                {{Session::get('success')}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    @endif 
                   <div class="col-lg-12">
                       <div class="card card-line-primary">
                           <div class="card-body">
                            <div id="invoice">

                                <div class="toolbar hidden-print">
                                    <div class="text-right">
                                        
                                        <a class="btn btn-info" href="{{url('enviar.venta',$venta->id)}}">Enviar por correo</a>
                                       
                                    </div>
                                    <hr>
                                </div>
                                @php
                                    $config = \DB::table('configuraciones')->first();
                                @endphp

                                <div class="invoice overflow-auto">
                                    <div style="min-width: 600px">
                                        <header>
                                            <div class="row">
                                                <div class="col">
                                                    <a target="_blank" >
                                                        <img src="{{asset('images/logo/colorito.jpeg')}}" data-holder-rendered="true" style="width:350px"/>
                                                        </a>
                                                </div>
                                                <div class="col company-details">
                                                    <h2 class="name">
                                                        <a target="_blank" >
                                                        {{$factura->nombre_comercial}}
                                                        </a>
                                                    </h2>
                                                    <div><?php echo nl2br($factura->direccion)?></div>
                                                    
                                                </div>
                                            </div>
                                        </header>
                                        <main>
                                            <div class="row contacts">
                                                <div class="col invoice-to">
                                                    <div class="text-gray-light">CLIENTE:</div>
                                                    <h2 class="to">{{$venta->clientes->nombre}} {{$venta->clientes->apellido}}</h2>
                                                    @if($venta->clientes->empresa == 1)
                                                    <div class="address">Documento: {{$venta->clientes->rif}}</div>
                                                    @else
                                                     <div class="address">Documento: {{$venta->clientes->cedula}}</div>
                                                    @endif
                                                    
                                                    <div class="email"><a href="">{{$venta->clientes->mail}}</a></div>
                                                </div>
                                                <div class="col invoice-details">
                                                    <h3 class="invoice-id">{{$factura->razon_social}}</h3>
                                                    <div class="date">Fecha: {{$venta->fecha}}</div>
                                                    <div class="date">Hora: {{$venta->hora}}</div>
                                                </div>
                                            </div>
                                            <table border="0" cellspacing="0" cellpadding="0">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Producto</th>
                                                        <th>Precio</th>
                                                        <th>Cantidad</th>
                                                        <th>Subtotal</th>
                                                    </tr>
                                                </thead>
                                                
                                                @foreach ($detalle as $key => $item)
                                                    <tbody>
                                                        <tr>
                                                            <td class="no">{{$key + 1}}</td>
                                                            <td class="text-left">
                                                                {{$item->descripcion}}
                                                            </td>
                                                            <td class="unit">{{$config->prefijo_moneda}}{{$item->precio_venta}}</td>
                                                            <td class="qty">{{$item->cantidad}}</td>
                                                            <td class="total">{{$config->prefijo_moneda}}<?php echo $item->precio_venta * $item->cantidad?></td>
                                                        </tr>                                  
                                                    </tbody>
                                                @endforeach
                                                <tfoot>
                                                    <tr>
                                                        <td colspan="2"></td>
                                                        <td colspan="2">IGV</td>
                                                        <td>Incluido</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2"></td>
                                                        <td colspan="2">TOTAL A PAGAR</td>
                                                        <td>{{$config->prefijo_moneda}}
                                                            @php
                                                                $total = App\Models\LineaProducto::where('venta_id',$venta->id)->sum('total');
                                                             @endphp
                                                               {{ number_format(  $total,2 )  }}
                                                        </td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                           
                                            @if($venta->tipo_factura == 'Credito')
                                                 <h1 class="text-center">
                                                Recibos de pagos
                                            </h1><br>
                                                @php
                                                 $sql_infor1 = \DB::select(' select "recibos".*, "recibo_facturas"."factura_id" as "pivot_factura_id", "recibo_facturas"."recibo_id" as "pivot_recibo_id", "recibo_facturas"."deuda_inicial" as "pivot_deuda_inicial", "recibo_facturas"."deuda_final" as "pivot_deuda_final" from "recibos" inner join "recibo_facturas" on "recibos"."id" = "recibo_facturas"."recibo_id" where "recibo_facturas"."factura_id" =?',[$venta->id]);
                                                @endphp

                                                <table class="table table-hover">
                                                    <thead>
                                                    <tr>
                                                 
                                                        <th>Deuda Inicial</th>
                                                        <th>Monto Recibido</th>
                                                        <th>Deuda Final</th>
                                                        <th>Fecha de pago</th>
                                                    </tr>
                                                </thead>

                                                 <tbody>
                                                     @foreach ($sql_infor1 as $key => $item)
                                                    <tr>
                                                        
                                                         <td>${{$item->pivot_deuda_inicial }} </td>
                                                         <td>${{$item->monto }} </td>
                                                         <td>${{$item->pivot_deuda_final }} </td>
                                                         <td>{{$item->fecha }} </td>
                                                    </tr>
                                                     @endforeach
                                                </tbody>


                                                </table>

                                             @else
                                              <h1 class="text-center">
                                                No tiene deudas pendientes con nosotros.
                                            </h1><br>
                                            @endif
                                    </div>
                                    <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
                                    <div></div>
                                </div>
                            </div>
                           </div>
                       </div>
                   </div>
               </div>
            </div>
        </div>
    </main>
</div>
@endsection

@push('styles')
 <style>
        #invoice{
            padding: 30px;
        }

        .invoice {
            position: relative;
            background-color: #FFF;
            min-height: 680px;
            padding: 15px
        }

        .invoice header {
            padding: 10px 0;
            margin-bottom: 20px;
            border-bottom: 1px solid #3989c6
        }

        .invoice .company-details {
            text-align: right
        }

        .invoice .company-details .name {
            margin-top: 0;
            margin-bottom: 0
        }

        .invoice .contacts {
            margin-bottom: 20px
        }

        .invoice .invoice-to {
            text-align: left
        }

        .invoice .invoice-to .to {
            margin-top: 0;
            margin-bottom: 0
        }

        .invoice .invoice-details {
            text-align: right
        }

        .invoice .invoice-details .invoice-id {
            margin-top: 0;
            color: #3989c6
        }

        .invoice main {
            padding-bottom: 50px
        }

        .invoice main .thanks {
            margin-top: -100px;
            font-size: 2em;
            margin-bottom: 50px
        }

        .invoice main .notices {
            padding-left: 6px;
            border-left: 6px solid #3989c6
        }

        .invoice main .notices .notice {
            font-size: 1.2em
        }

        .invoice table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px
        }

        .invoice table td,.invoice table th {
            padding: 15px;
            background: #eee;
            border-bottom: 1px solid #fff
        }

        .invoice table th {
            white-space: nowrap;
            font-weight: 400;
            font-size: 16px
        }

        .invoice table td h3 {
            margin: 0;
            font-weight: 400;
            color: #3989c6;
            font-size: 1.2em
        }

        .invoice table .qty,.invoice table .total,.invoice table .unit {
            text-align: right;
            font-size: 1.2em
        }

        .invoice table .no {
            color: #fff;
            font-size: 1.6em;
            background: #3989c6
        }

        .invoice table .unit {
            background: #ddd
        }

        .invoice table .total {
            background: #3989c6;
            color: #fff
        }

        .invoice table tbody tr:last-child td {
            border: none
        }

        .invoice table tfoot td {
            background: 0 0;
            border-bottom: none;
            white-space: nowrap;
            text-align: right;
            padding: 10px 20px;
            font-size: 1.2em;
            border-top: 1px solid #aaa
        }

        .invoice table tfoot tr:first-child td {
            border-top: none
        }

        .invoice table tfoot tr:last-child td {
            color: #3989c6;
            font-size: 1.4em;
            border-top: 1px solid #3989c6
        }

        .invoice table tfoot tr td:first-child {
            border: none
        }

        .invoice footer {
            width: 100%;
            text-align: center;
            color: #777;
            border-top: 1px solid #aaa;
            padding: 8px 0
        }

        @media print {
            .invoice {
                font-size: 11px!important;
                overflow: hidden!important
            }

            .invoice footer {
                position: absolute;
                bottom: 10px;
                page-break-after: always
            }

            .invoice>div:last-child {
                page-break-before: always
            }
        }
    </style>
 
@endpush
@push('scripts')
    <script>
        window.onload = function(){
           var loader = document.getElementById('loader');
           var contenido = document.getElementById('contenido');

            contenido.style.display = 'block';
 
            $('#loader').remove();
       }
        $('.datepicker').pickadate();
    </script>
@endpush