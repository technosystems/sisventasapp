@extends('layouts.admin')
@section('title', 'Clientes')
@section('content')
<div class="container">
	<div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">Datos del Cliente</h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/home') }}">Inicio</a>
                        </li>
                        <li class="breadcrumb-item"><a >General</a>
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
				<div class="card-primary card-outline card-header">
					<h4>Detalle del cliente</h4>
				</div>
				<div class="card-body">
					
					<ul class="list-inline">
						<li class="list-inline-item">
							<a href="/" class="link_ruta">
								Inicio &nbsp; &nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i>
							</a>
						</li>
						<li class="list-inline-item">
							<a href="/clientes" class="link_ruta">
								Clientes &nbsp; &nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i>
							</a>
						</li>
						<li class="list-inline-item">
							<a href="/clientes/detalle/{{$cliente->id}}" class="link_ruta">
								{{$cliente->nombre}} {{$cliente->apellido}}
							</a>
						</li>
					</ul><br>
					
					<div class="row">
						
							<div class="col-md-4"><br>
								<legend>
									Datos del cliente
									
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
													{{$cliente->name}}
												</td>
											</tr>
													
											@endif												
										</tr>
										
									</table> 
								</div>								
							</div><br>
							<div class="col-md-8">
								<legend>Actividad del cliente</legend>
								<div class="col-md-12">
									<div class="table-responsive">
										<table width="100%" class="table table-condensed table-striped table-bordered">
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
													<tr>
														<td>{{ date_format(date_create($c->fechaEmision), 'd / m / Y' ) }}</td>
														<td class="text-center">
															Venta procesada
														</td>
														<td>
															{{ $c->descripcion }}
														</td>
														<td style="text-align: right;">
															$ {{ $c->total }}
														</td>
														<td class="text-center">
															@if($c->id)
																<a href="#"  data-toggle="modal" data-target="#data-{{$c->id}}">
																	Venta procesada
																</a>
																 <!--DETALLES--------------------------->
                                    <div class="modal fade" id="data-{{$c->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                        <div class="modal-dialog" role="document" style="max-width: 800px">
                                            <div class="modal-content">
                                               <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Venta procesada</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="padding:0px">
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <?php
                                                    
                                                    $user = App\Models\User::where('id','=',$c->iduser)
                                                    ->first();

                                                    $detalle_ventas = DB::table('detalle_ventas as d')
                                                    ->join('productos as p','d.idproducto','=','p.id')
                                                    ->select('p.descripcion','d.cantidad','d.precio_venta')
                                                    ->where('idventa','=',$c->id)
                                                    ->get();
                                                    
                                                    ?>
                                                    
                                                <table class="table table-responsive-sm table-hover table-outline mb-0 table-sm">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th class="text-center">Producto</th>
                                                            <th class="text-center">Subtotal</th>
                                                        </tr>
                                                    </thead>
                                                   
                                                        <tbody>
                                                            <tr>
                                                                <td>{{$c->descripcion}}</td>
                                                               
                                                                <td><?php echo $c->total?>$</td>
                                                            </tr>
                                                        </tbody>
                                                   
                                                    <tfoot class="thead-light">
                                                        <th>
                                                            <b>Total:</b>
                                                        </th>
                                                        <th><?php  echo $c->total?>$</th>
                                                    </tfoot>
                                                </table>
                                                <div class="modal-footer">
                                    
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--DETALLES--------------------------->
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
</div>
<div class="modal fade" id="modalEditarCliente" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4>
					Editar datos del cliente
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</h4>
			</div>

			<div class="modal-body">
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<form id="form_editar_cliente" class="form-horizontal" role="form" method="POST" action="/clientes/guardar">
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
