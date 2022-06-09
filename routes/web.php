<?php

Route::redirect('/', '/login');
Route::redirect('/dashboard', '/admin/dashboard');
Route::redirect('/home', '/admin/dashboard');
Route::redirect('/panel/contabilidad', '/admin/panel/contabilidad');


Auth::routes(['register' => false]);

Route::get('/productos/buscar', 'ProductoController@buscar'); 

Route::group([
    'prefix'     => 'admin',
    'as'         => 'admin.',
    'middleware' => ['auth'],
], function () {
      Route::get('/dashboard', 'HomeController@index')->name('dashboard.index');
      Route::resource('/usuario', 'UserController');
      Route::resource('roles',   'RolesController');
      Route::resource('permission', 'PermissionController');
      Route::resource('/logins', 'LoginController');
      Route::resource('/configuraciones', 'ConfiguracionesController');


#############################################################################################
#############################################################################################
#############################################################################################
#############################################################################################
#
#
#
#
#############################################################################################
################################# MOD REGISTRO DE REPARACIONES ##############################
#############################################################################################

  Route::resource('/reparaciones', 'ReparacionesController');
#
#
#
#
#
#############################################################################################
################################# MOD REGISTRO DE ESTADO DE SERVICIO ########################
#############################################################################################
#
  Route::resource('/estadoservicios', 'EstadoServicioController');
  
  Route::resource('/servicio', 'ServicioController');
  Route::get('/servicios/buscar', 'ServicioController@buscar');
#
#
#
#
#
#############################################################################################
################################# MOD REGISTRO DE ESTADO DE SERVICIO ########################
#############################################################################################

  Route::resource('/tipoequipo', 'TipoEquipoController');
#
#
#
#
#  
#############################################################################################
################################# MOD REGISTRO DE LISTA DE PRECIOS ##########################
#############################################################################################
#############################################################################################

//Route::resource('/precios', 'ListaDePrecioController');
#
#
#
# 
#
#############################################################################################
################################# MOD REGISTRO DE CAJAS #####################################
#############################################################################################
#############################################################################################

/**CONTABILIDAD */
Route::get('panel/contabilidad', 'ContabilidadController@index')->name('index.contabilidad');
Route::get('panel/abrir_caja', 'ContabilidadController@abrir_caja')->name('abrir_caja.contabilidad');
Route::post('panel/abrir_caja', 'ContabilidadController@store_abrir_caja')->name('store_abrir_caja.contabilidad');
Route::get('panel/cerrar_caja/{id}', 'ContabilidadController@cerrar_caja')->name('cerrar_caja.contabilidad');
Route::patch('panel/cerrar_caja/{id}', 'ContabilidadController@store_cerrar_caja')->name('store_cerrar_caja.contabilidad');

Route::get('panel/ganancias/mensual', 'ContabilidadController@semanal')->name('semanal.contabilidad');
Route::get('panel/margen/historial', 'ContabilidadController@historial')->name('historial.contabilidad');
Route::get('panel/caja/{codigo}/data', 'CajaController@data_caja')->name('data_caja.detalle');
#
#
#
#
#
#############################################################################################
################################# MOD REGISTRO DE LISTA DE VENTAS $##########################
#############################################################################################
#############################################################################################

Route::get('panel/venta/generar', 'VentaController@registro')->name('registro.venta');
Route::get('panel/venta/ganancia', 'VentaController@ganancia')->name('ganancia.venta');
Route::post('panel/venta/ganancias', 'VentaController@ganancias')->name('ganancias.venta');
Route::post('panel/venta/generar', 'VentaController@store')->name('store.venta');
Route::get('panel/ventas/historial', 'VentaController@open_gistorial')->name('open_gistorial.venta');
Route::get('panel/venta/factura/{id}', 'VentaController@factura')->name('factura.venta');
Route::get('panel/venta/detalles/{id}', 'VentaController@detalles')->name('detalles.venta');
Route::patch('panel/venta/{id}', 'VentaController@cancelar_venta')->name('cancelar_venta.venta');
Route::get('panel/venta/enviar/{id}', 'VentaController@enviar_correo')->name('enviar.venta');
Route::get('panel/venta/rendimiento', 'VentaController@grafico')->name('grafico.venta');
Route::get('panel/venta/vencimiento', 'VentaController@vencimientos')->name('ventas.vencimiento');
Route::get('/recibos/nuevo/{cliente_id}', 'VentaController@nuevoRecibo');
Route::post('/recibos/guardar', 'VentaController@guardarRecibo');



#
#
#
#
#
#############################################################################################
################################# MOD REGISTRO DE LISTA DE PRODUCTOS ########################
#############################################################################################
#############################################################################################


Route::resource('/productos', 'ProductoController');
Route::get('/producto/buscar', 'ProductoController@buscar'); 
Route::put('productos/guardar/{producto_id}', 'ProductoController@guardar');
Route::get('/productos/detalle/{codigo}', 'ProductoController@detalle');



#
#
#
#
#############################################################################################
################################# MOD REGISTRO DE CLIENTES #################################
#############################################################################################

Route::get('/clientes', 'ClientesController@index');
Route::get('/clientes/nuevo', 'ClientesController@create');
Route::post('/clientes/guardar', 'ClientesController@guardar');
Route::post('/clientes/guardar/{cliente_id}', 'ClientesController@guardar');
Route::post('/clientes/guardarajax', 'ClientesController@guardarajax');
Route::post('/clientes/guardarajax/{cliente_id}', 'ClientesController@guardarajax');
Route::get('/clientes/buscar', 'ClientesController@buscar');
Route::get('/clientes/detalle/{clienteId}', 'ClientesController@detalle');
Route::get('/clientes/borrar/{cliente_id}', 'ClientesController@borrar');
Route::get('/clientes/listado', 'ClientesController@clienteslistado');


#############################################################################################
#############################################################################################
#############################################################################################
#############################################################################################
#
#
#
#
#############################################################################################
################################# MOD REGISTRO DE PROVEEDORES ###############################
#############################################################################################
  
  Route::get('/proveedores', 'ProveedorController@index');
  Route::get('/proveedores/nuevo', 'ProveedorController@nuevo');
  Route::post('/proveedores/guardar', 'ProveedorController@guardar');
  Route::get('/proveedores/detalle/{proveedor_id}', 'ProveedorController@detalle');
  //Route::get('/indicadores/masVendidos/{mes}', 'IndicadoresController@masVendidos');
  Route::get('/proveedores/buscar', 'ProveedorController@buscar');
  Route::put('/proveedores/guardar/{proveedor_id}', 'ProveedorController@update');
  Route::get('/proveedores/borrar/{proveedor_id}', 'ProveedorController@borrar');
#
#
#
#
#############################################################################################
################################# MOD REGISTRO DE COMPRAS ###################################
#############################################################################################
  
  Route::get('/compras', 'CompraController@index');
  //Route::get('/compras', 'CompraController@create');
  Route::get('/compras/nuevo', 'CompraController@create');
  Route::post('/compras/guardar', 'CompraController@guardar')->name('store.compras');
  Route::get('/compras/detalle/{proveedor_id}', 'CompraController@detalle');
  //Route::get('/indicadores/masVendidos/{mes}', 'IndicadoresController@masVendidos');
  Route::get('/compras/buscar', 'CompraController@buscar');
  Route::put('/compras/guardar/{proveedor_id}', 'CompraController@update');
  Route::get('/compras/borrar/{proveedor_id}', 'CompraController@borrar');


  Route::get('panel/compras/vencimiento', 'CompraController@pagar')->name('compras.vencimiento');
  Route::get('/recibos/factura/compra/nuevo/{cliente_id}', 'CompraController@nuevoRecibo');
  Route::post('/recibos/factura/compras/guardar', 'CompraController@guardarRecibo');

#############################################################################################
#############################################################################################
#############################################################################################
#############################################################################################
#
#
#
#
#############################################################################################
################################# MOD REGISTRO DE MARCAS ####################################
#############################################################################################
  
Route::resource('/marcas', 'MarcaController');
Route::post('/marcas/guardarajax', 'MarcaController@guardarajax');
#############################################################################################
#############################################################################################
#############################################################################################
#############################################################################################
#
#
#
#
#############################################################################################
################################# MOD REGISTRO DE MODELOS ###################################
#############################################################################################

Route::resource('/modelos', 'ModelosController');
Route::post('/modelos/guardarajax', 'ModelosController@guardarajax');
#############################################################################################
#############################################################################################
#############################################################################################
#############################################################################################
#
#
#
#
#############################################################################################
################################# MOD REGISTRO DE TIPO DE REPARACIONES ######################
#############################################################################################


Route::resource('tiporeparaciones', 'TipoReparacionesController');


#############################################################################################
#############################################################################################
#############################################################################################
#############################################################################################
#
#
#
#
#############################################################################################
################################# MOD REGISTRO DE TIPO DE EQUIPOS ###########################
#############################################################################################


Route::resource('tipoequipos', 'TipoEquipoController');
Route::post('tipoequipos/guardarajax', 'TipoEquipoController@guardarajax');

#############################################################################################
#############################################################################################
#############################################################################################
#############################################################################################
#
#
#
#
#############################################################################################
################################# MOD REGISTRO DE PROVEEDORES ###############################
#############################################################################################
  
  Route::get('/ordenservicios', 'OrdenServicioController@index');
  Route::get('/clientes/{cliente_id}', 'OrdenServicioController@clientes');
  Route::get('/equipos/{marca_id}', 'OrdenServicioController@marca');
  Route::get('/marcas/{marca_id}/modelos', 'OrdenServicioController@modelos');
  Route::post('/ordenservicios/guardar', 'OrdenServicioController@guardar');
  Route::get('/ordenservicios/reparar', 'OrdenServicioController@reparar');
  Route::get('/ordenservicios/reparados', 'OrdenServicioController@reparados');
  Route::get('/ordenservicios/noreparados', 'OrdenServicioController@noreparados');
  Route::get('/ordenservicios/reincidencias', 'OrdenServicioController@reincidencia');
  Route::get('/ordenservicios/revisado', 'OrdenServicioController@revisado');
  Route::get('/ordenservicios/entregados', 'OrdenServicioController@entregado');
  Route::get('/ordenservicios/historial/{orden_id}', 'OrdenServicioController@historial');
  Route::put('/ordenservicios/guardar/{orden_id}', 'OrdenServicioController@editar');
  Route::get('/ordenservicios/nuevo', 'OrdenServicioController@nuevo');
  Route::get('/ordenservicios/imprimir/{orden_id}', 'OrdenServicioController@imprimir');
  Route::get('/ordenservicios/fotos/{orden_id}', 'OrdenServicioController@fotos');
  Route::post('/ordenservicios/fotos/guardar/{orden_id}', 'OrdenServicioController@guardarfoto');
#
#
#
#
#############################################################################################
#############################################################################################
#############################################################################################
#############################################################################################
#
#
#
#
#############################################################################################
################################# MOD REGISTRO DE PROVEEDORES ###############################
#############################################################################################
  
 // Route::resource('inventario', 'InventarioController');
  //Route::put('inventario/guardar/{producto_id}', 'InventarioController@guardar');

#
#
#
#
#############################################################################################
################################# MOD REGISTRO DE GASTOS  ###################################
#############################################################################################
/*CONFIG */
Route::get('panel/gastos', 'GastoController@index')->name('gastos.contabilidad');
Route::post('panel/gastos', 'GastoController@store')->name('store_gasto.contabilidad');

#
#
#
#
#############################################################################################
################################# MOD REGISTRO DE HRM #######################################
#############################################################################################



Route::resource('config/nomina', 'CNominaController');
Route::resource('retencion/nomina', 'RetencionNominaController');
Route::resource('departamentos', 'DepartamentoController');
Route::resource('empleados', 'EmpleadoController');
Route::get('pago/nomina', 'PagoController@nomina');
Route::get('pago/detalle/{pago}', 'PagoController@detalle');
Route::get('pago/imprimir/{pago}', 'PagoController@imprimir');
Route::put('empleados/bonificacion/{empleado}', 'EmpleadoController@bonificacion');
Route::put('empleados/deduccion/{empleado}', 'EmpleadoController@deduccion');
Route::get('empleados/calculos/{empleado}/detalle', 'EmpleadoController@detalle');
Route::post('pago/nomina/guardar', 'PagoController@guardarnomina')->name('nomina.store');
Route::post('pago/nomina/actualizar/{pago}', 'PagoController@updatenomina');
Route::get('/pagos/nomina/borrar/{cliente_id}', 'PagoController@borrarnomina');
Route::get('/empleado/vacaciones', 'VacacionesController@index');
Route::post('/empleado/vacaciones', 'VacacionesController@store')->name('vacaciones.store');
Route::post('/empleado/vacaciones/actualizar/{vacaciones}', 'VacacionesController@updatevacaciones');
 Route::get('estado/{estado_id}/municipios', 'SolicitudesController@municipios')
      ->name('estado.municipios');
/**/  Route::get('municipio/{municipio_id}/parroquias', 'SolicitudesController@parroquias')
      ->name('estado.municipios');



#
#
#
#
#############################################################################################
################################# MOD REGISTRO DE HRM #######################################
#############################################################################################


  Route::get('/pedido', 'PedidoController@index');
  Route::get('/pedido/create', 'PedidoController@nuevo');
  Route::post('/pedido/nuevo', 'PedidoController@guardar');
  Route::post('/pedido/editar', 'PedidoController@editar');
  Route::get('/pedido/{codigo}/detalle', 'PedidoController@detalle');
  Route::get('/pedido/{codigo}/editar', 'PedidoController@editar');
  Route::get('/pedido/imprimir/{codigo}', 'PedidoController@imprimir');


#
#
#
#
#############################################################################################
################################# MOD REGISTRO DE TASA ######################################
#############################################################################################  

  Route::resource('tasa', 'TasaController');


});
