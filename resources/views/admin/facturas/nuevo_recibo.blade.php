@extends('layouts.admin')
@section('title', 'Recibo')
@push('scripts')	
	<script src="{{ asset('js/forms/recibos.js') }}"></script>
@endpush

@section('content')

	<div class="row">    
		<div class="col-md-12">
			<div class="card">
				
				<div class="card-body">                    
					
					<br><br><br>
					<form id="formNuevoRecibo" action="/admin/recibos/guardar" method="post">
						{{ csrf_field() }}
						<input id="hidden_facturas_seleccionadas" type="hidden" name="facturas_seleccionadas" value="">
						<div class="row">						
							<div class="col-md-3">
								<div class="form-group col-md-12">
									<legend>Datos del recibo</legend>
									<label class="sr-only" for="txtFecha">Fecha de emisión</label>
									<input id="txtFecha" type="date" name="fecha" class="form-control input-sm" title="Fecha del recibo">
								</div>
								
								<div class="form-group col-md-12">
									<label class="sr-only" for="txtCotizacion">Cotización</label>
									<input name="cotizacion" type="text" class="form-control input-sm" id="txtCotizacion" placeholder="Cotización" tabindex="5">
								</div>

								<div class="form-group col-md-12">
									<label class="sr-only" for="txtMonto">Monto a recibir</label>
									<input name="monto" type="number" class="form-control input-sm" id="txtMonto" placeholder="Monto a recibir" tabindex="5" autofocus="true" max="{{ $total_adeudado }}">
								</div>

								<div class="form-group col-md-12">									
									<table class="table table-condensed table-striped table-bordered">
										<tr>
											<th class="th-b text-center" colspan="2">
												Datos del cliente
												<input id="hidden_cliente" type="hidden" name="cliente" value="{{ $cliente->id }}">
											</th>
										</tr>
										<tr>
											<th width="50%">Tipo de cliente</th>
											<td>
												@if($cliente->empresa)
													Empresa
												@else
													Persona
												@endif
											</td>
										</tr>
										<tr>
											<th width="150px">Nombre</th>
											<td>
												<a href="/admin/clientes/detalle/{{ $cliente->id }}">
												
													{{ $cliente->name }}
												
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
												$<span class="float-right">
													{{ $total_atrasado }}
												</span>
											</td>
										</tr>
										<tr>
											<th width="150px">Total adeudado</th>
											<td>
												$<span class="float-right">
													{{ $total_adeudado }}
												</span>
											</td>
										</tr>
									</table>
								</div>
							</div>							
							<div class="col-md-9">
								<legend>Facturas del cliente</legend>
								<div class="table-responsive pre-scrollable div-detalle-comprobante">
									<table id="tablaFacturas" cellspacing="0" width="100%" class="table table-condensed table-striped table-bordered">
										<thead >
											<tr>
												<th class="text-center" width="30px">
													<input class="checkboxFacturaTodas" type="checkbox" name="">
												</th>
												<th class="text-center" width="120px">Vencimiento</th>
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
													{{ date_format(date_create($f->fecha_vencimiento), 'd / m / Y' ) }}
												</td>
												<td class="text-center" style="color: red">
													@if($dias_restantes <= 0)
														{{ $dias_restantes * -1 }}
													@endif
												</td>
												<td>
													<a target="_blank" href="/admin/detalle/{{ $f->comprobante->id }}">
														{{ $f->comprobante->tipo_factura }}
													</a>
												</td>
												<td>
													$<span class="var_deuda_actual float-right">
														{{ round($f->deuda_actual) }}
													</span>
												</td>
												<td>
													$<span id="a_pagar_{{$f->id}}" class="var_a_pagar float-right">
														0
													</span>
												</td>
												<td>
													$<span id="saldo_final_{{$f->id}}" class="float-right">
														{{ round($f->deuda_actual) }}
													</span>
												</td>
											</tr>
											@endforeach
										</tbody>
									</table>
									
								</div>
								<input class="btn btn-primary btn-block btn-sm" type="submit" name="" value="Confirmar">
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