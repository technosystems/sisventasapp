@extends('layouts.admin')
@section('title', 'Inicio')
@section('content')

    <!-- Medal Card -->
<div class="row match-height">
   <!-- Medal Card -->
     <div class="col-xl-4 col-md-6 col-12">
            <div class="card card-congratulation-medal ">
                <div class="card-body">
                    <h5>Bienvenido (a) {{ Auth::user()->display_name }}!</h5>
                    <p class="card-text font-small-3">Gracias por preferirnos</p>
                    <img src="{{ asset('/images/illustration/badge.svg') }}" class="congratulation-medal" alt="Medal Pic" />
                </div>
                <footer class="ml-2 mb-2">
                    <p><b>Desarrollamos lo mejor para tí.</b></p>
                </footer>
            </div>
        </div>
      <!--/ Medal Card -->
     <div class="col-xl-8 col-md-6 col-12 ">
        <div class="card card-statistics card-top-primary card-bottom-primary card-start-primary line-end-primary">
            <div class="card-header">
                <h4 class="card-title">Estadísticas</h4>
                <div class="d-flex align-items-center">
                    <p class="card-text font-small-2 me-25 mb-0">{{ date('d/m/Y') }}</p>
                </div>
            </div>
            <div class="card-body statistics-body">
                <div class="row">
                    <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                        <div class="d-flex flex-row">
                            <div class="avatar bg-light-primary me-2">
                                <div class="avatar-content">
                                    <i class="mdi mdi-face avatar-icon fa-2x mb-1"></i>
                                </div>
                            </div>
                            <div class="my-auto">
                                <h4 class="fw-bolder mb-0">{{ App\Models\User::count() }}</h4>
                                <p class="card-text font-small-3 mb-0">Usuarios</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                        <div class="d-flex flex-row">
                            <div class="avatar bg-light-success me-2">
                                <div class="avatar-content">
                                    <i class="mdi mdi-shield avatar-icon fa-2x mb-1"></i>
                                </div>
                            </div>
                            <div class="my-auto">
                                <h4 class="fw-bolder mb-0">{{ Spatie\Permission\Models\Role::count() }}</h4>
                                <p class="card-text font-small-3 mb-0">Roles</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-sm-0">
                        <div class="d-flex flex-row">
                            <div class="avatar bg-light-warning me-2">
                                <div class="avatar-content">
                                    <i data-feather="lock" class="avatar-icon"></i>
                                </div>
                            </div>
                            <div class="my-auto">
                                <h4 class="fw-bolder mb-0">{{ Spatie\Permission\Models\Permission::count() }}</h4>
                                <p class="card-text font-small-3 mb-0">Permisos</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="d-flex flex-row">
                            <div class="avatar bg-light-success me-2">
                                <div class="avatar-content">
                                    <i data-feather="file" class="avatar-icon"></i>
                                </div>
                            </div>
                            <div class="my-auto">
                                <h4 class="fw-bolder mb-0">{{ App\Models\Log\LogSistema::count() }}</h4>
                                <p class="card-text font-small-3 mb-0">Historial</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  <div class="col-lg-4 col-md-6 col-12">
      <div class="card card-developer-meetup card-top-primary card-bottom-primary card-start-primary line-end-primary">
          <div class="meetup-img-wrapper rounded-top text-center">
              <img src="{{ asset('images/illustration/email.svg') }}" alt="Meeting Pic" height="170" />
          </div>
          <div class="card-body">
              <div class="meetup-header d-flex align-items-center">
                  <div class="meetup-day">
                      <h6 class="mb-0 text-uppercase">{{ date('M') }}</h6>
                      <h3 class="mb-0">{{ date('d') }}</h3>
                  </div>
                  <div class="my-auto">
                      <h4 class="card-title mb-25">Listado de usuarios</h4>
                      <p class="card-text mb-0">Últimos 5 usuarios registrados</p>
                  </div>
              </div>
              @php
                $user = App\Models\User::take(5)->get()
              @endphp
              <div class="mt-0">
                 
                 <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <table class="table table-responsive">
                                    <thead>
                                        <tr>
                                           
                                            <th>#</th>
                                            <th>Nombre</th>
                                            <th>Estado</th>
                                        </tr>
                                    </thead>
                                    @foreach ($user as $element)
                                    <tbody>
                                      <tr>
                                        <td>{{ $element->id }}</td>
                                        <td><a href="{{ url('admin/usuario/'.$element->id) }}">{{ $element->display_name }}</a></td>
                                        <td>
                                        @if ($element->status == 1)
                                          <span class="badge text-white green">Activo </span>
                                        @else
                                          <span class="badge text-white red">Inactivo </span>
                                        @endif
                                      </td>
                                      </tr>
                                    </tbody>
                                     @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
               </div>
           </div>
         </div>
       </div>
       <div class="col-lg-8 col-md-6 col-12 ">
          <div class="card">
            <div class="card-header d-flex justify-content-between align-items-sm-center align-items-start flex-sm-row flex-column">
                <div class="header-left">
                    <h4 class="card-title">Acceso al sistema durante el año {{ date('Y') }}</h4>
                </div>
                <div class="header-right d-flex align-items-center mt-sm-0 mt-1">
                    <i data-feather="calendar"></i>
                    <input type="text" class="form-control flat-picker border-0 shadow-none bg-transparent pe-0" disabled value="{{ date('d/m/Y') }}" />
                </div>
            </div>
            <div class="card-body">
                <canvas class="chartjs" data-height="400" id="employee"></canvas>
            </div>    
          </div>
       </div>
     </div>
 

     <!-- Medal Card -->
   <!-- Dashboard Ecommerce Starts -->
<section id="dashboard-ecommerce">
<div class="row match-height">
    <!-- Medal Card -->
      <div class="col-xl-4 col-md-6 col-12">
        <div class="card card-congratulation-medal card-top-primary card-bottom-primary card-start-primary line-end-primary ">
            <div class="card-body">
                <h5>Bienvenido (a) {{ Auth::user()->display_name }}!</h5>
                <p class="card-text font-small-3">Gracias por preferirnos</p>
                <img src="{{ asset('/images/illustration/badge.svg') }}" class="congratulation-medal" alt="Medal Pic" />
            </div>
            <footer class="ml-2 mb-2">
                <p><b>Desarrollamos lo mejor para tí.</b></p>
            </footer>
        </div>
    </div>
    <!--/ Medal Card -->

    <!-- Statistics Card -->
    <div class="col-xl-8 col-md-6 col-12">
        <div class="card card-statistics card-line-primary">
            <div class="card-header">
                <h4 class="card-title">Estadísticas generales</h4>
                <div class="d-flex align-items-center">
                    <p class="card-text font-small-2 mr-25 mb-0">Updated 1 month ago</p>
                </div>
            </div>
            <div class="card-body statistics-body">
                <div class="row">
                
                    
                    <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                        <div class="media">
                            <div class="avatar white mr-2">
                                <div class="avatar-content">
                                    <i class="fas fa-user brown-text fa-3x" class="avatar-icon"></i>
                                </div>
                            </div>
                            <div class="media-body my-auto">
                                <h4 class="font-weight-bolder mb-0">{{ App\Models\User::count() }}</h4>
                                <p class="card-text font-small-3 mb-0">Usuarios</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                        <div class="media">
                            <div class="avatar white mr-2">
                                <div class="avatar-content">
                                    <i class="mdi mdi-lock-open black-text fa-3x" class="avatar-icon"></i>
                                </div>
                            </div>
                            <div class="media-body my-auto">
                                <h4 class="font-weight-bolder mb-0">{{ Spatie\Permission\Models\Role::count() }}</h4>
                                <p class="card-text font-small-3 mb-0">Roles</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-sm-0">
                        <div class="media">
                            <div class="avatar white mr-2">
                                <div class="avatar-content">
                                    <i class="mdi mdi-lock-alert purple-text fa-3x" class="avatar-icon"></i>
                                </div>
                            </div>
                            <div class="media-body my-auto">
                                <h4 class="font-weight-bolder mb-0">{{Spatie\Permission\Models\Permission::count() }} </h4>
                                <p class="card-text font-small-3 mb-0">Permisos</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="media">
                            <div class="avatar white mr-2">
                                <div class="avatar-content">
                                    <i class="mdi mdi-login-variant fa-3x red-text" class="avatar-icon"></i>
                                </div>
                            </div>
                            <div class="media-body my-auto">
                                <h4 class="font-weight-bolder mb-0">{{App\Models\Login::count() }} </h4>
                                <p class="card-text font-small-3 mb-0">Visitas</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

      <div class="col-lg-6 col-sm-6 col-12">
      <div class="card card-top-primary card-bottom-primary card-start-primary line-end-primary">
        <div class="card-header">
          <div>
            <h2 class="font-weight-bolder mb-0">{{ $config->prefijo_moneda }}{{number_format((float)$revenue, 2, '.', '')}}</h2>
            <p class="card-text">Ingreso en el año {{ date('Y') }}</p>
          </div>
          <div class="avatar bg-light-success p-50 m-0">
            <div class="avatar-content">
              <i class="fas fa-dollar-sign font-medium-5"></i>
            </div>
          </div> 
          @php
             $tbolivares = \DB::table('tasas')->where('fecha_emision',date('Y-m-d'))
             ->sum('amount')
          @endphp 
        </div>

       
      </div>
    </div>

    {{--  <div class="col-lg-6 col-sm-6 col-12">
      <div class="card ">
        <div class="card-header">
          <div>
            <h2 class="font-weight-bolder mb-0">Bs {{number_format((float)$revenue / $tbolivares, 2, '.', '')}}</h2>
            <p class="card-text">Ingreso en el año  {{ date('Y') }}</p>
          </div>
          <div class="avatar bg-light-success p-50 m-0">
            <div class="avatar-content">
              <i class="fas fa-dollar-sign font-medium-5"></i>
            </div>
          </div>
        </div>
      </div>
    </div> --}}

    <div class="col-lg-6 col-sm-6 col-12">
      <div class="card card-top-primary card-bottom-primary card-start-primary line-end-primary">
        <div class="card-header">
          <div>
            <h2 class="font-weight-bolder mb-0">{{ $config->prefijo_moneda }}{{number_format((float)$revenue_mes, 2, '.', '')}}</h2>
            <p class="card-text">Ingreso {{ $mes_actual }}</p>
          </div>
          <div class="avatar bg-light-success p-50 m-0">
            <div class="avatar-content">
              <i class="fas fa-dollar-sign font-medium-5"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    {{--  <div class="col-lg-6 col-sm-6 col-12">
      <div class="card">
        <div class="card-header">
          <div>
            <h2 class="font-weight-bolder mb-0">Bs {{number_format((float)$revenue_mes/ $tbolivares, 2, '.', '')}}</h2>
            <p class="card-text">Ingreso {{ $mes_actual }}</p>
          </div>
          <div class="avatar bg-light-success p-50 m-0">
            <div class="avatar-content">
              <i class="fas fa-dollar-sign font-medium-5"></i>
            </div>
          </div>
        </div>
      </div>
    </div> --}}
    <div class="col-lg-12 col-sm-6 col-12">
      <div class="card card-top-primary card-bottom-primary card-start-primary line-end-primary">
        <div class="card-header">
          <div>
            <h2 class="font-weight-bolder mb-0">{{$productos}}</h2>
            <p class="card-text">Productos disponibles</p>
          </div>
          <div class="avatar bg-light-danger p-50 m-0">
            <div class="avatar-content">
              <i class="fas fa-store-alt font-medium-5"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    @php
      $total_deuda  = App\Models\FacturasCompras::sum('deuda_actual');
      $total_cobrar = App\Models\Factura::sum('deuda_actual')
    @endphp

    <div class="col-lg-6 col-sm-6 col-12">
      <div class="card">
        <div class="card-header">
          <div>
            <h2 class="font-weight-bolder mb-0">
                
              {{ $config->prefijo_moneda }}{{ $total_deuda }}

            </h2>
            <p class="card-text">Facturas por pagar</p>
          </div>
          <div class="avatar bg-light-warning p-50 m-0">
            <div class="avatar-content">
              <i class="fas fa-handshake font-medium-5"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

      <div class="col-lg-6 col-sm-6 col-12">
      <div class="card card-top-primary card-bottom-primary card-start-primary line-end-primary">
        <div class="card-header">
          <div>
            <h2 class="font-weight-bolder mb-0">
                
              {{ $config->prefijo_moneda }}{{ $total_cobrar }}

            </h2>
            <p class="card-text">Facturas por cobrar</p>
          </div>
          <div class="avatar bg-light-success p-50 m-0">
            <div class="avatar-content">
              <i class="mdi mdi-police-badge-outline fa-2x"></i>
            </div>
          </div>
        </div>
      </div>
    </div>


    <input type="hidden" id="tasa" value="{{ $tasa }}">

    <div class="col-md-7">
              <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                  <h4>Transacciones recientes</h4>
                  <div class="right-column">
                    <div class="badge badge-primary">Últimos 5 registros</div>
                  </div>
                </div>
                <ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" href="#sale-latest" role="tab" data-toggle="tab">Ventas</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#purchase-latest" role="tab" data-toggle="tab">Compras</a>
                  </li>
                   <li class="nav-item">
                    <a class="nav-link" href="#products-latest" role="tab" data-toggle="tab">Productos</a>
                  </li>
                   <li class="nav-item">
                    <a class="nav-link" href="#expeses-latest" role="tab" data-toggle="tab">Gastos</a>
                  </li>
                   <li class="nav-item">
                    <a class="nav-link" href="#tasa-latest" role="tab" data-toggle="tab">Tasa del día</a>
                  </li>
                </ul>

                <div class="tab-content">
                  <div role="tabpanel" class="tab-pane fade show active" id="sale-latest">
                      <div class="table-responsive">
                        <table class="table">
                          <thead>
                            <tr>
                              <th>Fecha</th>
                              <th>Estado de la venta</th>
                              <th>Total cancelado ($)</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($recent_sale as $sale)
                            <?php $customer = DB::table('clientes')->where('nombre',$sale->razon_social)->first(); ?>
                            <tr>
                              <td>{{ $sale->fecha }}</td>
                             
                              @if($sale->estado == 'Procesado')
                              <td><div class="badge badge-success">Procesado</div></td>

                              @else
                              <td><div class="badge badge-danger">Cancelado</div></td>
                             
                              @endif
                              
                              <td>{{$sale->total}}</td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="quotation-latest">
                      <div class="table-responsive">
                        <table class="table">
                          <thead>
                            <tr>
                              <th>{{trans('file.date')}}</th>
                            
                              <th>{{trans('file.customer')}}</th>
                              <th>{{trans('file.status')}}</th>
                              <th>{{trans('file.grand total')}}</th>
                            </tr>
                          </thead>
                          <tbody>
                          </tbody>
                        </table>
                      </div>
                  </div> 
                  <div role="tabpanel" class="tab-pane fade" id="purchase-latest">
                      <div class="table-responsive">
                        <table class="table">
                          <thead>
                            <tr>
                              <th>Fecha</th>
                              <th>Código</th>
                              <th>Proveedor</th>
                              <th>Estado</th>
                             
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($recent_purchase as $purchase)
                            <?php $supplier = DB::table('proveedors')->find($purchase->proveedor_id); ?>
                            <tr>
                              <td>{{ $purchase->fecha }}</td>
                              <td>{{$purchase->correlativo}}</td>
                              @if($supplier)
                                <td>{{$supplier->company_name}}</td>
                              @else
                                <td>N/A</td>
                              @endif
                              @if($purchase->estado_compra == 1)
                              <td><div class="badge badge-success">Recibido</div></td>
                              @elseif($purchase->estado_compra == 2)
                              <td><div class="badge badge-success">Parcial</div></td>
                              @elseif($purchase->estado_compra == 3)
                              <td><div class="badge badge-danger">Pendiente</div></td>
                              @else
                              <td><div class="badge badge-danger">Ordenado</div></td>
                              @endif
                             
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="products-latest">
                    
                      <div class="table-responsive">
                        <table class="table">
                          <thead>
                            <tr>
                              <th>Código</th>
                              <th>Producto</th>
                              <th>Estado</th>
                              <th>Cantidad</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($products as $producto)
                          
                            <tr>
                              <td>{{$producto->codigo_barra}}</td>
                             
                                <td>{{ $producto->descripcion }}</td>
                              
                              @if($producto->status == 1)
                              <td><div class="badge badge-success">Disponible</div></td>
                              @elseif($producto->status == 2)
                              <td><div class="badge badge-danger">Agotado</div></td>
                              @else
                              <td><div class="badge badge-warning">En espera</div></td>
                             
                              @endif
                              <td>{{$producto->stock_actual}}</td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="expeses-latest">
                    
                      <div class="table-responsive">
                        <table class="table">
                          <thead>
                            <tr>
                              <th>Fecha</th> 
                              <th>Descripción</th>
                              <th>Estado</th>
                              <th>Cantidad ($)</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($recent_expense as $producto)
                          
                            <tr>
                              <td>{{ $producto->fecha }} {{ $producto->hora }}</td>
                             
                             
                                <td>{{ $producto->descripcion }}</td>
                              
                             
                              <td><div class="badge badge-success">Realizado</div></td>
                              
                              <td>{{$producto->cantidad}}</td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="tasa-latest">
                    @php
                        $tasas = App\Models\Tasa::take(5)->get()
                    @endphp
                      <div class="table-responsive">
                        <table class="table">
                          <thead>
                            <tr>
                              <th>Fecha</th> 
                              <th>Tasa (Bs)</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($tasas as $tasa)
                          
                            <tr>
                              <td>{{ $tasa->fecha_emision }}</td>
                              <td>{{ $tasa->amount }}Bs.</td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                  </div>
                </div> 
              </div>
            </div>
             <div class="col-md-5">
              <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                  <h4>Lo mejor vendido en el mes {{$mes_actual}}</h4>
                  <div class="right-column">
                    <div class="badge badge-primary">Las últimas 5</div>
                  </div>
                </div>
                <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>SL No</th>
                          <th>Detalle del producto</th>
                          <th>Cantidad</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($best_selling_qty as $key=>$sale)
                        <?php $product = DB::table('productos')->find($sale->idproducto); ?>
                        <tr>
                          <td>{{$key + 1}}</td>
                          <td>{{$product->descripcion}}</td>
                          <td>{{$sale->sold_qty}}</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
              </div>
            </div>
             <div class="col-md-6">
              <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                  <h4>Lo mejor vendido {{ $mes_actual }} (Cantidad)</h4>
                  <div class="right-column">
                    <div class="badge badge-primary">Las últimas 5</div>
                  </div>
                </div>
                <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>SL No</th>
                          <th>Detalle del producto</th>
                          <th>Cantidad</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($yearly_best_selling_qty as $key => $sale)
                        <?php $product = DB::table('productos')->find($sale->idproducto); ?>
                        <tr>
                          <td>{{$key + 1}}</td>
                          <td>{{$product->descripcion}}</td>
                          <td>{{$sale->sold_qty}}</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
              </div>
            </div>
             <div class="col-md-6">
              <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                  <h4>Lo mejor vendido {{ $mes_actual }} (Precio)</h4>
                  <div class="right-column">
                    <div class="badge badge-primary">Las últimas 5</div>
                  </div>
                </div>
                <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>SL No</th>
                          <th>Detalle del producto</th>
						  @if(\Auth::user()->hasRole('Administrador'))
                          <th>Total ($)</th>
						  @endif
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($yearly_best_selling_price as $key => $sale)
                        <?php $product = DB::table('productos')->find($sale->idproducto); ?>
                        <tr>
                          <td>{{$key + 1}}</td>
                          <td>{{$product->descripcion}}</td>
                          @if(\Auth::user()->hasRole('Administrador'))
							   <td>{{number_format((float)$sale->total_price, 2, '.', '')}}</td>
						  @endif
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
              </div>
            </div>
        </div>
</section>
      <!--/ Medal Card -->
 


@endsection
@push('scripts')
    
 

    <script>


  
 var tasa = $('#tasa').val();

 console.log(tasa);

    if(tasa == 0)
    { 
         $('#createModalTasa').modal('show');

    }
    else
    {
        $('#createModalTas').modal('hide');
    }
  

    </script>

@endpush