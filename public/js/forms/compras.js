$(document).ready(function (){
	var fechaEmision = new Date();
	var day = ("0" + fechaEmision.getDate()).slice(-2);
	var month = ("0" + (fechaEmision.getMonth() + 1)).slice(-2);
	fecha = fechaEmision.getFullYear()+"-"+(month)+"-"+(day);
	$("#txtFecha").val(fecha);
	$(".form_devolucion_contado").hide();
	$(".form_compra_contado").hide();
	$(".form_factura_credito").hide();
	$(".form_venta_contado").show();
	$(".cliente-required").prop('required',true);
	$(".proveedor-required").prop('required',false);
	
	actualizarTablaArticulos();

	$("#txtAgregarArticulo").focus();

	$( "#selectTipoComprobante" ).change(function() {
		var tipo_comprobante_id = $( "#selectTipoComprobante" ).val();
		switch(tipo_comprobante_id) {
			
			case "Credito":
				// Factura de venta a crédito
				$(".form_devolucion_contado").hide();
				$(".form_compra_contado").hide();
				$(".form_venta_contado").hide();
				$(".form_factura_credito").show();

				$(".cliente-required").prop('required',true);
				$(".factura-required").prop('required',true);
				$(".proveedor-required").prop('required',false);
				break;
		
			default:
				break;
		}
	});

	$("#txtAgregarArticulo").on('keyup', function(e){
		e.preventDefault();
		if(e.keyCode == 13){
			$("#btnAgregarArticulo").click();
		}
		var str = $("#txtAgregarArticulo").val();
		if(str != ""){
			//url = "{{ url('productos/buscar?texto=') }}" + str;
			url = buscar_prodcto_url + str;
			delay(function(){
				$.get(url , function( data ){
					$("#divData").html( data );
					var productos = data["productos"];
					//console.log(productos);
					if(productos.length == 0){
						$("#listaBusquedaProducto").html("");
					}else{
						$("#listaBusquedaProducto").html("");                        
						for (i = 0; i < productos.length; i++) { 
							//console.log(productos[i].codigo_barra)
							$("#listaBusquedaProducto").append(
								$('<option></option>').val(productos[i].codigo_barra).html(productos[i].descripcion + "," + productos[i].stock_actual + " unidades disponibles.")
							);
						}
					}				
				});
			}, 600);
		}else{
			$("#listaBusquedaProducto").html("");
		}
	});
	
	$('#btnAgregarArticulo').on('click', function(e) {
		e.preventDefault();
		var producto_codigo = $("#txtAgregarArticulo").val();
		//console.log(producto_codigo)
		if(producto_codigo.length > 0){
			//url = "{{ url('productos/buscar?texto=') }}" + producto_codigo;
			url = buscar_prodcto_url + producto_codigo;
			$.get(url , function( data ){
				console.log(data);
				agregarArticulo(data);
			});
		}
	});
	
	$("#formNuevoComprobante").on('submit', function(e){
		if(! confirm("¿Guardar comprobante?, una vez ingresado al sistema no podrá ser modificado.")){
			e.preventDefault();
		}
		var articulos = JSON.stringify(listadoArticulos);
		$("#hiddenListado").val(articulos);
		alert(requestData);
		//var url = "{{ url('comprobantes/vistaPrevia') }}";
		var url = comprobante_vistaprevia_url;
		var request;

		request = $.ajax({
			url: url,
			method: "POST",
			dataType: "json",
			data: { data: requestData }
		});
	});
	
	$(document).on('blur', '.td_cantidad', function() {
		var cantidad = $(this).val();
		var codigo = $(this).parents("tr").find(".td_codigo").html();		
		if(cantidad > $(this).prop('max')){			
			cantidad = $(this).prop('max');
			$(this).val(cantidad);
		}
		$(this).one('focus');
		modificarStock(codigo, cantidad);
	});

	$(document).on('blur', '.td_precio', function() {            
		var precio = $(this).val();
		var codigo = $(this).parents("tr").find(".td_codigo").html();
		precio = precio.replace(",", ".");
		modificarPrecio(codigo, precio);
		$(this).focus();
	});

	$('#btnAgregarCliente').on('click', function(e) {
		e.preventDefault();
		$("#hiddenCliente").val("");

		$("#txtCliente").val("");
		$("#txtDireccion").val("");
		$("#txtRut").val("");
		$("#txtCliente").prop( "disabled", false );
		//$("#txtDireccion").prop( "disabled", false );
		$("#txtRut").prop( "disabled", false );

		$("#txtBuscadorCliente").focus();
	});

	$('#btnBuscarCliente').on('click', function(e) {
		e.preventDefault();
		var str = $("#txtBuscadorCliente").val();
		//var url = "{{ url('clientes/buscar?texto=') }}" + str;
		var url = buscar_cliente_url + str;
		$.get(url , function( data ){			    
			var clientes = data["clientes"];
			$("#tablaClientes").html("");
			for(i=0; i < clientes.length; i++){
				var cliente_id = clientes[i]["id"];
				var cliente_nombre = clientes[i]["nombre"];

				var cliente_apellido = "";
				if(clientes[i]["apellido"] != null){
					var cliente_apellido = clientes[i]["apellido"];	
				}

				var cliente_rut = "-";
				if(clientes[i]["rif"] != null){
					var cliente_rut = clientes[i]["rif"];	
				}

				var cliente_mail = "-";
				if(clientes[i]["mail"] != null){
					var cliente_mail = clientes[i]["mail"];	
				}

				var cliente_direccion = "-";
				if(clientes[i]["direccion"] != null){
					var cliente_direccion = clientes[i]["direccion"];	
				}

				$("#tablaClientes").append(
					$('<tr></tr>').html(
						"<td class='td_cliente_id'>" 
							+ cliente_id
						+ "</td><td class='td_cliente_nombre'>"
							+ cliente_nombre + " " + cliente_apellido
						+ "</td><td class='td_cliente_rut'>"
							+ cliente_rut
						+ "</td><td class='td_cliente_direccion'>"
							+ cliente_direccion							
						+ "</td><td class='td_cliente_mail'>"
							+ cliente_mail
						+ "</td><td>"
							+ "<a class='btn-agregar-cliente btn btn-sm btn-block btn-link'>"
								+ '<i class="fa fa-share" aria-hidden="true"></i>'
							+ "</a>"
						+ "</td>"

					)
				);
			}
		});
	});

	$(document).on('click', '.btn-agregar-cliente', function() {
		var cliente_id = $(this).parents("tr").find(".td_cliente_id").html();
		var cliente_nombre = $(this).parents("tr").find(".td_cliente_nombre").html();			
		var cliente_direccion = $(this).parents("tr").find(".td_cliente_direccion").html();			
		var cliente_rut = $(this).parents("tr").find(".td_cliente_rut").html();			
		
		$("#hiddenCliente").val(cliente_id);

		$("#txtCliente").val(cliente_nombre);
		$("#txtCliente").prop( "disabled", true );
		$("#txtDireccion").val(cliente_direccion);
		$("#txtDireccion").prop( "disabled", true );
		$("#txtRif").val(cliente_rut);
		$("#txtRif").prop( "disabled", true );
		
		$("#btnOkModalAgregarCliente").click();
	});
});



var listadoArticulos = [
/*
   {'Id':'1','Username':'Ray','FatherName':'Thompson'},
   {'Id':'2','Username':'Steve','FatherName':'Johnson'}           
*/
] 
function agregarArticulo(data){

	if(data["productos"].length > 0){
		var producto = data["productos"][0];

		var producto_codigo = producto["codigo_barra"];
		var productoBuscado = buscarArticuloEnListado(producto_codigo);
		if( productoBuscado == null){
			var producto_stock = producto["stock_actual"];
			if(producto_stock > 0){
				var producto_nombre = producto["descripcion"];
				var producto_precio = producto["precio_costo"]; 
				
				var producto_cantidad = 1;
				listadoArticulos[listadoArticulos.length] = {
					'codigo':producto_codigo,
					'nombre': producto_nombre,
					'precio': producto_precio,
					'stock': producto_stock,
					'cantidad': producto_cantidad,
					'subTotal': (producto_precio * producto_cantidad),
					'total': (producto_precio * producto_cantidad + producto_precio * producto_cantidad).toFixed(2),
				};
			}
		}else{
			if(productoBuscado["cantidad"] < productoBuscado["stock"]){
				productoBuscado["cantidad"]++;                		
			}               	
		}
		actualizarTablaArticulos();
		$("#txtAgregarArticulo").val("");
	}
}




function modificarStock(codigo, cantidad){           
	var articulo = buscarArticuloEnListado(codigo);
	let iva = articulo["iva"];

	if(articulo != null){
		console.log
		articulo["cantidad"] = cantidad;
		articulo["subTotal"] = parseFloat(cantidad * articulo["precio"]);
		articulo["iva"] = parseFloat((cantidad * articulo["precio"] * iva /10)/2);
		articulo["total"] = parseFloat(articulo["subTotal"] + articulo["iva"]);

		actualizarTablaArticulos();
	}
}

function modificarPrecio(codigo, precio){           
	var articulo = buscarArticuloEnListado(codigo);
	if(articulo != null){
		articulo["precio"] = precio;
		articulo["subTotal"] = parseFloat(articulo["cantidad"] * precio);
		articulo["iva"] = 0;
		articulo["total"] = parseFloat(articulo["subTotal"] + articulo["iva"]);

		actualizarTablaArticulos();
	}
}

function buscarArticuloEnListado(codigo){
	var i = 0;            
	var articuloBuscado = null;
	while(i < listadoArticulos.length && articuloBuscado == null){
		if(listadoArticulos[i]["codigo"] == codigo){
			articuloBuscado = listadoArticulos[i];
		}
		i++;
	}
	return articuloBuscado;
}

function descartarArticulo(posicion){
	listadoArticulos.splice(posicion, 1);
	actualizarTablaArticulos();
}

function actualizarTablaArticulos(){
	$("#tablaProductos").html("");
	var resumen_sub_total = 0;
	var resumen_iva = 0;
	var resumen_total = 0;
	for(i=0; i < listadoArticulos.length; i++){
		$("#tablaProductos").append(
			$('<tr></tr>').html(
				"<td class='td_codigo'>" 
					+ listadoArticulos[i]["codigo"] 
				+ "</td><td>"
					+ listadoArticulos[i]["nombre"] 
				+ "</td><td>" 
					//+ listadoArticulos[i]["precio"] 
					+ "<input class='form-control input-sm td_precio' value="+ listadoArticulos[i]["precio"] + ">"
				+ "</td><td>"
					+ "<input type='number' class='form-control  td_cantidad' value="+ listadoArticulos[i]["cantidad"] + " max=" + + " >"
				
				+ "</td><td class='text-center'>"
					+ "<a class='btn btn-danger' style='color: #8a8686;' onclick='descartarArticulo(" + i + ");''><i class='fa fa-trash'></i></a>"
				+ "</td>"
			)                
		);
		resumen_sub_total += parseFloat(listadoArticulos[i]["subTotal"]);
	
	}
	$("#tablaResumen").html("");
	$("#tablaResumen").append(
		$('<tr></tr>').html(
			"<th width='120px'>Sub Total</th><td>"
			+ resumen_sub_total.toFixed(2)
			+ "</td>"
		)
	);
	$("#tablaResumen").append(
		$('<tr></tr>').html(
			"<th>Total</th><td>"
			+ resumen_sub_total.toFixed(2)
			+ "</td>"
		)
	);
}

var delay = (function(){
  var timer = 0;
  return function(callback, ms){
    clearTimeout (timer);
    timer = setTimeout(callback, ms);
  };
})();