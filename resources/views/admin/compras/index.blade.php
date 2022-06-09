@extends('layouts.admin')
@section('title','COMPRAS')
@section('page_title', 'Listado de Roles')
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
                        <li class="breadcrumb-item active"> Listado de compras
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div><br>
  
      	<div class="col-md-12">
          <div class="card card-line-primary">
            <div class="card-header  ">
              
                   
               <a href="{{ url('admin/compras/nuevo') }}" class="btn blue darken-4 text-white btn-primary float-left btn-md" ><i class="fas fa-plus-square"  data-bs-toggle="tooltip" data-bs-placement="top" title="Crear nuevo Usuario" data-container="body" data-animation="true"></i>
        Nueva compra
  </a>
             
            </div>
             <!-- /.card-header -->
                <div class="card-body table-responsive">
                        <table class="table"  id="tableExport">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Fecha</th>
                              <th>Código</th>
                              <th>Proveedor</th>
                              <th>Estado</th>
                             <th>Tipo de compra</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($recent_purchase as $purchase)
                            <?php $supplier = DB::table('proveedors')->find($purchase->proveedor_id); ?>
                            <tr>
                              <td>{{ $purchase->id }}</td>
                              <td>{{ $purchase->fecha }}</td>
                              <td>
                                <a href="/admin/compras/detalle/{{$purchase->id}}">{{$purchase->correlativo}}</a>
                              </td>
                              @if($supplier)
                                <td>{{$supplier->company_name}}</td>
                              @else
                                <td>N/A</td>
                              @endif
                              @if($purchase->estado_compra == 1)
                              <td><div class="badge badge-success">Recibido</div></td>
                              @elseif($purchase->estado_compra == 2)
                              <td><div class="badge badge-warning">Parcial</div></td>
                              @elseif($purchase->estado_compra == 3)
                              <td><div class="badge badge-danger">Pending</div></td>
                              @else
                              <td><div class="badge badge-danger">Ordered</div></td>
                              @endif
                             <td>

                              @if ($purchase->tipo_factura == 'Credito')
                               <span class="text-center">Compra a crédito</span>
                                @else
                                <span class="text-center">Compra a contado</span>
                              @endif

                              </td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                <!-- /.card-body -->
            </div>
        </div>
        @include('admin.proveedores.partials.modal.create')



@endsection