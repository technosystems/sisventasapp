@extends('layouts.admin')
@section('title', 'Recibo')
@push('scripts')	
	<script src="{{ asset('js/forms/recibos.js') }}"></script>
@endpush

@section('content')
 <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">Recibos de pago</h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/home') }}">Inicio</a>
                        </li>
                        <li class="breadcrumb-item"><a >General</a>
                        </li>
                        <li class="breadcrumb-item active"> Recibos de pago
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div><br>
	<div class="row">    
		<div class="col-md-12">
			<div class="card card-line-primary">
				<div class="card-primary card-outline card-header">
					
				</div>
				<div class="card-body">                    
					
					<form id="formNuevoRecibo" action="/admin/recibos/factura/compras/guardar" method="post">
						{{ csrf_field() }}
						<input id="hidden_facturas_seleccionadas" type="hidden" name="facturas_seleccionadas" value="">
						<div class="row">						
							<div class="col-md-3">
								<div class="form-group col-md-12">
									<legend>Datos del recibo</legend>
									<label class="" for="txtFecha">Fecha de emisión</label>
									<input id="txtFecha" type="date" name="fecha" class="form-control" title="Fecha del recibo">
								</div>
								

								<div class="form-group col-md-12">
									<label class="" for="txtMonto">Monto a recibir</label>
									<input name="monto" type="number" class="form-control" id="txtMonto" placeholder="Monto a recibir" tabindex="5" autofocus="true" max="{{ $total_adeudado }}">
								</div>

								<div class="form-group col-md-12">									
									<table class="table table-condensed table-striped table-bordered">
										<tr>
											<th class="th-b text-center" colspan="2">
												Datos del cliente
												<input id="hidden_cliente" type="hidden" name="proveedor" value="{{ $proveedor->id }}">
											</th>
										</tr>
										<tr>
											<th >Proveedor</th>
											<td>
												@if($proveedor->empresa)
													Empresa
												@else
													Persona
												@endif
											</td>
										</tr>
										<tr>
											<th width="150px">Nombre</th>
											<td>
												<a href="/admin/proveedores/detalle/{{ $proveedor->id }}">
											
										
													{{ $proveedor->company_name }}
										
												</a>
											</td>
										</tr>
										<tr>
											<th width="150px">Total atrasado</th>
											@if($total_atrasado != 0)
											<td style="color: red">
											@else
											<td style="color: green;">
											@endif
												$
												<span class="float-right">
													{{ $total_atrasado }}
												</span>
											</td>
										</tr>
										<tr>
											<th width="150px">Total adeudado</th>
											<td>
												$
												<span class="float-right">
													{{ $total_adeudado }}
												</span>
											</td>
										</tr>
									</table>
								</div>
							</div>							
							<div class="col-md-9">
								<legend>Facturas del proveedor</legend>
								<div class="table-responsive pre-scrollable div-detalle-comprobante">
									<table id="tablaFacturas" cellspacing="0" width="100%" class="table table-condensed table-striped table-bordered">
										<thead >
											<tr>
												<th class="text-center" width="30px">
													<input class="checkboxFacturaTodas" type="checkbox" name="">
												</th>
												<th>FECHA</th>
												<th class="text-center" width="100px">Atraso (días)</th>
												<th class="text-center">Tipo de comprobante</th>
												<th class="text-center" width="100px">Deuda</th>
												<th class="text-center" width="100px">A pagar</th>
												<th class="text-center" width="100px">Saldo final</th>
											</tr>
										</thead>
										<tbody>
											@foreach($facturas as $f)
											<?php
												$hoy = time();
												$fecha_vencimiento = strtotime($f->fecha_vencimiento);
												$date_diff = $fecha_vencimiento - $hoy;
												$dias_restantes = floor($date_diff / (60 * 60 * 24)) + 1;
											?>
											<tr>
												<input class="var_factura_id" type="hidden" value="{{ $f->id }}">
												<td class="text-center">
													@if($dias_restantes <= 0)
													<input class="checkboxFactura" type="checkbox" name="" checked="true">
													@else
													<input class="checkboxFactura" type="checkbox" name="">
													@endif
												</td>
												@if($dias_restantes <= 0)
												<td class="text-center" style="color: red">
												@else
												<td class="text-center">
												@endif
													{{ date_format(date_create($f->fecha_vencimiento), 'd/m/Y' ) }}
												</td>
												<td class="text-center" style="color: red">
													@if($dias_restantes <= 0)
														{{ $dias_restantes * -1 }}
													@else
													0
													@endif
												</td>
												<td>
													<a target="_blank" href="/admin/compras/detalle/{{ $f->compras->id }}">
														{{ $f->compras->tipo_factura}}
													</a>
												</td>
												<td>
													&nbsp; $
													<span class="var_deuda_actual float-right">
														{{ round($f->deuda_actual) }}
													</span>
												</td>
												<td>
													&nbsp; $
													<span id="a_pagar_{{$f->id}}" class="var_a_pagar float-right">
														0
													</span>
												</td>
												<td>
													&nbsp; $
													<span id="saldo_final_{{$f->id}}" class="float-right">
														{{ round($f->deuda_actual) }}
													</span>
												</td>
											</tr>
											@endforeach
										</tbody>
									</table>
									
								</div>
								<input class="btn btn-primary btn-block btn-sm mt-2" type="submit" name="" value="Confirmar">
							</div>							
						</div>						
					</form>
				</div>
			</div>				
		</div>        
	</div>

@endsection

@section('scripts')
<script type="text/javascript">
$(document).ready(function(){        
	});
</script>
@endsection