@extends('layouts.admin')
@section('title', 'Clientes')
@section('content')

	<div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">Datos del Cliente</h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/home') }}">Inicio</a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{ url('admin/clientes') }}">Listado de clientes</a>
                        </li>
                        <li class="breadcrumb-item active"> Datos del cliente
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div><br>
	<div class="row">
		<div class="col-md-12">
			<div class="card card-line-primary">
				
				<div class="card-body">
					
					
					<div class="row">
						
							<div class="col-md-4"><br>
								<legend>
									Datos del cliente
									<span class="float-right">
										<a class="btn btn-primary btn-sm" id="editCodigo" data-toggle="modal" data-target="#modalEditarCliente">
											<i class="dashicons dashicons-edit fa-1x" aria-hidden="true"></i>
											Editar datos del cliente
										</a>

									</span>
								</legend>								
								<div class="form-group">
									<table class="table table-condensed table-striped table-bordered" width="100%">
										<tr>
											<th class="text-center th-b" colspan="2">Información general</th>
										</tr>
										<tr>
											<td width="30%">Tipo de cliente</td>
											<td width="70%">
												@if($cliente->empresa)
													Empresa
												@else
													Persona
												@endif
											</td>												
										</tr>
										<tr>
											@if($cliente->empresa)
												<td>
													Razón social
												</td>
												<td>
													{{$cliente->nombre}}
												</td>
											@else
												<td>
													Nombre
												</td>
												<td>
													{{$cliente->nombre}} {{$cliente->apellido}}
												</td>
											</tr>
													<tr>
													<td>
														Documento
													</td>
													<td>
														
														{{$cliente->cedula}}
													</td>												
												</tr>
											@endif												
										</tr>
										<tr>
											<td>
												Mail
											</td>
											<td>
												{{$cliente->mail}}
											</td>												
										</tr>
										<tr>
											<td>
												Dirección
											</td>
											<td>
												{{$cliente->direccion}}
											</td>												
										</tr>
										<tr>
											<td>
												Teléfono
											</td>
											<td>
												{{$cliente->telefono}}
											</td>												
										</tr>
										@if($cliente->empresa)
											<tr>
												<td>
													RIF
												</td>
												<td>
													{{$cliente->rif}}
												</td>												
											</tr>
										@endif
										<tr>
											<td>
												Saldo
											</td>
											<td>
												$
												{{ $cliente->getSaldo() }}
											</td>
										</tr>
									</table>
								</div>								
							</div><br>
							<div class="col-md-8">
								<legend>Actividad del cliente</legend>
								<div class="col-md-12">
									<div class="table-responsive">
										<table width="100%" 
										       class="table table-condensed table-striped table-bordered">
											<thead>
												<tr>
													<th class="text-center" width="120px">Fecha</th>
													<th class="text-center" width="180px">Tipo comprobante</th>
													<th class="text-center">Descripcion</th>
													<th class="text-center" width="100px">Total IVA inc.</th>
													<th></th>
												</tr> 
											</thead>
											<tbody>
												@foreach($comprobantes as $c)

													@php
													 $detalle_venta = DB::table('linea_productos as d')
                                                   
                                                    ->where('venta_id','=',$c->id)
                                                     ->sum('total');
													@endphp

													<tr>
														<td>{{ date_format(date_create($c->fechaEmision), 'd / m / Y' ) }}</td>
														<td class="text-center">
															@if($c->tipo_factura == 'Credito')
															 <span>Venta a Crédito</span>
															 @else
															 <span>Venta al contado</span>
															@endif
														</td>
														<td>
															{{ $c->descripcion }}
														</td>
														<td style="text-align: right;">
															 {{ number_format(  $detalle_venta,2 )  }}
														</td>
														<td class="text-center">
															@if($c->id)
															<a href="#"
															   data-toggle="modal" 
															   data-target="#data-{{$c->id}}">
																	Venta procesada
															</a>
								
														    @include('admin.clientes.partials.modal.detalle')
															@else
																-
															@endif
														</td>
													</tr>													
												@endforeach
											</tbody>
										</table>
									</div>
									
								</div>
							</div>
						</div>
					</div>

				
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<div class="modal fade" id="modalEditarCliente" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			 <div class="modal-header">
                <h2 class="modal-title" id="exampleModalCenterTitle"><b>Editar datos del cliente</b></h2>
                <button  type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>

			<div class="modal-body">
				<div class="row">
					<div class="col-md-12 col-md-offset-1">
						<form id="form_editar_cliente" class="form-horizontal" role="form" method="POST" action="/admin/clientes/guardar">
						{{ csrf_field() }}
							<input type="hidden" name="cliente_id" value="{{$cliente->id}}">
							<div class="form-group">
								<table class="table table-condensed table-striped table-bordered" width="100%">
									<tr>
										<th width="40%">Tipo de cliente</th>
										<td width="50%">
											@if($cliente->empresa)
												<input class="form-control input-sm" type="text" name="tipo_cliente" value="Emnpresa" disabled="true">
											@else
												<input class="form-control input-sm" type="text" name="tipo_cliente" value="Persona" disabled="true">
											@endif
										</td>												
									</tr>
									<tr>
										@if($cliente->empresa)
											<th>
												Razón social
											</th>
											<td>
												<input class="form-control input-sm" type="text" name="razonSocial" value="{{$cliente->nombre}}">
											</td>
										@else
											<th>
												Nombre
											</th>
											<td>
												<input class="form-control input-sm" type="text" name="nombre" value="{{$cliente->nombre}}">
											</td>
										</tr>
										<tr>
											<th>
												Apellido
											</th>
											<td>
												<input class="form-control input-sm" type="text" name="apellido" value="{{$cliente->apellido}}">
											</td>
										<tr>
										<th>
											Cédula
										</th>
										<td>
											<input class="form-control input-sm" type="text" name="cedula" value="{{$cliente->cedula}}">
										</td>												
									</tr>										
										@endif												
									</tr>
									@if($cliente->empresa)
									<tr>
										<th>
											RIF
										</th>
										<td>
											<input class="form-control input-sm" type="text" name="rif" value="{{$cliente->rif}}">
										</td>												
									</tr>
									@endif
									
									<tr>
										<th>
											Mail
										</th>
										<td>
											<input class="form-control input-sm" type="text" name="mail" value="{{$cliente->mail}}">
										</td>												
									</tr>
									<tr>
										<th>
											Dirección
										</th>
										<td>
											<input class="form-control input-sm" type="text" name="direccion" value="{{$cliente->direccion}}">
										</td>												
									</tr>
									<tr>
										<th>
											Teléfono
										</th>
										<td>
											<input class="form-control input-sm" type="text" name="telefono" value="{{$cliente->telefono}}">
										</td>												
									</tr>
								</table>
								<input type="submit" name="" value="Guardar cambios" class="btn btn-primary btn-block">
							</div>
						</form>
					</div>
				</div>
			</div>

			<div class="modal-footer">
				
			</div>        
		</div>
	</div>
</div>
@endsection
