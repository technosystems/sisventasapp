<?php

use Illuminate\Database\Seeder;
use App\Models\Configuraciones;
use App\Models\CNomina; 
use App\Models\User; 
use App\Models\Facturas;
//use App\Models\Configuraciones;
use App\Models\Departamento;
use App\Models\Nacionalidades;
use App\Models\TipoDeSangre;
use App\Models\Genero;
use App\Models\Pais;
use App\Models\EstadoCivil;
use App\Models\GradoInstruccion;
use App\Models\Estados;
use App\Models\Municipios;
use App\Models\Parroquias;
use App\Models\TipoEmpleado;
use App\Models\RetencionNomina;
use App\Models\ConceptoNomina;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	

         $configuracion = new Configuraciones;
         $configuracion->titulo = 'SERVITECHNO C.A';
         $configuracion->logo = '6230aefd86ad0.png';
         $configuracion->marcas = 'Genérico,
                                  Faber Castle,
                                  Paper Form';

        $configuracion->categorias =  'Servicios';


         $configuracion->presentaciones = 'unid, caja,  packete, kg, ltrs';

         $configuracion->denomicaciones = 'Moneda de 25 centimos, Moneda de 50 centimos, Moneda de 1 Bs, Moneda de 5 Bs, Billete de 10 Bs, Billete de 20 Bs, Billete de 50 Bs, Billete de 100 Bs';

         $configuracion->currency = 'Bolívar digital';
         $configuracion->tipo_moneda = 'VES';  
         $configuracion->prefijo_moneda = 'Bs'; 
         $configuracion->cajas = 'Caja 1';  
         $configuracion->serie = '001';
         $configuracion->correlativo = '0000000';
         $configuracion->iva = '0';
         $configuracion->email = 'colorito@gmail.com';
         $configuracion->user_id = 1;

         $configuracion->save();


         $nomina =new CNomina();
         $nomina->dias_utilidades = '30';
         $nomina->disfrute_vacacional = '21';
         $nomina->bono_vacacional = '15';
         $nomina->dias_laborales = '20';
         $nomina->dias_habiles = '20';
         $nomina->dias_feriados = '2';
         $nomina->nu_lunes = '52';
         $nomina->dias_jornada_laboral = '7';
         $nomina->tipo_pago = 'Semanal';
         $nomina->porcentaje_pago = '23';
         $nomina->mes = 'Junio';
         $nomina->year = '2022';
         $nomina->save();



        \DB::table('tasas_iva')->insert([
            'nombre' => 'Básica',
            'tasa' => 0
        ]);

            


        \DB::table('tipo_gastos')->insert([
            'descripcion' => 'Pago de empleados',
            'user_id' => 1,
            'status' => 1

        ]);


        \DB::table('metodo_pagos')->insert([
            'name' => 'Efectivo',
            'user_id' => 1,
            'status' => 1

        ]);



        \DB::table('metodo_pagos')->insert([
            'name' => 'Depósito bancario',
            'user_id' => 1,
            'status' => 1

        ]);


        \DB::table('metodo_pagos')->insert([
            'name' => 'Cheque',
            'user_id' => 1,
            'status' => 1

        ]);


        \DB::table('retencion_nominas')->insert([
            'nomina_id' => 1,
            'descripcion' => 'Seguro Social',
            'valor' => '4'
        ]);


         \DB::table('retencion_nominas')->insert([
            'nomina_id' => 1,
            'descripcion' => 'Prestacional de Empleo ',
            'valor' => '0,50'
        ]);

        \DB::table('retencion_nominas')->insert([
            'nomina_id' => 1,
            'descripcion' => 'Prest. De Vivienda y Habitat (LPH)',
            'valor' => '1,00'
        ]);



        $departamento =new Departamento();
        $departamento->name = 'Ventas';
        $departamento->status = 1;
        $departamento->save();

        $departamento =new Departamento();
        $departamento->name = 'Seguridad';
        $departamento->status = 1;
        $departamento->save();

        $departamento =new Departamento();
        $departamento->name = 'Delivery';
        $departamento->status = 1;
        $departamento->save();

        $departamento =new Departamento();
        $departamento->name = 'Contabilidad';
        $departamento->status = 1;
        $departamento->save();

        $departamento =new Departamento();
        $departamento->name = 'Recursos Humanos';
        $departamento->status = 1;
        $departamento->save();

        



        \DB::table('tipo_gastos')->insert([
            'descripcion' => 'Pago del local',
            'user_id' => 1,
            'status' => 1

        ]);


        \DB::table('tipo_gastos')->insert([
            'descripcion' => 'Gasto de utensilios de limpieza',
            'user_id' => 1,
            'status' => 1

        ]);



        \DB::table('tipo_gastos')->insert([
            'descripcion' => 'Compra de mercancía',
            'user_id' => 1,
            'status' => 1

        ]);



        \DB::table('tipo_gastos')->insert([
            'descripcion' => 'Pago de empleados',
            'user_id' => 1,
            'status' => 1

        ]);


        \DB::table('tipo_gastos')->insert([
            'descripcion' => 'Pago de servicios públicos',
            'user_id' => 1,
            'status' => 1

        ]);
      



         $factura = new Facturas;
         $factura->direccion = 'Casigua el cubo calle campo rojo';
         $factura->nombre_comercial = 'Inversiones y distribuidora el rey David 2019. C.A.';
         $factura->razon_social = 'El rey David 2019. C.A';
         $factura->ruc = 'J-41298927-8';
         $factura->logo = 'logo_principal.png';
         $factura->save();



        \DB::table('denominacions')->insert([
            'denominacion' => 'Moneda de 25 centimos',
            'valor' => '0.50',
            'user_id'=> 1,
            
        ]);


        \DB::table('denominacions')->insert([
            'denominacion' => 'Moneda de 50 centimos',
            'valor' => '0.50',
            'user_id'=> 1,
            
        ]);

         \DB::table('denominacions')->insert([
            'denominacion' => 'Moneda de 1 Bs',
            'valor' => '1.00',
            'user_id'=> 1,
            
        ]);

         \DB::table('denominacions')->insert([
            'denominacion' => 'Billete de 5 Bs',
            'valor' => '5.00',
            'user_id'=> 1,
            
        ]);


        \DB::table('denominacions')->insert([
            'denominacion' => 'Billete de 10 Bs',
            'valor' => '10.00',
            'user_id'=> 1,
            
        ]);


         \DB::table('denominacions')->insert([
            'denominacion' => 'Billete de 20 Bs',
            'valor' => '20.00',
            'user_id'=> 1,
            
        ]);

        \DB::table('denominacions')->insert([
            'denominacion' => 'Billete de 50 Bs',
            'valor' => '50.00',
            'user_id'=> 1,
            
        ]);


        \DB::table('denominacions')->insert([
            'denominacion' => 'Billete de 100 Bs',
            'valor' => '100.00',
            'user_id'=> 1,
            
        ]);





        \DB::table('estado_servicios')->insert([
            'name' => 'Por Reparar',
            'status' => 1,
            'created_at' => now(),
        ]);


       \DB::table('estado_servicios')->insert([
            'name' => 'Reparado',
            'status' => 1,
            'created_at' => now(),
        ]);


       \DB::table('estado_servicios')->insert([
            'name' => 'Revisado',
            'status' => 1,
            'created_at' => now(),
        ]);

        
       \DB::table('estado_servicios')->insert([
            'name' => 'No Reparado',
            'status' => 1,
            'created_at' => now(),
        ]);

       \DB::table('estado_servicios')->insert([
            'name' => 'Reincidencia',
            'status' => 1,
            'created_at' => now(),
        ]);

       \DB::table('estado_servicios')->insert([
            'name' => 'Entregado, Reparado',
            'status' => 1,
            'created_at' => now(),
        ]);

       \DB::table('estado_servicios')->insert([
            'name' => 'Entregado, No Reparado',
            'status' => 1,
            'created_at' => now(),
        ]);


       \DB::table('tipo_equipos')->insert([
            'name' => 'SMARTPHONE',
            'status' => 1,
            'created_at' => now(),
            'user_id' => 1,
        ]);

        \DB::table('tipo_equipos')->insert([
            'name' => 'VIDEOJUEGO',
            'status' => 1,
            'created_at' => now(),
            'user_id' => 1,
        ]);

        \DB::table('tipo_equipos')->insert([
            'name' => 'CPU',
            'status' => 1,
            'created_at' => now(),
            'user_id' => 1,
        ]);

        \DB::table('tipo_equipos')->insert([
            'name' => 'CONSOLA VIDEOJUEGO',
            'status' => 1,
            'created_at' => now(),
            'user_id' => 1,
        ]);

        \DB::table('tipo_equipos')->insert([
            'name' => 'TABLET',
            'status' => 1,
            'created_at' => now(),
            'user_id' => 1,
        ]);

        \DB::table('tipo_reparaciones')->insert([
            'descripcion' => 'CAMBIO DE TOUCH',
            'fecha' => date('d/m/Y'),
            'status' => 1,
            'created_at' => now(),
            'user_id' => 1,
            
        ]);

        \DB::table('tipo_reparaciones')->insert([
            'descripcion' => 'CAMBIO DE DISPLAY',
            'fecha' => date('d/m/Y'),
            'status' => 1,
            'created_at' => now(),
            'user_id' => 1,
            
        ]);

        \DB::table('tipo_reparaciones')->insert([
            'descripcion' => 'CAMBIO DE BOCINAS',
            'fecha' => date('d/m/Y'),
            'status' => 1,
            'created_at' => now(),
            'user_id' => 1,
            
        ]);


        \DB::table('tipo_reparaciones')->insert([
            'descripcion' => 'CAMBIO DE CENTRO DE CARGA',
            'fecha' => date('d/m/Y'),
            'status' => 1,
            'created_at' => now(),
            'user_id' => 1,
            
        ]);

        \DB::table('tipo_reparaciones')->insert([
            'descripcion' => 'RESTAURACION DE SOFTWARE',
            'fecha' => date('d/m/Y'),
            'status' => 1,
            'created_at' => now(),
            'user_id' => 1,
            
        ]);


        \DB::table('tipo_reparaciones')->insert([
            'descripcion' => 'DESBLOQUEO DE SISTEMA',
            'fecha' => date('d/m/Y'),
            'status' => 1,
            'created_at' => now(),
            'user_id' => 1,
            
        ]);


        \DB::table('tipo_reparaciones')->insert([
            'descripcion' => 'IUIUIUIIUI',
            'fecha' => date('d/m/Y'),
            'status' => 1,
            'created_at' => now(),
            'user_id' => 1,
            
        ]);


        \DB::table('tipo_reparaciones')->insert([
            'descripcion' => 'JHJHJ',
            'fecha' => date('d/m/Y'),
            'status' => 1,
            'created_at' => now(),
            'user_id' => 1,
            
        ]);

        \DB::table('tipo_reparaciones')->insert([
            'descripcion' => 'HJHJHJHJHJ',
            'fecha' => date('d/m/Y'),
            'status' => 1,
            'created_at' => now(),
            'user_id' => 1,
            
        ]);


        \DB::table('tipo_reparaciones')->insert([
            'descripcion' => 'CAMBIO DE PANTALLA COMPLETA',
            'fecha' => date('d/m/Y'),
            'status' => 1,
            'created_at' => now(),
            'user_id' => 1,
            
        ]);


        \DB::table('tipo_reparaciones')->insert([
            'descripcion' => 'NIVEL COMPONENTES',
            'fecha' => date('d/m/Y'),
            'status' => 1,
            'created_at' => now(),
            'user_id' => 1,
            
        ]);


        \DB::table('tipo_reparaciones')->insert([
            'descripcion' => 'CENTRO DE CARGA',
            'fecha' => date('d/m/Y'),
            'status' => 1,
            'created_at' => now(),
            'user_id' => 1,
            
        ]);


        \DB::table('tipo_reparaciones')->insert([
            'descripcion' => 'DISPLAY COMPLETO',
            'fecha' => date('d/m/Y'),
            'status' => 1,
            'created_at' => now(),
            'user_id' => 1,
            
        ]);


        \DB::table('tipo_reparaciones')->insert([
            'descripcion' => 'CAMBIO DE AURICULAR',
            'fecha' => date('d/m/Y'),
            'status' => 1,
            'created_at' => now(),
            'user_id' => 1,
            
        ]);


         \DB::table('tipo_reparaciones')->insert([
            'descripcion' => 'CAMBIO DE AURICULAR',
            'fecha' => date('d/m/Y'),
            'status' => 1,
            'created_at' => now(),
            'user_id' => 1,
            
        ]);


         \DB::table('tipo_reparaciones')->insert([
            'descripcion' => 'CAMBIO DE MICROFONO',
            'fecha' => date('d/m/Y'),
            'status' => 1,
            'created_at' => now(),
            'user_id' => 1,
            
        ]);
















       /*\DB::table('productos')->insert([
                'descripcion' => 'Pendones',
                'codigo_barra' => '64885236-2',
                'precio_venta' => '241',
                //'precio_costo' => '90',           
                
                //'stock_actual' => '10',
              //  'stock_minimo' =>'0',
                'marca' =>'PAN',
                'categoria'=>'Servicios',
                'presentacion'=>'kg',
                'fecha_vencimiento' => '18/02/2022',
                
        ]);

       \DB::table('productos')->insert([
                'descripcion' => 'Carnets PVC',
                'codigo_barra' => '648851623-23',
                'precio_venta' => '241',
                //'precio_costo' => '90',           
                
                //'stock_actual' => '10',
              //  'stock_minimo' =>'0',
                'marca' =>'PAN',
                'categoria'=>'Servicios',
                'presentacion'=>'kg',
                'fecha_vencimiento' => '18/02/2022',
                
        ]);

       \DB::table('productos')->insert([
                'descripcion' => 'Publicidad',
                'codigo_barra' => '64881232516-23',
                'precio_venta' => '241',
                //'precio_costo' => '90',           
                
                //'stock_actual' => '10',
              //  'stock_minimo' =>'0',
                'marca' =>'PAN',
                'categoria'=>'Servicios',
                'presentacion'=>'kg',
                'fecha_vencimiento' => '18/02/2022',
                
        ]);

       \DB::table('productos')->insert([
                'descripcion' => 'Vallas',
                'codigo_barra' => '6488511316-21',
                'precio_venta' => '241',
                //'precio_costo' => '90',           
                
                //'stock_actual' => '10',
              //  'stock_minimo' =>'0',
                'marca' =>'PAN',
                'categoria'=>'Servicios',
                'presentacion'=>'kg',
                'fecha_vencimiento' => '18/02/2022',
                
        ]);

       \DB::table('productos')->insert([
                'descripcion' => 'Avisos',
                'codigo_barra' => '64834348516-3',
                'precio_venta' => '241',
                //'precio_costo' => '90',           
                
                //'stock_actual' => '10',
              //  'stock_minimo' =>'0',
                'marca' =>'PAN',
                'categoria'=>'Servicios',
                'presentacion'=>'kg',
                'fecha_vencimiento' => '18/02/2022',
                
        ]);

       \DB::table('productos')->insert([
                'descripcion' => 'Pancartas',
                'codigo_barra' => '6488343516-5',
                'precio_venta' => '241',
                //'precio_costo' => '90',           
                
                //'stock_actual' => '10',
              //  'stock_minimo' =>'0',
                'marca' =>'PAN',
                'categoria'=>'Servicios',
                'presentacion'=>'kg',
                'fecha_vencimiento' => '18/02/2022',
                
        ]);

       \DB::table('productos')->insert([
                'descripcion' => 'Microperforado',
                'codigo_barra' => '64883423516-44',
                'precio_venta' => '241',
                //'precio_costo' => '90',           
                
                //'stock_actual' => '10',
              //  'stock_minimo' =>'0',
                'marca' =>'PAN',
                'categoria'=>'Servicios',
                'presentacion'=>'kg',
                'fecha_vencimiento' => '18/02/2022',
                
        ]);

       \DB::table('productos')->insert([
                'descripcion' => 'Rotulosvinil',
                'codigo_barra' => '64881231516-32',
                'precio_venta' => '241',
                //'precio_costo' => '90',           
                
                //'stock_actual' => '10',
              //  'stock_minimo' =>'0',
                'marca' =>'PAN',
                'categoria'=>'Servicios',
                'presentacion'=>'kg',
                'fecha_vencimiento' => '18/02/2022',
                
        ]);

       \DB::table('productos')->insert([
                'descripcion' => 'Tarjetas de presentación',
                'codigo_barra' => '12312341-46',
                'precio_venta' => '241',
                //'precio_costo' => '90',           
                
                //'stock_actual' => '10',
              //  'stock_minimo' =>'0',
                'marca' =>'PAN',
                'categoria'=>'Servicios',
                'presentacion'=>'kg',
                'fecha_vencimiento' => '18/02/2022',
                
        ]);

       \DB::table('productos')->insert([
                'descripcion' => 'Diseño de logos',
                'codigo_barra' => '6488355316-53',
                'precio_venta' => '241',
                //'precio_costo' => '90',           
                
                //'stock_actual' => '10',
              //  'stock_minimo' =>'0',
                'marca' =>'PAN',
                'categoria'=>'Servicios',
                'presentacion'=>'kg',
                'fecha_vencimiento' => '18/02/2022',
                
        ]);

       \DB::table('productos')->insert([
                'descripcion' => 'Sublimación de gorras',
                'codigo_barra' => '648812312516-62',
                'precio_venta' => '241',
                //'precio_costo' => '90',           
                
                //'stock_actual' => '10',
              //  'stock_minimo' =>'0',
                'marca' =>'PAN',
                'categoria'=>'Servicios',
                'presentacion'=>'kg',
                'fecha_vencimiento' => '18/02/2022',
                
        ]);

       \DB::table('productos')->insert([
                'descripcion' => 'Sublimación de camisas',
                'codigo_barra' => '64885112316-34',
                'precio_venta' => '241',
                //'precio_costo' => '90',           
                
                //'stock_actual' => '10',
              //  'stock_minimo' =>'0',
                'marca' =>'PAN',
                'categoria'=>'Servicios',
                'presentacion'=>'kg',
                'fecha_vencimiento' => '18/02/2022',
                
        ]);

       \DB::table('productos')->insert([
                'descripcion' => 'Tazas personalizadas',
                'codigo_barra' => '64881234516-36',
                'precio_venta' => '241',
                //'precio_costo' => '90',           
                
                //'stock_actual' => '10',
              //  'stock_minimo' =>'0',
                'marca' =>'PAN',
                'categoria'=>'Servicios',
                'presentacion'=>'kg',
                'fecha_vencimiento' => '18/02/2022',
                
        ]);


       \DB::table('productos')->insert([
                'descripcion' => 'Sellos',
                'codigo_barra' => '6488511236-43',
                'precio_venta' => '241',
                //'precio_costo' => '90',           
                
                //'stock_actual' => '10',
              //  'stock_minimo' =>'0',
                'marca' =>'PAN',
                'categoria'=>'Servicios',
                'presentacion'=>'kg',
                'fecha_vencimiento' => '18/02/2022',
                
        ]);

       \DB::table('productos')->insert([
                'descripcion' => 'Chapas',
                'codigo_barra' => '6488454516-12',
                'precio_venta' => '241',
                //'precio_costo' => '90',           
                
                //'stock_actual' => '10',
              //  'stock_minimo' =>'0',
                'marca' =>'PAN',
                'categoria'=>'Servicios',
                'presentacion'=>'kg',
                'fecha_vencimiento' => '18/02/2022',
                
        ]);

       \DB::table('productos')->insert([
                'descripcion' => 'Llaveros',
                'codigo_barra' => '648843516-14',
                'precio_venta' => '241',
                //'precio_costo' => '90',           
                
                //'stock_actual' => '10',
              //  'stock_minimo' =>'0',
                'marca' =>'PAN',
                'categoria'=>'Servicios',
                'presentacion'=>'kg',
                'fecha_vencimiento' => '18/02/2022',
                
        ]);

       \DB::table('productos')->insert([
                'descripcion' => 'Foto Carnets',
                'codigo_barra' => '64881231516-15',
                'precio_venta' => '241',
                //'precio_costo' => '90',           
                
                //'stock_actual' => '10',
              //  'stock_minimo' =>'0',
                'marca' =>'PAN',
                'categoria'=>'Servicios',
                'presentacion'=>'kg',
                'fecha_vencimiento' => '18/02/2022',
                
        ]);

       \DB::table('productos')->insert([
                'descripcion' => 'Fondo negro',
                'codigo_barra' => '6488554516-16',
                'precio_venta' => '241',
                //'precio_costo' => '90',           
                
                //'stock_actual' => '10',
              //  'stock_minimo' =>'0',
                'marca' =>'PAN',
                'categoria'=>'Servicios',
                'presentacion'=>'kg',
                'fecha_vencimiento' => '18/02/2022',
                
        ]);

       \DB::table('productos')->insert([
                'descripcion' => 'Panfletos',
                'codigo_barra' => '64885161234-33',
                'precio_venta' => '241',
                //'precio_costo' => '90',           
                
                //'stock_actual' => '10',
              //  'stock_minimo' =>'0',
                'marca' =>'PAN',
                'categoria'=>'Servicios',
                'presentacion'=>'kg',
                'fecha_vencimiento' => '18/02/2022',
                
        ]);

       \DB::table('productos')->insert([
                'descripcion' => 'Volantes',
                'codigo_barra' => '6488553416-23',
                'precio_venta' => '241',
                //'precio_costo' => '90',           
                
                //'stock_actual' => '10',
              //  'stock_minimo' =>'0',
                'marca' =>'PAN',
                'categoria'=>'Servicios',
                'presentacion'=>'kg',
                'fecha_vencimiento' => '18/02/2022',
                
        ]);

       \DB::table('productos')->insert([
                'descripcion' => 'Folletos',
                'codigo_barra' => '6488512316-44',
                'precio_venta' => '241',
                //'precio_costo' => '90',           
                
                //'stock_actual' => '10',
              //  'stock_minimo' =>'0',
                'marca' =>'PAN',
                'categoria'=>'Servicios',
                'presentacion'=>'kg',
                'fecha_vencimiento' => '18/02/2022',
                
        ]);


        \DB::table('productos')->insert([
                'descripcion' => 'Fotocopias B/N',
                'codigo_barra' => '6488512416-57',
                'precio_venta' => '241',
                //'precio_costo' => '90',           
                
                //'stock_actual' => '10',
              //  'stock_minimo' =>'0',
                'marca' =>'PAN',
                'categoria'=>'Servicios',
                'presentacion'=>'kg',
                'fecha_vencimiento' => '18/02/2022',
                
        ]);

        \DB::table('productos')->insert([
                'descripcion' => 'Fotocopias a Color',
                'codigo_barra' => '6488512312316-72',
                'precio_venta' => '241',
                //'precio_costo' => '90',           
                
                //'stock_actual' => '10',
              //  'stock_minimo' =>'0',
                'marca' =>'PAN',
                'categoria'=>'Servicios',
                'presentacion'=>'kg',
                'fecha_vencimiento' => '18/02/2022',
                
        ]);
        */



        \DB::table('departamentos')->insert([
            'name' => 'Compras',
         
         ]);


        \DB::table('departamentos')->insert([
            'name' => 'Publicidad',
         
         ]);




        \DB::table('departamentos')->insert([
            'name' => 'Servicio médico',
         
         ]);


        \DB::table('departamentos')->insert([
            'name' => 'Mantenimiento',
         
         ]);



        $nationals = array(
            'Afgano', 'albanés', 'argelino', 'estadounidense', 'andorrano', 'angoleño', 'antiguo', 'argentino', 'armenio', 'australiano', 'austriaco', 'azerbaiyano', 'bahameño ',' Bahrein ',' Bangladesh ',' Barbados ',' Barbudanos ',' Batswana ',' Bielorruso ',' Belga ',' Beliceño ',' Beninés ',' Bután ',' Boliviano ',' Bosnio ', 'Brasileño', 'Británico', 'Bruneano', 'Búlgaro', 'Burkinés', 'Birmano', 'Burundés', 'Camboyano', 'Camerún', 'Canadiense', 'Caboverdiano', 'Centroafricano', 'Chadiano', 'chileno', 'chino', 'colombiano', 'comorano', 'congoleño', 'costarricense', 'croata', 'cubano', 'chipriota', 'checo', 'danés', ' Djibouti ',' dominicano ',' holandés ',' timorense oriental ',' ecuatoriano ',' egipcio ',' emiriano ',' ecuatoguineano ',' eritreo ',' estonio ',' etíope ',' fiyiano ',' Filipino ',' finlandés ',' francés ',' gabonés ',' gambiano ',' georgiano ',' alemán ',' ghanés ',' griego ',' granadino ',' guatemalteco ',' Guinea-Bissauan ',' Guineano ',' guyanés ',' haitiano ',' herzegovino ',' hondureño ',' húngaro ',' I-Kiribati ', 'Islandés', 'indio', 'indonesio', 'iraní', 'iraquí', 'irlandés', 'israelí', 'italiano', 'marfileño', 'jamaiquino', 'japonés', 'jordano', 'kazajo ',' Keniano ',' Kittiano y Nevisiano ',' Kuwaití ',' Kirguís ',' Laosiano ',' Letón ',' Libanés ',' Liberiano ',' Libio ',' Liechtensteiner ',' Lituano ',' Luxemburgués ',' Macedonio ',' malgache ',' malauí ',' malasio ',' maldivan ',' maliense ',' maltés ',' marshalés ',' mauritano ',' mauriciano ',' mexicano ',' micronesia ', 'Moldavo', 'Mónaco', 'Mongol', 'Marroquí', 'Mosotho', 'Motswana', 'Mozambique', 'Namibia', 'Nauru', 'Nepalí', 'Neozelandés', 'Nicaragüense', ' Nigeriano, nigerino, norcoreano, irlandés del norte, noruego, omaní, pakistaní, palauano, panameño, papua nuevo guineano, paraguayo, peruano','Polaco','Portugués', 'Qatarí', 'Rumano', 'Ruso', 'Ruandes', 'Santa Lucía', 'Salvadoreño', 'Samoano', 'San Marino', 'Santo Tomé', 'Saudita', 'Escocés' , 'Senegalés', 'Serbio', 'Seychelles', 'Sierra Leona', 'Singapur', 'Eslovaco', 'Esloveno', 'Islas Salomón', 'Somalí', 'Sudafricano', 'Surcoreano', ' Español ',' de Sri Lanka ',' sudanés ',' surinam ',' suazi ',' sueco ',' suizo ',' sirio ',' taiwanés ',' tayiko ',' tanzano ',' tailandés ',' togolés ',' Tongano ',' trinitense / tobagoniano ',' tunecino ',' turco ',' tuvaluano ',' ugandés ',' ucraniano ',' uruguayo ',' uzbeko ',' venezolano ',' vietnamita ',' galés ',' Yemenita ',' zambiano ',' zimbabuense '
        );

        foreach ($nationals as $n) {
            Nacionalidades::create(['name' => $n]);
        }

         $bgs = ['Sin recordar','O-', 'O+', 'A+', 'A-', 'B+', 'B-', 'AB+', 'AB-'];
        foreach($bgs as  $bg){
            TipoDeSangre::create(['name' => $bg,'status' => 1]);
        }



        $genero =new Genero();
        $genero->name       = 'Maculino';
        $genero->status     = 1;
        $genero->save();

        $genero =new Genero();
        $genero->name       = 'Femenino';
        $genero->status     = 1;
        $genero->save();



         $pais= new Pais();
        $pais->name ='Afganistán';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Albania';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Alemania';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Andorra';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Angola';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Antigua y Barbuda';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Arabia Saudita';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Argelia';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Argentina';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Armenia';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Australia';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Austria';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Azerbaiyán';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Bahamas';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Bangladés';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Barbados';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Baréin';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Bélgica';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Belice';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Benín';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Bielorrusia';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Birmania';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Bolivia';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Bosnia y Herzegovina';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Botsuana';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Brasil';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Brunéi';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Bulgaria';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Burkina Faso';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Burundi';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Bután';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Cabo Verde';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Camboya';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Camerún';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Canadá';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Catar';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Chad';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Chile';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'China';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Chipre';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Ciudad del Vaticano';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Colombia';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Comoras';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Corea del Norte';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Corea del Sur';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Costa de Marfil';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Costa Rica';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Croacia';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Cuba';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Dinamarca';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Dominica';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Ecuador';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Egipto';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'El Salvador';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Emiratos Árabes Unidos';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Eritrea';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Eslovaquia';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Eslovenia';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'España';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Estados Unidos';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Estonia';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Etiopía';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Filipinas';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Finlandia';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Fiyi';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Francia';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Gabón';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Gambia';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Georgia';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Ghana';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Granada';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Grecia';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Guatemala';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Guyana';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Guinea';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Guinea-Bisáu';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Guinea Ecuatorial';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Haití';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Honduras';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Hungría';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'India';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Indonesia';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Irak';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Irán';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Irlanda';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Islandia';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Islas Marshall';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Islas Salomón';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Israel';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Italia';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Jamaica';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Japón';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Jordania';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Kazajistán';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Kenia';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Kirguistán';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Kiribati';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Kuwait';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Laos';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Lesoto';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Letonia';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Líbano';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Liberia';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Libia';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Liechtenstein';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Lituania';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Luxemburgo';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Macedonia del Norte';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Madagascar';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Malasia';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Malaui';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Maldivas';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Malí';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Malta';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Marruecos';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Mauricio';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Mauritania';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'México';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Micronesia';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Moldavia';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Mónaco';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Mongolia';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Montenegro';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Mozambique';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Namibia';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Nauru';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Nepal';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Nicaragua';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Níger';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Nigeria';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Noruega';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Nueva Zelanda';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Omán';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Países Bajos';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Pakistán';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Palaos';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Panamá';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Papúa Nueva Guinea';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Paraguay';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Perú';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Polonia';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Portugal';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Reino Unido de Gran Bretaña e Irlanda del Norte';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'República Centroafricana';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'República Checa';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'República del Congo';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'República Democrática del Congo';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'República Dominicana';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'República Sudafricana';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Ruanda';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Rumanía';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Rusia';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Samoa';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'San Cristóbal y Nieves';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'San Marino';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'San Vicente y las Granadinas';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Santa Lucía';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Santo Tomé y Príncipe';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Senegal';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Serbia';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Seychelles';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Sierra Leona';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Singapur';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Siria';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Somalia';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Sri Lanka';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Suazilandia';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Sudán';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Sudán del Sur';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Suecia';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Suiza';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Surinam';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Tailandia';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Tanzania';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Tayikistán';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Timor Oriental';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Togo';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Tonga';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Trinidad y Tobago';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Túnez';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Turkmenistán';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Turquía';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Tuvalu';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Ucrania';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Uganda';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Uruguay';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Uzbekistán';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Vanuatu';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Venezuela';
        $pais->status = 1;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Vietnam';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Yemen';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Yibuti';
        $pais->status = 0;
        $pais->save();


        $pais= new Pais();
        $pais->name = 'Zambia';
        $pais->status = 0;
        $pais->save();

        $pais= new Pais();
        $pais->name = 'Zimbabue';
        $pais->status = 0;
        $pais->save();




        $estado = new EstadoCivil();
        $estado->name = 'Soltero(a)';
        $estado->status = 1;
        $estado->save();


        $estado = new EstadoCivil();
        $estado->name = 'Casado(a)';
        $estado->status = 1;
        $estado->save();


        $estado = new EstadoCivil();
        $estado->name = 'Vuido(a)';
        $estado->status = 1;
        $estado->save();


        $estado = new EstadoCivil();
        $estado->name = 'Divorciado(a)';
        $estado->status = 1;
        $estado->save();

         $grado = new GradoInstruccion();
        $grado->name = 'Primaria';
        $grado->status = 1;
        $grado->save();

        $grado = new GradoInstruccion();
        $grado->name = 'Bachillerato';
        $grado->status = 1;
        $grado->save();

        $grado = new GradoInstruccion();
        $grado->name = 'TSU';
        $grado->status = 1;
        $grado->save();


        $grado = new GradoInstruccion();
        $grado->name = 'Ingeniería';
        $grado->status = 1;
        $grado->save();

        $grado = new GradoInstruccion();
        $grado->name = 'Doctorado';
        $grado->status = 1;
        $grado->save();


       



       

        /* ESTADOS */
        Estados::create(array( 'id' => 1,'status'=>1, 'name' => 'Amazonas', 'iso_3166-2'=> 'VE-X' ));
        Estados::create(array( 'id' => 2,'status'=>1, 'name' => 'Anzoátegui', 'iso_3166-2'=> 'VE-B' ));
        Estados::create(array( 'id' => 3,'status'=>1, 'name' => 'Apure', 'iso_3166-2'=> 'VE-C' ));
        Estados::create(array( 'id' => 4,'status'=>1, 'name' => 'Aragua', 'iso_3166-2'=> 'VE-D' ));
        Estados::create(array( 'id' => 5,'status'=>1, 'name' => 'Barinas', 'iso_3166-2'=> 'VE-E' ));
        Estados::create(array( 'id' => 6,'status'=>1, 'name' => 'Bolívar', 'iso_3166-2'=> 'VE-F' ));
        Estados::create(array( 'id' => 7,'status'=>1, 'name' => 'Carabobo', 'iso_3166-2'=> 'VE-G' ));
        Estados::create(array( 'id' => 8,'status'=>1, 'name' => 'Cojedes', 'iso_3166-2'=> 'VE-H' ));
        Estados::create(array( 'id' => 9,'status'=>1, 'name' => 'Delta Amacuro', 'iso_3166-2'=> 'VE-Y' ));
        Estados::create(array( 'id' => 10,'status'=>1, 'name' => 'Falcón', 'iso_3166-2'=> 'VE-I' ));
        Estados::create(array( 'id' => 11,'status'=>1, 'name' => 'Guárico', 'iso_3166-2'=> 'VE-J' ));
        Estados::create(array( 'id' => 12,'status'=>1, 'name' => 'Lara', 'iso_3166-2'=> 'VE-K' ));
        Estados::create(array( 'id' => 13,'status'=>1, 'name' => 'Mérida', 'iso_3166-2'=> 'VE-L' ));
        Estados::create(array( 'id' => 14,'status'=>1, 'name' => 'Miranda', 'iso_3166-2'=> 'VE-M' ));
        Estados::create(array( 'id' => 15,'status'=>1, 'name' => 'Monagas', 'iso_3166-2'=> 'VE-N' ));
        Estados::create(array( 'id' => 16,'status'=>1, 'name' => 'Nueva Esparta', 'iso_3166-2'=> 'VE-O' ));
        Estados::create(array( 'id' => 17,'status'=>1, 'name' => 'Portuguesa', 'iso_3166-2'=> 'VE-P' ));
        Estados::create(array( 'id' => 18,'status'=>1, 'name' => 'Sucre', 'iso_3166-2'=> 'VE-R' ));
        Estados::create(array( 'id' => 19,'status'=>1, 'name' => 'Táchira', 'iso_3166-2'=> 'VE-S' ));
        Estados::create(array( 'id' => 20,'status'=>1, 'name' => 'Trujillo', 'iso_3166-2'=> 'VE-T' ));
        Estados::create(array( 'id' => 21,'status'=>1, 'name' => 'Vargas', 'iso_3166-2'=> 'VE-W' ));
        Estados::create(array( 'id' => 22,'status'=>1, 'name' => 'Yaracuy', 'iso_3166-2'=> 'VE-U' ));
        Estados::create(array( 'id' => 23,'status'=>1, 'name' => 'Zulia', 'iso_3166-2'=> 'VE-V' ));
        Estados::create(array( 'id' => 24,'status'=>1, 'name' => 'Distrito Capital', 'iso_3166-2'=> 'VE-A' ));
        Estados::create(array( 'id' => 25,'status'=>1, 'name' => 'Dependencias Federales', 'iso_3166-2'=> 'VE-Z' ));


        Municipios::create(array( 'id' => 1, 'status'=> 1, 'estado_id' => 1, 'municipio'=> 'Alto Orinoco' ));
        Municipios::create(array( 'id' => 2, 'status'=> 1, 'estado_id' => 1, 'municipio'=> 'Atabapo' ));
        Municipios::create(array( 'id' => 3, 'status'=> 1, 'estado_id' => 1, 'municipio'=> 'Atures' ));
        Municipios::create(array( 'id' => 4, 'status'=> 1, 'estado_id' => 1, 'municipio'=> 'Autana' ));
        Municipios::create(array( 'id' => 5, 'status'=> 1, 'estado_id' => 1, 'municipio'=> 'Manapiare' ));
        Municipios::create(array( 'id' => 6, 'status'=> 1, 'estado_id' => 1, 'municipio'=> 'Maroa' ));
        Municipios::create(array( 'id' => 7, 'status'=> 1, 'estado_id' => 1, 'municipio'=> 'Río Negro' ));
        Municipios::create(array( 'id' => 8, 'status'=> 1, 'estado_id' => 2, 'municipio'=> 'Anaco' ));
        Municipios::create(array( 'id' => 9, 'status'=> 1, 'estado_id' => 2, 'municipio'=> 'Aragua' ));
        Municipios::create(array( 'id' => 10, 'status'=> 1, 'estado_id' => 2, 'municipio'=> 'Manuel Ezequiel Bruzual' ));
        Municipios::create(array( 'id' => 11, 'status'=> 1, 'estado_id' => 2, 'municipio'=> 'Diego Bautista Urbaneja' ));
        Municipios::create(array( 'id' => 12, 'status'=> 1, 'estado_id' => 2, 'municipio'=> 'Fernando Peñalver' ));
        Municipios::create(array( 'id' => 13, 'status'=> 1, 'estado_id' => 2, 'municipio'=> 'Francisco Del Carmen Carvajal' ));
        Municipios::create(array( 'id' => 14, 'status'=> 1, 'estado_id' => 2, 'municipio'=> 'General Sir Arthur McGregor' ));
        Municipios::create(array( 'id' => 15, 'status'=> 1, 'estado_id' => 2, 'municipio'=> 'Guanta' ));
        Municipios::create(array( 'id' => 16, 'status'=> 1, 'estado_id' => 2, 'municipio'=> 'Independencia' ));
        Municipios::create(array( 'id' => 17, 'status'=> 1, 'estado_id' => 2, 'municipio'=> 'José Gregorio Monagas' ));
        Municipios::create(array( 'id' => 18, 'status'=> 1, 'estado_id' => 2, 'municipio'=> 'Juan Antonio Sotillo' ));
        Municipios::create(array( 'id' => 19, 'status'=> 1, 'estado_id' => 2, 'municipio'=> 'Juan Manuel Cajigal' ));
        Municipios::create(array( 'id' => 20, 'status'=> 1, 'estado_id' => 2, 'municipio'=> 'Libertad' ));
        Municipios::create(array( 'id' => 21, 'status'=> 1, 'estado_id' => 2, 'municipio'=> 'Francisco de Miranda' ));
        Municipios::create(array( 'id' => 22, 'status'=> 1, 'estado_id' => 2, 'municipio'=> 'Pedro María Freites' ));
        Municipios::create(array( 'id' => 23, 'status'=> 1, 'estado_id' => 2, 'municipio'=> 'Píritu' ));
        Municipios::create(array( 'id' => 24, 'status'=> 1, 'estado_id' => 2, 'municipio'=> 'San José de Guanipa' ));
        Municipios::create(array( 'id' => 25, 'status'=> 1, 'estado_id' => 2, 'municipio'=> 'San Juan de Capistrano' ));
        Municipios::create(array( 'id' => 26, 'status'=> 1, 'estado_id' => 2, 'municipio'=> 'Santa Ana' ));
        Municipios::create(array( 'id' => 27, 'status'=> 1, 'estado_id' => 2, 'municipio'=> 'Simón Bolívar' ));
        Municipios::create(array( 'id' => 28, 'status'=> 1, 'estado_id' => 2, 'municipio'=> 'Simón Rodríguez' ));
        Municipios::create(array( 'id' => 29, 'status'=> 1, 'estado_id' => 3, 'municipio'=> 'Achaguas' ));
        Municipios::create(array( 'id' => 30, 'status'=> 1, 'estado_id' => 3, 'municipio'=> 'Biruaca' ));
        Municipios::create(array( 'id' => 31, 'status'=> 1, 'estado_id' => 3, 'municipio'=> 'Muñóz' ));
        Municipios::create(array( 'id' => 32, 'status'=> 1, 'estado_id' => 3, 'municipio'=> 'Páez' ));
        Municipios::create(array( 'id' => 33, 'status'=> 1, 'estado_id' => 3, 'municipio'=> 'Pedro Camejo' ));
        Municipios::create(array( 'id' => 34, 'status'=> 1, 'estado_id' => 3, 'municipio'=> 'Rómulo Gallegos' ));
        Municipios::create(array( 'id' => 35, 'status'=> 1, 'estado_id' => 3, 'municipio'=> 'San Fernando' ));
        Municipios::create(array( 'id' => 36, 'status'=> 1, 'estado_id' => 4, 'municipio'=> 'Atanasio Girardot' ));
        Municipios::create(array( 'id' => 37, 'status'=> 1, 'estado_id' => 4, 'municipio'=> 'Bolívar' ));
        Municipios::create(array( 'id' => 38, 'status'=> 1, 'estado_id' => 4, 'municipio'=> 'Camatagua' ));
        Municipios::create(array( 'id' => 39, 'status'=> 1, 'estado_id' => 4, 'municipio'=> 'Francisco Linares Alcántara' ));
        Municipios::create(array( 'id' => 40, 'status'=> 1, 'estado_id' => 4, 'municipio'=> 'José Ángel Lamas' ));
        Municipios::create(array( 'id' => 41, 'status'=> 1, 'estado_id' => 4, 'municipio'=> 'José Félix Ribas' ));
        Municipios::create(array( 'id' => 42, 'status'=> 1, 'estado_id' => 4, 'municipio'=> 'José Rafael Revenga' ));
        Municipios::create(array( 'id' => 43, 'status'=> 1, 'estado_id' => 4, 'municipio'=> 'Libertador' ));
        Municipios::create(array( 'id' => 44, 'status'=> 1, 'estado_id' => 4, 'municipio'=> 'Mario Briceño Iragorry' ));
        Municipios::create(array( 'id' => 45, 'status'=> 1, 'estado_id' => 4, 'municipio'=> 'Ocumare de la Costa de Oro' ));
        Municipios::create(array( 'id' => 46, 'status'=> 1, 'estado_id' => 4, 'municipio'=> 'San Casimiro' ));
        Municipios::create(array( 'id' => 47, 'status'=> 1, 'estado_id' => 4, 'municipio'=> 'San Sebastián' ));
        Municipios::create(array( 'id' => 48, 'status'=> 1, 'estado_id' => 4, 'municipio'=> 'Santiago Mariño' ));
        Municipios::create(array( 'id' => 49, 'status'=> 1, 'estado_id' => 4, 'municipio'=> 'Santos Michelena' ));
        Municipios::create(array( 'id' => 50, 'status'=> 1, 'estado_id' => 4, 'municipio'=> 'Sucre' ));
        Municipios::create(array( 'id' => 51, 'status'=> 1, 'estado_id' => 4, 'municipio'=> 'Tovar' ));
        Municipios::create(array( 'id' => 52, 'status'=> 1, 'estado_id' => 4, 'municipio'=> 'Urdaneta' ));
        Municipios::create(array( 'id' => 53, 'status'=> 1, 'estado_id' => 4, 'municipio'=> 'Zamora' ));
        Municipios::create(array( 'id' => 54, 'status'=> 1, 'estado_id' => 5, 'municipio'=> 'Alberto Arvelo Torrealba' ));
        Municipios::create(array( 'id' => 55, 'status'=> 1, 'estado_id' => 5, 'municipio'=> 'Andrés Eloy Blanco' ));
        Municipios::create(array( 'id' => 56, 'status'=> 1, 'estado_id' => 5, 'municipio'=> 'Antonio José de Sucre' ));
        Municipios::create(array( 'id' => 57, 'status'=> 1, 'estado_id' => 5, 'municipio'=> 'Arismendi' ));
        Municipios::create(array( 'id' => 58, 'status'=> 1, 'estado_id' => 5, 'municipio'=> 'Barinas' ));
        Municipios::create(array( 'id' => 59, 'status'=> 1, 'estado_id' => 5, 'municipio'=> 'Bolívar' ));
        Municipios::create(array( 'id' => 60, 'status'=> 1, 'estado_id' => 5, 'municipio'=> 'Cruz Paredes' ));
        Municipios::create(array( 'id' => 61, 'status'=> 1, 'estado_id' => 5, 'municipio'=> 'Ezequiel Zamora' ));
        Municipios::create(array( 'id' => 62, 'status'=> 1, 'estado_id' => 5, 'municipio'=> 'Obispos' ));
        Municipios::create(array( 'id' => 63, 'status'=> 1, 'estado_id' => 5, 'municipio'=> 'Pedraza' ));
        Municipios::create(array( 'id' => 64, 'status'=> 1, 'estado_id' => 5, 'municipio'=> 'Rojas' ));
        Municipios::create(array( 'id' => 65, 'status'=> 1, 'estado_id' => 5, 'municipio'=> 'Sosa' ));
        Municipios::create(array( 'id' => 66, 'status'=> 1, 'estado_id' => 6, 'municipio'=> 'Caroní' ));
        Municipios::create(array( 'id' => 67, 'status'=> 1, 'estado_id' => 6, 'municipio'=> 'Cedeño' ));
        Municipios::create(array( 'id' => 68, 'status'=> 1, 'estado_id' => 6, 'municipio'=> 'El Callao' ));
        Municipios::create(array( 'id' => 69, 'status'=> 1, 'estado_id' => 6, 'municipio'=> 'Gran Sabana' ));
        Municipios::create(array( 'id' => 70, 'status'=> 1, 'estado_id' => 6, 'municipio'=> 'Heres' ));
        Municipios::create(array( 'id' => 71, 'status'=> 1, 'estado_id' => 6, 'municipio'=> 'Piar' ));
        Municipios::create(array( 'id' => 72, 'status'=> 1, 'estado_id' => 6, 'municipio'=> 'Angostura (Raúl Leoni)' ));
        Municipios::create(array( 'id' => 73, 'status'=> 1, 'estado_id' => 6, 'municipio'=> 'Roscio' ));
        Municipios::create(array( 'id' => 74, 'status'=> 1, 'estado_id' => 6, 'municipio'=> 'Sifontes' ));
        Municipios::create(array( 'id' => 75, 'status'=> 1, 'estado_id' => 6, 'municipio'=> 'Sucre' ));
        Municipios::create(array( 'id' => 76, 'status'=> 1, 'estado_id' => 6, 'municipio'=> 'Padre Pedro Chien' ));
        Municipios::create(array( 'id' => 77, 'status'=> 1, 'estado_id' => 7, 'municipio'=> 'Bejuma' ));
        Municipios::create(array( 'id' => 78, 'status'=> 1, 'estado_id' => 7, 'municipio'=> 'Carlos Arvelo' ));
        Municipios::create(array( 'id' => 79, 'status'=> 1, 'estado_id' => 7, 'municipio'=> 'Diego Ibarra' ));
        Municipios::create(array( 'id' => 80, 'status'=> 1, 'estado_id' => 7, 'municipio'=> 'Guacara' ));
        Municipios::create(array( 'id' => 81, 'status'=> 1, 'estado_id' => 7, 'municipio'=> 'Juan José Mora' ));
        Municipios::create(array( 'id' => 82, 'status'=> 1, 'estado_id' => 7, 'municipio'=> 'Libertador' ));
        Municipios::create(array( 'id' => 83, 'status'=> 1, 'estado_id' => 7, 'municipio'=> 'Los Guayos' ));
        Municipios::create(array( 'id' => 84, 'status'=> 1, 'estado_id' => 7, 'municipio'=> 'Miranda' ));
        Municipios::create(array( 'id' => 85, 'status'=> 1, 'estado_id' => 7, 'municipio'=> 'Montalbán' ));
        Municipios::create(array( 'id' => 86, 'status'=> 1, 'estado_id' => 7, 'municipio'=> 'Naguanagua' ));
        Municipios::create(array( 'id' => 87, 'status'=> 1, 'estado_id' => 7, 'municipio'=> 'Puerto Cabello' ));
        Municipios::create(array( 'id' => 88, 'status'=> 1, 'estado_id' => 7, 'municipio'=> 'San Diego' ));
        Municipios::create(array( 'id' => 89, 'status'=> 1, 'estado_id' => 7, 'municipio'=> 'San Joaquín' ));
        Municipios::create(array( 'id' => 90, 'status'=> 1, 'estado_id' => 7, 'municipio'=> 'Valencia' ));
        Municipios::create(array( 'id' => 91, 'status'=> 1, 'estado_id' => 8, 'municipio'=> 'Anzoátegui' ));
        Municipios::create(array( 'id' => 92, 'status'=> 1, 'estado_id' => 8, 'municipio'=> 'Tinaquillo' ));
        Municipios::create(array( 'id' => 93, 'status'=> 1, 'estado_id' => 8, 'municipio'=> 'Girardot' ));
        Municipios::create(array( 'id' => 94, 'status'=> 1, 'estado_id' => 8, 'municipio'=> 'Lima Blanco' ));
        Municipios::create(array( 'id' => 95, 'status'=> 1, 'estado_id' => 8, 'municipio'=> 'Pao de San Juan Bautista' ));
        Municipios::create(array( 'id' => 96, 'status'=> 1, 'estado_id' => 8, 'municipio'=> 'Ricaurte' ));
        Municipios::create(array( 'id' => 97, 'status'=> 1, 'estado_id' => 8, 'municipio'=> 'Rómulo Gallegos' ));
        Municipios::create(array( 'id' => 98, 'status'=> 1, 'estado_id' => 8, 'municipio'=> 'San Carlos' ));
        Municipios::create(array( 'id' => 99, 'status'=> 1, 'estado_id' => 8, 'municipio'=> 'Tinaco' ));
        Municipios::create(array( 'id' => 100, 'status'=> 1, 'estado_id' => 9, 'municipio'=> 'Antonio Díaz' ));
        Municipios::create(array( 'id' => 101, 'status'=> 1, 'estado_id' => 9, 'municipio'=> 'Casacoima' ));
        Municipios::create(array( 'id' => 102, 'status'=> 1, 'estado_id' => 9, 'municipio'=> 'Pedernales' ));
        Municipios::create(array( 'id' => 103, 'status'=> 1, 'estado_id' => 9, 'municipio'=> 'Tucupita' ));
        Municipios::create(array( 'id' => 104, 'status'=> 1, 'estado_id' => 10, 'municipio'=> 'Acosta' ));
        Municipios::create(array( 'id' => 105, 'status'=> 1, 'estado_id' => 10, 'municipio'=> 'Bolívar' ));
        Municipios::create(array( 'id' => 106, 'status'=> 1, 'estado_id' => 10, 'municipio'=> 'Buchivacoa' ));
        Municipios::create(array( 'id' => 107, 'status'=> 1, 'estado_id' => 10, 'municipio'=> 'Cacique Manaure' ));
        Municipios::create(array( 'id' => 108, 'status'=> 1, 'estado_id' => 10, 'municipio'=> 'Carirubana' ));
        Municipios::create(array( 'id' => 109, 'status'=> 1, 'estado_id' => 10, 'municipio'=> 'Colina' ));
        Municipios::create(array( 'id' => 110, 'status'=> 1, 'estado_id' => 10, 'municipio'=> 'Dabajuro' ));
        Municipios::create(array( 'id' => 111, 'status'=> 1, 'estado_id' => 10, 'municipio'=> 'Democracia' ));
        Municipios::create(array( 'id' => 112, 'status'=> 1, 'estado_id' => 10, 'municipio'=> 'Falcón' ));
        Municipios::create(array( 'id' => 113, 'status'=> 1, 'estado_id' => 10, 'municipio'=> 'Federación' ));
        Municipios::create(array( 'id' => 114, 'status'=> 1, 'estado_id' => 10, 'municipio'=> 'Jacura' ));
        Municipios::create(array( 'id' => 115, 'status'=> 1, 'estado_id' => 10, 'municipio'=> 'José Laurencio Silva' ));
        Municipios::create(array( 'id' => 116, 'status'=> 1, 'estado_id' => 10, 'municipio'=> 'Los Taques' ));
        Municipios::create(array( 'id' => 117, 'status'=> 1, 'estado_id' => 10, 'municipio'=> 'Mauroa' ));
        Municipios::create(array( 'id' => 118, 'status'=> 1, 'estado_id' => 10, 'municipio'=> 'Miranda' ));
        Municipios::create(array( 'id' => 119, 'status'=> 1, 'estado_id' => 10, 'municipio'=> 'Monseñor Iturriza' ));
        Municipios::create(array( 'id' => 120, 'status'=> 1, 'estado_id' => 10, 'municipio'=> 'Palmasola' ));
        Municipios::create(array( 'id' => 121, 'status'=> 1, 'estado_id' => 10, 'municipio'=> 'Petit' ));
        Municipios::create(array( 'id' => 122, 'status'=> 1, 'estado_id' => 10, 'municipio'=> 'Píritu' ));
        Municipios::create(array( 'id' => 123, 'status'=> 1, 'estado_id' => 10, 'municipio'=> 'San Francisco' ));
        Municipios::create(array( 'id' => 124, 'status'=> 1, 'estado_id' => 10, 'municipio'=> 'Sucre' ));
        Municipios::create(array( 'id' => 125, 'status'=> 1, 'estado_id' => 10, 'municipio'=> 'Tocópero' ));
        Municipios::create(array( 'id' => 126, 'status'=> 1, 'estado_id' => 10, 'municipio'=> 'Unión' ));
        Municipios::create(array( 'id' => 127, 'status'=> 1, 'estado_id' => 10, 'municipio'=> 'Urumaco' ));
        Municipios::create(array( 'id' => 128, 'status'=> 1, 'estado_id' => 10, 'municipio'=> 'Zamora' ));
        Municipios::create(array( 'id' => 129, 'status'=> 1, 'estado_id' => 11, 'municipio'=> 'Camaguán' ));
        Municipios::create(array( 'id' => 130, 'status'=> 1, 'estado_id' => 11, 'municipio'=> 'Chaguaramas' ));
        Municipios::create(array( 'id' => 131, 'status'=> 1, 'estado_id' => 11, 'municipio'=> 'El Socorro' ));
        Municipios::create(array( 'id' => 132, 'status'=> 1, 'estado_id' => 11, 'municipio'=> 'José Félix Ribas' ));
        Municipios::create(array( 'id' => 133, 'status'=> 1, 'estado_id' => 11, 'municipio'=> 'José Tadeo Monagas' ));
        Municipios::create(array( 'id' => 134, 'status'=> 1, 'estado_id' => 11, 'municipio'=> 'Juan Germán Roscio' ));
        Municipios::create(array( 'id' => 135, 'status'=> 1, 'estado_id' => 11, 'municipio'=> 'Julián Mellado' ));
        Municipios::create(array( 'id' => 136, 'status'=> 1, 'estado_id' => 11, 'municipio'=> 'Las Mercedes' ));
        Municipios::create(array( 'id' => 137, 'status'=> 1, 'estado_id' => 11, 'municipio'=> 'Leonardo Infante' ));
        Municipios::create(array( 'id' => 138, 'status'=> 1, 'estado_id' => 11, 'municipio'=> 'Pedro Zaraza' ));
        Municipios::create(array( 'id' => 139, 'status'=> 1, 'estado_id' => 11, 'municipio'=> 'Ortíz' ));
        Municipios::create(array( 'id' => 140, 'status'=> 1, 'estado_id' => 11, 'municipio'=> 'San Gerónimo de Guayabal' ));
        Municipios::create(array( 'id' => 141, 'status'=> 1, 'estado_id' => 11, 'municipio'=> 'San José de Guaribe' ));
        Municipios::create(array( 'id' => 142, 'status'=> 1, 'estado_id' => 11, 'municipio'=> 'Santa María de Ipire' ));
        Municipios::create(array( 'id' => 143, 'status'=> 1, 'estado_id' => 11, 'municipio'=> 'Sebastián Francisco de Miranda' ));
        Municipios::create(array( 'id' => 144, 'status'=> 1, 'estado_id' => 12, 'municipio'=> 'Andrés Eloy Blanco' ));
        Municipios::create(array( 'id' => 145, 'status'=> 1, 'estado_id' => 12, 'municipio'=> 'Crespo' ));
        Municipios::create(array( 'id' => 146, 'status'=> 1, 'estado_id' => 12, 'municipio'=> 'Iribarren' ));
        Municipios::create(array( 'id' => 147, 'status'=> 1, 'estado_id' => 12, 'municipio'=> 'Jiménez' ));
        Municipios::create(array( 'id' => 148, 'status'=> 1, 'estado_id' => 12, 'municipio'=> 'Morán' ));
        Municipios::create(array( 'id' => 149, 'status'=> 1, 'estado_id' => 12, 'municipio'=> 'Palavecino' ));
        Municipios::create(array( 'id' => 150, 'status'=> 1, 'estado_id' => 12, 'municipio'=> 'Simón Planas' ));
        Municipios::create(array( 'id' => 151, 'status'=> 1, 'estado_id' => 12, 'municipio'=> 'Torres' ));
        Municipios::create(array( 'id' => 152, 'status'=> 1, 'estado_id' => 12, 'municipio'=> 'Urdaneta' ));
        Municipios::create(array( 'id' => 179, 'status'=> 1, 'estado_id' => 13, 'municipio'=> 'Alberto Adriani' ));
        Municipios::create(array( 'id' => 180, 'status'=> 1, 'estado_id' => 13, 'municipio'=> 'Andrés Bello' ));
        Municipios::create(array( 'id' => 181, 'status'=> 1, 'estado_id' => 13, 'municipio'=> 'Antonio Pinto Salinas' ));
        Municipios::create(array( 'id' => 182, 'status'=> 1, 'estado_id' => 13, 'municipio'=> 'Aricagua' ));
        Municipios::create(array( 'id' => 183, 'status'=> 1, 'estado_id' => 13, 'municipio'=> 'Arzobispo Chacón' ));
        Municipios::create(array( 'id' => 184, 'status'=> 1, 'estado_id' => 13, 'municipio'=> 'Campo Elías' ));
        Municipios::create(array( 'id' => 185, 'status'=> 1, 'estado_id' => 13, 'municipio'=> 'Caracciolo Parra Olmedo' ));
        Municipios::create(array( 'id' => 186, 'status'=> 1, 'estado_id' => 13, 'municipio'=> 'Cardenal Quintero' ));
        Municipios::create(array( 'id' => 187, 'status'=> 1, 'estado_id' => 13, 'municipio'=> 'Guaraque' ));
        Municipios::create(array( 'id' => 188, 'status'=> 1, 'estado_id' => 13, 'municipio'=> 'Julio César Salas' ));
        Municipios::create(array( 'id' => 189, 'status'=> 1, 'estado_id' => 13, 'municipio'=> 'Justo Briceño' ));
        Municipios::create(array( 'id' => 190, 'status'=> 1, 'estado_id' => 13, 'municipio'=> 'Libertador' ));
        Municipios::create(array( 'id' => 191, 'status'=> 1, 'estado_id' => 13, 'municipio'=> 'Miranda' ));
        Municipios::create(array( 'id' => 192, 'status'=> 1, 'estado_id' => 13, 'municipio'=> 'Obispo Ramos de Lora' ));
        Municipios::create(array( 'id' => 193, 'status'=> 1, 'estado_id' => 13, 'municipio'=> 'Padre Noguera' ));
        Municipios::create(array( 'id' => 194, 'status'=> 1, 'estado_id' => 13, 'municipio'=> 'Pueblo Llano' ));
        Municipios::create(array( 'id' => 195, 'status'=> 1, 'estado_id' => 13, 'municipio'=> 'Rangel' ));
        Municipios::create(array( 'id' => 196, 'status'=> 1, 'estado_id' => 13, 'municipio'=> 'Rivas Dávila' ));
        Municipios::create(array( 'id' => 197, 'status'=> 1, 'estado_id' => 13, 'municipio'=> 'Santos Marquina' ));
        Municipios::create(array( 'id' => 198, 'status'=> 1, 'estado_id' => 13, 'municipio'=> 'Sucre' ));
        Municipios::create(array( 'id' => 199, 'status'=> 1, 'estado_id' => 13, 'municipio'=> 'Tovar' ));
        Municipios::create(array( 'id' => 200, 'status'=> 1, 'estado_id' => 13, 'municipio'=> 'Tulio Febres Cordero' ));
        Municipios::create(array( 'id' => 201, 'status'=> 1, 'estado_id' => 13, 'municipio'=> 'Zea' ));
        Municipios::create(array( 'id' => 223, 'status'=> 1, 'estado_id' => 14, 'municipio'=> 'Acevedo' ));
        Municipios::create(array( 'id' => 224, 'status'=> 1, 'estado_id' => 14, 'municipio'=> 'Andrés Bello' ));
        Municipios::create(array( 'id' => 225, 'status'=> 1, 'estado_id' => 14, 'municipio'=> 'Baruta' ));
        Municipios::create(array( 'id' => 226, 'status'=> 1, 'estado_id' => 14, 'municipio'=> 'Brión' ));
        Municipios::create(array( 'id' => 227, 'status'=> 1, 'estado_id' => 14, 'municipio'=> 'Buroz' ));
        Municipios::create(array( 'id' => 228, 'status'=> 1, 'estado_id' => 14, 'municipio'=> 'Carrizal' ));
        Municipios::create(array( 'id' => 229, 'status'=> 1, 'estado_id' => 14, 'municipio'=> 'Chacao' ));
        Municipios::create(array( 'id' => 230, 'status'=> 1, 'estado_id' => 14, 'municipio'=> 'Cristóbal Rojas' ));
        Municipios::create(array( 'id' => 231, 'status'=> 1, 'estado_id' => 14, 'municipio'=> 'El Hatillo' ));
        Municipios::create(array( 'id' => 232, 'status'=> 1, 'estado_id' => 14, 'municipio'=> 'Guaicaipuro' ));
        Municipios::create(array( 'id' => 233, 'status'=> 1, 'estado_id' => 14, 'municipio'=> 'Independencia' ));
        Municipios::create(array( 'id' => 234, 'status'=> 1, 'estado_id' => 14, 'municipio'=> 'Lander' ));
        Municipios::create(array( 'id' => 235, 'status'=> 1, 'estado_id' => 14, 'municipio'=> 'Los Salias' ));
        Municipios::create(array( 'id' => 236, 'status'=> 1, 'estado_id' => 14, 'municipio'=> 'Páez' ));
        Municipios::create(array( 'id' => 237, 'status'=> 1, 'estado_id' => 14, 'municipio'=> 'Paz Castillo' ));
        Municipios::create(array( 'id' => 238, 'status'=> 1, 'estado_id' => 14, 'municipio'=> 'Pedro Gual' ));
        Municipios::create(array( 'id' => 239, 'status'=> 1, 'estado_id' => 14, 'municipio'=> 'Plaza' ));
        Municipios::create(array( 'id' => 240, 'status'=> 1, 'estado_id' => 14, 'municipio'=> 'Simón Bolívar' ));
        Municipios::create(array( 'id' => 241, 'status'=> 1, 'estado_id' => 14, 'municipio'=> 'Sucre' ));
        Municipios::create(array( 'id' => 242, 'status'=> 1, 'estado_id' => 14, 'municipio'=> 'Urdaneta' ));
        Municipios::create(array( 'id' => 243, 'status'=> 1, 'estado_id' => 14, 'municipio'=> 'Zamora' ));
        Municipios::create(array( 'id' => 258, 'status'=> 1, 'estado_id' => 15, 'municipio'=> 'Acosta' ));
        Municipios::create(array( 'id' => 259, 'status'=> 1, 'estado_id' => 15, 'municipio'=> 'Aguasay' ));
        Municipios::create(array( 'id' => 260, 'status'=> 1, 'estado_id' => 15, 'municipio'=> 'Bolívar' ));
        Municipios::create(array( 'id' => 261, 'status'=> 1, 'estado_id' => 15, 'municipio'=> 'Caripe' ));
        Municipios::create(array( 'id' => 262, 'status'=> 1, 'estado_id' => 15, 'municipio'=> 'Cedeño' ));
        Municipios::create(array( 'id' => 263, 'status'=> 1, 'estado_id' => 15, 'municipio'=> 'Ezequiel Zamora' ));
        Municipios::create(array( 'id' => 264, 'status'=> 1, 'estado_id' => 15, 'municipio'=> 'Libertador' ));
        Municipios::create(array( 'id' => 265, 'status'=> 1, 'estado_id' => 15, 'municipio'=> 'Maturín' ));
        Municipios::create(array( 'id' => 266, 'status'=> 1, 'estado_id' => 15, 'municipio'=> 'Piar' ));
        Municipios::create(array( 'id' => 267, 'status'=> 1, 'estado_id' => 15, 'municipio'=> 'Punceres' ));
        Municipios::create(array( 'id' => 268, 'status'=> 1, 'estado_id' => 15, 'municipio'=> 'Santa Bárbara' ));
        Municipios::create(array( 'id' => 269, 'status'=> 1, 'estado_id' => 15, 'municipio'=> 'Sotillo' ));
        Municipios::create(array( 'id' => 270, 'status'=> 1, 'estado_id' => 15, 'municipio'=> 'Uracoa' ));
        Municipios::create(array( 'id' => 271, 'status'=> 1, 'estado_id' => 16, 'municipio'=> 'Antolín del Campo' ));
        Municipios::create(array( 'id' => 272, 'status'=> 1, 'estado_id' => 16, 'municipio'=> 'Arismendi' ));
        Municipios::create(array( 'id' => 273, 'status'=> 1, 'estado_id' => 16, 'municipio'=> 'García' ));
        Municipios::create(array( 'id' => 274, 'status'=> 1, 'estado_id' => 16, 'municipio'=> 'Gómez' ));
        Municipios::create(array( 'id' => 275, 'status'=> 1, 'estado_id' => 16, 'municipio'=> 'Maneiro' ));
        Municipios::create(array( 'id' => 276, 'status'=> 1, 'estado_id' => 16, 'municipio'=> 'Marcano' ));
        Municipios::create(array( 'id' => 277, 'status'=> 1, 'estado_id' => 16, 'municipio'=> 'Mariño' ));
        Municipios::create(array( 'id' => 278, 'status'=> 1, 'estado_id' => 16, 'municipio'=> 'Península de Macanao' ));
        Municipios::create(array( 'id' => 279, 'status'=> 1, 'estado_id' => 16, 'municipio'=> 'Tubores' ));
        Municipios::create(array( 'id' => 280, 'status'=> 1, 'estado_id' => 16, 'municipio'=> 'Villalba' ));
        Municipios::create(array( 'id' => 281, 'status'=> 1, 'estado_id' => 16, 'municipio'=> 'Díaz' ));
        Municipios::create(array( 'id' => 282, 'status'=> 1, 'estado_id' => 17, 'municipio'=> 'Agua Blanca' ));
        Municipios::create(array( 'id' => 283, 'status'=> 1, 'estado_id' => 17, 'municipio'=> 'Araure' ));
        Municipios::create(array( 'id' => 284, 'status'=> 1, 'estado_id' => 17, 'municipio'=> 'Esteller' ));
        Municipios::create(array( 'id' => 285, 'status'=> 1, 'estado_id' => 17, 'municipio'=> 'Guanare' ));
        Municipios::create(array( 'id' => 286, 'status'=> 1, 'estado_id' => 17, 'municipio'=> 'Guanarito' ));
        Municipios::create(array( 'id' => 287, 'status'=> 1, 'estado_id' => 17, 'municipio'=> 'Monseñor José Vicente de Unda' ));
        Municipios::create(array( 'id' => 288, 'status'=> 1, 'estado_id' => 17, 'municipio'=> 'Ospino' ));
        Municipios::create(array( 'id' => 289, 'status'=> 1, 'estado_id' => 17, 'municipio'=> 'Páez' ));
        Municipios::create(array( 'id' => 290, 'status'=> 1, 'estado_id' => 17, 'municipio'=> 'Papelón' ));
        Municipios::create(array( 'id' => 291, 'status'=> 1, 'estado_id' => 17, 'municipio'=> 'San Genaro de Boconoíto' ));
        Municipios::create(array( 'id' => 292, 'status'=> 1, 'estado_id' => 17, 'municipio'=> 'San Rafael de Onoto' ));
        Municipios::create(array( 'id' => 293, 'status'=> 1, 'estado_id' => 17, 'municipio'=> 'Santa Rosalía' ));
        Municipios::create(array( 'id' => 294, 'status'=> 1, 'estado_id' => 17, 'municipio'=> 'Sucre' ));
        Municipios::create(array( 'id' => 295, 'status'=> 1, 'estado_id' => 17, 'municipio'=> 'Turén' ));
        Municipios::create(array( 'id' => 296, 'status'=> 1, 'estado_id' => 18, 'municipio'=> 'Andrés Eloy Blanco' ));
        Municipios::create(array( 'id' => 297, 'status'=> 1, 'estado_id' => 18, 'municipio'=> 'Andrés Mata' ));
        Municipios::create(array( 'id' => 298, 'status'=> 1, 'estado_id' => 18, 'municipio'=> 'Arismendi' ));
        Municipios::create(array( 'id' => 299, 'status'=> 1, 'estado_id' => 18, 'municipio'=> 'Benítez' ));
        Municipios::create(array( 'id' => 300, 'status'=> 1, 'estado_id' => 18, 'municipio'=> 'Bermúdez' ));
        Municipios::create(array( 'id' => 301, 'status'=> 1, 'estado_id' => 18, 'municipio'=> 'Bolívar' ));
        Municipios::create(array( 'id' => 302, 'status'=> 1, 'estado_id' => 18, 'municipio'=> 'Cajigal' ));
        Municipios::create(array( 'id' => 303, 'status'=> 1, 'estado_id' => 18, 'municipio'=> 'Cruz Salmerón Acosta' ));
        Municipios::create(array( 'id' => 304, 'status'=> 1, 'estado_id' => 18, 'municipio'=> 'Libertador' ));
        Municipios::create(array( 'id' => 305, 'status'=> 1, 'estado_id' => 18, 'municipio'=> 'Mariño' ));
        Municipios::create(array( 'id' => 306, 'status'=> 1, 'estado_id' => 18, 'municipio'=> 'Mejía' ));
        Municipios::create(array( 'id' => 307, 'status'=> 1, 'estado_id' => 18, 'municipio'=> 'Montes' ));
        Municipios::create(array( 'id' => 308, 'status'=> 1, 'estado_id' => 18, 'municipio'=> 'Ribero' ));
        Municipios::create(array( 'id' => 309, 'status'=> 1, 'estado_id' => 18, 'municipio'=> 'Sucre' ));
        Municipios::create(array( 'id' => 310, 'status'=> 1, 'estado_id' => 18, 'municipio'=> 'Valdéz' ));
        Municipios::create(array( 'id' => 341, 'status'=> 1, 'estado_id' => 19, 'municipio'=> 'Andrés Bello' ));
        Municipios::create(array( 'id' => 342, 'status'=> 1, 'estado_id' => 19, 'municipio'=> 'Antonio Rómulo Costa' ));
        Municipios::create(array( 'id' => 343, 'status'=> 1, 'estado_id' => 19, 'municipio'=> 'Ayacucho' ));
        Municipios::create(array( 'id' => 344, 'status'=> 1, 'estado_id' => 19, 'municipio'=> 'Bolívar' ));
        Municipios::create(array( 'id' => 345, 'status'=> 1, 'estado_id' => 19, 'municipio'=> 'Cárdenas' ));
        Municipios::create(array( 'id' => 346, 'status'=> 1, 'estado_id' => 19, 'municipio'=> 'Córdoba' ));
        Municipios::create(array( 'id' => 347, 'status'=> 1, 'estado_id' => 19, 'municipio'=> 'Fernández Feo' ));
        Municipios::create(array( 'id' => 348, 'status'=> 1, 'estado_id' => 19, 'municipio'=> 'Francisco de Miranda' ));
        Municipios::create(array( 'id' => 349, 'status'=> 1, 'estado_id' => 19, 'municipio'=> 'García de Hevia' ));
        Municipios::create(array( 'id' => 350, 'status'=> 1, 'estado_id' => 19, 'municipio'=> 'Guásimos' ));
        Municipios::create(array( 'id' => 351, 'status'=> 1, 'estado_id' => 19, 'municipio'=> 'Independencia' ));
        Municipios::create(array( 'id' => 352, 'status'=> 1, 'estado_id' => 19, 'municipio'=> 'Jáuregui' ));
        Municipios::create(array( 'id' => 353, 'status'=> 1, 'estado_id' => 19, 'municipio'=> 'José María Vargas' ));
        Municipios::create(array( 'id' => 354, 'status'=> 1, 'estado_id' => 19, 'municipio'=> 'Junín' ));
        Municipios::create(array( 'id' => 355, 'status'=> 1, 'estado_id' => 19, 'municipio'=> 'Libertad' ));
        Municipios::create(array( 'id' => 356, 'status'=> 1, 'estado_id' => 19, 'municipio'=> 'Libertador' ));
        Municipios::create(array( 'id' => 357, 'status'=> 1, 'estado_id' => 19, 'municipio'=> 'Lobatera' ));
        Municipios::create(array( 'id' => 358, 'status'=> 1, 'estado_id' => 19, 'municipio'=> 'Michelena' ));
        Municipios::create(array( 'id' => 359, 'status'=> 1, 'estado_id' => 19, 'municipio'=> 'Panamericano' ));
        Municipios::create(array( 'id' => 360, 'status'=> 1, 'estado_id' => 19, 'municipio'=> 'Pedro María Ureña' ));
        Municipios::create(array( 'id' => 361, 'status'=> 1, 'estado_id' => 19, 'municipio'=> 'Rafael Urdaneta' ));
        Municipios::create(array( 'id' => 362, 'status'=> 1, 'estado_id' => 19, 'municipio'=> 'Samuel Darío Maldonado' ));
        Municipios::create(array( 'id' => 363, 'status'=> 1, 'estado_id' => 19, 'municipio'=> 'San Cristóbal' ));
        Municipios::create(array( 'id' => 364, 'status'=> 1, 'estado_id' => 19, 'municipio'=> 'Seboruco' ));
        Municipios::create(array( 'id' => 365, 'status'=> 1, 'estado_id' => 19, 'municipio'=> 'Simón Rodríguez' ));
        Municipios::create(array( 'id' => 366, 'status'=> 1, 'estado_id' => 19, 'municipio'=> 'Sucre' ));
        Municipios::create(array( 'id' => 367, 'status'=> 1, 'estado_id' => 19, 'municipio'=> 'Torbes' ));
        Municipios::create(array( 'id' => 368, 'status'=> 1, 'estado_id' => 19, 'municipio'=> 'Uribante' ));
        Municipios::create(array( 'id' => 369, 'status'=> 1, 'estado_id' => 19, 'municipio'=> 'San Judas Tadeo' ));
        Municipios::create(array( 'id' => 370, 'status'=> 1, 'estado_id' => 20, 'municipio'=> 'Andrés Bello' ));
        Municipios::create(array( 'id' => 371, 'status'=> 1, 'estado_id' => 20, 'municipio'=> 'Boconó' ));
        Municipios::create(array( 'id' => 372, 'status'=> 1, 'estado_id' => 20, 'municipio'=> 'Bolívar' ));
        Municipios::create(array( 'id' => 373, 'status'=> 1, 'estado_id' => 20, 'municipio'=> 'Candelaria' ));
        Municipios::create(array( 'id' => 374, 'status'=> 1, 'estado_id' => 20, 'municipio'=> 'Carache' ));
        Municipios::create(array( 'id' => 375, 'status'=> 1, 'estado_id' => 20, 'municipio'=> 'Escuque' ));
        Municipios::create(array( 'id' => 376, 'status'=> 1, 'estado_id' => 20, 'municipio'=> 'José Felipe Márquez Cañizalez' ));
        Municipios::create(array( 'id' => 377, 'status'=> 1, 'estado_id' => 20, 'municipio'=> 'Juan Vicente Campos Elías' ));
        Municipios::create(array( 'id' => 378, 'status'=> 1, 'estado_id' => 20, 'municipio'=> 'La Ceiba' ));
        Municipios::create(array( 'id' => 379, 'status'=> 1, 'estado_id' => 20, 'municipio'=> 'Miranda' ));
        Municipios::create(array( 'id' => 380, 'status'=> 1, 'estado_id' => 20, 'municipio'=> 'Monte Carmelo' ));
        Municipios::create(array( 'id' => 381, 'status'=> 1, 'estado_id' => 20, 'municipio'=> 'Motatán' ));
        Municipios::create(array( 'id' => 382, 'status'=> 1, 'estado_id' => 20, 'municipio'=> 'Pampán' ));
        Municipios::create(array( 'id' => 383, 'status'=> 1, 'estado_id' => 20, 'municipio'=> 'Pampanito' ));
        Municipios::create(array( 'id' => 384, 'status'=> 1, 'estado_id' => 20, 'municipio'=> 'Rafael Rangel' ));
        Municipios::create(array( 'id' => 385, 'status'=> 1, 'estado_id' => 20, 'municipio'=> 'San Rafael de Carvajal' ));
        Municipios::create(array( 'id' => 386, 'status'=> 1, 'estado_id' => 20, 'municipio'=> 'Sucre' ));
        Municipios::create(array( 'id' => 387, 'status'=> 1, 'estado_id' => 20, 'municipio'=> 'Trujillo' ));
        Municipios::create(array( 'id' => 388, 'status'=> 1, 'estado_id' => 20, 'municipio'=> 'Urdaneta' ));
        Municipios::create(array( 'id' => 389, 'status'=> 1, 'estado_id' => 20, 'municipio'=> 'Valera' ));
        Municipios::create(array( 'id' => 390, 'status'=> 1, 'estado_id' => 21, 'municipio'=> 'Vargas' ));
        Municipios::create(array( 'id' => 391, 'status'=> 1, 'estado_id' => 22, 'municipio'=> 'Arístides Bastidas' ));
        Municipios::create(array( 'id' => 392, 'status'=> 1, 'estado_id' => 22, 'municipio'=> 'Bolívar' ));
        Municipios::create(array( 'id' => 407, 'status'=> 1, 'estado_id' => 22, 'municipio'=> 'Bruzual' ));
        Municipios::create(array( 'id' => 408, 'status'=> 1, 'estado_id' => 22, 'municipio'=> 'Cocorote' ));
        Municipios::create(array( 'id' => 409, 'status'=> 1, 'estado_id' => 22, 'municipio'=> 'Independencia' ));
        Municipios::create(array( 'id' => 410, 'status'=> 1, 'estado_id' => 22, 'municipio'=> 'José Antonio Páez' ));
        Municipios::create(array( 'id' => 411, 'status'=> 1, 'estado_id' => 22, 'municipio'=> 'La Trinidad' ));
        Municipios::create(array( 'id' => 412, 'status'=> 1, 'estado_id' => 22, 'municipio'=> 'Manuel Monge' ));
        Municipios::create(array( 'id' => 413, 'status'=> 1, 'estado_id' => 22, 'municipio'=> 'Nirgua' ));
        Municipios::create(array( 'id' => 414, 'status'=> 1, 'estado_id' => 22, 'municipio'=> 'Peña' ));
        Municipios::create(array( 'id' => 415, 'status'=> 1, 'estado_id' => 22, 'municipio'=> 'San Felipe' ));
        Municipios::create(array( 'id' => 416, 'status'=> 1, 'estado_id' => 22, 'municipio'=> 'Sucre' ));
        Municipios::create(array( 'id' => 417, 'status'=> 1, 'estado_id' => 22, 'municipio'=> 'Urachiche' ));
        Municipios::create(array( 'id' => 418, 'status'=> 1, 'estado_id' => 22, 'municipio'=> 'José Joaquín Veroes' ));
        Municipios::create(array( 'id' => 441, 'status'=> 1, 'estado_id' => 23, 'municipio'=> 'Almirante Padilla' ));
        Municipios::create(array( 'id' => 442, 'status'=> 1, 'estado_id' => 23, 'municipio'=> 'Baralt' ));
        Municipios::create(array( 'id' => 443, 'status'=> 1, 'estado_id' => 23, 'municipio'=> 'Cabimas' ));
        Municipios::create(array( 'id' => 444, 'status'=> 1, 'estado_id' => 23, 'municipio'=> 'Catatumbo' ));
        Municipios::create(array( 'id' => 445, 'status'=> 1, 'estado_id' => 23, 'municipio'=> 'Colón' ));
        Municipios::create(array( 'id' => 446, 'status'=> 1, 'estado_id' => 23, 'municipio'=> 'Francisco Javier Pulgar' ));
        Municipios::create(array( 'id' => 447, 'status'=> 1, 'estado_id' => 23, 'municipio'=> 'Páez' ));
        Municipios::create(array( 'id' => 448, 'status'=> 1, 'estado_id' => 23, 'municipio'=> 'Jesús Enrique Losada' ));
        Municipios::create(array( 'id' => 449, 'status'=> 1, 'estado_id' => 23, 'municipio'=> 'Jesús María Semprún' ));
        Municipios::create(array( 'id' => 450, 'status'=> 1, 'estado_id' => 23, 'municipio'=> 'La Cañada de Urdaneta' ));
        Municipios::create(array( 'id' => 451, 'status'=> 1, 'estado_id' => 23, 'municipio'=> 'Lagunillas' ));
        Municipios::create(array( 'id' => 452, 'status'=> 1, 'estado_id' => 23, 'municipio'=> 'Machiques de Perijá' ));
        Municipios::create(array( 'id' => 453, 'status'=> 1, 'estado_id' => 23, 'municipio'=> 'Mara' ));
        Municipios::create(array( 'id' => 454, 'status'=> 1, 'estado_id' => 23, 'municipio'=> 'Maracaibo' ));
        Municipios::create(array( 'id' => 455, 'status'=> 1, 'estado_id' => 23, 'municipio'=> 'Miranda' ));
        Municipios::create(array( 'id' => 456, 'status'=> 1, 'estado_id' => 23, 'municipio'=> 'Rosario de Perijá' ));
        Municipios::create(array( 'id' => 457, 'status'=> 1, 'estado_id' => 23, 'municipio'=> 'San Francisco' ));
        Municipios::create(array( 'id' => 458, 'status'=> 1, 'estado_id' => 23, 'municipio'=> 'Santa Rita' ));
        Municipios::create(array( 'id' => 459, 'status'=> 1, 'estado_id' => 23, 'municipio'=> 'Simón Bolívar' ));
        Municipios::create(array( 'id' => 460, 'status'=> 1, 'estado_id' => 23, 'municipio'=> 'Sucre' ));
        Municipios::create(array( 'id' => 461, 'status'=> 1, 'estado_id' => 23, 'municipio'=> 'Valmore Rodríguez' ));
        Municipios::create(array( 'id' => 462, 'status'=> 1, 'estado_id' => 24, 'municipio'=> 'Libertador' ));


        /* PARROQUIAS */
    Parroquias::create(array( 'id' => 1, 'status'=>1, 'user_id'=>1,'municipio_id' => 1, 'parroquia'=> 'Alto Orinoco', ));
    Parroquias::create(array( 'id' => 2, 'status'=>1, 'user_id'=>1,'municipio_id' => 1, 'parroquia'=> 'Huachamacare Acanaña', ));
    Parroquias::create(array( 'id' => 3, 'status'=>1, 'user_id'=>1,'municipio_id' => 1, 'parroquia'=> 'Marawaka Toky Shamanaña', ));
    Parroquias::create(array( 'id' => 4, 'status'=>1, 'user_id'=>1,'municipio_id' => 1, 'parroquia'=> 'Mavaka Mavaka', ));
    Parroquias::create(array( 'id' => 5, 'status'=>1, 'user_id'=>1,'municipio_id' => 1, 'parroquia'=> 'Sierra Parima Parimabé', ));
    Parroquias::create(array( 'id' => 6, 'status'=>1, 'user_id'=>1,'municipio_id' => 2, 'parroquia'=> 'Ucata Laja Lisa', ));
    Parroquias::create(array( 'id' => 7, 'status'=>1, 'user_id'=>1,'municipio_id' => 2, 'parroquia'=> 'Yapacana Macuruco', ));
    Parroquias::create(array( 'id' => 8, 'status'=>1, 'user_id'=>1,'municipio_id' => 2, 'parroquia'=> 'Caname Guarinuma', ));
    Parroquias::create(array( 'id' => 9, 'status'=>1, 'user_id'=>1,'municipio_id' => 3, 'parroquia'=> 'Fernando Girón Tovar', ));
    Parroquias::create(array( 'id' => 10, 'status'=>1, 'user_id'=>1,'municipio_id' => 3, 'parroquia'=> 'Luis Alberto Gómez', ));
    Parroquias::create(array( 'id' => 11, 'status'=>1, 'user_id'=>1,'municipio_id' => 3, 'parroquia'=> 'Pahueña Limón de Parhueña', ));
    Parroquias::create(array( 'id' => 12, 'status'=>1, 'user_id'=>1,'municipio_id' => 3, 'parroquia'=> 'Platanillal Platanillal', ));
    Parroquias::create(array( 'id' => 13, 'status'=>1, 'user_id'=>1,'municipio_id' => 4, 'parroquia'=> 'Samariapo', ));
    Parroquias::create(array( 'id' => 14, 'status'=>1, 'user_id'=>1,'municipio_id' => 4, 'parroquia'=> 'Sipapo', ));
    Parroquias::create(array( 'id' => 15, 'status'=>1, 'user_id'=>1,'municipio_id' => 4, 'parroquia'=> 'Munduapo', ));
    Parroquias::create(array( 'id' => 16, 'status'=>1, 'user_id'=>1,'municipio_id' => 4, 'parroquia'=> 'Guayapo', ));
    Parroquias::create(array( 'id' => 17, 'status'=>1, 'user_id'=>1,'municipio_id' => 5, 'parroquia'=> 'Alto Ventuari', ));
    Parroquias::create(array( 'id' => 18, 'status'=>1, 'user_id'=>1,'municipio_id' => 5, 'parroquia'=> 'Medio Ventuari', ));
    Parroquias::create(array( 'id' => 19, 'status'=>1, 'user_id'=>1,'municipio_id' => 5, 'parroquia'=> 'Bajo Ventuari', ));
    Parroquias::create(array( 'id' => 20, 'status'=>1, 'user_id'=>1,'municipio_id' => 6, 'parroquia'=> 'Victorino', ));
    Parroquias::create(array( 'id' => 21, 'status'=>1, 'user_id'=>1,'municipio_id' => 6, 'parroquia'=> 'Comunidad', ));
    Parroquias::create(array( 'id' => 22, 'status'=>1, 'user_id'=>1,'municipio_id' => 7, 'parroquia'=> 'Casiquiare', ));
    Parroquias::create(array( 'id' => 23, 'status'=>1, 'user_id'=>1,'municipio_id' => 7, 'parroquia'=> 'Cocuy', ));
    Parroquias::create(array( 'id' => 24, 'status'=>1, 'user_id'=>1,'municipio_id' => 7, 'parroquia'=> 'San Carlos de Río Negro', ));
    Parroquias::create(array( 'id' => 25, 'status'=>1, 'user_id'=>1,'municipio_id' => 7, 'parroquia'=> 'Solano', ));
    Parroquias::create(array( 'id' => 26, 'status'=>1, 'user_id'=>1,'municipio_id' => 8, 'parroquia'=> 'Anaco', ));
    Parroquias::create(array( 'id' => 27, 'status'=>1, 'user_id'=>1,'municipio_id' => 8, 'parroquia'=> 'San Joaquín', ));
    Parroquias::create(array( 'id' => 28, 'status'=>1, 'user_id'=>1,'municipio_id' => 9, 'parroquia'=> 'Cachipo', ));
    Parroquias::create(array( 'id' => 29, 'status'=>1, 'user_id'=>1,'municipio_id' => 9, 'parroquia'=> 'Aragua de Barcelona', ));
    Parroquias::create(array( 'id' => 30, 'status'=>1, 'user_id'=>1,'municipio_id' => 11, 'parroquia'=> 'Lechería', ));
    Parroquias::create(array( 'id' => 31, 'status'=>1, 'user_id'=>1,'municipio_id' => 11, 'parroquia'=> 'El Morro', ));
    Parroquias::create(array( 'id' => 32, 'status'=>1, 'user_id'=>1,'municipio_id' => 12, 'parroquia'=> 'Puerto Píritu', ));
    Parroquias::create(array( 'id' => 33, 'status'=>1, 'user_id'=>1,'municipio_id' => 12, 'parroquia'=> 'San Miguel', ));
    Parroquias::create(array( 'id' => 34, 'status'=>1, 'user_id'=>1,'municipio_id' => 12, 'parroquia'=> 'Sucre', ));
    Parroquias::create(array( 'id' => 35, 'status'=>1, 'user_id'=>1,'municipio_id' => 13, 'parroquia'=> 'Valle de Guanape', ));
    Parroquias::create(array( 'id' => 36, 'status'=>1, 'user_id'=>1,'municipio_id' => 13, 'parroquia'=> 'Santa Bárbara', ));
    Parroquias::create(array( 'id' => 37, 'status'=>1, 'user_id'=>1,'municipio_id' => 14, 'parroquia'=> 'El Chaparro', ));
    Parroquias::create(array( 'id' => 38, 'status'=>1, 'user_id'=>1,'municipio_id' => 14, 'parroquia'=> 'Tomás Alfaro', ));
    Parroquias::create(array( 'id' => 39, 'status'=>1, 'user_id'=>1,'municipio_id' => 14, 'parroquia'=> 'Calatrava', ));
    Parroquias::create(array( 'id' => 40, 'status'=>1, 'user_id'=>1,'municipio_id' => 15, 'parroquia'=> 'Guanta', ));
    Parroquias::create(array( 'id' => 41, 'status'=>1, 'user_id'=>1,'municipio_id' => 15, 'parroquia'=> 'Chorrerón', ));
    Parroquias::create(array( 'id' => 42, 'status'=>1, 'user_id'=>1,'municipio_id' => 16, 'parroquia'=> 'Mamo', ));
    Parroquias::create(array( 'id' => 43, 'status'=>1, 'user_id'=>1,'municipio_id' => 16, 'parroquia'=> 'Soledad', ));
    Parroquias::create(array( 'id' => 44, 'status'=>1, 'user_id'=>1,'municipio_id' => 17, 'parroquia'=> 'Mapire', ));
    Parroquias::create(array( 'id' => 45, 'status'=>1, 'user_id'=>1,'municipio_id' => 17, 'parroquia'=> 'Piar', ));
    Parroquias::create(array( 'id' => 46, 'status'=>1, 'user_id'=>1,'municipio_id' => 17, 'parroquia'=> 'Santa Clara', ));
    Parroquias::create(array( 'id' => 47, 'status'=>1, 'user_id'=>1,'municipio_id' => 17, 'parroquia'=> 'San Diego de Cabrutica', ));
    Parroquias::create(array( 'id' => 48, 'status'=>1, 'user_id'=>1,'municipio_id' => 17, 'parroquia'=> 'Uverito', ));
    Parroquias::create(array( 'id' => 49, 'status'=>1, 'user_id'=>1,'municipio_id' => 17, 'parroquia'=> 'Zuata', ));
    Parroquias::create(array( 'id' => 50, 'status'=>1, 'user_id'=>1,'municipio_id' => 18, 'parroquia'=> 'Puerto La Cruz', ));
    Parroquias::create(array( 'id' => 51, 'status'=>1, 'user_id'=>1,'municipio_id' => 18, 'parroquia'=> 'Pozuelos', ));
    Parroquias::create(array( 'id' => 52, 'status'=>1, 'user_id'=>1,'municipio_id' => 19, 'parroquia'=> 'Onoto', ));
    Parroquias::create(array( 'id' => 53, 'status'=>1, 'user_id'=>1,'municipio_id' => 19, 'parroquia'=> 'San Pablo', ));
    Parroquias::create(array( 'id' => 54, 'status'=>1, 'user_id'=>1,'municipio_id' => 20, 'parroquia'=> 'San Mateo', ));
    Parroquias::create(array( 'id' => 55, 'status'=>1, 'user_id'=>1,'municipio_id' => 20, 'parroquia'=> 'El Carito', ));
    Parroquias::create(array( 'id' => 56, 'status'=>1, 'user_id'=>1,'municipio_id' => 20, 'parroquia'=> 'Santa Inés', ));
    Parroquias::create(array( 'id' => 57, 'status'=>1, 'user_id'=>1,'municipio_id' => 20, 'parroquia'=> 'La Romereña', ));
    Parroquias::create(array( 'id' => 58, 'status'=>1, 'user_id'=>1,'municipio_id' => 21, 'parroquia'=> 'Atapirire', ));
    Parroquias::create(array( 'id' => 59, 'status'=>1, 'user_id'=>1,'municipio_id' => 21, 'parroquia'=> 'Boca del Pao', ));
    Parroquias::create(array( 'id' => 60, 'status'=>1, 'user_id'=>1,'municipio_id' => 21, 'parroquia'=> 'El Pao', ));
    Parroquias::create(array( 'id' => 61, 'status'=>1, 'user_id'=>1,'municipio_id' => 21, 'parroquia'=> 'Pariaguán', ));
    Parroquias::create(array( 'id' => 62, 'status'=>1, 'user_id'=>1,'municipio_id' => 22, 'parroquia'=> 'Cantaura', ));
    Parroquias::create(array( 'id' => 63, 'status'=>1, 'user_id'=>1,'municipio_id' => 22, 'parroquia'=> 'Libertador', ));
    Parroquias::create(array( 'id' => 64, 'status'=>1, 'user_id'=>1,'municipio_id' => 22, 'parroquia'=> 'Santa Rosa', ));
    Parroquias::create(array( 'id' => 65, 'status'=>1, 'user_id'=>1,'municipio_id' => 22, 'parroquia'=> 'Urica', ));
    Parroquias::create(array( 'id' => 66, 'status'=>1, 'user_id'=>1,'municipio_id' => 23, 'parroquia'=> 'Píritu', ));
    Parroquias::create(array( 'id' => 67, 'status'=>1, 'user_id'=>1,'municipio_id' => 23, 'parroquia'=> 'San Francisco', ));
    Parroquias::create(array( 'id' => 68, 'status'=>1, 'user_id'=>1,'municipio_id' => 24, 'parroquia'=> 'San José de Guanipa', ));
    Parroquias::create(array( 'id' => 69, 'status'=>1, 'user_id'=>1,'municipio_id' => 25, 'parroquia'=> 'Boca de Uchire', ));
    Parroquias::create(array( 'id' => 70, 'status'=>1, 'user_id'=>1,'municipio_id' => 25, 'parroquia'=> 'Boca de Chávez', ));
    Parroquias::create(array( 'id' => 71, 'status'=>1, 'user_id'=>1,'municipio_id' => 26, 'parroquia'=> 'Pueblo Nuevo', ));
    Parroquias::create(array( 'id' => 72, 'status'=>1, 'user_id'=>1,'municipio_id' => 26, 'parroquia'=> 'Santa Ana', ));
    Parroquias::create(array( 'id' => 73, 'status'=>1, 'user_id'=>1,'municipio_id' => 27, 'parroquia'=> 'Bergatín', ));
    Parroquias::create(array( 'id' => 74, 'status'=>1, 'user_id'=>1,'municipio_id' => 27, 'parroquia'=> 'Caigua', ));
    Parroquias::create(array( 'id' => 75, 'status'=>1, 'user_id'=>1,'municipio_id' => 27, 'parroquia'=> 'El Carmen', ));
    Parroquias::create(array( 'id' => 76, 'status'=>1, 'user_id'=>1,'municipio_id' => 27, 'parroquia'=> 'El Pilar', ));
    Parroquias::create(array( 'id' => 77, 'status'=>1, 'user_id'=>1,'municipio_id' => 27, 'parroquia'=> 'Naricual', ));
    Parroquias::create(array( 'id' => 78, 'status'=>1, 'user_id'=>1,'municipio_id' => 27, 'parroquia'=> 'San Crsitóbal', ));
    Parroquias::create(array( 'id' => 79, 'status'=>1, 'user_id'=>1,'municipio_id' => 28, 'parroquia'=> 'Edmundo Barrios', ));
    Parroquias::create(array( 'id' => 80, 'status'=>1, 'user_id'=>1,'municipio_id' => 28, 'parroquia'=> 'Miguel Otero Silva', ));
    Parroquias::create(array( 'id' => 81, 'status'=>1, 'user_id'=>1,'municipio_id' => 29, 'parroquia'=> 'Achaguas', ));
    Parroquias::create(array( 'id' => 82, 'status'=>1, 'user_id'=>1,'municipio_id' => 29, 'parroquia'=> 'Apurito', ));
    Parroquias::create(array( 'id' => 83, 'status'=>1, 'user_id'=>1,'municipio_id' => 29, 'parroquia'=> 'El Yagual', ));
    Parroquias::create(array( 'id' => 84, 'status'=>1, 'user_id'=>1,'municipio_id' => 29, 'parroquia'=> 'Guachara', ));
    Parroquias::create(array( 'id' => 85, 'status'=>1, 'user_id'=>1,'municipio_id' => 29, 'parroquia'=> 'Mucuritas', ));
    Parroquias::create(array( 'id' => 86, 'status'=>1, 'user_id'=>1,'municipio_id' => 29, 'parroquia'=> 'Queseras del medio', ));
    Parroquias::create(array( 'id' => 87, 'status'=>1, 'user_id'=>1,'municipio_id' => 30, 'parroquia'=> 'Biruaca', ));
    Parroquias::create(array( 'id' => 88, 'status'=>1, 'user_id'=>1,'municipio_id' => 31, 'parroquia'=> 'Bruzual', ));
    Parroquias::create(array( 'id' => 89, 'status'=>1, 'user_id'=>1,'municipio_id' => 31, 'parroquia'=> 'Mantecal', ));
    Parroquias::create(array( 'id' => 90, 'status'=>1, 'user_id'=>1,'municipio_id' => 31, 'parroquia'=> 'Quintero', ));
    Parroquias::create(array( 'id' => 91, 'status'=>1, 'user_id'=>1,'municipio_id' => 31, 'parroquia'=> 'Rincón Hondo', ));
    Parroquias::create(array( 'id' => 92, 'status'=>1, 'user_id'=>1,'municipio_id' => 31, 'parroquia'=> 'San Vicente', ));
    Parroquias::create(array( 'id' => 93, 'status'=>1, 'user_id'=>1,'municipio_id' => 32, 'parroquia'=> 'Guasdualito', ));
    Parroquias::create(array( 'id' => 94, 'status'=>1, 'user_id'=>1,'municipio_id' => 32, 'parroquia'=> 'Aramendi', ));
    Parroquias::create(array( 'id' => 95, 'status'=>1, 'user_id'=>1,'municipio_id' => 32, 'parroquia'=> 'El Amparo', ));
    Parroquias::create(array( 'id' => 96, 'status'=>1, 'user_id'=>1,'municipio_id' => 32, 'parroquia'=> 'San Camilo', ));
    Parroquias::create(array( 'id' => 97, 'status'=>1, 'user_id'=>1,'municipio_id' => 32, 'parroquia'=> 'Urdaneta', ));
    Parroquias::create(array( 'id' => 98, 'status'=>1, 'user_id'=>1,'municipio_id' => 33, 'parroquia'=> 'San Juan de Payara', ));
    Parroquias::create(array( 'id' => 99, 'status'=>1, 'user_id'=>1,'municipio_id' => 33, 'parroquia'=> 'Codazzi', ));
    Parroquias::create(array( 'id' => 100,'status'=>1, 'user_id'=>1, 'municipio_id' => 33, 'parroquia'=> 'Cunaviche', ));
    Parroquias::create(array( 'id' => 101,'status'=>1, 'user_id'=>1, 'municipio_id' => 34, 'parroquia'=> 'Elorza', ));
    Parroquias::create(array( 'id' => 102,'status'=>1, 'user_id'=>1, 'municipio_id' => 34, 'parroquia'=> 'La Trinidad', ));
    Parroquias::create(array( 'id' => 103,'status'=>1, 'user_id'=>1, 'municipio_id' => 35, 'parroquia'=> 'San Fernando', ));
    Parroquias::create(array( 'id' => 104,'status'=>1, 'user_id'=>1, 'municipio_id' => 35, 'parroquia'=> 'El Recreo', ));
    Parroquias::create(array( 'id' => 105,'status'=>1, 'user_id'=>1, 'municipio_id' => 35, 'parroquia'=> 'Peñalver', ));
    Parroquias::create(array( 'id' => 106,'status'=>1, 'user_id'=>1, 'municipio_id' => 35, 'parroquia'=> 'San Rafael de Atamaica', ));
    Parroquias::create(array( 'id' => 107,'status'=>1, 'user_id'=>1, 'municipio_id' => 36, 'parroquia'=> 'Pedro José Ovalles', ));
    Parroquias::create(array( 'id' => 108,'status'=>1, 'user_id'=>1, 'municipio_id' => 36, 'parroquia'=> 'Joaquín Crespo', ));
    Parroquias::create(array( 'id' => 109,'status'=>1, 'user_id'=>1, 'municipio_id' => 36, 'parroquia'=> 'José Casanova Godoy', ));
    Parroquias::create(array( 'id' => 110,'status'=>1, 'user_id'=>1, 'municipio_id' => 36, 'parroquia'=> 'Madre María de San José', ));
    Parroquias::create(array( 'id' => 111,'status'=>1, 'user_id'=>1, 'municipio_id' => 36, 'parroquia'=> 'Andrés Eloy Blanco', ));
    Parroquias::create(array( 'id' => 112,'status'=>1, 'user_id'=>1, 'municipio_id' => 36, 'parroquia'=> 'Los Tacarigua', ));
    Parroquias::create(array( 'id' => 113,'status'=>1, 'user_id'=>1, 'municipio_id' => 36, 'parroquia'=> 'Las Delicias', ));
    Parroquias::create(array( 'id' => 114,'status'=>1, 'user_id'=>1, 'municipio_id' => 36, 'parroquia'=> 'Choroní', ));
    Parroquias::create(array( 'id' => 115,'status'=>1, 'user_id'=>1, 'municipio_id' => 37, 'parroquia'=> 'Bolívar', ));
    Parroquias::create(array( 'id' => 116,'status'=>1, 'user_id'=>1, 'municipio_id' => 38, 'parroquia'=> 'Camatagua', ));
    Parroquias::create(array( 'id' => 117,'status'=>1, 'user_id'=>1, 'municipio_id' => 38, 'parroquia'=> 'Carmen de Cura', ));
    Parroquias::create(array( 'id' => 118,'status'=>1, 'user_id'=>1, 'municipio_id' => 39, 'parroquia'=> 'Santa Rita', ));
    Parroquias::create(array( 'id' => 119,'status'=>1, 'user_id'=>1, 'municipio_id' => 39, 'parroquia'=> 'Francisco de Miranda', ));
    Parroquias::create(array( 'id' => 120,'status'=>1, 'user_id'=>1, 'municipio_id' => 39, 'parroquia'=> 'Moseñor Feliciano González', ));
    Parroquias::create(array( 'id' => 121,'status'=>1, 'user_id'=>1, 'municipio_id' => 40, 'parroquia'=> 'Santa Cruz', ));
    Parroquias::create(array( 'id' => 122,'status'=>1, 'user_id'=>1, 'municipio_id' => 41, 'parroquia'=> 'José Félix Ribas', ));
    Parroquias::create(array( 'id' => 123,'status'=>1, 'user_id'=>1, 'municipio_id' => 41, 'parroquia'=> 'Castor Nieves Ríos', ));
    Parroquias::create(array( 'id' => 124,'status'=>1, 'user_id'=>1, 'municipio_id' => 41, 'parroquia'=> 'Las Guacamayas', ));
    Parroquias::create(array( 'id' => 125,'status'=>1, 'user_id'=>1, 'municipio_id' => 41, 'parroquia'=> 'Pao de Zárate', ));
    Parroquias::create(array( 'id' => 126,'status'=>1, 'user_id'=>1, 'municipio_id' => 41, 'parroquia'=> 'Zuata', ));
    Parroquias::create(array( 'id' => 127,'status'=>1, 'user_id'=>1, 'municipio_id' => 42, 'parroquia'=> 'José Rafael Revenga', ));
    Parroquias::create(array( 'id' => 128,'status'=>1, 'user_id'=>1, 'municipio_id' => 43, 'parroquia'=> 'Palo Negro', ));
    Parroquias::create(array( 'id' => 129,'status'=>1, 'user_id'=>1, 'municipio_id' => 43, 'parroquia'=> 'San Martín de Porres', ));
    Parroquias::create(array( 'id' => 130,'status'=>1, 'user_id'=>1, 'municipio_id' => 44, 'parroquia'=> 'El Limón', ));
    Parroquias::create(array( 'id' => 131,'status'=>1, 'user_id'=>1, 'municipio_id' => 44, 'parroquia'=> 'Caña de Azúcar', ));
    Parroquias::create(array( 'id' => 132,'status'=>1, 'user_id'=>1, 'municipio_id' => 45, 'parroquia'=> 'Ocumare de la Costa', ));
    Parroquias::create(array( 'id' => 133,'status'=>1, 'user_id'=>1, 'municipio_id' => 46, 'parroquia'=> 'San Casimiro', ));
    Parroquias::create(array( 'id' => 134,'status'=>1, 'user_id'=>1, 'municipio_id' => 46, 'parroquia'=> 'Güiripa', ));
    Parroquias::create(array( 'id' => 135,'status'=>1, 'user_id'=>1, 'municipio_id' => 46, 'parroquia'=> 'Ollas de Caramacate', ));
    Parroquias::create(array( 'id' => 136,'status'=>1, 'user_id'=>1, 'municipio_id' => 46, 'parroquia'=> 'Valle Morín', ));
    Parroquias::create(array( 'id' => 137,'status'=>1, 'user_id'=>1, 'municipio_id' => 47, 'parroquia'=> 'San Sebastían', ));
    Parroquias::create(array( 'id' => 138,'status'=>1, 'user_id'=>1, 'municipio_id' => 48, 'parroquia'=> 'Turmero', ));
    Parroquias::create(array( 'id' => 139,'status'=>1, 'user_id'=>1, 'municipio_id' => 48, 'parroquia'=> 'Arevalo Aponte', ));
    Parroquias::create(array( 'id' => 140,'status'=>1, 'user_id'=>1, 'municipio_id' => 48, 'parroquia'=> 'Chuao', ));
    Parroquias::create(array( 'id' => 141,'status'=>1, 'user_id'=>1, 'municipio_id' => 48, 'parroquia'=> 'Samán de Güere', ));
    Parroquias::create(array( 'id' => 142,'status'=>1, 'user_id'=>1, 'municipio_id' => 48, 'parroquia'=> 'Alfredo Pacheco Miranda', ));
    Parroquias::create(array( 'id' => 143,'status'=>1, 'user_id'=>1, 'municipio_id' => 49, 'parroquia'=> 'Santos Michelena', ));
    Parroquias::create(array( 'id' => 144,'status'=>1, 'user_id'=>1, 'municipio_id' => 49, 'parroquia'=> 'Tiara', ));
    Parroquias::create(array( 'id' => 145,'status'=>1, 'user_id'=>1, 'municipio_id' => 50, 'parroquia'=> 'Cagua', ));
    Parroquias::create(array( 'id' => 146,'status'=>1, 'user_id'=>1, 'municipio_id' => 50, 'parroquia'=> 'Bella Vista', ));
    Parroquias::create(array( 'id' => 147,'status'=>1, 'user_id'=>1, 'municipio_id' => 51, 'parroquia'=> 'Tovar', ));
    Parroquias::create(array( 'id' => 148,'status'=>1, 'user_id'=>1, 'municipio_id' => 52, 'parroquia'=> 'Urdaneta', ));
    Parroquias::create(array( 'id' => 149,'status'=>1, 'user_id'=>1, 'municipio_id' => 52, 'parroquia'=> 'Las Peñitas', ));
    Parroquias::create(array( 'id' => 150,'status'=>1, 'user_id'=>1, 'municipio_id' => 52, 'parroquia'=> 'San Francisco de Cara', ));
    Parroquias::create(array( 'id' => 151,'status'=>1, 'user_id'=>1, 'municipio_id' => 52, 'parroquia'=> 'Taguay', ));
    Parroquias::create(array( 'id' => 152,'status'=>1, 'user_id'=>1, 'municipio_id' => 53, 'parroquia'=> 'Zamora', ));
    Parroquias::create(array( 'id' => 153,'status'=>1, 'user_id'=>1, 'municipio_id' => 53, 'parroquia'=> 'Magdaleno', ));
    Parroquias::create(array( 'id' => 154,'status'=>1, 'user_id'=>1, 'municipio_id' => 53, 'parroquia'=> 'San Francisco de Asís', ));
    Parroquias::create(array( 'id' => 155,'status'=>1, 'user_id'=>1, 'municipio_id' => 53, 'parroquia'=> 'Valles de Tucutunemo', ));
    Parroquias::create(array( 'id' => 156,'status'=>1, 'user_id'=>1, 'municipio_id' => 53, 'parroquia'=> 'Augusto Mijares', ));
    Parroquias::create(array( 'id' => 157,'status'=>1, 'user_id'=>1, 'municipio_id' => 54, 'parroquia'=> 'Sabaneta', ));
    Parroquias::create(array( 'id' => 158,'status'=>1, 'user_id'=>1, 'municipio_id' => 54, 'parroquia'=> 'Juan Antonio Rodríguez Domínguez', ));
    Parroquias::create(array( 'id' => 159,'status'=>1, 'user_id'=>1, 'municipio_id' => 55, 'parroquia'=> 'El Cantón', ));
    Parroquias::create(array( 'id' => 160,'status'=>1, 'user_id'=>1, 'municipio_id' => 55, 'parroquia'=> 'Santa Cruz de Guacas', ));
    Parroquias::create(array( 'id' => 161,'status'=>1, 'user_id'=>1, 'municipio_id' => 55, 'parroquia'=> 'Puerto Vivas', ));
    Parroquias::create(array( 'id' => 162,'status'=>1, 'user_id'=>1, 'municipio_id' => 56, 'parroquia'=> 'Ticoporo', ));
    Parroquias::create(array( 'id' => 163,'status'=>1, 'user_id'=>1, 'municipio_id' => 56, 'parroquia'=> 'Nicolás Pulido', ));
    Parroquias::create(array( 'id' => 164,'status'=>1, 'user_id'=>1, 'municipio_id' => 56, 'parroquia'=> 'Andrés Bello', ));
    Parroquias::create(array( 'id' => 165,'status'=>1, 'user_id'=>1, 'municipio_id' => 57, 'parroquia'=> 'Arismendi', ));
    Parroquias::create(array( 'id' => 166,'status'=>1, 'user_id'=>1, 'municipio_id' => 57, 'parroquia'=> 'Guadarrama', ));
    Parroquias::create(array( 'id' => 167,'status'=>1, 'user_id'=>1, 'municipio_id' => 57, 'parroquia'=> 'La Unión', ));
    Parroquias::create(array( 'id' => 168,'status'=>1, 'user_id'=>1, 'municipio_id' => 57, 'parroquia'=> 'San Antonio', ));
    Parroquias::create(array( 'id' => 169,'status'=>1, 'user_id'=>1, 'municipio_id' => 58, 'parroquia'=> 'Barinas', ));
    Parroquias::create(array( 'id' => 170,'status'=>1, 'user_id'=>1, 'municipio_id' => 58, 'parroquia'=> 'Alberto Arvelo Larriva', ));
    Parroquias::create(array( 'id' => 171,'status'=>1, 'user_id'=>1, 'municipio_id' => 58, 'parroquia'=> 'San Silvestre', ));
    Parroquias::create(array( 'id' => 172,'status'=>1, 'user_id'=>1, 'municipio_id' => 58, 'parroquia'=> 'Santa Inés', ));
    Parroquias::create(array( 'id' => 173,'status'=>1, 'user_id'=>1, 'municipio_id' => 58, 'parroquia'=> 'Santa Lucía', ));
    Parroquias::create(array( 'id' => 174,'status'=>1, 'user_id'=>1, 'municipio_id' => 58, 'parroquia'=> 'Torumos', ));
    Parroquias::create(array( 'id' => 175,'status'=>1, 'user_id'=>1, 'municipio_id' => 58, 'parroquia'=> 'El Carmen', ));
    Parroquias::create(array( 'id' => 176,'status'=>1, 'user_id'=>1, 'municipio_id' => 58, 'parroquia'=> 'Rómulo Betancourt', ));
    Parroquias::create(array( 'id' => 177,'status'=>1, 'user_id'=>1, 'municipio_id' => 58, 'parroquia'=> 'Corazón de Jesús', ));
    Parroquias::create(array( 'id' => 178,'status'=>1, 'user_id'=>1, 'municipio_id' => 58, 'parroquia'=> 'Ramón Ignacio Méndez', ));
    Parroquias::create(array( 'id' => 179,'status'=>1, 'user_id'=>1, 'municipio_id' => 58, 'parroquia'=> 'Alto Barinas', ));
    Parroquias::create(array( 'id' => 180,'status'=>1, 'user_id'=>1, 'municipio_id' => 58, 'parroquia'=> 'Manuel Palacio Fajardo', ));
    Parroquias::create(array( 'id' => 181,'status'=>1, 'user_id'=>1, 'municipio_id' => 58, 'parroquia'=> 'Juan Antonio Rodríguez Domínguez', ));
    Parroquias::create(array( 'id' => 182,'status'=>1, 'user_id'=>1, 'municipio_id' => 58, 'parroquia'=> 'Dominga Ortiz de Páez', ));
    Parroquias::create(array( 'id' => 183,'status'=>1, 'user_id'=>1, 'municipio_id' => 59, 'parroquia'=> 'Barinitas', ));
    Parroquias::create(array( 'id' => 184,'status'=>1, 'user_id'=>1, 'municipio_id' => 59, 'parroquia'=> 'Altamira de Cáceres', ));
    Parroquias::create(array( 'id' => 185,'status'=>1, 'user_id'=>1, 'municipio_id' => 59, 'parroquia'=> 'Calderas', ));
    Parroquias::create(array( 'id' => 186,'status'=>1, 'user_id'=>1, 'municipio_id' => 60, 'parroquia'=> 'Barrancas', ));
    Parroquias::create(array( 'id' => 187,'status'=>1, 'user_id'=>1, 'municipio_id' => 60, 'parroquia'=> 'El Socorro', ));
    Parroquias::create(array( 'id' => 188,'status'=>1, 'user_id'=>1, 'municipio_id' => 60, 'parroquia'=> 'Mazparrito', ));
    Parroquias::create(array( 'id' => 189,'status'=>1, 'user_id'=>1, 'municipio_id' => 61, 'parroquia'=> 'Santa Bárbara', ));
    Parroquias::create(array( 'id' => 190,'status'=>1, 'user_id'=>1, 'municipio_id' => 61, 'parroquia'=> 'Pedro Briceño Méndez', ));
    Parroquias::create(array( 'id' => 191,'status'=>1, 'user_id'=>1, 'municipio_id' => 61, 'parroquia'=> 'Ramón Ignacio Méndez', ));
    Parroquias::create(array( 'id' => 192,'status'=>1, 'user_id'=>1, 'municipio_id' => 61, 'parroquia'=> 'José Ignacio del Pumar', ));
    Parroquias::create(array( 'id' => 193,'status'=>1, 'user_id'=>1, 'municipio_id' => 62, 'parroquia'=> 'Obispos', ));
    Parroquias::create(array( 'id' => 194,'status'=>1, 'user_id'=>1, 'municipio_id' => 62, 'parroquia'=> 'Guasimitos', ));
    Parroquias::create(array( 'id' => 195,'status'=>1, 'user_id'=>1, 'municipio_id' => 62, 'parroquia'=> 'El Real', ));
    Parroquias::create(array( 'id' => 196,'status'=>1, 'user_id'=>1, 'municipio_id' => 62, 'parroquia'=> 'La Luz', ));
    Parroquias::create(array( 'id' => 197,'status'=>1, 'user_id'=>1, 'municipio_id' => 63, 'parroquia'=> ' Ciudad Bolívia', ));
    Parroquias::create(array( 'id' => 198,'status'=>1, 'user_id'=>1, 'municipio_id' => 63, 'parroquia'=> 'José Ignacio Briceño', ));
    Parroquias::create(array( 'id' => 199,'status'=>1, 'user_id'=>1, 'municipio_id' => 63, 'parroquia'=> 'José Félix Ribas', ));
    Parroquias::create(array( 'id' => 200,'status'=>1, 'user_id'=>1, 'municipio_id' => 63, 'parroquia'=> 'Páez', ));
    Parroquias::create(array( 'id' => 201,'status'=>1, 'user_id'=>1, 'municipio_id' => 64, 'parroquia'=> 'Libertad', ));
    Parroquias::create(array( 'id' => 202,'status'=>1, 'user_id'=>1, 'municipio_id' => 64, 'parroquia'=> 'Dolores', ));
    Parroquias::create(array( 'id' => 203,'status'=>1, 'user_id'=>1, 'municipio_id' => 64, 'parroquia'=> 'Santa Rosa', ));
    Parroquias::create(array( 'id' => 204,'status'=>1, 'user_id'=>1, 'municipio_id' => 64, 'parroquia'=> 'Palacio Fajardo', ));
    Parroquias::create(array( 'id' => 205,'status'=>1, 'user_id'=>1, 'municipio_id' => 65, 'parroquia'=> ' Ciudad de Nutrias', ));
    Parroquias::create(array( 'id' => 206,'status'=>1, 'user_id'=>1, 'municipio_id' => 65, 'parroquia'=> 'El Regalo', ));
    Parroquias::create(array( 'id' => 207,'status'=>1, 'user_id'=>1, 'municipio_id' => 65, 'parroquia'=> 'Puerto Nutrias', ));
    Parroquias::create(array( 'id' => 208,'status'=>1, 'user_id'=>1, 'municipio_id' => 65, 'parroquia'=> 'Santa Catalina', ));
    Parroquias::create(array( 'id' => 209,'status'=>1, 'user_id'=>1, 'municipio_id' => 66, 'parroquia'=> 'Cachamay', ));
    Parroquias::create(array( 'id' => 210,'status'=>1, 'user_id'=>1, 'municipio_id' => 66, 'parroquia'=> 'Chirica', ));
    Parroquias::create(array( 'id' => 211,'status'=>1, 'user_id'=>1, 'municipio_id' => 66, 'parroquia'=> 'Dalla Costa', ));
    Parroquias::create(array( 'id' => 212,'status'=>1, 'user_id'=>1, 'municipio_id' => 66, 'parroquia'=> 'Once de Abril', ));
    Parroquias::create(array( 'id' => 213,'status'=>1, 'user_id'=>1, 'municipio_id' => 66, 'parroquia'=> 'Simón Bolívar', ));
    Parroquias::create(array( 'id' => 214,'status'=>1, 'user_id'=>1, 'municipio_id' => 66, 'parroquia'=> 'Unare', ));
    Parroquias::create(array( 'id' => 215,'status'=>1, 'user_id'=>1, 'municipio_id' => 66, 'parroquia'=> 'Universidad', ));
    Parroquias::create(array( 'id' => 216,'status'=>1, 'user_id'=>1, 'municipio_id' => 66, 'parroquia'=> 'Vista al Sol', ));
    Parroquias::create(array( 'id' => 217,'status'=>1, 'user_id'=>1, 'municipio_id' => 66, 'parroquia'=> 'Pozo Verde', ));
    Parroquias::create(array( 'id' => 218,'status'=>1, 'user_id'=>1, 'municipio_id' => 66, 'parroquia'=> 'Yocoima', ));
    Parroquias::create(array( 'id' => 219,'status'=>1, 'user_id'=>1, 'municipio_id' => 66, 'parroquia'=> '5 de Julio', ));
    Parroquias::create(array( 'id' => 220,'status'=>1, 'user_id'=>1, 'municipio_id' => 67, 'parroquia'=> 'Cedeño', ));
    Parroquias::create(array( 'id' => 221,'status'=>1, 'user_id'=>1, 'municipio_id' => 67, 'parroquia'=> 'Altagracia', ));
    Parroquias::create(array( 'id' => 222,'status'=>1, 'user_id'=>1, 'municipio_id' => 67, 'parroquia'=> 'Ascensión Farreras', ));
    Parroquias::create(array( 'id' => 223,'status'=>1, 'user_id'=>1, 'municipio_id' => 67, 'parroquia'=> 'Guaniamo', ));
    Parroquias::create(array( 'id' => 224,'status'=>1, 'user_id'=>1, 'municipio_id' => 67, 'parroquia'=> 'La Urbana', ));
    Parroquias::create(array( 'id' => 225,'status'=>1, 'user_id'=>1, 'municipio_id' => 67, 'parroquia'=> 'Pijiguaos', ));
    Parroquias::create(array( 'id' => 226,'status'=>1, 'user_id'=>1, 'municipio_id' => 68, 'parroquia'=> 'El Callao', ));
    Parroquias::create(array( 'id' => 227,'status'=>1, 'user_id'=>1, 'municipio_id' => 69, 'parroquia'=> 'Gran Sabana', ));
    Parroquias::create(array( 'id' => 228,'status'=>1, 'user_id'=>1, 'municipio_id' => 69, 'parroquia'=> 'Ikabarú', ));
    Parroquias::create(array( 'id' => 229,'status'=>1, 'user_id'=>1, 'municipio_id' => 70, 'parroquia'=> 'Catedral', ));
    Parroquias::create(array( 'id' => 230,'status'=>1, 'user_id'=>1, 'municipio_id' => 70, 'parroquia'=> 'Zea', ));
    Parroquias::create(array( 'id' => 231,'status'=>1, 'user_id'=>1, 'municipio_id' => 70, 'parroquia'=> 'Orinoco', ));
    Parroquias::create(array( 'id' => 232,'status'=>1, 'user_id'=>1, 'municipio_id' => 70, 'parroquia'=> 'José Antonio Páez', ));
    Parroquias::create(array( 'id' => 233,'status'=>1, 'user_id'=>1, 'municipio_id' => 70, 'parroquia'=> 'Marhuanta', ));
    Parroquias::create(array( 'id' => 234,'status'=>1, 'user_id'=>1, 'municipio_id' => 70, 'parroquia'=> 'Agua Salada', ));
    Parroquias::create(array( 'id' => 235,'status'=>1, 'user_id'=>1, 'municipio_id' => 70, 'parroquia'=> 'Vista Hermosa', ));
    Parroquias::create(array( 'id' => 236,'status'=>1, 'user_id'=>1, 'municipio_id' => 70, 'parroquia'=> 'La Sabanita', ));
    Parroquias::create(array( 'id' => 237,'status'=>1, 'user_id'=>1, 'municipio_id' => 70, 'parroquia'=> 'Panapana', ));
    Parroquias::create(array( 'id' => 238,'status'=>1, 'user_id'=>1, 'municipio_id' => 71, 'parroquia'=> 'Andrés Eloy Blanco', ));
    Parroquias::create(array( 'id' => 239,'status'=>1, 'user_id'=>1, 'municipio_id' => 71, 'parroquia'=> 'Pedro Cova', ));
    Parroquias::create(array( 'id' => 240,'status'=>1, 'user_id'=>1, 'municipio_id' => 72, 'parroquia'=> 'Raúl Leoni', ));
    Parroquias::create(array( 'id' => 241,'status'=>1, 'user_id'=>1, 'municipio_id' => 72, 'parroquia'=> 'Barceloneta', ));
    Parroquias::create(array( 'id' => 242,'status'=>1, 'user_id'=>1, 'municipio_id' => 72, 'parroquia'=> 'Santa Bárbara', ));
    Parroquias::create(array( 'id' => 243,'status'=>1, 'user_id'=>1, 'municipio_id' => 72, 'parroquia'=> 'San Francisco', ));
    Parroquias::create(array( 'id' => 244,'status'=>1, 'user_id'=>1, 'municipio_id' => 73, 'parroquia'=> 'Roscio', ));
    Parroquias::create(array( 'id' => 245,'status'=>1, 'user_id'=>1, 'municipio_id' => 73, 'parroquia'=> 'Salóm', ));
    Parroquias::create(array( 'id' => 246,'status'=>1, 'user_id'=>1, 'municipio_id' => 74, 'parroquia'=> 'Sifontes', ));
    Parroquias::create(array( 'id' => 247,'status'=>1, 'user_id'=>1, 'municipio_id' => 74, 'parroquia'=> 'Dalla Costa', ));
    Parroquias::create(array( 'id' => 248,'status'=>1, 'user_id'=>1, 'municipio_id' => 74, 'parroquia'=> 'San Isidro', ));
    Parroquias::create(array( 'id' => 249,'status'=>1, 'user_id'=>1, 'municipio_id' => 75, 'parroquia'=> 'Sucre', ));
    Parroquias::create(array( 'id' => 250,'status'=>1, 'user_id'=>1, 'municipio_id' => 75, 'parroquia'=> 'Aripao', ));
    Parroquias::create(array( 'id' => 251,'status'=>1, 'user_id'=>1, 'municipio_id' => 75, 'parroquia'=> 'Guarataro', ));
    Parroquias::create(array( 'id' => 252,'status'=>1, 'user_id'=>1, 'municipio_id' => 75, 'parroquia'=> 'Las Majadas', ));
    Parroquias::create(array( 'id' => 253,'status'=>1, 'user_id'=>1, 'municipio_id' => 75, 'parroquia'=> 'Moitaco', ));
    Parroquias::create(array( 'id' => 254,'status'=>1, 'user_id'=>1, 'municipio_id' => 76, 'parroquia'=> 'Padre Pedro Chien', ));
    Parroquias::create(array( 'id' => 255,'status'=>1, 'user_id'=>1, 'municipio_id' => 76, 'parroquia'=> 'Río Grande', ));
    Parroquias::create(array( 'id' => 256,'status'=>1, 'user_id'=>1, 'municipio_id' => 77, 'parroquia'=> 'Bejuma', ));
    Parroquias::create(array( 'id' => 257,'status'=>1, 'user_id'=>1, 'municipio_id' => 77, 'parroquia'=> 'Canoabo', ));
    Parroquias::create(array( 'id' => 258,'status'=>1, 'user_id'=>1, 'municipio_id' => 77, 'parroquia'=> 'Simón Bolívar', ));
    Parroquias::create(array( 'id' => 259,'status'=>1, 'user_id'=>1, 'municipio_id' => 78, 'parroquia'=> 'Güigüe', ));
    Parroquias::create(array( 'id' => 260,'status'=>1, 'user_id'=>1, 'municipio_id' => 78, 'parroquia'=> 'Carabobo', ));
    Parroquias::create(array( 'id' => 261,'status'=>1, 'user_id'=>1, 'municipio_id' => 78, 'parroquia'=> 'Tacarigua', ));
    Parroquias::create(array( 'id' => 262,'status'=>1, 'user_id'=>1, 'municipio_id' => 79, 'parroquia'=> 'Mariara', ));
    Parroquias::create(array( 'id' => 263,'status'=>1, 'user_id'=>1, 'municipio_id' => 79, 'parroquia'=> 'Aguas Calientes', ));
    Parroquias::create(array( 'id' => 264,'status'=>1, 'user_id'=>1, 'municipio_id' => 80, 'parroquia'=> ' Ciudad Alianza', ));
    Parroquias::create(array( 'id' => 265,'status'=>1, 'user_id'=>1, 'municipio_id' => 80, 'parroquia'=> 'Guacara', ));
    Parroquias::create(array( 'id' => 266,'status'=>1, 'user_id'=>1, 'municipio_id' => 80, 'parroquia'=> 'Yagua', ));
    Parroquias::create(array( 'id' => 267,'status'=>1, 'user_id'=>1, 'municipio_id' => 81, 'parroquia'=> 'Morón', ));
    Parroquias::create(array( 'id' => 268,'status'=>1, 'user_id'=>1, 'municipio_id' => 81, 'parroquia'=> 'Yagua', ));
    Parroquias::create(array( 'id' => 269,'status'=>1, 'user_id'=>1, 'municipio_id' => 82, 'parroquia'=> 'Tocuyito', ));
    Parroquias::create(array( 'id' => 270,'status'=>1, 'user_id'=>1, 'municipio_id' => 82, 'parroquia'=> 'Independencia', ));
    Parroquias::create(array( 'id' => 271,'status'=>1, 'user_id'=>1, 'municipio_id' => 83, 'parroquia'=> 'Los Guayos', ));
    Parroquias::create(array( 'id' => 272,'status'=>1, 'user_id'=>1, 'municipio_id' => 84, 'parroquia'=> 'Miranda', ));
    Parroquias::create(array( 'id' => 273,'status'=>1, 'user_id'=>1, 'municipio_id' => 85, 'parroquia'=> 'Montalbán', ));
    Parroquias::create(array( 'id' => 274,'status'=>1, 'user_id'=>1, 'municipio_id' => 86, 'parroquia'=> 'Naguanagua', ));
    Parroquias::create(array( 'id' => 275,'status'=>1, 'user_id'=>1, 'municipio_id' => 87, 'parroquia'=> 'Bartolomé Salóm', ));
    Parroquias::create(array( 'id' => 276,'status'=>1, 'user_id'=>1, 'municipio_id' => 87, 'parroquia'=> 'Democracia', ));
    Parroquias::create(array( 'id' => 277,'status'=>1, 'user_id'=>1, 'municipio_id' => 87, 'parroquia'=> 'Fraternidad', ));
    Parroquias::create(array( 'id' => 278,'status'=>1, 'user_id'=>1, 'municipio_id' => 87, 'parroquia'=> 'Goaigoaza', ));
    Parroquias::create(array( 'id' => 279,'status'=>1, 'user_id'=>1, 'municipio_id' => 87, 'parroquia'=> 'Juan José Flores', ));
    Parroquias::create(array( 'id' => 280,'status'=>1, 'user_id'=>1, 'municipio_id' => 87, 'parroquia'=> 'Unión', ));
    Parroquias::create(array( 'id' => 281,'status'=>1, 'user_id'=>1, 'municipio_id' => 87, 'parroquia'=> 'Borburata', ));
    Parroquias::create(array( 'id' => 282,'status'=>1, 'user_id'=>1, 'municipio_id' => 87, 'parroquia'=> 'Patanemo', ));
    Parroquias::create(array( 'id' => 283,'status'=>1, 'user_id'=>1, 'municipio_id' => 88, 'parroquia'=> 'San Diego', ));
    Parroquias::create(array( 'id' => 284,'status'=>1, 'user_id'=>1, 'municipio_id' => 89, 'parroquia'=> 'San Joaquín', ));
    Parroquias::create(array( 'id' => 285,'status'=>1, 'user_id'=>1, 'municipio_id' => 90, 'parroquia'=> 'Candelaria', ));
    Parroquias::create(array( 'id' => 286,'status'=>1, 'user_id'=>1, 'municipio_id' => 90, 'parroquia'=> 'Catedral', ));
    Parroquias::create(array( 'id' => 287,'status'=>1, 'user_id'=>1, 'municipio_id' => 90, 'parroquia'=> 'El Socorro', ));
    Parroquias::create(array( 'id' => 288,'status'=>1, 'user_id'=>1, 'municipio_id' => 90, 'parroquia'=> 'Miguel Peña', ));
    Parroquias::create(array( 'id' => 289,'status'=>1, 'user_id'=>1, 'municipio_id' => 90, 'parroquia'=> 'Rafael Urdaneta', ));
    Parroquias::create(array( 'id' => 290,'status'=>1, 'user_id'=>1, 'municipio_id' => 90, 'parroquia'=> 'San Blas', ));
    Parroquias::create(array( 'id' => 291,'status'=>1, 'user_id'=>1, 'municipio_id' => 90, 'parroquia'=> 'San José', ));
    Parroquias::create(array( 'id' => 292,'status'=>1, 'user_id'=>1, 'municipio_id' => 90, 'parroquia'=> 'Santa Rosa', ));
    Parroquias::create(array( 'id' => 293,'status'=>1, 'user_id'=>1, 'municipio_id' => 90, 'parroquia'=> 'Negro Primero', ));
    Parroquias::create(array( 'id' => 294,'status'=>1, 'user_id'=>1, 'municipio_id' => 91, 'parroquia'=> 'Cojedes', ));
    Parroquias::create(array( 'id' => 295,'status'=>1, 'user_id'=>1, 'municipio_id' => 91, 'parroquia'=> 'Juan de Mata Suárez', ));
    Parroquias::create(array( 'id' => 296,'status'=>1, 'user_id'=>1, 'municipio_id' => 92, 'parroquia'=> 'Tinaquillo', ));
    Parroquias::create(array( 'id' => 297,'status'=>1, 'user_id'=>1, 'municipio_id' => 93, 'parroquia'=> 'El Baúl', ));
    Parroquias::create(array( 'id' => 298,'status'=>1, 'user_id'=>1, 'municipio_id' => 93, 'parroquia'=> 'Sucre', ));
    Parroquias::create(array( 'id' => 299,'status'=>1, 'user_id'=>1, 'municipio_id' => 94, 'parroquia'=> 'La Aguadita', ));
    Parroquias::create(array( 'id' => 300,'status'=>1, 'user_id'=>1, 'municipio_id' => 94, 'parroquia'=> 'Macapo', ));
    Parroquias::create(array( 'id' => 301,'status'=>1, 'user_id'=>1, 'municipio_id' => 95, 'parroquia'=> 'El Pao', ));
    Parroquias::create(array( 'id' => 302,'status'=>1, 'user_id'=>1, 'municipio_id' => 96, 'parroquia'=> 'El Amparo', ));
    Parroquias::create(array( 'id' => 303,'status'=>1, 'user_id'=>1, 'municipio_id' => 96, 'parroquia'=> 'Libertad de Cojedes', ));
    Parroquias::create(array( 'id' => 304,'status'=>1, 'user_id'=>1, 'municipio_id' => 97, 'parroquia'=> 'Rómulo Gallegos', ));
    Parroquias::create(array( 'id' => 305,'status'=>1, 'user_id'=>1, 'municipio_id' => 98, 'parroquia'=> 'San Carlos de Austria', ));
    Parroquias::create(array( 'id' => 306,'status'=>1, 'user_id'=>1, 'municipio_id' => 98, 'parroquia'=> 'Juan Ángel Bravo', ));
    Parroquias::create(array( 'id' => 307,'status'=>1, 'user_id'=>1, 'municipio_id' => 98, 'parroquia'=> 'Manuel Manrique', ));
    Parroquias::create(array( 'id' => 308,'status'=>1, 'user_id'=>1, 'municipio_id' => 99, 'parroquia'=> 'General en Jefe José Laurencio Silva', ));
    Parroquias::create(array( 'id' => 309,'status'=>1, 'user_id'=>1, 'municipio_id' => 100, 'parroquia'=> 'Curiapo', ));
    Parroquias::create(array( 'id' => 310,'status'=>1, 'user_id'=>1, 'municipio_id' => 100, 'parroquia'=> 'Almirante Luis Brión', ));
    Parroquias::create(array( 'id' => 311,'status'=>1, 'user_id'=>1, 'municipio_id' => 100, 'parroquia'=> 'Francisco Aniceto Lugo', ));
    Parroquias::create(array( 'id' => 312,'status'=>1, 'user_id'=>1, 'municipio_id' => 100, 'parroquia'=> 'Manuel Renaud', ));
    Parroquias::create(array( 'id' => 313,'status'=>1, 'user_id'=>1, 'municipio_id' => 100, 'parroquia'=> 'Padre Barral', ));
    Parroquias::create(array( 'id' => 314,'status'=>1, 'user_id'=>1, 'municipio_id' => 100, 'parroquia'=> 'Santos de Abelgas', ));
    Parroquias::create(array( 'id' => 315,'status'=>1, 'user_id'=>1, 'municipio_id' => 101, 'parroquia'=> 'Imataca', ));
    Parroquias::create(array( 'id' => 316,'status'=>1, 'user_id'=>1, 'municipio_id' => 101, 'parroquia'=> 'Cinco de Julio', ));
    Parroquias::create(array( 'id' => 317,'status'=>1, 'user_id'=>1, 'municipio_id' => 101, 'parroquia'=> 'Juan Bautista Arismendi', ));
    Parroquias::create(array( 'id' => 318,'status'=>1, 'user_id'=>1, 'municipio_id' => 101, 'parroquia'=> 'Manuel Piar', ));
    Parroquias::create(array( 'id' => 319,'status'=>1, 'user_id'=>1, 'municipio_id' => 101, 'parroquia'=> 'Rómulo Gallegos', ));
    Parroquias::create(array( 'id' => 320,'status'=>1, 'user_id'=>1, 'municipio_id' => 102, 'parroquia'=> 'Pedernales', ));
    Parroquias::create(array( 'id' => 321,'status'=>1, 'user_id'=>1, 'municipio_id' => 102, 'parroquia'=> 'Luis Beltrán Prieto Figueroa', ));
    Parroquias::create(array( 'id' => 322,'status'=>1, 'user_id'=>1, 'municipio_id' => 103, 'parroquia'=> 'San José (Delta Amacuro)', ));
    Parroquias::create(array( 'id' => 323,'status'=>1, 'user_id'=>1, 'municipio_id' => 103, 'parroquia'=> 'José Vidal Marcano', ));
    Parroquias::create(array( 'id' => 324,'status'=>1, 'user_id'=>1, 'municipio_id' => 103, 'parroquia'=> 'Juan Millán', ));
    Parroquias::create(array( 'id' => 325,'status'=>1, 'user_id'=>1, 'municipio_id' => 103, 'parroquia'=> 'Leonardo Ruíz Pineda', ));
    Parroquias::create(array( 'id' => 326,'status'=>1, 'user_id'=>1, 'municipio_id' => 103, 'parroquia'=> 'Mariscal Antonio José de Sucre', ));
    Parroquias::create(array( 'id' => 327,'status'=>1, 'user_id'=>1, 'municipio_id' => 103, 'parroquia'=> 'Monseñor Argimiro García', ));
    Parroquias::create(array( 'id' => 328,'status'=>1, 'user_id'=>1, 'municipio_id' => 103, 'parroquia'=> 'San Rafael (Delta Amacuro)', ));
    Parroquias::create(array( 'id' => 329,'status'=>1, 'user_id'=>1, 'municipio_id' => 103, 'parroquia'=> 'Virgen del Valle', ));
    Parroquias::create(array( 'id' => 330,'status'=>1, 'user_id'=>1, 'municipio_id' => 10, 'parroquia'=> 'Clarines', ));
    Parroquias::create(array( 'id' => 331,'status'=>1, 'user_id'=>1, 'municipio_id' => 10, 'parroquia'=> 'Guanape', ));
    Parroquias::create(array( 'id' => 332,'status'=>1, 'user_id'=>1, 'municipio_id' => 10, 'parroquia'=> 'Sabana de Uchire', ));
    Parroquias::create(array( 'id' => 333,'status'=>1, 'user_id'=>1, 'municipio_id' => 104, 'parroquia'=> 'Capadare', ));
    Parroquias::create(array( 'id' => 334,'status'=>1, 'user_id'=>1, 'municipio_id' => 104, 'parroquia'=> 'La Pastora', ));
    Parroquias::create(array( 'id' => 335,'status'=>1, 'user_id'=>1, 'municipio_id' => 104, 'parroquia'=> 'Libertador', ));
    Parroquias::create(array( 'id' => 336,'status'=>1, 'user_id'=>1, 'municipio_id' => 104, 'parroquia'=> 'San Juan de los Cayos', ));
    Parroquias::create(array( 'id' => 337,'status'=>1, 'user_id'=>1, 'municipio_id' => 105, 'parroquia'=> 'Aracua', ));
    Parroquias::create(array( 'id' => 338,'status'=>1, 'user_id'=>1, 'municipio_id' => 105, 'parroquia'=> 'La Peña', ));
    Parroquias::create(array( 'id' => 339,'status'=>1, 'user_id'=>1, 'municipio_id' => 105, 'parroquia'=> 'San Luis', ));
    Parroquias::create(array( 'id' => 340,'status'=>1, 'user_id'=>1, 'municipio_id' => 106, 'parroquia'=> 'Bariro', ));
    Parroquias::create(array( 'id' => 341,'status'=>1, 'user_id'=>1, 'municipio_id' => 106, 'parroquia'=> 'Borojó', ));
    Parroquias::create(array( 'id' => 342,'status'=>1, 'user_id'=>1, 'municipio_id' => 106, 'parroquia'=> 'Capatárida', ));
    Parroquias::create(array( 'id' => 343,'status'=>1, 'user_id'=>1, 'municipio_id' => 106, 'parroquia'=> 'Guajiro', ));
    Parroquias::create(array( 'id' => 344,'status'=>1, 'user_id'=>1, 'municipio_id' => 106, 'parroquia'=> 'Seque', ));
    Parroquias::create(array( 'id' => 345,'status'=>1, 'user_id'=>1, 'municipio_id' => 106, 'parroquia'=> 'Zazárida', ));
    Parroquias::create(array( 'id' => 346,'status'=>1, 'user_id'=>1, 'municipio_id' => 106, 'parroquia'=> 'Valle de Eroa', ));
    Parroquias::create(array( 'id' => 347,'status'=>1, 'user_id'=>1, 'municipio_id' => 107, 'parroquia'=> 'Cacique Manaure', ));
    Parroquias::create(array( 'id' => 348,'status'=>1, 'user_id'=>1, 'municipio_id' => 108, 'parroquia'=> 'Norte', ));
    Parroquias::create(array( 'id' => 349,'status'=>1, 'user_id'=>1, 'municipio_id' => 108, 'parroquia'=> 'Carirubana', ));
    Parroquias::create(array( 'id' => 350,'status'=>1, 'user_id'=>1, 'municipio_id' => 108, 'parroquia'=> 'Santa Ana', ));
    Parroquias::create(array( 'id' => 351,'status'=>1, 'user_id'=>1, 'municipio_id' => 108, 'parroquia'=> 'Urbana Punta Cardón', ));
    Parroquias::create(array( 'id' => 352,'status'=>1, 'user_id'=>1, 'municipio_id' => 109, 'parroquia'=> 'La Vela de Coro', ));
    Parroquias::create(array( 'id' => 353,'status'=>1, 'user_id'=>1, 'municipio_id' => 109, 'parroquia'=> 'Acurigua', ));
    Parroquias::create(array( 'id' => 354,'status'=>1, 'user_id'=>1, 'municipio_id' => 109, 'parroquia'=> 'Guaibacoa', ));
    Parroquias::create(array( 'id' => 355,'status'=>1, 'user_id'=>1, 'municipio_id' => 109, 'parroquia'=> 'Las Calderas', ));
    Parroquias::create(array( 'id' => 356,'status'=>1, 'user_id'=>1, 'municipio_id' => 109, 'parroquia'=> 'Macoruca', ));
    Parroquias::create(array( 'id' => 357,'status'=>1, 'user_id'=>1, 'municipio_id' => 110, 'parroquia'=> 'Dabajuro', ));
    Parroquias::create(array( 'id' => 358,'status'=>1, 'user_id'=>1, 'municipio_id' => 111, 'parroquia'=> 'Agua Clara', ));
    Parroquias::create(array( 'id' => 359,'status'=>1, 'user_id'=>1, 'municipio_id' => 111, 'parroquia'=> 'Avaria', ));
    Parroquias::create(array( 'id' => 360,'status'=>1, 'user_id'=>1, 'municipio_id' => 111, 'parroquia'=> 'Pedregal', ));
    Parroquias::create(array( 'id' => 361,'status'=>1, 'user_id'=>1, 'municipio_id' => 111, 'parroquia'=> 'Piedra Grande', ));
    Parroquias::create(array( 'id' => 362,'status'=>1, 'user_id'=>1, 'municipio_id' => 111, 'parroquia'=> 'Purureche', ));
    Parroquias::create(array( 'id' => 363,'status'=>1, 'user_id'=>1, 'municipio_id' => 112, 'parroquia'=> 'Adaure', ));
    Parroquias::create(array( 'id' => 364,'status'=>1, 'user_id'=>1, 'municipio_id' => 112, 'parroquia'=> 'Adícora', ));
    Parroquias::create(array( 'id' => 365,'status'=>1, 'user_id'=>1, 'municipio_id' => 112, 'parroquia'=> 'Baraived', ));
    Parroquias::create(array( 'id' => 366,'status'=>1, 'user_id'=>1, 'municipio_id' => 112, 'parroquia'=> 'Buena Vista', ));
    Parroquias::create(array( 'id' => 367,'status'=>1, 'user_id'=>1, 'municipio_id' => 112, 'parroquia'=> 'Jadacaquiva', ));
    Parroquias::create(array( 'id' => 368,'status'=>1, 'user_id'=>1, 'municipio_id' => 112, 'parroquia'=> 'El Vínculo', ));
    Parroquias::create(array( 'id' => 369,'status'=>1, 'user_id'=>1, 'municipio_id' => 112, 'parroquia'=> 'El Hato', ));
    Parroquias::create(array( 'id' => 370,'status'=>1, 'user_id'=>1, 'municipio_id' => 112, 'parroquia'=> 'Moruy', ));
    Parroquias::create(array( 'id' => 371,'status'=>1, 'user_id'=>1, 'municipio_id' => 112, 'parroquia'=> 'Pueblo Nuevo', ));
    Parroquias::create(array( 'id' => 372,'status'=>1, 'user_id'=>1, 'municipio_id' => 113, 'parroquia'=> 'Agua Larga', ));
    Parroquias::create(array( 'id' => 373,'status'=>1, 'user_id'=>1, 'municipio_id' => 113, 'parroquia'=> 'El Paují', ));
    Parroquias::create(array( 'id' => 374,'status'=>1, 'user_id'=>1, 'municipio_id' => 113, 'parroquia'=> 'Independencia', ));
    Parroquias::create(array( 'id' => 375,'status'=>1, 'user_id'=>1, 'municipio_id' => 113, 'parroquia'=> 'Mapararí', ));
    Parroquias::create(array( 'id' => 376,'status'=>1, 'user_id'=>1, 'municipio_id' => 114, 'parroquia'=> 'Agua Linda', ));
    Parroquias::create(array( 'id' => 377,'status'=>1, 'user_id'=>1, 'municipio_id' => 114, 'parroquia'=> 'Araurima', ));
    Parroquias::create(array( 'id' => 378,'status'=>1, 'user_id'=>1, 'municipio_id' => 114, 'parroquia'=> 'Jacura', ));
    Parroquias::create(array( 'id' => 379,'status'=>1, 'user_id'=>1, 'municipio_id' => 115, 'parroquia'=> 'Tucacas', ));
    Parroquias::create(array( 'id' => 380,'status'=>1, 'user_id'=>1, 'municipio_id' => 115, 'parroquia'=> 'Boca de Aroa', ));
    Parroquias::create(array( 'id' => 381,'status'=>1, 'user_id'=>1, 'municipio_id' => 116, 'parroquia'=> 'Los Taques', ));
    Parroquias::create(array( 'id' => 382,'status'=>1, 'user_id'=>1, 'municipio_id' => 116, 'parroquia'=> 'Judibana', ));
    Parroquias::create(array( 'id' => 383,'status'=>1, 'user_id'=>1, 'municipio_id' => 117, 'parroquia'=> 'Mene de Mauroa', ));
    Parroquias::create(array( 'id' => 384,'status'=>1, 'user_id'=>1, 'municipio_id' => 117, 'parroquia'=> 'San Félix', ));
    Parroquias::create(array( 'id' => 385,'status'=>1, 'user_id'=>1, 'municipio_id' => 117, 'parroquia'=> 'Casigua', ));
    Parroquias::create(array( 'id' => 386,'status'=>1, 'user_id'=>1, 'municipio_id' => 118, 'parroquia'=> 'Guzmán Guillermo', ));
    Parroquias::create(array( 'id' => 387,'status'=>1, 'user_id'=>1, 'municipio_id' => 118, 'parroquia'=> 'Mitare', ));
    Parroquias::create(array( 'id' => 388,'status'=>1, 'user_id'=>1, 'municipio_id' => 118, 'parroquia'=> 'Río Seco', ));
    Parroquias::create(array( 'id' => 389,'status'=>1, 'user_id'=>1, 'municipio_id' => 118, 'parroquia'=> 'Sabaneta', ));
    Parroquias::create(array( 'id' => 390,'status'=>1, 'user_id'=>1, 'municipio_id' => 118, 'parroquia'=> 'San Antonio', ));
    Parroquias::create(array( 'id' => 391,'status'=>1, 'user_id'=>1, 'municipio_id' => 118, 'parroquia'=> 'San Gabriel', ));
    Parroquias::create(array( 'id' => 392,'status'=>1, 'user_id'=>1, 'municipio_id' => 118, 'parroquia'=> 'Santa Ana', ));
    Parroquias::create(array( 'id' => 393,'status'=>1, 'user_id'=>1, 'municipio_id' => 119, 'parroquia'=> 'Boca del Tocuyo', ));
    Parroquias::create(array( 'id' => 394,'status'=>1, 'user_id'=>1, 'municipio_id' => 119, 'parroquia'=> 'Chichiriviche', ));
    Parroquias::create(array( 'id' => 395,'status'=>1, 'user_id'=>1, 'municipio_id' => 119, 'parroquia'=> 'Tocuyo de la Costa', ));
    Parroquias::create(array( 'id' => 396,'status'=>1, 'user_id'=>1, 'municipio_id' => 120, 'parroquia'=> 'Palmasola', ));
    Parroquias::create(array( 'id' => 397,'status'=>1, 'user_id'=>1, 'municipio_id' => 121, 'parroquia'=> 'Cabure', ));
    Parroquias::create(array( 'id' => 398,'status'=>1, 'user_id'=>1, 'municipio_id' => 121, 'parroquia'=> 'Colina', ));
    Parroquias::create(array( 'id' => 399,'status'=>1, 'user_id'=>1, 'municipio_id' => 121, 'parroquia'=> 'Curimagua', ));
    Parroquias::create(array( 'id' => 400,'status'=>1, 'user_id'=>1, 'municipio_id' => 122, 'parroquia'=> 'San José de la Costa', ));
    Parroquias::create(array( 'id' => 401,'status'=>1, 'user_id'=>1, 'municipio_id' => 122, 'parroquia'=> 'Píritu', ));
    Parroquias::create(array( 'id' => 402,'status'=>1, 'user_id'=>1, 'municipio_id' => 123, 'parroquia'=> 'San Francisco', ));
    Parroquias::create(array( 'id' => 403,'status'=>1, 'user_id'=>1, 'municipio_id' => 124, 'parroquia'=> 'Sucre', ));
    Parroquias::create(array( 'id' => 404,'status'=>1, 'user_id'=>1, 'municipio_id' => 124, 'parroquia'=> 'Pecaya', ));
    Parroquias::create(array( 'id' => 405,'status'=>1, 'user_id'=>1, 'municipio_id' => 125, 'parroquia'=> 'Tocópero', ));
    Parroquias::create(array( 'id' => 406,'status'=>1, 'user_id'=>1, 'municipio_id' => 126, 'parroquia'=> 'El Charal', ));
    Parroquias::create(array( 'id' => 407,'status'=>1, 'user_id'=>1, 'municipio_id' => 126, 'parroquia'=> 'Las Vegas del Tuy', ));
    Parroquias::create(array( 'id' => 408,'status'=>1, 'user_id'=>1, 'municipio_id' => 126, 'parroquia'=> 'Santa Cruz de Bucaral', ));
    Parroquias::create(array( 'id' => 409,'status'=>1, 'user_id'=>1, 'municipio_id' => 127, 'parroquia'=> 'Bruzual', ));
    Parroquias::create(array( 'id' => 410,'status'=>1, 'user_id'=>1, 'municipio_id' => 127, 'parroquia'=> 'Urumaco', ));
    Parroquias::create(array( 'id' => 411,'status'=>1, 'user_id'=>1, 'municipio_id' => 128, 'parroquia'=> 'Puerto Cumarebo', ));
    Parroquias::create(array( 'id' => 412,'status'=>1, 'user_id'=>1, 'municipio_id' => 128, 'parroquia'=> 'La Ciénaga', ));
    Parroquias::create(array( 'id' => 413,'status'=>1, 'user_id'=>1, 'municipio_id' => 128, 'parroquia'=> 'La Soledad', ));
    Parroquias::create(array( 'id' => 414,'status'=>1, 'user_id'=>1, 'municipio_id' => 128, 'parroquia'=> 'Pueblo Cumarebo', ));
    Parroquias::create(array( 'id' => 415,'status'=>1, 'user_id'=>1, 'municipio_id' => 128, 'parroquia'=> 'Zazárida', ));
    Parroquias::create(array( 'id' => 416,'status'=>1, 'user_id'=>1, 'municipio_id' => 113, 'parroquia'=> 'Churuguara', ));
    Parroquias::create(array( 'id' => 417,'status'=>1, 'user_id'=>1, 'municipio_id' => 129, 'parroquia'=> 'Camaguán', ));
    Parroquias::create(array( 'id' => 418,'status'=>1, 'user_id'=>1, 'municipio_id' => 129, 'parroquia'=> 'Puerto Miranda', ));
    Parroquias::create(array( 'id' => 419,'status'=>1, 'user_id'=>1, 'municipio_id' => 129, 'parroquia'=> 'Uverito', ));
    Parroquias::create(array( 'id' => 420,'status'=>1, 'user_id'=>1, 'municipio_id' => 130, 'parroquia'=> 'Chaguaramas', ));
    Parroquias::create(array( 'id' => 421,'status'=>1, 'user_id'=>1, 'municipio_id' => 131, 'parroquia'=> 'El Socorro', ));
    Parroquias::create(array( 'id' => 422,'status'=>1, 'user_id'=>1, 'municipio_id' => 132, 'parroquia'=> 'Tucupido', ));
    Parroquias::create(array( 'id' => 423,'status'=>1, 'user_id'=>1, 'municipio_id' => 132, 'parroquia'=> 'San Rafael de Laya', ));
    Parroquias::create(array( 'id' => 424,'status'=>1, 'user_id'=>1, 'municipio_id' => 133, 'parroquia'=> 'Altagracia de Orituco', ));
    Parroquias::create(array( 'id' => 425,'status'=>1, 'user_id'=>1, 'municipio_id' => 133, 'parroquia'=> 'San Rafael de Orituco', ));
    Parroquias::create(array( 'id' => 426,'status'=>1, 'user_id'=>1, 'municipio_id' => 133, 'parroquia'=> 'San Francisco Javier de Lezama', ));
    Parroquias::create(array( 'id' => 427,'status'=>1, 'user_id'=>1, 'municipio_id' => 133, 'parroquia'=> 'Paso Real de Macaira', ));
    Parroquias::create(array( 'id' => 428,'status'=>1, 'user_id'=>1, 'municipio_id' => 133, 'parroquia'=> 'Carlos Soublette', ));
    Parroquias::create(array( 'id' => 429,'status'=>1, 'user_id'=>1, 'municipio_id' => 133, 'parroquia'=> 'San Francisco de Macaira', ));
    Parroquias::create(array( 'id' => 430,'status'=>1, 'user_id'=>1, 'municipio_id' => 133, 'parroquia'=> 'Libertad de Orituco', ));
    Parroquias::create(array( 'id' => 431,'status'=>1, 'user_id'=>1, 'municipio_id' => 134, 'parroquia'=> 'Cantaclaro', ));
    Parroquias::create(array( 'id' => 432,'status'=>1, 'user_id'=>1, 'municipio_id' => 134, 'parroquia'=> 'San Juan de los Morros', ));
    Parroquias::create(array( 'id' => 433,'status'=>1, 'user_id'=>1, 'municipio_id' => 134, 'parroquia'=> 'Parapara', ));
    Parroquias::create(array( 'id' => 434,'status'=>1, 'user_id'=>1, 'municipio_id' => 135, 'parroquia'=> 'El Sombrero', ));
    Parroquias::create(array( 'id' => 435,'status'=>1, 'user_id'=>1, 'municipio_id' => 135, 'parroquia'=> 'Sosa', ));
    Parroquias::create(array( 'id' => 436,'status'=>1, 'user_id'=>1, 'municipio_id' => 136, 'parroquia'=> 'Las Mercedes', ));
    Parroquias::create(array( 'id' => 437,'status'=>1, 'user_id'=>1, 'municipio_id' => 136, 'parroquia'=> 'Cabruta', ));
    Parroquias::create(array( 'id' => 438,'status'=>1, 'user_id'=>1, 'municipio_id' => 136, 'parroquia'=> 'Santa Rita de Manapire', ));
    Parroquias::create(array( 'id' => 439,'status'=>1, 'user_id'=>1, 'municipio_id' => 137, 'parroquia'=> 'Valle de la Pascua', ));
    Parroquias::create(array( 'id' => 440,'status'=>1, 'user_id'=>1, 'municipio_id' => 137, 'parroquia'=> 'Espino', ));
    Parroquias::create(array( 'id' => 441,'status'=>1, 'user_id'=>1, 'municipio_id' => 138, 'parroquia'=> 'San José de Unare', ));
    Parroquias::create(array( 'id' => 442,'status'=>1, 'user_id'=>1, 'municipio_id' => 138, 'parroquia'=> 'Zaraza', ));
    Parroquias::create(array( 'id' => 443,'status'=>1, 'user_id'=>1, 'municipio_id' => 139, 'parroquia'=> 'San José de Tiznados', ));
    Parroquias::create(array( 'id' => 444,'status'=>1, 'user_id'=>1, 'municipio_id' => 139, 'parroquia'=> 'San Francisco de Tiznados', ));
    Parroquias::create(array( 'id' => 445,'status'=>1, 'user_id'=>1, 'municipio_id' => 139, 'parroquia'=> 'San Lorenzo de Tiznados', ));
    Parroquias::create(array( 'id' => 446,'status'=>1, 'user_id'=>1, 'municipio_id' => 139, 'parroquia'=> 'Ortiz', ));
    Parroquias::create(array( 'id' => 447,'status'=>1, 'user_id'=>1, 'municipio_id' => 140, 'parroquia'=> 'Guayabal', ));
    Parroquias::create(array( 'id' => 448,'status'=>1, 'user_id'=>1, 'municipio_id' => 140, 'parroquia'=> 'Cazorla', ));
    Parroquias::create(array( 'id' => 449,'status'=>1, 'user_id'=>1, 'municipio_id' => 141, 'parroquia'=> 'San José de Guaribe', ));
    Parroquias::create(array( 'id' => 450,'status'=>1, 'user_id'=>1, 'municipio_id' => 141, 'parroquia'=> 'Uveral', ));
    Parroquias::create(array( 'id' => 451,'status'=>1, 'user_id'=>1, 'municipio_id' => 142, 'parroquia'=> 'Santa María de Ipire', ));
    Parroquias::create(array( 'id' => 452,'status'=>1, 'user_id'=>1, 'municipio_id' => 142, 'parroquia'=> 'Altamira', ));
    Parroquias::create(array( 'id' => 453,'status'=>1, 'user_id'=>1, 'municipio_id' => 143, 'parroquia'=> 'El Calvario', ));
    Parroquias::create(array( 'id' => 454,'status'=>1, 'user_id'=>1, 'municipio_id' => 143, 'parroquia'=> 'El Rastro', ));
    Parroquias::create(array( 'id' => 455,'status'=>1, 'user_id'=>1, 'municipio_id' => 143, 'parroquia'=> 'Guardatinajas', ));
    Parroquias::create(array( 'id' => 456,'status'=>1, 'user_id'=>1, 'municipio_id' => 143, 'parroquia'=> 'Capital Urbana Calabozo', ));
    Parroquias::create(array( 'id' => 457,'status'=>1, 'user_id'=>1, 'municipio_id' => 144, 'parroquia'=> 'Quebrada Honda de Guache', ));
    Parroquias::create(array( 'id' => 458,'status'=>1, 'user_id'=>1, 'municipio_id' => 144, 'parroquia'=> 'Pío Tamayo', ));
    Parroquias::create(array( 'id' => 459,'status'=>1, 'user_id'=>1, 'municipio_id' => 144, 'parroquia'=> 'Yacambú', ));
    Parroquias::create(array( 'id' => 460,'status'=>1, 'user_id'=>1, 'municipio_id' => 145, 'parroquia'=> 'Fréitez', ));
    Parroquias::create(array( 'id' => 461,'status'=>1, 'user_id'=>1, 'municipio_id' => 145, 'parroquia'=> 'José María Blanco', ));
    Parroquias::create(array( 'id' => 462,'status'=>1, 'user_id'=>1, 'municipio_id' => 146, 'parroquia'=> 'Catedral', ));
    Parroquias::create(array( 'id' => 463,'status'=>1, 'user_id'=>1, 'municipio_id' => 146, 'parroquia'=> 'Concepción', ));
    Parroquias::create(array( 'id' => 464,'status'=>1, 'user_id'=>1, 'municipio_id' => 146, 'parroquia'=> 'El Cují', ));
    Parroquias::create(array( 'id' => 465,'status'=>1, 'user_id'=>1, 'municipio_id' => 146, 'parroquia'=> 'Juan de Villegas', ));
    Parroquias::create(array( 'id' => 466,'status'=>1, 'user_id'=>1, 'municipio_id' => 146, 'parroquia'=> 'Santa Rosa', ));
    Parroquias::create(array( 'id' => 467,'status'=>1, 'user_id'=>1, 'municipio_id' => 146, 'parroquia'=> 'Tamaca', ));
    Parroquias::create(array( 'id' => 468,'status'=>1, 'user_id'=>1, 'municipio_id' => 146, 'parroquia'=> 'Unión', ));
    Parroquias::create(array( 'id' => 469,'status'=>1, 'user_id'=>1, 'municipio_id' => 146, 'parroquia'=> 'Aguedo Felipe Alvarado', ));
    Parroquias::create(array( 'id' => 470,'status'=>1, 'user_id'=>1, 'municipio_id' => 146, 'parroquia'=> 'Buena Vista', ));
    Parroquias::create(array( 'id' => 471,'status'=>1, 'user_id'=>1, 'municipio_id' => 146, 'parroquia'=> 'Juárez', ));
    Parroquias::create(array( 'id' => 472,'status'=>1, 'user_id'=>1, 'municipio_id' => 147, 'parroquia'=> 'Juan Bautista Rodríguez', ));
    Parroquias::create(array( 'id' => 473,'status'=>1, 'user_id'=>1, 'municipio_id' => 147, 'parroquia'=> 'Cuara', ));
    Parroquias::create(array( 'id' => 474,'status'=>1, 'user_id'=>1, 'municipio_id' => 147, 'parroquia'=> 'Diego de Lozada', ));
    Parroquias::create(array( 'id' => 475,'status'=>1, 'user_id'=>1, 'municipio_id' => 147, 'parroquia'=> 'Paraíso de San José', ));
    Parroquias::create(array( 'id' => 476,'status'=>1, 'user_id'=>1, 'municipio_id' => 147, 'parroquia'=> 'San Miguel', ));
    Parroquias::create(array( 'id' => 477,'status'=>1, 'user_id'=>1, 'municipio_id' => 147, 'parroquia'=> 'Tintorero', ));
    Parroquias::create(array( 'id' => 478,'status'=>1, 'user_id'=>1, 'municipio_id' => 147, 'parroquia'=> 'José Bernardo Dorante', ));
    Parroquias::create(array( 'id' => 479,'status'=>1, 'user_id'=>1, 'municipio_id' => 147, 'parroquia'=> 'Coronel Mariano Peraza ', ));
    Parroquias::create(array( 'id' => 480,'status'=>1, 'user_id'=>1, 'municipio_id' => 148, 'parroquia'=> 'Bolívar', ));
    Parroquias::create(array( 'id' => 481,'status'=>1, 'user_id'=>1, 'municipio_id' => 148, 'parroquia'=> 'Anzoátegui', ));
    Parroquias::create(array( 'id' => 482,'status'=>1, 'user_id'=>1, 'municipio_id' => 148, 'parroquia'=> 'Guarico', ));
    Parroquias::create(array( 'id' => 483,'status'=>1, 'user_id'=>1, 'municipio_id' => 148, 'parroquia'=> 'Hilario Luna y Luna', ));
    Parroquias::create(array( 'id' => 484,'status'=>1, 'user_id'=>1, 'municipio_id' => 148, 'parroquia'=> 'Humocaro Alto', ));
    Parroquias::create(array( 'id' => 485,'status'=>1, 'user_id'=>1, 'municipio_id' => 148, 'parroquia'=> 'Humocaro Bajo', ));
    Parroquias::create(array( 'id' => 486,'status'=>1, 'user_id'=>1, 'municipio_id' => 148, 'parroquia'=> 'La Candelaria', ));
    Parroquias::create(array( 'id' => 487,'status'=>1, 'user_id'=>1, 'municipio_id' => 148, 'parroquia'=> 'Morán', ));
    Parroquias::create(array( 'id' => 488,'status'=>1, 'user_id'=>1, 'municipio_id' => 149, 'parroquia'=> 'Cabudare', ));
    Parroquias::create(array( 'id' => 489,'status'=>1, 'user_id'=>1, 'municipio_id' => 149, 'parroquia'=> 'José Gregorio Bastidas', ));
    Parroquias::create(array( 'id' => 490,'status'=>1, 'user_id'=>1, 'municipio_id' => 149, 'parroquia'=> 'Agua Viva', ));
    Parroquias::create(array( 'id' => 491,'status'=>1, 'user_id'=>1, 'municipio_id' => 150, 'parroquia'=> 'Sarare', ));
    Parroquias::create(array( 'id' => 492,'status'=>1, 'user_id'=>1, 'municipio_id' => 150, 'parroquia'=> 'Buría', ));
    Parroquias::create(array( 'id' => 493,'status'=>1, 'user_id'=>1, 'municipio_id' => 150, 'parroquia'=> 'Gustavo Vegas León', ));
    Parroquias::create(array( 'id' => 494,'status'=>1, 'user_id'=>1, 'municipio_id' => 151, 'parroquia'=> 'Trinidad Samuel', ));
    Parroquias::create(array( 'id' => 495,'status'=>1, 'user_id'=>1, 'municipio_id' => 151, 'parroquia'=> 'Antonio Díaz', ));
    Parroquias::create(array( 'id' => 496,'status'=>1, 'user_id'=>1, 'municipio_id' => 151, 'parroquia'=> 'Camacaro', ));
    Parroquias::create(array( 'id' => 497,'status'=>1, 'user_id'=>1, 'municipio_id' => 151, 'parroquia'=> 'Castañeda', ));
    Parroquias::create(array( 'id' => 498,'status'=>1, 'user_id'=>1, 'municipio_id' => 151, 'parroquia'=> 'Cecilio Zubillaga', ));
    Parroquias::create(array( 'id' => 499,'status'=>1, 'user_id'=>1, 'municipio_id' => 151, 'parroquia'=> 'Chiquinquirá', ));
    Parroquias::create(array( 'id' => 500,'status'=>1, 'user_id'=>1, 'municipio_id' => 151, 'parroquia'=> 'El Blanco', ));
    Parroquias::create(array( 'id' => 501,'status'=>1, 'user_id'=>1, 'municipio_id' => 151, 'parroquia'=> 'Espinoza de los Monteros', ));
    Parroquias::create(array( 'id' => 502,'status'=>1, 'user_id'=>1, 'municipio_id' => 151, 'parroquia'=> 'Lara', ));
    Parroquias::create(array( 'id' => 503,'status'=>1, 'user_id'=>1, 'municipio_id' => 151, 'parroquia'=> 'Las Mercedes', ));
    Parroquias::create(array( 'id' => 504,'status'=>1, 'user_id'=>1, 'municipio_id' => 151, 'parroquia'=> 'Manuel Morillo', ));
    Parroquias::create(array( 'id' => 505,'status'=>1, 'user_id'=>1, 'municipio_id' => 151, 'parroquia'=> 'Montaña Verde', ));
    Parroquias::create(array( 'id' => 506,'status'=>1, 'user_id'=>1, 'municipio_id' => 151, 'parroquia'=> 'Montes de Oca', ));
    Parroquias::create(array( 'id' => 507,'status'=>1, 'user_id'=>1, 'municipio_id' => 151, 'parroquia'=> 'Torres', ));
    Parroquias::create(array( 'id' => 508,'status'=>1, 'user_id'=>1, 'municipio_id' => 151, 'parroquia'=> 'Heriberto Arroyo', ));
    Parroquias::create(array( 'id' => 509,'status'=>1, 'user_id'=>1, 'municipio_id' => 151, 'parroquia'=> 'Reyes Vargas', ));
    Parroquias::create(array( 'id' => 510,'status'=>1, 'user_id'=>1, 'municipio_id' => 151, 'parroquia'=> 'Altagracia', ));
    Parroquias::create(array( 'id' => 511,'status'=>1, 'user_id'=>1, 'municipio_id' => 152, 'parroquia'=> 'Siquisique', ));
    Parroquias::create(array( 'id' => 512,'status'=>1, 'user_id'=>1, 'municipio_id' => 152, 'parroquia'=> 'Moroturo', ));
    Parroquias::create(array( 'id' => 513,'status'=>1, 'user_id'=>1, 'municipio_id' => 152, 'parroquia'=> 'San Miguel', ));
    Parroquias::create(array( 'id' => 514,'status'=>1, 'user_id'=>1, 'municipio_id' => 152, 'parroquia'=> 'Xaguas', ));
    Parroquias::create(array( 'id' => 515,'status'=>1, 'user_id'=>1, 'municipio_id' => 179, 'parroquia'=> 'Presidente Betancourt', ));
    Parroquias::create(array( 'id' => 516,'status'=>1, 'user_id'=>1, 'municipio_id' => 179, 'parroquia'=> 'Presidente Páez', ));
    Parroquias::create(array( 'id' => 517,'status'=>1, 'user_id'=>1, 'municipio_id' => 179, 'parroquia'=> 'Presidente Rómulo Gallegos', ));
    Parroquias::create(array( 'id' => 518,'status'=>1, 'user_id'=>1, 'municipio_id' => 179, 'parroquia'=> 'Gabriel Picón González', ));
    Parroquias::create(array( 'id' => 519,'status'=>1, 'user_id'=>1, 'municipio_id' => 179, 'parroquia'=> 'Héctor Amable Mora', ));
    Parroquias::create(array( 'id' => 520,'status'=>1, 'user_id'=>1, 'municipio_id' => 179, 'parroquia'=> 'José Nucete Sardi', ));
    Parroquias::create(array( 'id' => 521,'status'=>1, 'user_id'=>1, 'municipio_id' => 179, 'parroquia'=> 'Pulido Méndez', ));
    Parroquias::create(array( 'id' => 522,'status'=>1, 'user_id'=>1, 'municipio_id' => 180, 'parroquia'=> 'La Azulita', ));
    Parroquias::create(array( 'id' => 523,'status'=>1, 'user_id'=>1, 'municipio_id' => 181, 'parroquia'=> 'Santa Cruz de Mora', ));
    Parroquias::create(array( 'id' => 524,'status'=>1, 'user_id'=>1, 'municipio_id' => 181, 'parroquia'=> 'Mesa Bolívar', ));
    Parroquias::create(array( 'id' => 525,'status'=>1, 'user_id'=>1, 'municipio_id' => 181, 'parroquia'=> 'Mesa de Las Palmas', ));
    Parroquias::create(array( 'id' => 526,'status'=>1, 'user_id'=>1, 'municipio_id' => 182, 'parroquia'=> 'Aricagua', ));
    Parroquias::create(array( 'id' => 527,'status'=>1, 'user_id'=>1, 'municipio_id' => 182, 'parroquia'=> 'San Antonio', ));
    Parroquias::create(array( 'id' => 528,'status'=>1, 'user_id'=>1, 'municipio_id' => 183, 'parroquia'=> 'Canagua', ));
    Parroquias::create(array( 'id' => 529,'status'=>1, 'user_id'=>1, 'municipio_id' => 183, 'parroquia'=> 'Capurí', ));
    Parroquias::create(array( 'id' => 530,'status'=>1, 'user_id'=>1, 'municipio_id' => 183, 'parroquia'=> 'Chacantá', ));
    Parroquias::create(array( 'id' => 531,'status'=>1, 'user_id'=>1, 'municipio_id' => 183, 'parroquia'=> 'El Molino', ));
    Parroquias::create(array( 'id' => 532,'status'=>1, 'user_id'=>1, 'municipio_id' => 183, 'parroquia'=> 'Guaimaral', ));
    Parroquias::create(array( 'id' => 533,'status'=>1, 'user_id'=>1, 'municipio_id' => 183, 'parroquia'=> 'Mucutuy', ));
    Parroquias::create(array( 'id' => 534,'status'=>1, 'user_id'=>1, 'municipio_id' => 183, 'parroquia'=> 'Mucuchachí', ));
    Parroquias::create(array( 'id' => 535,'status'=>1, 'user_id'=>1, 'municipio_id' => 184, 'parroquia'=> 'Fernández Peña', ));
    Parroquias::create(array( 'id' => 536,'status'=>1, 'user_id'=>1, 'municipio_id' => 184, 'parroquia'=> 'Matriz', ));
    Parroquias::create(array( 'id' => 537,'status'=>1, 'user_id'=>1, 'municipio_id' => 184, 'parroquia'=> 'Montalbán', ));
    Parroquias::create(array( 'id' => 538,'status'=>1, 'user_id'=>1, 'municipio_id' => 184, 'parroquia'=> 'Acequias', ));
    Parroquias::create(array( 'id' => 539,'status'=>1, 'user_id'=>1, 'municipio_id' => 184, 'parroquia'=> 'Jají', ));
    Parroquias::create(array( 'id' => 540,'status'=>1, 'user_id'=>1, 'municipio_id' => 184, 'parroquia'=> 'La Mesa', ));
    Parroquias::create(array( 'id' => 541,'status'=>1, 'user_id'=>1, 'municipio_id' => 184, 'parroquia'=> 'San José del Sur', ));
    Parroquias::create(array( 'id' => 542,'status'=>1, 'user_id'=>1, 'municipio_id' => 185, 'parroquia'=> 'Tucaní', ));
    Parroquias::create(array( 'id' => 543,'status'=>1, 'user_id'=>1, 'municipio_id' => 185, 'parroquia'=> 'Florencio Ramírez', ));
    Parroquias::create(array( 'id' => 544,'status'=>1, 'user_id'=>1, 'municipio_id' => 186, 'parroquia'=> 'Santo Domingo', ));
    Parroquias::create(array( 'id' => 545,'status'=>1, 'user_id'=>1, 'municipio_id' => 186, 'parroquia'=> 'Las Piedras', ));
    Parroquias::create(array( 'id' => 546,'status'=>1, 'user_id'=>1, 'municipio_id' => 187, 'parroquia'=> 'Guaraque', ));
    Parroquias::create(array( 'id' => 547,'status'=>1, 'user_id'=>1, 'municipio_id' => 187, 'parroquia'=> 'Mesa de Quintero', ));
    Parroquias::create(array( 'id' => 548,'status'=>1, 'user_id'=>1, 'municipio_id' => 187, 'parroquia'=> 'Río Negro', ));
    Parroquias::create(array( 'id' => 549,'status'=>1, 'user_id'=>1, 'municipio_id' => 188, 'parroquia'=> 'Arapuey', ));
    Parroquias::create(array( 'id' => 550,'status'=>1, 'user_id'=>1, 'municipio_id' => 188, 'parroquia'=> 'Palmira', ));
    Parroquias::create(array( 'id' => 551,'status'=>1, 'user_id'=>1, 'municipio_id' => 189, 'parroquia'=> 'San Cristóbal de Torondoy', ));
    Parroquias::create(array( 'id' => 552,'status'=>1, 'user_id'=>1, 'municipio_id' => 189, 'parroquia'=> 'Torondoy', ));
    Parroquias::create(array( 'id' => 553,'status'=>1, 'user_id'=>1, 'municipio_id' => 190, 'parroquia'=> 'Antonio Spinetti Dini', ));
    Parroquias::create(array( 'id' => 554,'status'=>1, 'user_id'=>1, 'municipio_id' => 190, 'parroquia'=> 'Arias', ));
    Parroquias::create(array( 'id' => 555,'status'=>1, 'user_id'=>1, 'municipio_id' => 190, 'parroquia'=> 'Caracciolo Parra Pérez', ));
    Parroquias::create(array( 'id' => 556,'status'=>1, 'user_id'=>1, 'municipio_id' => 190, 'parroquia'=> 'Domingo Peña', ));
    Parroquias::create(array( 'id' => 557,'status'=>1, 'user_id'=>1, 'municipio_id' => 190, 'parroquia'=> 'El Llano', ));
    Parroquias::create(array( 'id' => 558,'status'=>1, 'user_id'=>1, 'municipio_id' => 190, 'parroquia'=> 'Gonzalo Picón Febres', ));
    Parroquias::create(array( 'id' => 559,'status'=>1, 'user_id'=>1, 'municipio_id' => 190, 'parroquia'=> 'Jacinto Plaza', ));
    Parroquias::create(array( 'id' => 560,'status'=>1, 'user_id'=>1, 'municipio_id' => 190, 'parroquia'=> 'Juan Rodríguez Suárez', ));
    Parroquias::create(array( 'id' => 561,'status'=>1, 'user_id'=>1, 'municipio_id' => 190, 'parroquia'=> 'Lasso de la Vega', ));
    Parroquias::create(array( 'id' => 562,'status'=>1, 'user_id'=>1, 'municipio_id' => 190, 'parroquia'=> 'Mariano Picón Salas', ));
    Parroquias::create(array( 'id' => 563,'status'=>1, 'user_id'=>1, 'municipio_id' => 190, 'parroquia'=> 'Milla', ));
    Parroquias::create(array( 'id' => 564,'status'=>1, 'user_id'=>1, 'municipio_id' => 190, 'parroquia'=> 'Osuna Rodríguez', ));
    Parroquias::create(array( 'id' => 565,'status'=>1, 'user_id'=>1, 'municipio_id' => 190, 'parroquia'=> 'Sagrario', ));
    Parroquias::create(array( 'id' => 566,'status'=>1, 'user_id'=>1, 'municipio_id' => 190, 'parroquia'=> 'El Morro', ));
    Parroquias::create(array( 'id' => 567,'status'=>1, 'user_id'=>1, 'municipio_id' => 190, 'parroquia'=> 'Los Nevados', ));
    Parroquias::create(array( 'id' => 568,'status'=>1, 'user_id'=>1, 'municipio_id' => 191, 'parroquia'=> 'Andrés Eloy Blanco', ));
    Parroquias::create(array( 'id' => 569,'status'=>1, 'user_id'=>1, 'municipio_id' => 191, 'parroquia'=> 'La Venta', ));
    Parroquias::create(array( 'id' => 570,'status'=>1, 'user_id'=>1, 'municipio_id' => 191, 'parroquia'=> 'Piñango', ));
    Parroquias::create(array( 'id' => 571,'status'=>1, 'user_id'=>1, 'municipio_id' => 191, 'parroquia'=> 'Timotes', ));
    Parroquias::create(array( 'id' => 572,'status'=>1, 'user_id'=>1, 'municipio_id' => 192, 'parroquia'=> 'Eloy Paredes', ));
    Parroquias::create(array( 'id' => 573,'status'=>1, 'user_id'=>1, 'municipio_id' => 192, 'parroquia'=> 'San Rafael de Alcázar', ));
    Parroquias::create(array( 'id' => 574,'status'=>1, 'user_id'=>1, 'municipio_id' => 192, 'parroquia'=> 'Santa Elena de Arenales', ));
    Parroquias::create(array( 'id' => 575,'status'=>1, 'user_id'=>1, 'municipio_id' => 193, 'parroquia'=> 'Santa María de Caparo', ));
    Parroquias::create(array( 'id' => 576,'status'=>1, 'user_id'=>1, 'municipio_id' => 194, 'parroquia'=> 'Pueblo Llano', ));
    Parroquias::create(array( 'id' => 577,'status'=>1, 'user_id'=>1, 'municipio_id' => 195, 'parroquia'=> 'Cacute', ));
    Parroquias::create(array( 'id' => 578,'status'=>1, 'user_id'=>1, 'municipio_id' => 195, 'parroquia'=> 'La Toma', ));
    Parroquias::create(array( 'id' => 579,'status'=>1, 'user_id'=>1, 'municipio_id' => 195, 'parroquia'=> 'Mucuchíes', ));
    Parroquias::create(array( 'id' => 580,'status'=>1, 'user_id'=>1, 'municipio_id' => 195, 'parroquia'=> 'Mucurubá', ));
    Parroquias::create(array( 'id' => 581,'status'=>1, 'user_id'=>1, 'municipio_id' => 195, 'parroquia'=> 'San Rafael', ));
    Parroquias::create(array( 'id' => 582,'status'=>1, 'user_id'=>1, 'municipio_id' => 196, 'parroquia'=> 'Gerónimo Maldonado', ));
    Parroquias::create(array( 'id' => 583,'status'=>1, 'user_id'=>1, 'municipio_id' => 196, 'parroquia'=> 'Bailadores', ));
    Parroquias::create(array( 'id' => 584,'status'=>1, 'user_id'=>1, 'municipio_id' => 197, 'parroquia'=> 'Tabay', ));
    Parroquias::create(array( 'id' => 585,'status'=>1, 'user_id'=>1, 'municipio_id' => 198, 'parroquia'=> 'Chiguará', ));
    Parroquias::create(array( 'id' => 586,'status'=>1, 'user_id'=>1, 'municipio_id' => 198, 'parroquia'=> 'Estánquez', ));
    Parroquias::create(array( 'id' => 587,'status'=>1, 'user_id'=>1, 'municipio_id' => 198, 'parroquia'=> 'Lagunillas', ));
    Parroquias::create(array( 'id' => 588,'status'=>1, 'user_id'=>1, 'municipio_id' => 198, 'parroquia'=> 'La Trampa', ));
    Parroquias::create(array( 'id' => 589,'status'=>1, 'user_id'=>1, 'municipio_id' => 198, 'parroquia'=> 'Pueblo Nuevo del Sur', ));
    Parroquias::create(array( 'id' => 590,'status'=>1, 'user_id'=>1, 'municipio_id' => 198, 'parroquia'=> 'San Juan', ));
    Parroquias::create(array( 'id' => 591,'status'=>1, 'user_id'=>1, 'municipio_id' => 199, 'parroquia'=> 'El Amparo', ));
    Parroquias::create(array( 'id' => 592,'status'=>1, 'user_id'=>1, 'municipio_id' => 199, 'parroquia'=> 'El Llano', ));
    Parroquias::create(array( 'id' => 593,'status'=>1, 'user_id'=>1, 'municipio_id' => 199, 'parroquia'=> 'San Francisco', ));
    Parroquias::create(array( 'id' => 594,'status'=>1, 'user_id'=>1, 'municipio_id' => 199, 'parroquia'=> 'Tovar', ));
    Parroquias::create(array( 'id' => 595,'status'=>1, 'user_id'=>1, 'municipio_id' => 200, 'parroquia'=> 'Independencia', ));
    Parroquias::create(array( 'id' => 596,'status'=>1, 'user_id'=>1, 'municipio_id' => 200, 'parroquia'=> 'María de la Concepción Palacios Blanco', ));
    Parroquias::create(array( 'id' => 597,'status'=>1, 'user_id'=>1, 'municipio_id' => 200, 'parroquia'=> 'Nueva Bolivia', ));
    Parroquias::create(array( 'id' => 598,'status'=>1, 'user_id'=>1, 'municipio_id' => 200, 'parroquia'=> 'Santa Apolonia', ));
    Parroquias::create(array( 'id' => 599,'status'=>1, 'user_id'=>1, 'municipio_id' => 201, 'parroquia'=> 'Caño El Tigre', ));
    Parroquias::create(array( 'id' => 600,'status'=>1, 'user_id'=>1, 'municipio_id' => 201, 'parroquia'=> 'Zea', ));
    Parroquias::create(array( 'id' => 601,'status'=>1, 'user_id'=>1, 'municipio_id' => 223, 'parroquia'=> 'Aragüita', ));
    Parroquias::create(array( 'id' => 602,'status'=>1, 'user_id'=>1, 'municipio_id' => 223, 'parroquia'=> 'Arévalo González', ));
    Parroquias::create(array( 'id' => 603,'status'=>1, 'user_id'=>1, 'municipio_id' => 223, 'parroquia'=> 'Capaya', ));
    Parroquias::create(array( 'id' => 604,'status'=>1, 'user_id'=>1, 'municipio_id' => 223, 'parroquia'=> 'Caucagua', ));
    Parroquias::create(array( 'id' => 605,'status'=>1, 'user_id'=>1, 'municipio_id' => 223, 'parroquia'=> 'Panaquire', ));
    Parroquias::create(array( 'id' => 606,'status'=>1, 'user_id'=>1, 'municipio_id' => 223, 'parroquia'=> 'Ribas', ));
    Parroquias::create(array( 'id' => 607,'status'=>1, 'user_id'=>1, 'municipio_id' => 223, 'parroquia'=> 'El Café', ));
    Parroquias::create(array( 'id' => 608,'status'=>1, 'user_id'=>1, 'municipio_id' => 223, 'parroquia'=> 'Marizapa', ));
    Parroquias::create(array( 'id' => 609,'status'=>1, 'user_id'=>1, 'municipio_id' => 224, 'parroquia'=> 'Cumbo', ));
    Parroquias::create(array( 'id' => 610,'status'=>1, 'user_id'=>1, 'municipio_id' => 224, 'parroquia'=> 'San José de Barlovento', ));
    Parroquias::create(array( 'id' => 611,'status'=>1, 'user_id'=>1, 'municipio_id' => 225, 'parroquia'=> 'El Cafetal', ));
    Parroquias::create(array( 'id' => 612,'status'=>1, 'user_id'=>1, 'municipio_id' => 225, 'parroquia'=> 'Las Minas', ));
    Parroquias::create(array( 'id' => 613,'status'=>1, 'user_id'=>1, 'municipio_id' => 225, 'parroquia'=> 'Nuestra Señora del Rosario', ));
    Parroquias::create(array( 'id' => 614,'status'=>1, 'user_id'=>1, 'municipio_id' => 226, 'parroquia'=> 'Higuerote', ));
    Parroquias::create(array( 'id' => 615,'status'=>1, 'user_id'=>1, 'municipio_id' => 226, 'parroquia'=> 'Curiepe', ));
    Parroquias::create(array( 'id' => 616,'status'=>1, 'user_id'=>1, 'municipio_id' => 226, 'parroquia'=> 'Tacarigua de Brión', ));
    Parroquias::create(array( 'id' => 617,'status'=>1, 'user_id'=>1, 'municipio_id' => 227, 'parroquia'=> 'Mamporal', ));
    Parroquias::create(array( 'id' => 618,'status'=>1, 'user_id'=>1, 'municipio_id' => 228, 'parroquia'=> 'Carrizal', ));
    Parroquias::create(array( 'id' => 619,'status'=>1, 'user_id'=>1, 'municipio_id' => 229, 'parroquia'=> 'Chacao', ));
    Parroquias::create(array( 'id' => 620,'status'=>1, 'user_id'=>1, 'municipio_id' => 230, 'parroquia'=> 'Charallave', ));
    Parroquias::create(array( 'id' => 621,'status'=>1, 'user_id'=>1, 'municipio_id' => 230, 'parroquia'=> 'Las Brisas', ));
    Parroquias::create(array( 'id' => 622,'status'=>1, 'user_id'=>1, 'municipio_id' => 231, 'parroquia'=> 'El Hatillo', ));
    Parroquias::create(array( 'id' => 623,'status'=>1, 'user_id'=>1, 'municipio_id' => 232, 'parroquia'=> 'Altagracia de la Montaña', ));
    Parroquias::create(array( 'id' => 624,'status'=>1, 'user_id'=>1, 'municipio_id' => 232, 'parroquia'=> 'Cecilio Acosta', ));
    Parroquias::create(array( 'id' => 625,'status'=>1, 'user_id'=>1, 'municipio_id' => 232, 'parroquia'=> 'Los Teques', ));
    Parroquias::create(array( 'id' => 626,'status'=>1, 'user_id'=>1, 'municipio_id' => 232, 'parroquia'=> 'El Jarillo', ));
    Parroquias::create(array( 'id' => 627,'status'=>1, 'user_id'=>1, 'municipio_id' => 232, 'parroquia'=> 'San Pedro', ));
    Parroquias::create(array( 'id' => 628,'status'=>1, 'user_id'=>1, 'municipio_id' => 232, 'parroquia'=> 'Tácata', ));
    Parroquias::create(array( 'id' => 629,'status'=>1, 'user_id'=>1, 'municipio_id' => 232, 'parroquia'=> 'Paracotos', ));
    Parroquias::create(array( 'id' => 630,'status'=>1, 'user_id'=>1, 'municipio_id' => 233, 'parroquia'=> 'Cartanal', ));
    Parroquias::create(array( 'id' => 631,'status'=>1, 'user_id'=>1, 'municipio_id' => 233, 'parroquia'=> 'Santa Teresa del Tuy', ));
    Parroquias::create(array( 'id' => 632,'status'=>1, 'user_id'=>1, 'municipio_id' => 234, 'parroquia'=> 'La Democracia', ));
    Parroquias::create(array( 'id' => 633,'status'=>1, 'user_id'=>1, 'municipio_id' => 234, 'parroquia'=> 'Ocumare del Tuy', ));
    Parroquias::create(array( 'id' => 634,'status'=>1, 'user_id'=>1, 'municipio_id' => 234, 'parroquia'=> 'Santa Bárbara', ));
    Parroquias::create(array( 'id' => 635,'status'=>1, 'user_id'=>1, 'municipio_id' => 235, 'parroquia'=> 'San Antonio de los Altos', ));
    Parroquias::create(array( 'id' => 636,'status'=>1, 'user_id'=>1, 'municipio_id' => 236, 'parroquia'=> 'Río Chico', ));
    Parroquias::create(array( 'id' => 637,'status'=>1, 'user_id'=>1, 'municipio_id' => 236, 'parroquia'=> 'El Guapo', ));
    Parroquias::create(array( 'id' => 638,'status'=>1, 'user_id'=>1, 'municipio_id' => 236, 'parroquia'=> 'Tacarigua de la Laguna', ));
    Parroquias::create(array( 'id' => 639,'status'=>1, 'user_id'=>1, 'municipio_id' => 236, 'parroquia'=> 'Paparo', ));
    Parroquias::create(array( 'id' => 640,'status'=>1, 'user_id'=>1, 'municipio_id' => 236, 'parroquia'=> 'San Fernando del Guapo', ));
    Parroquias::create(array( 'id' => 641,'status'=>1, 'user_id'=>1, 'municipio_id' => 237, 'parroquia'=> 'Santa Lucía del Tuy', ));
    Parroquias::create(array( 'id' => 642,'status'=>1, 'user_id'=>1, 'municipio_id' => 238, 'parroquia'=> 'Cúpira', ));
    Parroquias::create(array( 'id' => 643,'status'=>1, 'user_id'=>1, 'municipio_id' => 238, 'parroquia'=> 'Machurucuto', ));
    Parroquias::create(array( 'id' => 644,'status'=>1, 'user_id'=>1, 'municipio_id' => 239, 'parroquia'=> 'Guarenas', ));
    Parroquias::create(array( 'id' => 645,'status'=>1, 'user_id'=>1, 'municipio_id' => 240, 'parroquia'=> 'San Antonio de Yare', ));
    Parroquias::create(array( 'id' => 646,'status'=>1, 'user_id'=>1, 'municipio_id' => 240, 'parroquia'=> 'San Francisco de Yare', ));
    Parroquias::create(array( 'id' => 647,'status'=>1, 'user_id'=>1, 'municipio_id' => 241, 'parroquia'=> 'Leoncio Martínez', ));
    Parroquias::create(array( 'id' => 648,'status'=>1, 'user_id'=>1, 'municipio_id' => 241, 'parroquia'=> 'Petare', ));
    Parroquias::create(array( 'id' => 649,'status'=>1, 'user_id'=>1, 'municipio_id' => 241, 'parroquia'=> 'Caucagüita', ));
    Parroquias::create(array( 'id' => 650,'status'=>1, 'user_id'=>1, 'municipio_id' => 241, 'parroquia'=> 'Filas de Mariche', ));
    Parroquias::create(array( 'id' => 651,'status'=>1, 'user_id'=>1, 'municipio_id' => 241, 'parroquia'=> 'La Dolorita', ));
    Parroquias::create(array( 'id' => 652,'status'=>1, 'user_id'=>1, 'municipio_id' => 242, 'parroquia'=> 'Cúa', ));
    Parroquias::create(array( 'id' => 653,'status'=>1, 'user_id'=>1, 'municipio_id' => 242, 'parroquia'=> 'Nueva Cúa', ));
    Parroquias::create(array( 'id' => 654,'status'=>1, 'user_id'=>1, 'municipio_id' => 243, 'parroquia'=> 'Guatire', ));
    Parroquias::create(array( 'id' => 655,'status'=>1, 'user_id'=>1, 'municipio_id' => 243, 'parroquia'=> 'Bolívar', ));
    Parroquias::create(array( 'id' => 656,'status'=>1, 'user_id'=>1, 'municipio_id' => 258, 'parroquia'=> 'San Antonio de Maturín', ));
    Parroquias::create(array( 'id' => 657,'status'=>1, 'user_id'=>1, 'municipio_id' => 258, 'parroquia'=> 'San Francisco de Maturín', ));
    Parroquias::create(array( 'id' => 658,'status'=>1, 'user_id'=>1, 'municipio_id' => 259, 'parroquia'=> 'Aguasay', ));
    Parroquias::create(array( 'id' => 659,'status'=>1, 'user_id'=>1, 'municipio_id' => 260, 'parroquia'=> 'Caripito', ));
    Parroquias::create(array( 'id' => 660,'status'=>1, 'user_id'=>1, 'municipio_id' => 261, 'parroquia'=> 'El Guácharo', ));
    Parroquias::create(array( 'id' => 661,'status'=>1, 'user_id'=>1, 'municipio_id' => 261, 'parroquia'=> 'La Guanota', ));
    Parroquias::create(array( 'id' => 662,'status'=>1, 'user_id'=>1, 'municipio_id' => 261, 'parroquia'=> 'Sabana de Piedra', ));
    Parroquias::create(array( 'id' => 663,'status'=>1, 'user_id'=>1, 'municipio_id' => 261, 'parroquia'=> 'San Agustín', ));
    Parroquias::create(array( 'id' => 664,'status'=>1, 'user_id'=>1, 'municipio_id' => 261, 'parroquia'=> 'Teresen', ));
    Parroquias::create(array( 'id' => 665,'status'=>1, 'user_id'=>1, 'municipio_id' => 261, 'parroquia'=> 'Caripe', ));
    Parroquias::create(array( 'id' => 666,'status'=>1, 'user_id'=>1, 'municipio_id' => 262, 'parroquia'=> 'Areo', ));
    Parroquias::create(array( 'id' => 667,'status'=>1, 'user_id'=>1, 'municipio_id' => 262, 'parroquia'=> 'Capital Cedeño', ));
    Parroquias::create(array( 'id' => 668,'status'=>1, 'user_id'=>1, 'municipio_id' => 262, 'parroquia'=> 'San Félix de Cantalicio', ));
    Parroquias::create(array( 'id' => 669,'status'=>1, 'user_id'=>1, 'municipio_id' => 262, 'parroquia'=> 'Viento Fresco', ));
    Parroquias::create(array( 'id' => 670,'status'=>1, 'user_id'=>1, 'municipio_id' => 263, 'parroquia'=> 'El Tejero', ));
    Parroquias::create(array( 'id' => 671,'status'=>1, 'user_id'=>1, 'municipio_id' => 263, 'parroquia'=> 'Punta de Mata', ));
    Parroquias::create(array( 'id' => 672,'status'=>1, 'user_id'=>1, 'municipio_id' => 264, 'parroquia'=> 'Chaguaramas', ));
    Parroquias::create(array( 'id' => 673,'status'=>1, 'user_id'=>1, 'municipio_id' => 264, 'parroquia'=> 'Las Alhuacas', ));
    Parroquias::create(array( 'id' => 674,'status'=>1, 'user_id'=>1, 'municipio_id' => 264, 'parroquia'=> 'Tabasca', ));
    Parroquias::create(array( 'id' => 675,'status'=>1, 'user_id'=>1, 'municipio_id' => 264, 'parroquia'=> 'Temblador', ));
    Parroquias::create(array( 'id' => 676,'status'=>1, 'user_id'=>1, 'municipio_id' => 265, 'parroquia'=> 'Alto de los Godos', ));
    Parroquias::create(array( 'id' => 677,'status'=>1, 'user_id'=>1, 'municipio_id' => 265, 'parroquia'=> 'Boquerón', ));
    Parroquias::create(array( 'id' => 678,'status'=>1, 'user_id'=>1, 'municipio_id' => 265, 'parroquia'=> 'Las Cocuizas', ));
    Parroquias::create(array( 'id' => 679,'status'=>1, 'user_id'=>1, 'municipio_id' => 265, 'parroquia'=> 'La Cruz', ));
    Parroquias::create(array( 'id' => 680,'status'=>1, 'user_id'=>1, 'municipio_id' => 265, 'parroquia'=> 'San Simón', ));
    Parroquias::create(array( 'id' => 681,'status'=>1, 'user_id'=>1, 'municipio_id' => 265, 'parroquia'=> 'El Corozo', ));
    Parroquias::create(array( 'id' => 682,'status'=>1, 'user_id'=>1, 'municipio_id' => 265, 'parroquia'=> 'El Furrial', ));
    Parroquias::create(array( 'id' => 683,'status'=>1, 'user_id'=>1, 'municipio_id' => 265, 'parroquia'=> 'Jusepín', ));
    Parroquias::create(array( 'id' => 684,'status'=>1, 'user_id'=>1, 'municipio_id' => 265, 'parroquia'=> 'La Pica', ));
    Parroquias::create(array( 'id' => 685,'status'=>1, 'user_id'=>1, 'municipio_id' => 265, 'parroquia'=> 'San Vicente', ));
    Parroquias::create(array( 'id' => 686,'status'=>1, 'user_id'=>1, 'municipio_id' => 266, 'parroquia'=> 'Aparicio', ));
    Parroquias::create(array( 'id' => 687,'status'=>1, 'user_id'=>1, 'municipio_id' => 266, 'parroquia'=> 'Aragua de Maturín', ));
    Parroquias::create(array( 'id' => 688,'status'=>1, 'user_id'=>1, 'municipio_id' => 266, 'parroquia'=> 'Chaguamal', ));
    Parroquias::create(array( 'id' => 689,'status'=>1, 'user_id'=>1, 'municipio_id' => 266, 'parroquia'=> 'El Pinto', ));
    Parroquias::create(array( 'id' => 690,'status'=>1, 'user_id'=>1, 'municipio_id' => 266, 'parroquia'=> 'Guanaguana', ));
    Parroquias::create(array( 'id' => 691,'status'=>1, 'user_id'=>1, 'municipio_id' => 266, 'parroquia'=> 'La Toscana', ));
    Parroquias::create(array( 'id' => 692,'status'=>1, 'user_id'=>1, 'municipio_id' => 266, 'parroquia'=> 'Taguaya', ));
    Parroquias::create(array( 'id' => 693,'status'=>1, 'user_id'=>1, 'municipio_id' => 267, 'parroquia'=> 'Cachipo', ));
    Parroquias::create(array( 'id' => 694,'status'=>1, 'user_id'=>1, 'municipio_id' => 267, 'parroquia'=> 'Quiriquire', ));
    Parroquias::create(array( 'id' => 695,'status'=>1, 'user_id'=>1, 'municipio_id' => 268, 'parroquia'=> 'Santa Bárbara', ));
    Parroquias::create(array( 'id' => 696,'status'=>1, 'user_id'=>1, 'municipio_id' => 269, 'parroquia'=> 'Barrancas', ));
    Parroquias::create(array( 'id' => 697,'status'=>1, 'user_id'=>1, 'municipio_id' => 269, 'parroquia'=> 'Los Barrancos de Fajardo', ));
    Parroquias::create(array( 'id' => 698,'status'=>1, 'user_id'=>1, 'municipio_id' => 270, 'parroquia'=> 'Uracoa', ));
    Parroquias::create(array( 'id' => 699,'status'=>1, 'user_id'=>1, 'municipio_id' => 271, 'parroquia'=> 'Antolín del Campo', ));
    Parroquias::create(array( 'id' => 700,'status'=>1, 'user_id'=>1, 'municipio_id' => 272, 'parroquia'=> 'Arismendi', ));
    Parroquias::create(array( 'id' => 701,'status'=>1, 'user_id'=>1, 'municipio_id' => 273, 'parroquia'=> 'García', ));
    Parroquias::create(array( 'id' => 702,'status'=>1, 'user_id'=>1, 'municipio_id' => 273, 'parroquia'=> 'Francisco Fajardo', ));
    Parroquias::create(array( 'id' => 703,'status'=>1, 'user_id'=>1, 'municipio_id' => 274, 'parroquia'=> 'Bolívar', ));
    Parroquias::create(array( 'id' => 704,'status'=>1, 'user_id'=>1, 'municipio_id' => 274, 'parroquia'=> 'Guevara', ));
    Parroquias::create(array( 'id' => 705,'status'=>1, 'user_id'=>1, 'municipio_id' => 274, 'parroquia'=> 'Matasiete', ));
    Parroquias::create(array( 'id' => 706,'status'=>1, 'user_id'=>1, 'municipio_id' => 274, 'parroquia'=> 'Santa Ana', ));
    Parroquias::create(array( 'id' => 707,'status'=>1, 'user_id'=>1, 'municipio_id' => 274, 'parroquia'=> 'Sucre', ));
    Parroquias::create(array( 'id' => 708,'status'=>1, 'user_id'=>1, 'municipio_id' => 275, 'parroquia'=> 'Aguirre', ));
    Parroquias::create(array( 'id' => 709,'status'=>1, 'user_id'=>1, 'municipio_id' => 275, 'parroquia'=> 'Maneiro', ));
    Parroquias::create(array( 'id' => 710,'status'=>1, 'user_id'=>1, 'municipio_id' => 276, 'parroquia'=> 'Adrián', ));
    Parroquias::create(array( 'id' => 711,'status'=>1, 'user_id'=>1, 'municipio_id' => 276, 'parroquia'=> 'Juan Griego', ));
    Parroquias::create(array( 'id' => 712,'status'=>1, 'user_id'=>1, 'municipio_id' => 276, 'parroquia'=> 'Yaguaraparo', ));
    Parroquias::create(array( 'id' => 713,'status'=>1, 'user_id'=>1, 'municipio_id' => 277, 'parroquia'=> 'Porlamar', ));
    Parroquias::create(array( 'id' => 714,'status'=>1, 'user_id'=>1, 'municipio_id' => 278, 'parroquia'=> 'San Francisco de Macanao', ));
    Parroquias::create(array( 'id' => 715,'status'=>1, 'user_id'=>1, 'municipio_id' => 278, 'parroquia'=> 'Boca de Río', ));
    Parroquias::create(array( 'id' => 716,'status'=>1, 'user_id'=>1, 'municipio_id' => 279, 'parroquia'=> 'Tubores', ));
    Parroquias::create(array( 'id' => 717,'status'=>1, 'user_id'=>1, 'municipio_id' => 279, 'parroquia'=> 'Los Baleales', ));
    Parroquias::create(array( 'id' => 718,'status'=>1, 'user_id'=>1, 'municipio_id' => 280, 'parroquia'=> 'Vicente Fuentes', ));
    Parroquias::create(array( 'id' => 719,'status'=>1, 'user_id'=>1, 'municipio_id' => 280, 'parroquia'=> 'Villalba', ));
    Parroquias::create(array( 'id' => 720,'status'=>1, 'user_id'=>1, 'municipio_id' => 281, 'parroquia'=> 'San Juan Bautista', ));
    Parroquias::create(array( 'id' => 721,'status'=>1, 'user_id'=>1, 'municipio_id' => 281, 'parroquia'=> 'Zabala', ));
    Parroquias::create(array( 'id' => 722,'status'=>1, 'user_id'=>1, 'municipio_id' => 283, 'parroquia'=> 'Capital Araure', ));
    Parroquias::create(array( 'id' => 723,'status'=>1, 'user_id'=>1, 'municipio_id' => 283, 'parroquia'=> 'Río Acarigua', ));
    Parroquias::create(array( 'id' => 724,'status'=>1, 'user_id'=>1, 'municipio_id' => 284, 'parroquia'=> 'Capital Esteller', ));
    Parroquias::create(array( 'id' => 725,'status'=>1, 'user_id'=>1, 'municipio_id' => 284, 'parroquia'=> 'Uveral', ));
    Parroquias::create(array( 'id' => 726,'status'=>1, 'user_id'=>1, 'municipio_id' => 285, 'parroquia'=> 'Guanare', ));
    Parroquias::create(array( 'id' => 727,'status'=>1, 'user_id'=>1, 'municipio_id' => 285, 'parroquia'=> 'Córdoba', ));
    Parroquias::create(array( 'id' => 728,'status'=>1, 'user_id'=>1, 'municipio_id' => 285, 'parroquia'=> 'San José de la Montaña', ));
    Parroquias::create(array( 'id' => 729,'status'=>1, 'user_id'=>1, 'municipio_id' => 285, 'parroquia'=> 'San Juan de Guanaguanare', ));
    Parroquias::create(array( 'id' => 730,'status'=>1, 'user_id'=>1, 'municipio_id' => 285, 'parroquia'=> 'Virgen de la Coromoto', ));
    Parroquias::create(array( 'id' => 731,'status'=>1, 'user_id'=>1, 'municipio_id' => 286, 'parroquia'=> 'Guanarito', ));
    Parroquias::create(array( 'id' => 732,'status'=>1, 'user_id'=>1, 'municipio_id' => 286, 'parroquia'=> 'Trinidad de la Capilla', ));
    Parroquias::create(array( 'id' => 733,'status'=>1, 'user_id'=>1, 'municipio_id' => 286, 'parroquia'=> 'Divina Pastora', ));
    Parroquias::create(array( 'id' => 734,'status'=>1, 'user_id'=>1, 'municipio_id' => 287, 'parroquia'=> 'Monseñor José Vicente de Unda', ));
    Parroquias::create(array( 'id' => 735,'status'=>1, 'user_id'=>1, 'municipio_id' => 287, 'parroquia'=> 'Peña Blanca', ));
    Parroquias::create(array( 'id' => 736,'status'=>1, 'user_id'=>1, 'municipio_id' => 288, 'parroquia'=> 'Capital Ospino', ));
    Parroquias::create(array( 'id' => 737,'status'=>1, 'user_id'=>1, 'municipio_id' => 288, 'parroquia'=> 'Aparición', ));
    Parroquias::create(array( 'id' => 738,'status'=>1, 'user_id'=>1, 'municipio_id' => 288, 'parroquia'=> 'La Estación', ));
    Parroquias::create(array( 'id' => 739,'status'=>1, 'user_id'=>1, 'municipio_id' => 289, 'parroquia'=> 'Páez', ));
    Parroquias::create(array( 'id' => 740,'status'=>1, 'user_id'=>1, 'municipio_id' => 289, 'parroquia'=> 'Payara', ));
    Parroquias::create(array( 'id' => 741,'status'=>1, 'user_id'=>1, 'municipio_id' => 289, 'parroquia'=> 'Pimpinela', ));
    Parroquias::create(array( 'id' => 742,'status'=>1, 'user_id'=>1, 'municipio_id' => 289, 'parroquia'=> 'Ramón Peraza', ));
    Parroquias::create(array( 'id' => 743,'status'=>1, 'user_id'=>1, 'municipio_id' => 290, 'parroquia'=> 'Papelón', ));
    Parroquias::create(array( 'id' => 744,'status'=>1, 'user_id'=>1, 'municipio_id' => 290, 'parroquia'=> 'Caño Delgadito', ));
    Parroquias::create(array( 'id' => 745,'status'=>1, 'user_id'=>1, 'municipio_id' => 291, 'parroquia'=> 'San Genaro de Boconoito', ));
    Parroquias::create(array( 'id' => 746,'status'=>1, 'user_id'=>1, 'municipio_id' => 291, 'parroquia'=> 'Antolín Tovar', ));
    Parroquias::create(array( 'id' => 747,'status'=>1, 'user_id'=>1, 'municipio_id' => 292, 'parroquia'=> 'San Rafael de Onoto', ));
    Parroquias::create(array( 'id' => 748,'status'=>1, 'user_id'=>1, 'municipio_id' => 292, 'parroquia'=> 'Santa Fe', ));
    Parroquias::create(array( 'id' => 749,'status'=>1, 'user_id'=>1, 'municipio_id' => 292, 'parroquia'=> 'Thermo Morles', ));
    Parroquias::create(array( 'id' => 750,'status'=>1, 'user_id'=>1, 'municipio_id' => 293, 'parroquia'=> 'Santa Rosalía', ));
    Parroquias::create(array( 'id' => 751,'status'=>1, 'user_id'=>1, 'municipio_id' => 293, 'parroquia'=> 'Florida', ));
    Parroquias::create(array( 'id' => 752,'status'=>1, 'user_id'=>1, 'municipio_id' => 294, 'parroquia'=> 'Sucre', ));
    Parroquias::create(array( 'id' => 753,'status'=>1, 'user_id'=>1, 'municipio_id' => 294, 'parroquia'=> 'Concepción', ));
    Parroquias::create(array( 'id' => 754,'status'=>1, 'user_id'=>1, 'municipio_id' => 294, 'parroquia'=> 'San Rafael de Palo Alzado', ));
    Parroquias::create(array( 'id' => 755,'status'=>1, 'user_id'=>1, 'municipio_id' => 294, 'parroquia'=> 'Uvencio Antonio Velásquez', ));
    Parroquias::create(array( 'id' => 756,'status'=>1, 'user_id'=>1, 'municipio_id' => 294, 'parroquia'=> 'San José de Saguaz', ));
    Parroquias::create(array( 'id' => 757,'status'=>1, 'user_id'=>1, 'municipio_id' => 294, 'parroquia'=> 'Villa Rosa', ));
    Parroquias::create(array( 'id' => 758,'status'=>1, 'user_id'=>1, 'municipio_id' => 295, 'parroquia'=> 'Turén', ));
    Parroquias::create(array( 'id' => 759,'status'=>1, 'user_id'=>1, 'municipio_id' => 295, 'parroquia'=> 'Canelones', ));
    Parroquias::create(array( 'id' => 760,'status'=>1, 'user_id'=>1, 'municipio_id' => 295, 'parroquia'=> 'Santa Cruz', ));
    Parroquias::create(array( 'id' => 761,'status'=>1, 'user_id'=>1, 'municipio_id' => 295, 'parroquia'=> 'San Isidro Labrador', ));
    Parroquias::create(array( 'id' => 762,'status'=>1, 'user_id'=>1, 'municipio_id' => 296, 'parroquia'=> 'Mariño', ));
    Parroquias::create(array( 'id' => 763,'status'=>1, 'user_id'=>1, 'municipio_id' => 296, 'parroquia'=> 'Rómulo Gallegos', ));
    Parroquias::create(array( 'id' => 764,'status'=>1, 'user_id'=>1, 'municipio_id' => 297, 'parroquia'=> 'San José de Aerocuar', ));
    Parroquias::create(array( 'id' => 765,'status'=>1, 'user_id'=>1, 'municipio_id' => 297, 'parroquia'=> 'Tavera Acosta', ));
    Parroquias::create(array( 'id' => 766,'status'=>1, 'user_id'=>1, 'municipio_id' => 298, 'parroquia'=> 'Río Caribe', ));
    Parroquias::create(array( 'id' => 767,'status'=>1, 'user_id'=>1, 'municipio_id' => 298, 'parroquia'=> 'Antonio José de Sucre', ));
    Parroquias::create(array( 'id' => 768,'status'=>1, 'user_id'=>1, 'municipio_id' => 298, 'parroquia'=> 'El Morro de Puerto Santo', ));
    Parroquias::create(array( 'id' => 769,'status'=>1, 'user_id'=>1, 'municipio_id' => 298, 'parroquia'=> 'Puerto Santo', ));
    Parroquias::create(array( 'id' => 770,'status'=>1, 'user_id'=>1, 'municipio_id' => 298, 'parroquia'=> 'San Juan de las Galdonas', ));
    Parroquias::create(array( 'id' => 771,'status'=>1, 'user_id'=>1, 'municipio_id' => 299, 'parroquia'=> 'El Pilar', ));
    Parroquias::create(array( 'id' => 772,'status'=>1, 'user_id'=>1, 'municipio_id' => 299, 'parroquia'=> 'El Rincón', ));
    Parroquias::create(array( 'id' => 773,'status'=>1, 'user_id'=>1, 'municipio_id' => 299, 'parroquia'=> 'General Francisco Antonio Váquez', ));
    Parroquias::create(array( 'id' => 774,'status'=>1, 'user_id'=>1, 'municipio_id' => 299, 'parroquia'=> 'Guaraúnos', ));
    Parroquias::create(array( 'id' => 775,'status'=>1, 'user_id'=>1, 'municipio_id' => 299, 'parroquia'=> 'Tunapuicito', ));
    Parroquias::create(array( 'id' => 776,'status'=>1, 'user_id'=>1, 'municipio_id' => 299, 'parroquia'=> 'Unión', ));
    Parroquias::create(array( 'id' => 777,'status'=>1, 'user_id'=>1, 'municipio_id' => 300, 'parroquia'=> 'Santa Catalina', ));
    Parroquias::create(array( 'id' => 778,'status'=>1, 'user_id'=>1, 'municipio_id' => 300, 'parroquia'=> 'Santa Rosa', ));
    Parroquias::create(array( 'id' => 779,'status'=>1, 'user_id'=>1, 'municipio_id' => 300, 'parroquia'=> 'Santa Teresa', ));
    Parroquias::create(array( 'id' => 780,'status'=>1, 'user_id'=>1, 'municipio_id' => 300, 'parroquia'=> 'Bolívar', ));
    Parroquias::create(array( 'id' => 781,'status'=>1, 'user_id'=>1, 'municipio_id' => 300, 'parroquia'=> 'Maracapana', ));
    Parroquias::create(array( 'id' => 782,'status'=>1, 'user_id'=>1, 'municipio_id' => 302, 'parroquia'=> 'Libertad', ));
    Parroquias::create(array( 'id' => 783,'status'=>1, 'user_id'=>1, 'municipio_id' => 302, 'parroquia'=> 'El Paujil', ));
    Parroquias::create(array( 'id' => 784,'status'=>1, 'user_id'=>1, 'municipio_id' => 302, 'parroquia'=> 'Yaguaraparo', ));
    Parroquias::create(array( 'id' => 785,'status'=>1, 'user_id'=>1, 'municipio_id' => 303, 'parroquia'=> 'Cruz Salmerón Acosta', ));
    Parroquias::create(array( 'id' => 786,'status'=>1, 'user_id'=>1, 'municipio_id' => 303, 'parroquia'=> 'Chacopata', ));
    Parroquias::create(array( 'id' => 787,'status'=>1, 'user_id'=>1, 'municipio_id' => 303, 'parroquia'=> 'Manicuare', ));
    Parroquias::create(array( 'id' => 788,'status'=>1, 'user_id'=>1, 'municipio_id' => 304, 'parroquia'=> 'Tunapuy', ));
    Parroquias::create(array( 'id' => 789,'status'=>1, 'user_id'=>1, 'municipio_id' => 304, 'parroquia'=> 'Campo Elías', ));
    Parroquias::create(array( 'id' => 790,'status'=>1, 'user_id'=>1, 'municipio_id' => 305, 'parroquia'=> 'Irapa', ));
    Parroquias::create(array( 'id' => 791,'status'=>1, 'user_id'=>1, 'municipio_id' => 305, 'parroquia'=> 'Campo Claro', ));
    Parroquias::create(array( 'id' => 792,'status'=>1, 'user_id'=>1, 'municipio_id' => 305, 'parroquia'=> 'Maraval', ));
    Parroquias::create(array( 'id' => 793,'status'=>1, 'user_id'=>1, 'municipio_id' => 305, 'parroquia'=> 'San Antonio de Irapa', ));
    Parroquias::create(array( 'id' => 794,'status'=>1, 'user_id'=>1, 'municipio_id' => 305, 'parroquia'=> 'Soro', ));
    Parroquias::create(array( 'id' => 795,'status'=>1, 'user_id'=>1, 'municipio_id' => 306, 'parroquia'=> 'Mejía', ));
    Parroquias::create(array( 'id' => 796,'status'=>1, 'user_id'=>1, 'municipio_id' => 307, 'parroquia'=> 'Cumanacoa', ));
    Parroquias::create(array( 'id' => 797,'status'=>1, 'user_id'=>1, 'municipio_id' => 307, 'parroquia'=> 'Arenas', ));
    Parroquias::create(array( 'id' => 798,'status'=>1, 'user_id'=>1, 'municipio_id' => 307, 'parroquia'=> 'Aricagua', ));
    Parroquias::create(array( 'id' => 799,'status'=>1, 'user_id'=>1, 'municipio_id' => 307, 'parroquia'=> 'Cogollar', ));
    Parroquias::create(array( 'id' => 800,'status'=>1, 'user_id'=>1, 'municipio_id' => 307, 'parroquia'=> 'San Fernando', ));
    Parroquias::create(array( 'id' => 801,'status'=>1, 'user_id'=>1, 'municipio_id' => 307, 'parroquia'=> 'San Lorenzo', ));
    Parroquias::create(array( 'id' => 802,'status'=>1, 'user_id'=>1, 'municipio_id' => 308, 'parroquia'=> 'Villa Frontado (Muelle de Cariaco)', ));
    Parroquias::create(array( 'id' => 803,'status'=>1, 'user_id'=>1, 'municipio_id' => 308, 'parroquia'=> 'Catuaro', ));
    Parroquias::create(array( 'id' => 804,'status'=>1, 'user_id'=>1, 'municipio_id' => 308, 'parroquia'=> 'Rendón', ));
    Parroquias::create(array( 'id' => 805,'status'=>1, 'user_id'=>1, 'municipio_id' => 308, 'parroquia'=> 'San Cruz', ));
    Parroquias::create(array( 'id' => 806,'status'=>1, 'user_id'=>1, 'municipio_id' => 308, 'parroquia'=> 'Santa María', ));
    Parroquias::create(array( 'id' => 807,'status'=>1, 'user_id'=>1, 'municipio_id' => 309, 'parroquia'=> 'Altagracia', ));
    Parroquias::create(array( 'id' => 808,'status'=>1, 'user_id'=>1, 'municipio_id' => 309, 'parroquia'=> 'Santa Inés', ));
    Parroquias::create(array( 'id' => 809,'status'=>1, 'user_id'=>1, 'municipio_id' => 309, 'parroquia'=> 'Valentín Valiente', ));
    Parroquias::create(array( 'id' => 810,'status'=>1, 'user_id'=>1, 'municipio_id' => 309, 'parroquia'=> 'Ayacucho', ));
    Parroquias::create(array( 'id' => 811,'status'=>1, 'user_id'=>1, 'municipio_id' => 309, 'parroquia'=> 'San Juan', ));
    Parroquias::create(array( 'id' => 812,'status'=>1, 'user_id'=>1, 'municipio_id' => 309, 'parroquia'=> 'Raúl Leoni', ));
    Parroquias::create(array( 'id' => 813,'status'=>1, 'user_id'=>1, 'municipio_id' => 309, 'parroquia'=> 'Gran Mariscal', ));
    Parroquias::create(array( 'id' => 814,'status'=>1, 'user_id'=>1, 'municipio_id' => 310, 'parroquia'=> 'Cristóbal Colón', ));
    Parroquias::create(array( 'id' => 815,'status'=>1, 'user_id'=>1, 'municipio_id' => 310, 'parroquia'=> 'Bideau', ));
    Parroquias::create(array( 'id' => 816,'status'=>1, 'user_id'=>1, 'municipio_id' => 310, 'parroquia'=> 'Punta de Piedras', ));
    Parroquias::create(array( 'id' => 817,'status'=>1, 'user_id'=>1, 'municipio_id' => 310, 'parroquia'=> 'Güiria', ));
    Parroquias::create(array( 'id' => 818,'status'=>1, 'user_id'=>1, 'municipio_id' => 341, 'parroquia'=> 'Andrés Bello', ));
    Parroquias::create(array( 'id' => 819,'status'=>1, 'user_id'=>1, 'municipio_id' => 342, 'parroquia'=> 'Antonio Rómulo Costa', ));
    Parroquias::create(array( 'id' => 820,'status'=>1, 'user_id'=>1, 'municipio_id' => 343, 'parroquia'=> 'Ayacucho', ));
    Parroquias::create(array( 'id' => 821,'status'=>1, 'user_id'=>1, 'municipio_id' => 343, 'parroquia'=> 'Rivas Berti', ));
    Parroquias::create(array( 'id' => 822,'status'=>1, 'user_id'=>1, 'municipio_id' => 343, 'parroquia'=> 'San Pedro del Río', ));
    Parroquias::create(array( 'id' => 823,'status'=>1, 'user_id'=>1, 'municipio_id' => 344, 'parroquia'=> 'Bolívar', ));
    Parroquias::create(array( 'id' => 824,'status'=>1, 'user_id'=>1, 'municipio_id' => 344, 'parroquia'=> 'Palotal', ));
    Parroquias::create(array( 'id' => 825,'status'=>1, 'user_id'=>1, 'municipio_id' => 344, 'parroquia'=> 'General Juan Vicente Gómez', ));
    Parroquias::create(array( 'id' => 826,'status'=>1, 'user_id'=>1, 'municipio_id' => 344, 'parroquia'=> 'Isaías Medina Angarita', ));
    Parroquias::create(array( 'id' => 827,'status'=>1, 'user_id'=>1, 'municipio_id' => 345, 'parroquia'=> 'Cárdenas', ));
    Parroquias::create(array( 'id' => 828,'status'=>1, 'user_id'=>1, 'municipio_id' => 345, 'parroquia'=> 'Amenodoro Ángel Lamus', ));
    Parroquias::create(array( 'id' => 829,'status'=>1, 'user_id'=>1, 'municipio_id' => 345, 'parroquia'=> 'La Florida', ));
    Parroquias::create(array( 'id' => 830,'status'=>1, 'user_id'=>1, 'municipio_id' => 346, 'parroquia'=> 'Córdoba', ));
    Parroquias::create(array( 'id' => 831,'status'=>1, 'user_id'=>1, 'municipio_id' => 347, 'parroquia'=> 'Fernández Feo', ));
    Parroquias::create(array( 'id' => 832,'status'=>1, 'user_id'=>1, 'municipio_id' => 347, 'parroquia'=> 'Alberto Adriani', ));
    Parroquias::create(array( 'id' => 833,'status'=>1, 'user_id'=>1, 'municipio_id' => 347, 'parroquia'=> 'Santo Domingo', ));
    Parroquias::create(array( 'id' => 834,'status'=>1, 'user_id'=>1, 'municipio_id' => 348, 'parroquia'=> 'Francisco de Miranda', ));
    Parroquias::create(array( 'id' => 835,'status'=>1, 'user_id'=>1, 'municipio_id' => 349, 'parroquia'=> 'García de Hevia', ));
    Parroquias::create(array( 'id' => 836,'status'=>1, 'user_id'=>1, 'municipio_id' => 349, 'parroquia'=> 'Boca de Grita', ));
    Parroquias::create(array( 'id' => 837,'status'=>1, 'user_id'=>1, 'municipio_id' => 349, 'parroquia'=> 'José Antonio Páez', ));
    Parroquias::create(array( 'id' => 838,'status'=>1, 'user_id'=>1, 'municipio_id' => 350, 'parroquia'=> 'Guásimos', ));
    Parroquias::create(array( 'id' => 839,'status'=>1, 'user_id'=>1, 'municipio_id' => 351, 'parroquia'=> 'Independencia', ));
    Parroquias::create(array( 'id' => 840,'status'=>1, 'user_id'=>1, 'municipio_id' => 351, 'parroquia'=> 'Juan Germán Roscio', ));
    Parroquias::create(array( 'id' => 841,'status'=>1, 'user_id'=>1, 'municipio_id' => 351, 'parroquia'=> 'Román Cárdenas', ));
    Parroquias::create(array( 'id' => 842,'status'=>1, 'user_id'=>1, 'municipio_id' => 352, 'parroquia'=> 'Jáuregui', ));
    Parroquias::create(array( 'id' => 843,'status'=>1, 'user_id'=>1, 'municipio_id' => 352, 'parroquia'=> 'Emilio Constantino Guerrero', ));
    Parroquias::create(array( 'id' => 844,'status'=>1, 'user_id'=>1, 'municipio_id' => 352, 'parroquia'=> 'Monseñor Miguel Antonio Salas', ));
    Parroquias::create(array( 'id' => 845,'status'=>1, 'user_id'=>1, 'municipio_id' => 353, 'parroquia'=> 'José María Vargas', ));
    Parroquias::create(array( 'id' => 846,'status'=>1, 'user_id'=>1, 'municipio_id' => 354, 'parroquia'=> 'Junín', ));
    Parroquias::create(array( 'id' => 847,'status'=>1, 'user_id'=>1, 'municipio_id' => 354, 'parroquia'=> 'La Petrólea', ));
    Parroquias::create(array( 'id' => 848,'status'=>1, 'user_id'=>1, 'municipio_id' => 354, 'parroquia'=> 'Quinimarí', ));
    Parroquias::create(array( 'id' => 849,'status'=>1, 'user_id'=>1, 'municipio_id' => 354, 'parroquia'=> 'Bramón', ));
    Parroquias::create(array( 'id' => 850,'status'=>1, 'user_id'=>1, 'municipio_id' => 355, 'parroquia'=> 'Libertad', ));
    Parroquias::create(array( 'id' => 851,'status'=>1, 'user_id'=>1, 'municipio_id' => 355, 'parroquia'=> 'Cipriano Castro', ));
    Parroquias::create(array( 'id' => 852,'status'=>1, 'user_id'=>1, 'municipio_id' => 355, 'parroquia'=> 'Manuel Felipe Rugeles', ));
    Parroquias::create(array( 'id' => 853,'status'=>1, 'user_id'=>1, 'municipio_id' => 356, 'parroquia'=> 'Libertador', ));
    Parroquias::create(array( 'id' => 854,'status'=>1, 'user_id'=>1, 'municipio_id' => 356, 'parroquia'=> 'Doradas', ));
    Parroquias::create(array( 'id' => 855,'status'=>1, 'user_id'=>1, 'municipio_id' => 356, 'parroquia'=> 'Emeterio Ochoa', ));
    Parroquias::create(array( 'id' => 856,'status'=>1, 'user_id'=>1, 'municipio_id' => 356, 'parroquia'=> 'San Joaquín de Navay', ));
    Parroquias::create(array( 'id' => 857,'status'=>1, 'user_id'=>1, 'municipio_id' => 357, 'parroquia'=> 'Lobatera', ));
    Parroquias::create(array( 'id' => 858,'status'=>1, 'user_id'=>1, 'municipio_id' => 357, 'parroquia'=> 'Constitución', ));
    Parroquias::create(array( 'id' => 859,'status'=>1, 'user_id'=>1, 'municipio_id' => 358, 'parroquia'=> 'Michelena', ));
    Parroquias::create(array( 'id' => 860,'status'=>1, 'user_id'=>1, 'municipio_id' => 359, 'parroquia'=> 'Panamericano', ));
    Parroquias::create(array( 'id' => 861,'status'=>1, 'user_id'=>1, 'municipio_id' => 359, 'parroquia'=> 'La Palmita', ));
    Parroquias::create(array( 'id' => 862,'status'=>1, 'user_id'=>1, 'municipio_id' => 360, 'parroquia'=> 'Pedro María Ureña', ));
    Parroquias::create(array( 'id' => 863,'status'=>1, 'user_id'=>1, 'municipio_id' => 360, 'parroquia'=> 'Nueva Arcadia', ));
    Parroquias::create(array( 'id' => 864,'status'=>1, 'user_id'=>1, 'municipio_id' => 361, 'parroquia'=> 'Delicias', ));
    Parroquias::create(array( 'id' => 865,'status'=>1, 'user_id'=>1, 'municipio_id' => 361, 'parroquia'=> 'Pecaya', ));
    Parroquias::create(array( 'id' => 866,'status'=>1, 'user_id'=>1, 'municipio_id' => 362, 'parroquia'=> 'Samuel Darío Maldonado', ));
    Parroquias::create(array( 'id' => 867,'status'=>1, 'user_id'=>1, 'municipio_id' => 362, 'parroquia'=> 'Boconó', ));
    Parroquias::create(array( 'id' => 868,'status'=>1, 'user_id'=>1, 'municipio_id' => 362, 'parroquia'=> 'Hernández', ));
    Parroquias::create(array( 'id' => 869,'status'=>1, 'user_id'=>1, 'municipio_id' => 363, 'parroquia'=> 'La Concordia', ));
    Parroquias::create(array( 'id' => 870,'status'=>1, 'user_id'=>1, 'municipio_id' => 363, 'parroquia'=> 'San Juan Bautista', ));
    Parroquias::create(array( 'id' => 871,'status'=>1, 'user_id'=>1, 'municipio_id' => 363, 'parroquia'=> 'Pedro María Morantes', ));
    Parroquias::create(array( 'id' => 872,'status'=>1, 'user_id'=>1, 'municipio_id' => 363, 'parroquia'=> 'San Sebastián', ));
    Parroquias::create(array( 'id' => 873,'status'=>1, 'user_id'=>1, 'municipio_id' => 363, 'parroquia'=> 'Dr. Francisco Romero Lobo', ));
    Parroquias::create(array( 'id' => 874,'status'=>1, 'user_id'=>1, 'municipio_id' => 364, 'parroquia'=> 'Seboruco', ));
    Parroquias::create(array( 'id' => 875,'status'=>1, 'user_id'=>1, 'municipio_id' => 365, 'parroquia'=> 'Simón Rodríguez', ));
    Parroquias::create(array( 'id' => 876,'status'=>1, 'user_id'=>1, 'municipio_id' => 366, 'parroquia'=> 'Sucre', ));
    Parroquias::create(array( 'id' => 877,'status'=>1, 'user_id'=>1, 'municipio_id' => 366, 'parroquia'=> 'Eleazar López Contreras', ));
    Parroquias::create(array( 'id' => 878,'status'=>1, 'user_id'=>1, 'municipio_id' => 366, 'parroquia'=> 'San Pablo', ));
    Parroquias::create(array( 'id' => 879,'status'=>1, 'user_id'=>1, 'municipio_id' => 367, 'parroquia'=> 'Torbes', ));
    Parroquias::create(array( 'id' => 880,'status'=>1, 'user_id'=>1, 'municipio_id' => 368, 'parroquia'=> 'Uribante', ));
    Parroquias::create(array( 'id' => 881,'status'=>1, 'user_id'=>1, 'municipio_id' => 368, 'parroquia'=> 'Cárdenas', ));
    Parroquias::create(array( 'id' => 882,'status'=>1, 'user_id'=>1, 'municipio_id' => 368, 'parroquia'=> 'Juan Pablo Peñalosa', ));
    Parroquias::create(array( 'id' => 883,'status'=>1, 'user_id'=>1, 'municipio_id' => 368, 'parroquia'=> 'Potosí', ));
    Parroquias::create(array( 'id' => 884,'status'=>1, 'user_id'=>1, 'municipio_id' => 369, 'parroquia'=> 'San Judas Tadeo', ));
    Parroquias::create(array( 'id' => 885,'status'=>1, 'user_id'=>1, 'municipio_id' => 370, 'parroquia'=> 'Araguaney', ));
    Parroquias::create(array( 'id' => 886,'status'=>1, 'user_id'=>1, 'municipio_id' => 370, 'parroquia'=> 'El Jaguito', ));
    Parroquias::create(array( 'id' => 887,'status'=>1, 'user_id'=>1, 'municipio_id' => 370, 'parroquia'=> 'La Esperanza', ));
    Parroquias::create(array( 'id' => 888,'status'=>1, 'user_id'=>1, 'municipio_id' => 370, 'parroquia'=> 'Santa Isabel', ));
    Parroquias::create(array( 'id' => 889,'status'=>1, 'user_id'=>1, 'municipio_id' => 371, 'parroquia'=> 'Boconó', ));
    Parroquias::create(array( 'id' => 890,'status'=>1, 'user_id'=>1, 'municipio_id' => 371, 'parroquia'=> 'El Carmen', ));
    Parroquias::create(array( 'id' => 891,'status'=>1, 'user_id'=>1, 'municipio_id' => 371, 'parroquia'=> 'Mosquey', ));
    Parroquias::create(array( 'id' => 892,'status'=>1, 'user_id'=>1, 'municipio_id' => 371, 'parroquia'=> 'Ayacucho', ));
    Parroquias::create(array( 'id' => 893,'status'=>1, 'user_id'=>1, 'municipio_id' => 371, 'parroquia'=> 'Burbusay', ));
    Parroquias::create(array( 'id' => 894,'status'=>1, 'user_id'=>1, 'municipio_id' => 371, 'parroquia'=> 'General Ribas', ));
    Parroquias::create(array( 'id' => 895,'status'=>1, 'user_id'=>1, 'municipio_id' => 371, 'parroquia'=> 'Guaramacal', ));
    Parroquias::create(array( 'id' => 896,'status'=>1, 'user_id'=>1, 'municipio_id' => 371, 'parroquia'=> 'Vega de Guaramacal', ));
    Parroquias::create(array( 'id' => 897,'status'=>1, 'user_id'=>1, 'municipio_id' => 371, 'parroquia'=> 'Monseñor Jáuregui', ));
    Parroquias::create(array( 'id' => 898,'status'=>1, 'user_id'=>1, 'municipio_id' => 371, 'parroquia'=> 'Rafael Rangel', ));
    Parroquias::create(array( 'id' => 899,'status'=>1, 'user_id'=>1, 'municipio_id' => 371, 'parroquia'=> 'San Miguel', ));
    Parroquias::create(array( 'id' => 900,'status'=>1, 'user_id'=>1, 'municipio_id' => 371, 'parroquia'=> 'San José', ));
    Parroquias::create(array( 'id' => 901,'status'=>1, 'user_id'=>1, 'municipio_id' => 372, 'parroquia'=> 'Sabana Grande', ));
    Parroquias::create(array( 'id' => 902,'status'=>1, 'user_id'=>1, 'municipio_id' => 372, 'parroquia'=> 'Cheregüé', ));
    Parroquias::create(array( 'id' => 903,'status'=>1, 'user_id'=>1, 'municipio_id' => 372, 'parroquia'=> 'Granados', ));
    Parroquias::create(array( 'id' => 904,'status'=>1, 'user_id'=>1, 'municipio_id' => 373, 'parroquia'=> 'Arnoldo Gabaldón', ));
    Parroquias::create(array( 'id' => 905,'status'=>1, 'user_id'=>1, 'municipio_id' => 373, 'parroquia'=> 'Bolivia', ));
    Parroquias::create(array( 'id' => 906,'status'=>1, 'user_id'=>1, 'municipio_id' => 373, 'parroquia'=> 'Carrillo', ));
    Parroquias::create(array( 'id' => 907,'status'=>1, 'user_id'=>1, 'municipio_id' => 373, 'parroquia'=> 'Cegarra', ));
    Parroquias::create(array( 'id' => 908,'status'=>1, 'user_id'=>1, 'municipio_id' => 373, 'parroquia'=> 'Chejendé', ));
    Parroquias::create(array( 'id' => 909,'status'=>1, 'user_id'=>1, 'municipio_id' => 373, 'parroquia'=> 'Manuel Salvador Ulloa', ));
    Parroquias::create(array( 'id' => 910,'status'=>1, 'user_id'=>1, 'municipio_id' => 373, 'parroquia'=> 'San José', ));
    Parroquias::create(array( 'id' => 911,'status'=>1, 'user_id'=>1, 'municipio_id' => 374, 'parroquia'=> 'Carache', ));
    Parroquias::create(array( 'id' => 912,'status'=>1, 'user_id'=>1, 'municipio_id' => 374, 'parroquia'=> 'La Concepción', ));
    Parroquias::create(array( 'id' => 913,'status'=>1, 'user_id'=>1, 'municipio_id' => 374, 'parroquia'=> 'Cuicas', ));
    Parroquias::create(array( 'id' => 914,'status'=>1, 'user_id'=>1, 'municipio_id' => 374, 'parroquia'=> 'Panamericana', ));
    Parroquias::create(array( 'id' => 915,'status'=>1, 'user_id'=>1, 'municipio_id' => 374, 'parroquia'=> 'Santa Cruz', ));
    Parroquias::create(array( 'id' => 916,'status'=>1, 'user_id'=>1, 'municipio_id' => 375, 'parroquia'=> 'Escuque', ));
    Parroquias::create(array( 'id' => 917,'status'=>1, 'user_id'=>1, 'municipio_id' => 375, 'parroquia'=> 'La Unión', ));
    Parroquias::create(array( 'id' => 918,'status'=>1, 'user_id'=>1, 'municipio_id' => 375, 'parroquia'=> 'Santa Rita', ));
    Parroquias::create(array( 'id' => 919,'status'=>1, 'user_id'=>1, 'municipio_id' => 375, 'parroquia'=> 'Sabana Libre', ));
    Parroquias::create(array( 'id' => 920,'status'=>1, 'user_id'=>1, 'municipio_id' => 376, 'parroquia'=> 'El Socorro', ));
    Parroquias::create(array( 'id' => 921,'status'=>1, 'user_id'=>1, 'municipio_id' => 376, 'parroquia'=> 'Los Caprichos', ));
    Parroquias::create(array( 'id' => 922,'status'=>1, 'user_id'=>1, 'municipio_id' => 376, 'parroquia'=> 'Antonio José de Sucre', ));
    Parroquias::create(array( 'id' => 923,'status'=>1, 'user_id'=>1, 'municipio_id' => 377, 'parroquia'=> 'Campo Elías', ));
    Parroquias::create(array( 'id' => 924,'status'=>1, 'user_id'=>1, 'municipio_id' => 377, 'parroquia'=> 'Arnoldo Gabaldón', ));
    Parroquias::create(array( 'id' => 925,'status'=>1, 'user_id'=>1, 'municipio_id' => 378, 'parroquia'=> 'Santa Apolonia', ));
    Parroquias::create(array( 'id' => 926,'status'=>1, 'user_id'=>1, 'municipio_id' => 378, 'parroquia'=> 'El Progreso', ));
    Parroquias::create(array( 'id' => 927,'status'=>1, 'user_id'=>1, 'municipio_id' => 378, 'parroquia'=> 'La Ceiba', ));
    Parroquias::create(array( 'id' => 928,'status'=>1, 'user_id'=>1, 'municipio_id' => 378, 'parroquia'=> 'Tres de Febrero', ));
    Parroquias::create(array( 'id' => 929,'status'=>1, 'user_id'=>1, 'municipio_id' => 379, 'parroquia'=> 'El Dividive', ));
    Parroquias::create(array( 'id' => 930,'status'=>1, 'user_id'=>1, 'municipio_id' => 379, 'parroquia'=> 'Agua Santa', ));
    Parroquias::create(array( 'id' => 931,'status'=>1, 'user_id'=>1, 'municipio_id' => 379, 'parroquia'=> 'Agua Caliente', ));
    Parroquias::create(array( 'id' => 932,'status'=>1, 'user_id'=>1, 'municipio_id' => 379, 'parroquia'=> 'El Cenizo', ));
    Parroquias::create(array( 'id' => 933,'status'=>1, 'user_id'=>1, 'municipio_id' => 379, 'parroquia'=> 'Valerita', ));
    Parroquias::create(array( 'id' => 934,'status'=>1, 'user_id'=>1, 'municipio_id' => 380, 'parroquia'=> 'Monte Carmelo', ));
    Parroquias::create(array( 'id' => 935,'status'=>1, 'user_id'=>1, 'municipio_id' => 380, 'parroquia'=> 'Buena Vista', ));
    Parroquias::create(array( 'id' => 936,'status'=>1, 'user_id'=>1, 'municipio_id' => 380, 'parroquia'=> 'Santa María del Horcón', ));
    Parroquias::create(array( 'id' => 937,'status'=>1, 'user_id'=>1, 'municipio_id' => 381, 'parroquia'=> 'Motatán', ));
    Parroquias::create(array( 'id' => 938,'status'=>1, 'user_id'=>1, 'municipio_id' => 381, 'parroquia'=> 'El Baño', ));
    Parroquias::create(array( 'id' => 939,'status'=>1, 'user_id'=>1, 'municipio_id' => 381, 'parroquia'=> 'Jalisco', ));
    Parroquias::create(array( 'id' => 940,'status'=>1, 'user_id'=>1, 'municipio_id' => 382, 'parroquia'=> 'Pampán', ));
    Parroquias::create(array( 'id' => 941,'status'=>1, 'user_id'=>1, 'municipio_id' => 382, 'parroquia'=> 'Flor de Patria', ));
    Parroquias::create(array( 'id' => 942,'status'=>1, 'user_id'=>1, 'municipio_id' => 382, 'parroquia'=> 'La Paz', ));
    Parroquias::create(array( 'id' => 943,'status'=>1, 'user_id'=>1, 'municipio_id' => 382, 'parroquia'=> 'Santa Ana', ));
    Parroquias::create(array( 'id' => 944,'status'=>1, 'user_id'=>1, 'municipio_id' => 383, 'parroquia'=> 'Pampanito', ));
    Parroquias::create(array( 'id' => 945,'status'=>1, 'user_id'=>1, 'municipio_id' => 383, 'parroquia'=> 'La Concepción', ));
    Parroquias::create(array( 'id' => 946,'status'=>1, 'user_id'=>1, 'municipio_id' => 383, 'parroquia'=> 'Pampanito II', ));
    Parroquias::create(array( 'id' => 947,'status'=>1, 'user_id'=>1, 'municipio_id' => 384, 'parroquia'=> 'Betijoque', ));
    Parroquias::create(array( 'id' => 948,'status'=>1, 'user_id'=>1, 'municipio_id' => 384, 'parroquia'=> 'José Gregorio Hernández', ));
    Parroquias::create(array( 'id' => 949,'status'=>1, 'user_id'=>1, 'municipio_id' => 384, 'parroquia'=> 'La Pueblita', ));
    Parroquias::create(array( 'id' => 950,'status'=>1, 'user_id'=>1, 'municipio_id' => 384, 'parroquia'=> 'Los Cedros', ));
    Parroquias::create(array( 'id' => 951,'status'=>1, 'user_id'=>1, 'municipio_id' => 385, 'parroquia'=> 'Carvajal', ));
    Parroquias::create(array( 'id' => 952,'status'=>1, 'user_id'=>1, 'municipio_id' => 385, 'parroquia'=> 'Campo Alegre', ));
    Parroquias::create(array( 'id' => 953,'status'=>1, 'user_id'=>1, 'municipio_id' => 385, 'parroquia'=> 'Antonio Nicolás Briceño', ));
    Parroquias::create(array( 'id' => 954,'status'=>1, 'user_id'=>1, 'municipio_id' => 385, 'parroquia'=> 'José Leonardo Suárez', ));
    Parroquias::create(array( 'id' => 955,'status'=>1, 'user_id'=>1, 'municipio_id' => 386, 'parroquia'=> 'Sabana de Mendoza', ));
    Parroquias::create(array( 'id' => 956,'status'=>1, 'user_id'=>1, 'municipio_id' => 386, 'parroquia'=> 'Junín', ));
    Parroquias::create(array( 'id' => 957,'status'=>1, 'user_id'=>1, 'municipio_id' => 386, 'parroquia'=> 'Valmore Rodríguez', ));
    Parroquias::create(array( 'id' => 958,'status'=>1, 'user_id'=>1, 'municipio_id' => 386, 'parroquia'=> 'El Paraíso', ));
    Parroquias::create(array( 'id' => 959,'status'=>1, 'user_id'=>1, 'municipio_id' => 387, 'parroquia'=> 'Andrés Linares', ));
    Parroquias::create(array( 'id' => 960,'status'=>1, 'user_id'=>1, 'municipio_id' => 387, 'parroquia'=> 'Chiquinquirá', ));
    Parroquias::create(array( 'id' => 961,'status'=>1, 'user_id'=>1, 'municipio_id' => 387, 'parroquia'=> 'Cristóbal Mendoza', ));
    Parroquias::create(array( 'id' => 962,'status'=>1, 'user_id'=>1, 'municipio_id' => 387, 'parroquia'=> 'Cruz Carrillo', ));
    Parroquias::create(array( 'id' => 963,'status'=>1, 'user_id'=>1, 'municipio_id' => 387, 'parroquia'=> 'Matriz', ));
    Parroquias::create(array( 'id' => 964,'status'=>1, 'user_id'=>1, 'municipio_id' => 387, 'parroquia'=> 'Monseñor Carrillo', ));
    Parroquias::create(array( 'id' => 965,'status'=>1, 'user_id'=>1, 'municipio_id' => 387, 'parroquia'=> 'Tres Esquinas', ));
    Parroquias::create(array( 'id' => 966,'status'=>1, 'user_id'=>1, 'municipio_id' => 388, 'parroquia'=> 'Cabimbú', ));
    Parroquias::create(array( 'id' => 967,'status'=>1, 'user_id'=>1, 'municipio_id' => 388, 'parroquia'=> 'Jajó', ));
    Parroquias::create(array( 'id' => 968,'status'=>1, 'user_id'=>1, 'municipio_id' => 388, 'parroquia'=> 'La Mesa de Esnujaque', ));
    Parroquias::create(array( 'id' => 969,'status'=>1, 'user_id'=>1, 'municipio_id' => 388, 'parroquia'=> 'Santiago', ));
    Parroquias::create(array( 'id' => 970,'status'=>1, 'user_id'=>1, 'municipio_id' => 388, 'parroquia'=> 'Tuñame', ));
    Parroquias::create(array( 'id' => 971,'status'=>1, 'user_id'=>1, 'municipio_id' => 388, 'parroquia'=> 'La Quebrada', ));
    Parroquias::create(array( 'id' => 972,'status'=>1, 'user_id'=>1, 'municipio_id' => 389, 'parroquia'=> 'Juan Ignacio Montilla', ));
    Parroquias::create(array( 'id' => 973,'status'=>1, 'user_id'=>1, 'municipio_id' => 389, 'parroquia'=> 'La Beatriz', ));
    Parroquias::create(array( 'id' => 974,'status'=>1, 'user_id'=>1, 'municipio_id' => 389, 'parroquia'=> 'La Puerta', ));
    Parroquias::create(array( 'id' => 975,'status'=>1, 'user_id'=>1, 'municipio_id' => 389, 'parroquia'=> 'Mendoza del Valle de Momboy', ));
    Parroquias::create(array( 'id' => 976,'status'=>1, 'user_id'=>1, 'municipio_id' => 389, 'parroquia'=> 'Mercedes Díaz', ));
    Parroquias::create(array( 'id' => 977,'status'=>1, 'user_id'=>1, 'municipio_id' => 389, 'parroquia'=> 'San Luis', ));
    Parroquias::create(array( 'id' => 978,'status'=>1, 'user_id'=>1, 'municipio_id' => 390, 'parroquia'=> 'Caraballeda', ));
    Parroquias::create(array( 'id' => 979,'status'=>1, 'user_id'=>1, 'municipio_id' => 390, 'parroquia'=> 'Carayaca', ));
    Parroquias::create(array( 'id' => 980,'status'=>1, 'user_id'=>1, 'municipio_id' => 390, 'parroquia'=> 'Carlos Soublette', ));
    Parroquias::create(array( 'id' => 981,'status'=>1, 'user_id'=>1, 'municipio_id' => 390, 'parroquia'=> 'Caruao Chuspa', ));
    Parroquias::create(array( 'id' => 982,'status'=>1, 'user_id'=>1, 'municipio_id' => 390, 'parroquia'=> 'Catia La Mar', ));
    Parroquias::create(array( 'id' => 983,'status'=>1, 'user_id'=>1, 'municipio_id' => 390, 'parroquia'=> 'El Junko', ));
    Parroquias::create(array( 'id' => 984,'status'=>1, 'user_id'=>1, 'municipio_id' => 390, 'parroquia'=> 'La Guaira', ));
    Parroquias::create(array( 'id' => 985,'status'=>1, 'user_id'=>1, 'municipio_id' => 390, 'parroquia'=> 'Macuto', ));
    Parroquias::create(array( 'id' => 986,'status'=>1, 'user_id'=>1, 'municipio_id' => 390, 'parroquia'=> 'Maiquetía', ));
    Parroquias::create(array( 'id' => 987,'status'=>1, 'user_id'=>1, 'municipio_id' => 390, 'parroquia'=> 'Naiguatá', ));
    Parroquias::create(array( 'id' => 988,'status'=>1, 'user_id'=>1, 'municipio_id' => 390, 'parroquia'=> 'Urimare', ));
    Parroquias::create(array( 'id' => 989,'status'=>1, 'user_id'=>1, 'municipio_id' => 391, 'parroquia'=> 'Arístides Bastidas', ));
    Parroquias::create(array( 'id' => 990,'status'=>1, 'user_id'=>1, 'municipio_id' => 392, 'parroquia'=> 'Bolívar', ));
    Parroquias::create(array( 'id' => 991,'status'=>1, 'user_id'=>1, 'municipio_id' => 407, 'parroquia'=> 'Chivacoa', ));
    Parroquias::create(array( 'id' => 992,'status'=>1, 'user_id'=>1, 'municipio_id' => 407, 'parroquia'=> 'Campo Elías', ));
    Parroquias::create(array( 'id' => 993,'status'=>1, 'user_id'=>1, 'municipio_id' => 408, 'parroquia'=> 'Cocorote', ));
    Parroquias::create(array( 'id' => 994,'status'=>1, 'user_id'=>1, 'municipio_id' => 409, 'parroquia'=> 'Independencia', ));
    Parroquias::create(array( 'id' => 995,'status'=>1, 'user_id'=>1, 'municipio_id' => 410, 'parroquia'=> 'José Antonio Páez', ));
    Parroquias::create(array( 'id' => 996,'status'=>1, 'user_id'=>1, 'municipio_id' => 411, 'parroquia'=> 'La Trinidad', ));
    Parroquias::create(array( 'id' => 997,'status'=>1, 'user_id'=>1, 'municipio_id' => 412, 'parroquia'=> 'Manuel Monge', ));
    Parroquias::create(array( 'id' => 998,'status'=>1, 'user_id'=>1, 'municipio_id' => 413, 'parroquia'=> 'Salóm', ));
    Parroquias::create(array( 'id' => 999,'status'=>1, 'user_id'=>1, 'municipio_id' => 413, 'parroquia'=> 'Temerla', ));
    Parroquias::create(array( 'id' => 1000,'status'=>1, 'user_id'=>1, 'municipio_id' => 413, 'parroquia'=> 'Nirgua', ));
    Parroquias::create(array( 'id' => 1001,'status'=>1, 'user_id'=>1, 'municipio_id' => 414, 'parroquia'=> 'San Andrés', ));
    Parroquias::create(array( 'id' => 1002,'status'=>1, 'user_id'=>1, 'municipio_id' => 414, 'parroquia'=> 'Yaritagua', ));
    Parroquias::create(array( 'id' => 1003,'status'=>1, 'user_id'=>1, 'municipio_id' => 415, 'parroquia'=> 'San Javier', ));
    Parroquias::create(array( 'id' => 1004,'status'=>1, 'user_id'=>1, 'municipio_id' => 415, 'parroquia'=> 'Albarico', ));
    Parroquias::create(array( 'id' => 1005,'status'=>1, 'user_id'=>1, 'municipio_id' => 415, 'parroquia'=> 'San Felipe', ));
    Parroquias::create(array( 'id' => 1006,'status'=>1, 'user_id'=>1, 'municipio_id' => 416, 'parroquia'=> 'Sucre', ));
    Parroquias::create(array( 'id' => 1007,'status'=>1, 'user_id'=>1, 'municipio_id' => 417, 'parroquia'=> 'Urachiche', ));
    Parroquias::create(array( 'id' => 1008,'status'=>1, 'user_id'=>1, 'municipio_id' => 418, 'parroquia'=> 'El Guayabo', ));
    Parroquias::create(array( 'id' => 1009,'status'=>1, 'user_id'=>1, 'municipio_id' => 418, 'parroquia'=> 'Farriar', ));
    Parroquias::create(array( 'id' => 1010,'status'=>1, 'user_id'=>1, 'municipio_id' => 441, 'parroquia'=> 'Isla de Toas', ));
    Parroquias::create(array( 'id' => 1011,'status'=>1, 'user_id'=>1, 'municipio_id' => 441, 'parroquia'=> 'Monagas', ));
    Parroquias::create(array( 'id' => 1012,'status'=>1, 'user_id'=>1, 'municipio_id' => 442, 'parroquia'=> 'San Timoteo', ));
    Parroquias::create(array( 'id' => 1013,'status'=>1, 'user_id'=>1, 'municipio_id' => 442, 'parroquia'=> 'General Urdaneta', ));
    Parroquias::create(array( 'id' => 1014,'status'=>1, 'user_id'=>1, 'municipio_id' => 442, 'parroquia'=> 'Libertador', ));
    Parroquias::create(array( 'id' => 1015,'status'=>1, 'user_id'=>1, 'municipio_id' => 442, 'parroquia'=> 'Marcelino Briceño', ));
    Parroquias::create(array( 'id' => 1016,'status'=>1, 'user_id'=>1, 'municipio_id' => 442, 'parroquia'=> 'Pueblo Nuevo', ));
    Parroquias::create(array( 'id' => 1017,'status'=>1, 'user_id'=>1, 'municipio_id' => 442, 'parroquia'=> 'Manuel Guanipa Matos', ));
    Parroquias::create(array( 'id' => 1018,'status'=>1, 'user_id'=>1, 'municipio_id' => 443, 'parroquia'=> 'Ambrosio', ));
    Parroquias::create(array( 'id' => 1019,'status'=>1, 'user_id'=>1, 'municipio_id' => 443, 'parroquia'=> 'Carmen Herrera', ));
    Parroquias::create(array( 'id' => 1020,'status'=>1, 'user_id'=>1, 'municipio_id' => 443, 'parroquia'=> 'La Rosa', ));
    Parroquias::create(array( 'id' => 1021,'status'=>1, 'user_id'=>1, 'municipio_id' => 443, 'parroquia'=> 'Germán Ríos Linares', ));
    Parroquias::create(array( 'id' => 1022,'status'=>1, 'user_id'=>1, 'municipio_id' => 443, 'parroquia'=> 'San Benito', ));
    Parroquias::create(array( 'id' => 1023,'status'=>1, 'user_id'=>1, 'municipio_id' => 443, 'parroquia'=> 'Rómulo Betancourt', ));
    Parroquias::create(array( 'id' => 1024,'status'=>1, 'user_id'=>1, 'municipio_id' => 443, 'parroquia'=> 'Jorge Hernández', ));
    Parroquias::create(array( 'id' => 1025,'status'=>1, 'user_id'=>1, 'municipio_id' => 443, 'parroquia'=> 'Punta Gorda', ));
    Parroquias::create(array( 'id' => 1026,'status'=>1, 'user_id'=>1, 'municipio_id' => 443, 'parroquia'=> 'Arístides Calvani', ));
    Parroquias::create(array( 'id' => 1027,'status'=>1, 'user_id'=>1, 'municipio_id' => 444, 'parroquia'=> 'Encontrados', ));
    Parroquias::create(array( 'id' => 1028,'status'=>1, 'user_id'=>1, 'municipio_id' => 444, 'parroquia'=> 'Udón Pérez', ));
    Parroquias::create(array( 'id' => 1029,'status'=>1, 'user_id'=>1, 'municipio_id' => 445, 'parroquia'=> 'Moralito', ));
    Parroquias::create(array( 'id' => 1030,'status'=>1, 'user_id'=>1, 'municipio_id' => 445, 'parroquia'=> 'San Carlos del Zulia', ));
    Parroquias::create(array( 'id' => 1031,'status'=>1, 'user_id'=>1, 'municipio_id' => 445, 'parroquia'=> 'Santa Cruz del Zulia', ));
    Parroquias::create(array( 'id' => 1032,'status'=>1, 'user_id'=>1, 'municipio_id' => 445, 'parroquia'=> 'Santa Bárbara', ));
    Parroquias::create(array( 'id' => 1033,'status'=>1, 'user_id'=>1, 'municipio_id' => 445, 'parroquia'=> 'Urribarrí', ));
    Parroquias::create(array( 'id' => 1034,'status'=>1, 'user_id'=>1, 'municipio_id' => 446, 'parroquia'=> 'Carlos Quevedo', ));
    Parroquias::create(array( 'id' => 1035,'status'=>1, 'user_id'=>1, 'municipio_id' => 446, 'parroquia'=> 'Francisco Javier Pulgar', ));
    Parroquias::create(array( 'id' => 1036,'status'=>1, 'user_id'=>1, 'municipio_id' => 446, 'parroquia'=> 'Simón Rodríguez', ));
    Parroquias::create(array( 'id' => 1037,'status'=>1, 'user_id'=>1, 'municipio_id' => 446, 'parroquia'=> 'Guamo-Gavilanes', ));
    Parroquias::create(array( 'id' => 1038,'status'=>1, 'user_id'=>1, 'municipio_id' => 448, 'parroquia'=> 'La Concepción', ));
    Parroquias::create(array( 'id' => 1039,'status'=>1, 'user_id'=>1, 'municipio_id' => 448, 'parroquia'=> 'San José', ));
    Parroquias::create(array( 'id' => 1040,'status'=>1, 'user_id'=>1, 'municipio_id' => 448, 'parroquia'=> 'Mariano Parra León', ));
    Parroquias::create(array( 'id' => 1041,'status'=>1, 'user_id'=>1, 'municipio_id' => 448, 'parroquia'=> 'José Ramón Yépez', ));
    Parroquias::create(array( 'id' => 1042,'status'=>1, 'user_id'=>1, 'municipio_id' => 449, 'parroquia'=> 'Jesús María Semprún', ));
    Parroquias::create(array( 'id' => 1043,'status'=>1, 'user_id'=>1, 'municipio_id' => 449, 'parroquia'=> 'Barí', ));
    Parroquias::create(array( 'id' => 1044,'status'=>1, 'user_id'=>1, 'municipio_id' => 450, 'parroquia'=> 'Concepción', ));
    Parroquias::create(array( 'id' => 1045,'status'=>1, 'user_id'=>1, 'municipio_id' => 450, 'parroquia'=> 'Andrés Bello', ));
    Parroquias::create(array( 'id' => 1046,'status'=>1, 'user_id'=>1, 'municipio_id' => 450, 'parroquia'=> 'Chiquinquirá', ));
    Parroquias::create(array( 'id' => 1047,'status'=>1, 'user_id'=>1, 'municipio_id' => 450, 'parroquia'=> 'El Carmelo', ));
    Parroquias::create(array( 'id' => 1048,'status'=>1, 'user_id'=>1, 'municipio_id' => 450, 'parroquia'=> 'Potreritos', ));
    Parroquias::create(array( 'id' => 1049,'status'=>1, 'user_id'=>1, 'municipio_id' => 451, 'parroquia'=> 'Libertad', ));
    Parroquias::create(array( 'id' => 1050,'status'=>1, 'user_id'=>1, 'municipio_id' => 451, 'parroquia'=> 'Alonso de Ojeda', ));
    Parroquias::create(array( 'id' => 1051,'status'=>1, 'user_id'=>1, 'municipio_id' => 451, 'parroquia'=> 'Venezuela', ));
    Parroquias::create(array( 'id' => 1052,'status'=>1, 'user_id'=>1, 'municipio_id' => 451, 'parroquia'=> 'Eleazar López Contreras', ));
    Parroquias::create(array( 'id' => 1053,'status'=>1, 'user_id'=>1, 'municipio_id' => 451, 'parroquia'=> 'Campo Lara', ));
    Parroquias::create(array( 'id' => 1054,'status'=>1, 'user_id'=>1, 'municipio_id' => 452, 'parroquia'=> 'Bartolomé de las Casas', ));
    Parroquias::create(array( 'id' => 1055,'status'=>1, 'user_id'=>1, 'municipio_id' => 452, 'parroquia'=> 'Libertad', ));
    Parroquias::create(array( 'id' => 1056,'status'=>1, 'user_id'=>1, 'municipio_id' => 452, 'parroquia'=> 'Río Negro', ));
    Parroquias::create(array( 'id' => 1057,'status'=>1, 'user_id'=>1, 'municipio_id' => 452, 'parroquia'=> 'San José de Perijá', ));
    Parroquias::create(array( 'id' => 1058,'status'=>1, 'user_id'=>1, 'municipio_id' => 453, 'parroquia'=> 'San Rafael', ));
    Parroquias::create(array( 'id' => 1059,'status'=>1, 'user_id'=>1, 'municipio_id' => 453, 'parroquia'=> 'La Sierrita', ));
    Parroquias::create(array( 'id' => 1060,'status'=>1, 'user_id'=>1, 'municipio_id' => 453, 'parroquia'=> 'Las Parcelas', ));
    Parroquias::create(array( 'id' => 1061,'status'=>1, 'user_id'=>1, 'municipio_id' => 453, 'parroquia'=> 'Luis de Vicente', ));
    Parroquias::create(array( 'id' => 1062,'status'=>1, 'user_id'=>1, 'municipio_id' => 453, 'parroquia'=> 'Monseñor Marcos Sergio Godoy', ));
    Parroquias::create(array( 'id' => 1063,'status'=>1, 'user_id'=>1, 'municipio_id' => 453, 'parroquia'=> 'Ricaurte', ));
    Parroquias::create(array( 'id' => 1064,'status'=>1, 'user_id'=>1, 'municipio_id' => 453, 'parroquia'=> 'Tamare', ));
    Parroquias::create(array( 'id' => 1065,'status'=>1, 'user_id'=>1, 'municipio_id' => 454, 'parroquia'=> 'Antonio Borjas Romero', ));
    Parroquias::create(array( 'id' => 1066,'status'=>1, 'user_id'=>1, 'municipio_id' => 454, 'parroquia'=> 'Bolívar', ));
    Parroquias::create(array( 'id' => 1067,'status'=>1, 'user_id'=>1, 'municipio_id' => 454, 'parroquia'=> 'Cacique Mara', ));
    Parroquias::create(array( 'id' => 1068,'status'=>1, 'user_id'=>1, 'municipio_id' => 454, 'parroquia'=> 'Carracciolo Parra Pérez', ));
    Parroquias::create(array( 'id' => 1069,'status'=>1, 'user_id'=>1, 'municipio_id' => 454, 'parroquia'=> 'Cecilio Acosta', ));
    Parroquias::create(array( 'id' => 1070,'status'=>1, 'user_id'=>1, 'municipio_id' => 454, 'parroquia'=> 'Cristo de Aranza', ));
    Parroquias::create(array( 'id' => 1071,'status'=>1, 'user_id'=>1, 'municipio_id' => 454, 'parroquia'=> 'Coquivacoa', ));
    Parroquias::create(array( 'id' => 1072,'status'=>1, 'user_id'=>1, 'municipio_id' => 454, 'parroquia'=> 'Chiquinquirá', ));
    Parroquias::create(array( 'id' => 1073,'status'=>1, 'user_id'=>1, 'municipio_id' => 454, 'parroquia'=> 'Francisco Eugenio Bustamante', ));
    Parroquias::create(array( 'id' => 1074,'status'=>1, 'user_id'=>1, 'municipio_id' => 454, 'parroquia'=> 'Idelfonzo Vásquez', ));
    Parroquias::create(array( 'id' => 1075,'status'=>1, 'user_id'=>1, 'municipio_id' => 454, 'parroquia'=> 'Juana de Ávila', ));
    Parroquias::create(array( 'id' => 1076,'status'=>1, 'user_id'=>1, 'municipio_id' => 454, 'parroquia'=> 'Luis Hurtado Higuera', ));
    Parroquias::create(array( 'id' => 1077,'status'=>1, 'user_id'=>1, 'municipio_id' => 454, 'parroquia'=> 'Manuel Dagnino', ));
    Parroquias::create(array( 'id' => 1078,'status'=>1, 'user_id'=>1, 'municipio_id' => 454, 'parroquia'=> 'Olegario Villalobos', ));
    Parroquias::create(array( 'id' => 1079,'status'=>1, 'user_id'=>1, 'municipio_id' => 454, 'parroquia'=> 'Raúl Leoni', ));
    Parroquias::create(array( 'id' => 1080,'status'=>1, 'user_id'=>1, 'municipio_id' => 454, 'parroquia'=> 'Santa Lucía', ));
    Parroquias::create(array( 'id' => 1081,'status'=>1, 'user_id'=>1, 'municipio_id' => 454, 'parroquia'=> 'Venancio Pulgar', ));
    Parroquias::create(array( 'id' => 1082,'status'=>1, 'user_id'=>1, 'municipio_id' => 454, 'parroquia'=> 'San Isidro', ));
    Parroquias::create(array( 'id' => 1083,'status'=>1, 'user_id'=>1, 'municipio_id' => 455, 'parroquia'=> 'Altagracia', ));
    Parroquias::create(array( 'id' => 1084,'status'=>1, 'user_id'=>1, 'municipio_id' => 455, 'parroquia'=> 'Faría', ));
    Parroquias::create(array( 'id' => 1085,'status'=>1, 'user_id'=>1, 'municipio_id' => 455, 'parroquia'=> 'Ana María Campos', ));
    Parroquias::create(array( 'id' => 1086,'status'=>1, 'user_id'=>1, 'municipio_id' => 455, 'parroquia'=> 'San Antonio', ));
    Parroquias::create(array( 'id' => 1087,'status'=>1, 'user_id'=>1, 'municipio_id' => 455, 'parroquia'=> 'San José', ));
    Parroquias::create(array( 'id' => 1088,'status'=>1, 'user_id'=>1, 'municipio_id' => 456, 'parroquia'=> 'Donaldo García', ));
    Parroquias::create(array( 'id' => 1089,'status'=>1, 'user_id'=>1, 'municipio_id' => 456, 'parroquia'=> 'El Rosario', ));
    Parroquias::create(array( 'id' => 1090,'status'=>1, 'user_id'=>1, 'municipio_id' => 456, 'parroquia'=> 'Sixto Zambrano', ));
    Parroquias::create(array( 'id' => 1091,'status'=>1, 'user_id'=>1, 'municipio_id' => 457, 'parroquia'=> 'San Francisco', ));
    Parroquias::create(array( 'id' => 1092,'status'=>1, 'user_id'=>1, 'municipio_id' => 457, 'parroquia'=> 'El Bajo', ));
    Parroquias::create(array( 'id' => 1093,'status'=>1, 'user_id'=>1, 'municipio_id' => 457, 'parroquia'=> 'Domitila Flores', ));
    Parroquias::create(array( 'id' => 1094,'status'=>1, 'user_id'=>1, 'municipio_id' => 457, 'parroquia'=> 'Francisco Ochoa', ));
    Parroquias::create(array( 'id' => 1095,'status'=>1, 'user_id'=>1, 'municipio_id' => 457, 'parroquia'=> 'Los Cortijos', ));
    Parroquias::create(array( 'id' => 1096,'status'=>1, 'user_id'=>1, 'municipio_id' => 457, 'parroquia'=> 'Marcial Hernández', ));
    Parroquias::create(array( 'id' => 1097,'status'=>1, 'user_id'=>1, 'municipio_id' => 458, 'parroquia'=> 'Santa Rita', ));
    Parroquias::create(array( 'id' => 1098,'status'=>1, 'user_id'=>1, 'municipio_id' => 458, 'parroquia'=> 'El Mene', ));
    Parroquias::create(array( 'id' => 1099,'status'=>1, 'user_id'=>1, 'municipio_id' => 458, 'parroquia'=> 'Pedro Lucas Urribarrí', ));
    Parroquias::create(array( 'id' => 1100,'status'=>1, 'user_id'=>1, 'municipio_id' => 458, 'parroquia'=> 'José Cenobio Urribarrí', ));
    Parroquias::create(array( 'id' => 1101,'status'=>1, 'user_id'=>1, 'municipio_id' => 459, 'parroquia'=> 'Rafael Maria Baralt', ));
    Parroquias::create(array( 'id' => 1102,'status'=>1, 'user_id'=>1, 'municipio_id' => 459, 'parroquia'=> 'Manuel Manrique', ));
    Parroquias::create(array( 'id' => 1103,'status'=>1, 'user_id'=>1, 'municipio_id' => 459, 'parroquia'=> 'Rafael Urdaneta', ));
    Parroquias::create(array( 'id' => 1104,'status'=>1, 'user_id'=>1, 'municipio_id' => 460, 'parroquia'=> 'Bobures', ));
    Parroquias::create(array( 'id' => 1105,'status'=>1, 'user_id'=>1, 'municipio_id' => 460, 'parroquia'=> 'Gibraltar', ));
    Parroquias::create(array( 'id' => 1106,'status'=>1, 'user_id'=>1, 'municipio_id' => 460, 'parroquia'=> 'Heras', ));
    Parroquias::create(array( 'id' => 1107,'status'=>1, 'user_id'=>1, 'municipio_id' => 460, 'parroquia'=> 'Monseñor Arturo Álvarez', ));
    Parroquias::create(array( 'id' => 1108,'status'=>1, 'user_id'=>1, 'municipio_id' => 460, 'parroquia'=> 'Rómulo Gallegos', ));
    Parroquias::create(array( 'id' => 1109,'status'=>1, 'user_id'=>1, 'municipio_id' => 460, 'parroquia'=> 'El Batey', ));
    Parroquias::create(array( 'id' => 1110,'status'=>1, 'user_id'=>1, 'municipio_id' => 461, 'parroquia'=> 'Rafael Urdaneta', ));
    Parroquias::create(array( 'id' => 1111,'status'=>1, 'user_id'=>1, 'municipio_id' => 461, 'parroquia'=> 'La Victoria', ));
    Parroquias::create(array( 'id' => 1112,'status'=>1, 'user_id'=>1, 'municipio_id' => 461, 'parroquia'=> 'Raúl Cuenca', ));
    Parroquias::create(array( 'id' => 1113,'status'=>1, 'user_id'=>1, 'municipio_id' => 447, 'parroquia'=> 'Sinamaica', ));
    Parroquias::create(array( 'id' => 1114,'status'=>1, 'user_id'=>1, 'municipio_id' => 447, 'parroquia'=> 'Alta Guajira', ));
    Parroquias::create(array( 'id' => 1115,'status'=>1, 'user_id'=>1, 'municipio_id' => 447, 'parroquia'=> 'Elías Sánchez Rubio', ));
    Parroquias::create(array( 'id' => 1116,'status'=>1, 'user_id'=>1, 'municipio_id' => 447, 'parroquia'=> 'Guajira', ));
    Parroquias::create(array( 'id' => 1117,'status'=>1, 'user_id'=>1, 'municipio_id' => 462, 'parroquia'=> 'Altagracia', ));
    Parroquias::create(array( 'id' => 1118,'status'=>1, 'user_id'=>1, 'municipio_id' => 462, 'parroquia'=> 'Antímano', ));
    Parroquias::create(array( 'id' => 1119,'status'=>1, 'user_id'=>1, 'municipio_id' => 462, 'parroquia'=> 'Caricuao', ));
    Parroquias::create(array( 'id' => 1120,'status'=>1, 'user_id'=>1, 'municipio_id' => 462, 'parroquia'=> 'Catedral', ));
    Parroquias::create(array( 'id' => 1121,'status'=>1, 'user_id'=>1, 'municipio_id' => 462, 'parroquia'=> 'Coche', ));
    Parroquias::create(array( 'id' => 1122,'status'=>1, 'user_id'=>1, 'municipio_id' => 462, 'parroquia'=> 'El Junquito', ));
    Parroquias::create(array( 'id' => 1123,'status'=>1, 'user_id'=>1, 'municipio_id' => 462, 'parroquia'=> 'El Paraíso', ));
    Parroquias::create(array( 'id' => 1124,'status'=>1, 'user_id'=>1, 'municipio_id' => 462, 'parroquia'=> 'El Recreo', ));
    Parroquias::create(array( 'id' => 1125,'status'=>1, 'user_id'=>1, 'municipio_id' => 462, 'parroquia'=> 'El Valle', ));
    Parroquias::create(array( 'id' => 1126,'status'=>1, 'user_id'=>1, 'municipio_id' => 462, 'parroquia'=> 'La Candelaria', ));
    Parroquias::create(array( 'id' => 1127,'status'=>1, 'user_id'=>1, 'municipio_id' => 462, 'parroquia'=> 'La Pastora', ));
    Parroquias::create(array( 'id' => 1128,'status'=>1, 'user_id'=>1, 'municipio_id' => 462, 'parroquia'=> 'La Vega', ));
    Parroquias::create(array( 'id' => 1129,'status'=>1, 'user_id'=>1, 'municipio_id' => 462, 'parroquia'=> 'Macarao', ));
    Parroquias::create(array( 'id' => 1130,'status'=>1, 'user_id'=>1, 'municipio_id' => 462, 'parroquia'=> 'San Agustín', ));
    Parroquias::create(array( 'id' => 1131,'status'=>1, 'user_id'=>1, 'municipio_id' => 462, 'parroquia'=> 'San Bernardino', ));
    Parroquias::create(array( 'id' => 1132,'status'=>1, 'user_id'=>1, 'municipio_id' => 462, 'parroquia'=> 'San José', ));
    Parroquias::create(array( 'id' => 1133,'status'=>1, 'user_id'=>1, 'municipio_id' => 462, 'parroquia'=> 'San Juan', ));
    Parroquias::create(array( 'id' => 1134,'status'=>1, 'user_id'=>1, 'municipio_id' => 462, 'parroquia'=> 'San Pedro', ));
    Parroquias::create(array( 'id' => 1135,'status'=>1, 'user_id'=>1, 'municipio_id' => 462, 'parroquia'=> 'Santa Rosalía', ));
    Parroquias::create(array( 'id' => 1136,'status'=>1, 'user_id'=>1, 'municipio_id' => 462, 'parroquia'=> 'Santa Teresa', ));
    Parroquias::create(array( 'id' => 1137,'status'=>1, 'user_id'=>1, 'municipio_id' => 462, 'parroquia'=> 'Sucre (Catia)', ));
    Parroquias::create(array( 'id' => 1138,'status'=>1, 'user_id'=>1, 'municipio_id' => 462, 'parroquia'=> '23 de enero', ));



    $empleado = new TipoEmpleado();
    $empleado->name    = 'Contratado';
    $empleado->user_id = 1;
    $empleado->status  = 1;
    $empleado->save();

    $empleado = new TipoEmpleado();
    $empleado->name    = 'Fijo';
    $empleado->user_id = 1;
    $empleado->status  = 1;
    $empleado->save();
           


        DB::table('clientes')->insert([

        'nombre' => 'ZALAYETA S.A.',
        'empresa' => true,
        'rif' => 'J-41298927-8',
        'mail' => 'contacto@jojovo.com.es',
        'direccion' => 'Libertad 2391',            
        'telefono' => '23039314', 
        

        ]);

        DB::table('clientes')->insert([

        'nombre' => 'Andrés',
        'apellido' => 'Suárez',     
        'mail' => 'andsuarez22@peretch.com',
        'direccion' => '21 de Septiembre 551 Apto. 205',            
        'telefono' => '099523412',
        'genero' => 'm',
        'cedula' =>'v-25212293',

        ]);


        $concepto= new ConceptoNomina();
        $concepto->name = 'Sueldo';
        $concepto->save();

        $concepto= new ConceptoNomina();
        $concepto->name = 'Bonificación';
        $concepto->save();

        $concepto= new ConceptoNomina();
        $concepto->name = 'Sabados trabajados';
        $concepto->save();

        $concepto= new ConceptoNomina();
        $concepto->name = 'Domingos trabajados';
        $concepto->save();

        $concepto= new ConceptoNomina();
        $concepto->name = 'Hora extra';
        $concepto->save();

        $concepto= new ConceptoNomina();
        $concepto->name = 'Hora nocturna';
        $concepto->save();

        $concepto= new ConceptoNomina();
        $concepto->name = 'Hora extra nocturna';
        $concepto->save();

        $concepto= new ConceptoNomina();
        $concepto->name = 'Días feriados';
        $concepto->save();


       

    }


   







        
}
