@extends('layouts.admin')
@section('title','VENTAS')
@section('breadcrumb','VENTAS')
@section('content')

    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">Ventas</h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/home') }}">Inicio</a>
                        </li>
                        <li class="breadcrumb-item"><a >General</a>
                        </li>
                        <li class="breadcrumb-item active"> Listado de ventas
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

<div class="col-lg-12">
    <div class="card card-line-primary">
        <div class="card-body">
            <div class="row">
                
                <div class="col-lg-3">
                    <a class="btn btn-dark btn-lg btn-block centrar" href="{{route('admin.abrir_caja.contabilidad')}}">
                        <img src="{{asset('images/caja/dinero.png')}}" style="width: 2.1rem !important;">
                        &nbsp;<span style="margin-left: 5px;">Abrir caja</span></a>
                </div>
                <div class="col-lg-3">
                    <a class="btn btn-danger btn-lg btn-block centrar" href="{{route('admin.registro.venta')}}">
                        <img src="{{asset('images/caja/tienda.png')}}" style="width: 2.1rem !important;">
                        &nbsp;<span style="margin-left: 5px;">Facturar</span></a>
                </div>
                <div class="col-lg-3">
                    <a class="btn btn-primary btn-lg btn-block centrar" href="{{route('admin.grafico.venta')}}">
                        <img src="{{asset('images/caja/grafica.png')}}" style="width: 2.1rem !important;">
                        &nbsp;<span style="margin-left: 5px;">Rendimiento</span></a>
                   
                </div>
                <div class="col-lg-3">
                    <a class="btn btn-success btn-lg btn-block centrar" href="{{route('admin.ventas.vencimiento')}}">
                        <img src="{{asset('images/caja/libro.png')}}" style="width: 2.1rem !important;">
                        &nbsp;<span style="margin-left: 5px;">Facturas por cobrar</span></a>
                </div>
            </div>
        </div>
    </div>
</div>

                    
<div class="col-lg-12">
  <div class="card card-line-primary">
    <div class="card-header">
        
    </div>
     <div class="card-body">
      <div class="row"> 
        <div class="col-lg-12 ventas">
          <table  id="tableExport" class="table table-responsive-sm table-hover table-outline mb-0 table-sm">
            <thead class="thead-light">
                <tr>
                    <th class="text-center">Fecha</th>
                    <th class="text-center">Razón social</th>
                    <th class="text-center">Tipo de factura</th>
                    <th class="text-center">Tipo de pago</th>
                    <th class="text-center">Número de serie</th>
                    <th class="text-center">Total pagado</th>
                    <th class="text-center">Estado</th>
                    
                    <th class="text-center">Opciones</th>
                 </tr>
               </thead>
               
                    <tbody>
                         @foreach ($venta as $item) 
                        <tr>
                            <td class="text-center">{{$item->fecha}}</td>
                            <td class="text-center">{{$item->clientes->nombre}} {{$item->clientes->apellido}}</td>
                            <td class="text-center">{{$item->tipo_factura}}</td>
                             <td class="text-center">{{$item->tipo_pago}}</td>
                            <td class="text-center">{{str_pad($item->serie,3,'0',STR_PAD_LEFT)}}-{{str_pad($item->correlativo,7,'0',STR_PAD_LEFT)}}</td>
                            <td class="text-center">{{$config->prefijo_moneda}}

                             @php
                                $total = App\Models\LineaProducto::where('venta_id',$item->id)->sum('total');
                             @endphp
                               {{ number_format(  $total,2 )  }}

                            </td>
                            <td class="text-center">
                                @if ($item->estado == 'Procesado')
                                    <span class="badge badge-primary">Procesado</span>
                                @else
                                    <span class="badge badge-danger">Cancelado</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                         <i class="fas fa-cog"></i>
                                    </button>
                                 <div class="dropdown-menu" x-placement="bottom-start" style="will-change: transform; margin: 0px;">
                                    <a class="dropdown-item" data-toggle="modal" data-target="#data-{{$item->id}}">
                                            &nbsp;Ver detalles</a>
                                            
                                   <a class="dropdown-item" href="{{route('admin.factura.venta',$item->id)}}" target="_blank">
                                 &nbsp;Factura física</a>

                                    
                                   {{-- <a class="dropdown-item" href="{{route('admin.detalles.venta',$item->id)}}">
                                     &nbsp;Factura por email</a>
                                    @if ($item->estado=='Procesado') 
                                    <a class="dropdown-item" data-toggle="modal" data-target="#modal-{{$item->id}}">
                                    &nbsp;Cancelar venta</a>
                                     @endif --}}
                                    </div>
                                    @include('admin.ventas.cancelar')
                                    <!--DETALLES--------------------------->
                                    <div class="modal fade" id="data-{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                        <div class="modal-dialog" role="document" style="max-width: 800px">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Venta: {{str_pad($item->serie,3,'0',STR_PAD_LEFT)}}-{{str_pad($item->correlativo,7,'0',STR_PAD_LEFT)}}</h5>
                                                   
                                                    
                                                        <h5 class="float-left ml-5 text-uppercase">
                                                       <b> N° de referencia : {{ $item->nu_referencia }}</b> 
                                                    </h5>
                                                    
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="padding:0px">
                                                </div>
                                                <div class="modal-body">
                                                    <?php
                                                    
                                                    $user = App\Models\User::where('id','=',$item->iduser)
                                                    ->first();

                                                    $detalle_venta = DB::table('linea_productos as d')
                                                    ->join('productos as p','d.producto_id','=','p.id')
                                                    ->select('p.descripcion','d.cantidad','d.precioUnitario')
                                                    ->where('venta_id','=',$item->id)
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

                                                                    <th><b>Tipo de pago:</b></th>
                                                                    <td>{{$item->tipo_pago}}</td>

                                                                </tr>
                                                                <tr>
                                                                    <th><b>Fecha y fecha:</b></th>
                                                                    <td>{{$item->fecha}} {{$item->hora}}</td>

                                                                    <th><b>Vendedor:</b></th>
                                                                    <td>{{$user->display_name}}</td>

                                                                    <th><b>Total pagado:</b></th>
                                                                    <td>{{$config->prefijo_moneda}}
                                                                   @php
                                                                     $total = App\Models\LineaProducto::where('venta_id',$item->id)->sum('total');
                                                                   @endphp
                                                                   {{ number_format(  $total,2 )  }}
                                                                    </td>
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
                                                                <td>{{$config->prefijo_moneda}}{{$row->precioUnitario}}</td>
                                                                <td><?php echo $config->prefijo_moneda; echo $row->precioUnitario * $row->cantidad?></td>
                                                            </tr>
                                                        </tbody>
                                                    @endforeach
                                                    <tfoot class="thead-light">
                                                        <th colspan="3">
                                                            <b>Total:</b>
                                                        </th>
                                                        <th>
                                                            @php
                                                                    $total = App\Models\LineaProducto::where('venta_id',$item->id)->sum('total');
                                                            @endphp
                                                            {{ number_format(  $total,2 )  }}
                                                        </th>
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
                        @endforeach
                    </tbody>
                    
                </table>
               <div class="row mt-4">
               
             </div>
        </div>
    </div>
</div>
        <div class="card-footer">
            <span>Solos nos usuarios que abrieron caja la pueden cerrar.</span>
        </div>
    </div>
</div>

                  
            </div>
        </div>
    </div>
</main>
    
 


@endsection
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
            var url = "{{route('admin.open_gistorial.venta')}}";
            
            $.ajax({
                url: url,
                data: {page: page},
                type: 'GET',
                dataType: 'json',
                success: function(data){
                    $('.ventas').html(data);
                    
                }

            })
        });
    </script>
@endpush