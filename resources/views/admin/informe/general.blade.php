@extends('layouts.admin')
@section('title','INFORME')
@section('content')
	<div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">INFORME GENERAL</h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/home') }}">Inicio</a>
                        </li>
                        <li class="breadcrumb-item"><a >General</a>
                        </li>
                        <li class="breadcrumb-item active"> Informe general
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div><br>
    <div class="row">
		<div class="col-md-4">
			<div class="card">
				<div class="card-body">
					
				<h3>Gastos</h3>
				<hr>
				<div class="mt-3">
					<p class="mt-2">Cantidad <span class="float-right"> {{number_format((float)$purchase, 2, '.', '') }}$</span></p>
					<p class="mt-2">N° Gastos <span class="float-right">{{ $total_purchase}}</span></p>
					<p class="mt-2">Total pagado <span class="float-right">{{number_format((float)$purchase, 2, '.', '')}}$</span></p>
					
				</div>
				</div>
			</div>
		</div>
	   <div class="col-md-4">
			<div class="card">
				<div class="card-body">
					
				<h3>Ventas</h3>
				<hr>
				<div class="mt-3">
					<p class="mt-2">Cantidad <span class="float-right"> {{number_format((float)$ventas, 2, '.', '') }}$</span></p>
					<p class="mt-2">N° Ventas <span class="float-right">{{ $ventas_total}}</span></p>
					<p class="mt-2">Total pagado <span class="float-right">{{number_format((float)$ventas, 2, '.', '')}}$</span></p>
					
				</div>
				</div>
			</div>
		</div>
		 <div class="col-md-4">
			<div class="card">
				<div class="card-body">
					
				<h3>Compras</h3>
				<hr>
				<div class="mt-3">
					<p class="mt-2">Cantidad <span class="float-right"> {{number_format((float)$compras, 2, '.', '') }}$</span></p>
					<p class="mt-2">N° Compras <span class="float-right">{{ $compras_total}}</span></p>
					<p class="mt-2">Total pagado <span class="float-right">{{number_format((float)$compras, 2, '.', '')}}$</span></p>
					
				</div>
				</div>
			</div>
		</div>

		 <div class="col-md-4">
			<div class="card">
				<div class="card-body">
			@php
				$total = $ventas - $compras - $purchase
			@endphp
				<h3>Ventas - Compras - Gastos</h3>
				<hr>
				<div class="mt-3">
					<p class="mt-2">Ventas <span class="float-right"> {{number_format((float)$ventas, 2, '.', '') }}$</span></p>
					<p class="mt-2">Compras<span class="float-right">-{{number_format((float)$compras, 2, '.', '')}}</span></p>
					<p class="mt-2">Gastos<span class="float-right">-{{number_format((float)$purchase, 2, '.', '')}}$</span></p>
				</div>
				</div>
				<div class="card-footer text-center">
					<h3>Total : {{ $total }}$</h3>
				</div>
			</div>
		</div>
		 <div class="col-md-8">
			<div class="card">
				<div class="card-body">
			@php
				$total = $ventas - $compras
			@endphp
				<h3>Pago de nómina</h3>
				<hr>
				<div class="mt-3">
					 <table  class="display table table-striped "  style="width:100%">
                    <thead>
                    <tr> 
                    <th>#</th>
                    <th>Nombre completo</th>
                    <th>Método de pago</th>
                    <th>Cantidad</th>
                    <th>Fecha de pago</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($pago as $cliente)
                    <tr class="row{{ $cliente->id }}">
                    <td>{{ $cliente->id }}</td>
                    <td>{{ $cliente->empleado->display_name }}</td>
                    <td>{{ $cliente->metodo->name }}</td>
                    <td>{{ $cliente->cantidad }}$</td>
                    <td>{{ $cliente->fecha_emision }}</td>
                    
                    </tr>
                    @include('admin.pagos.partials.modal.editar')
                    @endforeach
                    </tr>
                    </tbody>                
                </table>
					
					
				</div>
				</div>
				<div class="card-footer text-center">
					<h3>Total : {{ $pago_total }}$</h3>
				</div>
			</div>
		</div>
	     

   </div>

    	   

@endsection