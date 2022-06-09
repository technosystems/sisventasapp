@extends('layouts.admin')
@section('title','VENTAS')
@section('content')
@php
    $suma=0;
@endphp

            <div id="ui-view"></div>
            <div>
   <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">Ventas registradas en caja</h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/home') }}">Inicio</a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{ url('admin/panel/ventas/historial') }}">Listado de ventas</a>
                        </li>
                        <li class="breadcrumb-item active"> Desgloce de ventas en caja
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div><br>
<div class="row" id="contenido" style="display:none">
    <div class="row">
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

        @if(Session::has('danger'))
            <div class="col-lg-12">
                <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert" style="color: #ffffff;background-color: #ed2b2b;">
                    {{Session::get('danger')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        @endif
    </div>

   <div class="row">
       <div class="col-lg-8">
           <div class="card card-line-primary">
               <div class="card-header">
                   Ventas de caja
               </div>

    <div class="row">
        <div class="col-lg-12">
            <table class="table table-responsive-sm table-hover table-outline mb-0 table-sm" id="tableExport" >
                <thead class="thead-light">
                    <tr>
                        <th class="text-center">Fecha</th>
                        <th class="text-center">Cliente</th>
                        <th class="text-center">Tipo de factura</th>
                        <th class="text-center">Número de serie</th>
                        <th class="text-center">Total pagado</th>
                        <th class="text-center">Estado</th>

                        <th class="text-center">Opciones</th>
                    </tr>
                </thead>
                @if (count($venta) == '0')
                    <tbody>
                        <tr>
                            <td colspan="7" class="text-center"><i class="fas fa-exclamation-triangle"></i> No se registraron ventas en esta caja</td>
                        </tr>
                    </tbody>
                @else
                    @foreach ($venta as $item)
                        <tbody>
                            <tr>
                                <td class="text-center">{{$item->fecha}}</td>
                                @if($item->clientes->empresa == 1)
                                <td class="text-center">{{$item->clientes->nombre}}</td>
                                @else
                                 <td class="text-center">{{$item->clientes->nombre}} {{$item->clientes->apellido}}</td>
                                @endif

                                <td class="text-center">{{$item->tipo_factura}}</td>
                                <td class="text-center">{{str_pad($item->serie,3,'0',STR_PAD_LEFT)}}-{{str_pad($item->correlativo,7,'0',STR_PAD_LEFT)}}</td>
                                <td class="text-center">{{$config->prefijo_moneda}}{{ number_format($item->total,2) }}</td>
                                <td class="text-center">
                                    @if ($item->estado == 'Procesado')
                                        <span class="badge badge-primary">Procesado</span>
                                    @else
                                        <span class="badge badge-danger">Cancelado</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-cog"></i>
                                        </button>
                                        <div class="dropdown-menu" x-placement="bottom-start" style="will-change: transform; margin: 0px;">

                                            <a class="dropdown-item" data-toggle="modal" data-target="#data-{{$item->id}}">
                                                &nbsp;Ver detalles</a>

                                            <a class="dropdown-item" href="{{route('admin.factura.venta',$item->id)}}" target="_blank">
                                                &nbsp; Factura física</a>

                                                <a class="dropdown-item" href="{{route('admin.detalles.venta',$item->id)}}">
                                                    &nbsp;Factura por email</a>

                                                    @if ($item->estado=='Procesado')
                                                        <a class="dropdown-item" data-toggle="modal" data-target="#modal-{{$item->id}}">
                                                            &nbsp;Cancelar venta</a>
                                                    @endif
                                        </div>
@include('admin.ventas.cancelar')
<!--DETALLES--------------------------->
<div class="modal fade" id="data-{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width: 800px">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Venta: {{str_pad($item->serie,3,'0',STR_PAD_LEFT)}}-{{str_pad($item->correlativo,7,'0',STR_PAD_LEFT)}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="padding:0px">
                </div>
            <div class="modal-body">
                <?php

                $user = DB::table('users')
                ->where('id','=',$item->iduser)
                ->first();

                $detalle_venta = DB::table('detalle_ventas as d')
                ->join('productos as p','d.idproducto','=','p.id')
                ->select('p.descripcion','d.cantidad','d.precio_venta')
                ->where('idventa','=',$item->id)
                ->get();



                ?>
                <div class="row">
                    <div class="col-lg-12">
                        <table style="width: 100%">
                            <tr>
                                <th><b>Razón social:</b></th>
                                <td>{{$item->razon_social}}</td>

                                <th><b>Tipo facturación:</b></th>
                                <td>{{$item->tipo_factura}}</td>

                                <th><b>Razón social:</b></th>
                                <td>{{$item->razon_social}}</td>
                            </tr>
                            <tr>
                                <th><b>Fecha y fecha:</b></th>
                                <td>{{$item->fecha}} {{$item->hora}}</td>

                                <th><b>Vendedor:</b></th>
                                <td>{{auth()->user()->display_name}}</td>

                                <th><b>Total pagado:</b></th>
                                <td>{{$config->prefijo_moneda}}{{$item->total}}</td>
                            </tr>

                        </table>
                    </div>
                </div>
            </div>
            <table class="table table-responsive-sm table-hover table-outline mb-0 table-sm">
                <thead class="thead-light">
                    <tr>
                        <th class="text-center">Producto</th>
                        <th class="text-center">Cantidad</th>
                        <th class="text-center">Precio</th>
                        <th class="text-center">Subtotal</th>
                    </tr>
                </thead>

                @foreach ($detalle_venta as $row)
                    <tbody>
                        <tr>
                            <td>{{$row->descripcion}}</td>
                            <td>{{$row->cantidad}}</td>
                            <td>{{$config->prefijo_moneda}}{{$row->precio_venta}}</td>
                            <td><?php echo $config->prefijo_moneda; echo $row->precio_venta * $row->cantidad?></td>
                        </tr>
                    </tbody>
                @endforeach


                <tfoot class="thead-light">
                    <th colspan="3">
                        <b>Total:</b>
                    </th>
                    <th>{{$config->prefijo_moneda}}{{$item->total}}</th>
                </tfoot>
            </table>
            <div class="modal-footer">

                <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!--DETALLES--------------------------->
</div>
    </td>
    </tr>
    </tbody>
    @endforeach
    @endif
    </table>
    </div>
    <div class="col-lg-12">

    </div>

</div>
                           </div>
                       </div>
                       <div class="col-lg-4">
                           <div class="card card-line-primary">
                               <div class="card-header">
                                   Datos de caja
                               </div>
                               <table class="table table-responsive-sm table-hover table-outline mb-0 table-sm">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Código</th>
                                            <td class="text-center">{{strtoupper($caja->codigo)}}</td>
                                        </tr>
                                        <tr>
                                            <th>Hora de apertura</th>
                                            <td class="text-center">{{strtoupper($caja->hora)}}</td>
                                        </tr>
                                        <tr>
                                            <th>Hora de cierre</th>
                                            <td class="text-center">
                                                @if ($caja->hora_cierre == '')
                                                    <span>Caja abierta</span>
                                                @else
                                                    {{$caja->hora_cierre}}
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Caja</th>
                                            <td class="text-center">{{$caja->caja}}</td>
                                        </tr>
                                        <tr>
                                            <th>Monto apertura</th>
                                            <td class="text-center">{{$config->prefijo_moneda}}{{$caja->monto}}</td>
                                        </tr>
                                        <tr>
                                            <th>Monto cierre</th>
                                            <td class="text-center">
                                                @if ($caja->monto_cierre == '0.00')
                                                    <span>Caja abierta</span>
                                                @else
                                                    {{$config->prefijo_moneda}}{{$caja->monto_cierre}}
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Total en caja</th>
                                            <td class="text-center">
                                                 @foreach ($venta as $vent)
                                                    @php
                                                      $suma+=$vent->total;//sumanos los valores, ahora solo fata mostrar dicho valor
                                                    @endphp
                                                  @endforeach
                                                  {{ number_format ($suma ,2)  }}Bs
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Estado</th>
                                            <td class="text-center">
                                                @if ($caja->estado == 'Cerrada')
                                                    <span class="badge badge-danger">
                                                        {{$caja->estado}}
                                                    </span>
                                                @else
                                                    <span class="badge badge-success">
                                                        {{$caja->estado}}
                                                    </span>
                                                @endif
                                            </td>
                                        </tr>
                                    </thead>
                               </table>
                           </div>
                       </div>
                   </div>

                </div>
            </div>
        </div>
</main>
@push('scripts')
    <script>

        window.onload = function(){
           var loader = document.getElementById('loader');
           var contenido = document.getElementById('contenido');

            contenido.style.display = 'block';

            $('#loader').remove();
       }

       /*PAGINACION*/
       $(document).on("click", ".pagination a", function(e) {
            e.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            var route = "{{route('admin.data_caja.detalle',$caja->codigo)}}";

            $.ajax({
                route: route,
                data: {page: page},
                type: 'GET',
                dataType: 'json',
                success: function(data){
                    $('.ventas_caja').html(data);

                }

            })
        });
    </script>
@endpush
@endsection
