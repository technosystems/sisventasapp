@extends('layouts.admin')
@section('title', 'Productos')
@section('content')

 <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">Detalle de Productos</h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/home') }}">Inicio</a>
                        </li>
                        <li class="breadcrumb-item"><a >General</a>
                        </li>
                        <li class="breadcrumb-item active"> Listado de productos
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div><br>
	<div class="row">
		<div class="col-md-12">
			<div class="card card-line-primary ">
				
				<div class="card-body">
				
					
					<div class="row">
							<div class="col-md-4">
								<legend>
									Detalle del producto
									@can('RegistraProducto')
									<span class="float-right">
										<a class="btn btn-link btn-sm" id="editCodigo" data-toggle="modal" data-target="#modalEditarProducto">
											<i class="fas fa-edit fa-lg" aria-hidden="true"></i>
										</a>
									</span>
									@endcan
								</legend>								
								<div class="form-group">
									<table class="table table-condensed table-striped table-bordered" width="100%">
										<tr>
											<th class="text-center th-b" colspan="2">Información general</th>
										</tr>
										<tr>
											<td width="30%">Código</td>
											<td width="70%">
												{{ $producto->codigo_barra }}
											</td>
										</tr>
										<tr>
											<td>Nombre</td>
											<td> 
												{{ $producto->descripcion }}
											</td>
										</tr>
										<tr>
											<td>Marca</td>
											<td> 
												{{ $producto->marca }}
											</td>												
										</tr>
										<tr>
											<td>Categoría</td>
											<td> 
												{{ $producto->categoria }}
											</td>
										</tr>
										<tr>
											<td>Descripción</td>
											 													
											<td title="{{$producto->descripcion}}">
														@if(strlen($producto->descripcion) > 20)
															{{ substr($producto->descripcion, 0, 20) . "..."}}
														@else
															{{ $producto->descripcion }}
														@endif
											   </td>
												
												
											
										</tr>
										<tr>
											<td>Precio de compra</td>
											<td>
												<!-- Se obtiene moneda predeterinada --> 
												${{ $producto->precio_costo }}
												
											</td>												
										</tr>

										<tr>
											<td>Precio venta</td>
											<td>
												<!-- Se obtiene moneda predeterinada --> 
												${{ $producto->precio_venta }}
												<span class="float-right">
													<a href="#formStock" class="btn btn-sm" id="{{$producto->codigo}}" data-toggle="modal" data-target="#modalHistoricoPrecios" onclick='$("#form_stock").attr("action", "/productos/{{$producto->codigo}}/ModificarStock");'  title="Histórico de precios de venta para este producto">
														<i class="fas fa-book" aria-hidden="true"></i>
													</a>
												</span>
											</td>												
										</tr>
										<tr>
											<td>Tasa del iva</td>
											<td> 
											  <span class="mr-2">({{ $config->iva }}%)</span>
											</td>
										</tr>
										
										
									
										<tr>
											<td>Stock</td>
											<td> 
												{{ $producto->stock_actual }}
												
											</td>
										</tr>
									
									</table>
								</div>								
								
							</div>
							<div class="col-md-8">
								<legend>Últimos movimientos</legend>
								<div class="col-md-12">
									<div class="table-responsive ">
										<table class="table table-condensed table-striped table-bordered" id="tableExport">
											<thead>
												<tr>
													<th class="text-center" width="70px">Fecha</th>
													<th class="text-center" width="70px">Hora</th>
													<th class="text-center" width="40px">Cant.</th>
													<th class="text-center">Descripción</th>
													<th class="text-center">Comprobante</th>
													<th class="text-center" width="75px">Vendedor</th>
												</tr>
											</thead>
											<tbody>
												@foreach($movimientos->sortByDesc('fecha') as $m)
													<tr>
														<td>{{ date_format( date_create($m->fecha), 'd/m/Y' ) }}</td>
														<td>{{ date_format( date_create($m->fecha), 'H:i:s' ) }}</td>
														<td align="center">{{ $m->cantidad}}</td>
														<td title="{{$m->descripcion}}">
															@if(strlen($m->descripcion) > 36)
																{{ substr($m->descripcion, 0, 36) . "..."}}
															@else
																{{ $m->descripcion }}
															@endif
														</td>
														<td class="text-center">
															@if($m->venta_id)
																<a href="#"  data-toggle="modal" data-target="#data-{{$m->venta_id}}">
																	Venta procesada
																</a>
																 <!--DETALLES--------------------------->
                                    <div class="modal fade" id="data-{{$m->venta_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                        <div class="modal-dialog" role="document" style="max-width: 800px">
                                            <div class="modal-content">
                                               <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Venta procesada</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="padding:0px">
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <?php
                                                    
                                                    $user = App\Models\User::where('id','=',$m->iduser)
                                                    ->first();

                                                    $detalle_venta = DB::table('detalle_ventas as d')
                                                    ->join('productos as p','d.idproducto','=','p.id')
                                                    ->select('p.descripcion','d.cantidad','d.precio_venta')
                                                    ->where('idventa','=',$m->venta_id)
                                                    ->get();
                                                    
                                                    ?>
                                                    
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
                                                                <td>${{$row->precio_venta}}</td>
                                                                <td><?php echo $row->precio_venta * $row->cantidad?></td>
                                                            </tr>
                                                        </tbody>
                                                    @endforeach
                                                    <tfoot class="thead-light">
                                                        <th colspan="3">
                                                            <b>Total:</b>
                                                        </th>
                                                        <th><?php  echo $row->precio_venta * $row->cantidad?></th>
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
														<td class="text-center">{{$m->usuario->name}}</td>
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
    

<div class="modal fade" id="modalHistoricoPrecios" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4>
					Histórico de precios de venta
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</h4>
			</div>
			<div class="modal-body">
				<div class="table-responsive">
					<table class="table table-condensed table-striped table-bordered">
						<thead>
							<tr>
								<th>Fecha</th>
								<th>Precio ($)</th>
								<th>Usuario</th>
							</tr>
						</thead>
						<tbody>
							@foreach($precios_historico as $p)
							<tr>
								<td>
									{{ date_format( date_create($p->fecha), 'd/m/Y' ) }}								
								</td>
								<td>$ {{ $p->precio }}</td>
								<td>{{ App\Models\User::where('id', $p->usuario_id)->first()->name }}</td>
							</tr>
							@endforeach
						</tbody>
					</table>					
				</div>
			</div>
			<div class="modal-footer">
			</div>
		</div>
	</div>
</div>
@endsection

@push('scripts')
<script type="text/javascript">	
	$(document).ready(function(){
		$('#form-borrar').on('submit', function(e) {			
			if(! confirm("¿Está seguro de que desea eliminar el producto?")){
				e.preventDefault();
			}
		});
	});

	$("#form_editar_producto").on('submit', function(e){    	
		var precio = $("#txtPrecio").val();
		precio = precio.replace(",", ".");      
		if(isNaN(precio)) {         
			e.preventDefault();
			alert("El precio ingresado no es válido.");
		}
	});
</script>

<script>
	$(document).ready(function() {

		

     form = $('#form_nuevo_producto');
     $(".form_factura_credito").hide();
     $('#nu_cantidad_tipo_pago').val(0);
     $('#selectFamiliaProducto').on("change", function(e) { //asigno el evento change u otro
    if ( $("#selectFamiliaProducto").val() == 2)
	    {
	    	
	      $(".form_factura_credito").show();
          


	    }
	else
	{
          $(".form_factura_credito").hide();
	}



    });



    });
   
</script>
<script type="text/javascript">
	//Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
</script>

@endpush