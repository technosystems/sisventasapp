<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsTableSeeder extends Seeder
{
   private $permissions_admin , $user_permissions, $vendedor_permissions, $encargado_permissions,$super_admin_permissions;


    public function __construct()
    {


         /*
        set the default permissions
        */
        $this->super_admin_permissions =  [
                                /* Usuarios */
                                'Ver Usuario',
                                'Registrar Usuario',
                                'Editar Usuario',
                                'Eliminar Usuario',

                                /* Organismos */
                                'Ver Organismo',
                                'Registrar Organismo',
                                'Editar Organismo',
                                'Eliminar Organismo',
                                
                                
                                /* Asignar permisos */
                                'AsignarPermisos',                              
                               
                               
                                'Ver Permisos',
                                'CrearPermisos',
                                'Editar Permisos',
                                'Eliminar Permisos',
                                
                                /* Logins */
                                'Ver Logins',
                                'Ver LogSistema',

                                /* Roles */
                                'Ver Role',
                                'Registrar Role',
                                'Editar Role',
                                'Eliminar Role',

                                /* Reparaciones */
                                'Ver Reparaciones',
                                'Registrar Reparaciones',
                                'Editar Reparaciones',
                                'Eliminar Reparaciones',

                                /* Punto de Venta */
                                'Ver Venta',
                                'Registrar Venta',
                                'Editar Venta',
                                'Eliminar Venta',
                                'Ver ListaDePrecios',


                                /* Productos */
                                'Ver Productos',
                                'Registrar Productos',
                                'Editar Productos',
                                'Eliminar Productos',
                              

                                /* Proveedores */
                                'Ver Proveedores',
                                'Registrar Proveedores',
                                'Editar Proveedores',
                                'Eliminar Proveedores',

                                 /* Clientes */
                                 'Ver Clientes',
                                 'Registrar Clientes',
                                 'Editar Clientes',
                                 'Eliminar Clientes',

                                  /* Marcas */
                                 'Ver Marca',
                                 'Registrar Marca',
                                 'Editar Marca',
                                 'Eliminar Marca',

                                 /* Modelos */
                                 'Ver Modelo',
                                 'Registrar Modelo',
                                 'Editar Modelo',
                                 'Eliminar Modelo',
 
                                /* Tipo de Reparaciones */
                                'Ver TipoReparaciones',
                                'Registrar TipoReparaciones',
                                'Editar TipoReparaciones', 
                                'Eliminar TipoReparaciones',

                                /* Tipo de equipos */
                                'Ver TipoEquipos',
                                'Registrar TipoEquipos',
                                'Editar TipoEquipos',
                                'Eliminar TipoEquipos',

                                 /* Tipo de los servicios */
                                'Ver EstadoServicio',
                                'Registrar EstadoServicio',
                                'Editar EstadoServicio',
                                'Eliminar EstadoServicio',



                                 /* Cajas */
                                 'Ver Caja',
                                 'Registrar Caja',
                                 'Editar Caja',
                                 'Eliminar Caja',

                                 /* Inventarios */
                                 'Ver Inventario',
                                 'Registrar Inventario',
                                 'Editar Inventario',
                                 'Eliminar Inventario',

                                 /* Ordenes de servicios */
                                 'Ver OrdenServicio',
                                 'Registrar OrdenServicio',
                                 'Editar OrdenServicio',
                                 'Eliminar OrdenServicio',


                                  /* Servicios */
                                 'Ver Servicio',
                                 'Registrar Servicio',
                                 'Editar Servicio',
                                 'Eliminar Servicio',

                                  /* Pedidos */
                                 'Ver Pedido',
                                 'Registrar Pedido',
                                 'Editar Pedido',
                                 'Eliminar Pedido',

                                 /* Gastos */
                                 'Ver Gasto',
                                 'Registrar Gasto',
                                 'Editar Gasto',
                                 'Eliminar Gasto',

                                 /* Compras */
                                 'Ver Compra',
                                 'Registrar Compra',
                                 'Editar Compra',
                                 'Eliminar Compra',


                                 /* Facturass */
                                 'Ver Facturas',
                                 'Registrar Facturas',
                                 'Editar Facturas',
                                 'Eliminar Facturas',

                                 /* Empleados */
                                 'Ver Empleado',
                                 'Registrar Empleado',
                                 'Editar Empleado',
                                 'Eliminar Empleado',

                                 /* Nominas */
                                 'Ver Nomina',
                                 'Registrar Nomina',
                                 'Editar Nomina',
                                 'Eliminar Nomina',

                                 /* RetencionNominas */
                                 'Ver Retencion de Nomina',
                                 'Registrar Retencion de Nomina',
                                 'Editar Retencion de Nomina',
                                 'Eliminar Retencion de Nomina',

                                 /* Departamentos */
                                 'Ver Departamento',
                                 'Registrar Departamento',
                                 'Editar Departamento',
                                 'Eliminar Departamento',

                                 /* Vacaciones */
                                 'Ver Vacaciones',
                                 'Registrar Vacaciones',
                                 'Editar Vacaciones',
                                 'Eliminar Vacaciones',

                                 /*Módulos*/

                                 'Modulo de Seguridad',
                                 'Modulo de Punto de Venta',
                                 'Modulo de Gastos',
                                 'Modulo de Compras',
                                 'Modulo de Servicio Tecnico',
                                 'Modulo de Recursos humanos',





                               


                              ];



        
        $this->permissions_admin =  [

                                             
            
                                /* Punto de Venta */
                                'Ver Venta',
                                'Registrar Venta',
                                'Editar Venta',
                                'Eliminar Venta',
                                'Ver ListaDePrecios',


                                /* Productos */
                                'Ver Productos',
                                'Registrar Productos',
                                'Editar Productos',
                                'Eliminar Productos',
                              

                                /* Proveedores */
                                'Ver Proveedores',
                                'Registrar Proveedores',
                                'Editar Proveedores',
                                'Eliminar Proveedores',

                                 /* Clientes */
                                 'Ver Clientes',
                                 'Registrar Clientes',
                                 'Editar Clientes',
                                 'Eliminar Clientes',


                                 /* Cajas */
                                 'Ver Caja',
                                 'Registrar Caja',
                                 'Editar Caja',
                                 'Eliminar Caja',

                                 /* Inventarios */
                                 'Ver Inventario',
                                 'Registrar Inventario',
                                 'Editar Inventario',
                                 'Eliminar Inventario',

                                 /* Ordenes de servicios */
                                 'Ver OrdenServicio',
                                 'Registrar OrdenServicio',
                                 'Editar OrdenServicio',
                                 'Eliminar OrdenServicio',

                                  /* Pedidos */
                                 'Ver Pedido',
                                 'Registrar Pedido',
                                 'Editar Pedido',
                                 'Eliminar Pedido',

                                 /* Gastos */
                                 'Ver Gasto',
                                 'Registrar Gasto',
                                 'Editar Gasto',
                                 'Eliminar Gasto',

                                 /* Compras */
                                 'Ver Compra',
                                 'Registrar Compra',
                                 'Editar Compra',
                                 'Eliminar Compra',


                                 /* Facturass */
                                 'Ver Facturas',
                                 'Registrar Facturas',
                                 'Editar Facturas',
                                 'Eliminar Facturas',

                                 /* Empleados */
                                 'Ver Empleado',
                                 'Registrar Empleado',
                                 'Editar Empleado',
                                 'Eliminar Empleado',

                                 /* Nominas */
                                 'Ver Nomina',
                                 'Registrar Nomina',
                                 'Editar Nomina',
                                 'Eliminar Nomina',

                                 /* RetencionNominas */
                                 'Ver Retencion de Nomina',
                                 'Registrar Retencion de Nomina',
                                 'Editar Retencion de Nomina',
                                 'Eliminar Retencion de Nomina',

                                 /* Departamentos */
                                 'Ver Departamento',
                                 'Registrar Departamento',
                                 'Editar Departamento',
                                 'Eliminar Departamento',

                                 /* Vacaciones */
                                 'Ver Vacaciones',
                                 'Registrar Vacaciones',
                                 'Editar Vacaciones',
                                 'Eliminar Vacaciones',

                                 /*Módulos*/

                                 //'Modulo de Seguridad',
                                 'Modulo de Punto de Venta',
                                 'Modulo de Gastos',
                                 'Modulo de Compras',
                                 //'Modulo de Servicio Tecnico',
                                 'Modulo de Recursos humanos',





                               


                              ];



        $this->encargado_permissions =  [

                                             
            
                                /* Punto de Venta */
                                'Ver Venta',
                                'Registrar Venta',
                                'Editar Venta',
                                'Eliminar Venta',
                                'Ver ListaDePrecios',


                                /* Productos */
                                'Ver Productos',
                                'Registrar Productos',
                                'Editar Productos',
                                'Eliminar Productos',
                              

                                /* Proveedores */
                                'Ver Proveedores',
                                'Registrar Proveedores',
                                'Editar Proveedores',
                                'Eliminar Proveedores',

                                 /* Clientes */
                                 'Ver Clientes',
                                 'Registrar Clientes',
                                 'Editar Clientes',
                                 'Eliminar Clientes',


                                 /* Cajas */
                                 'Ver Caja',
                                 'Registrar Caja',
                                 'Editar Caja',
                                 'Eliminar Caja',

                                 /* Inventarios */
                                 'Ver Inventario',
                                 'Registrar Inventario',
                                 'Editar Inventario',
                                 'Eliminar Inventario',

                                 /* Ordenes de servicios */
                                 'Ver OrdenServicio',
                                 'Registrar OrdenServicio',
                                 'Editar OrdenServicio',
                                 'Eliminar OrdenServicio',

                                  /* Pedidos */
                                 'Ver Pedido',
                                 'Registrar Pedido',
                                 'Editar Pedido',
                                 'Eliminar Pedido',

                                 /* Gastos */
                                 'Ver Gasto',
                                 'Registrar Gasto',
                                 'Editar Gasto',
                                 'Eliminar Gasto',

                                 /* Compras */
                                 'Ver Compra',
                                 'Registrar Compra',
                                 'Editar Compra',
                                 'Eliminar Compra',


                                 /* Facturass */
                                 'Ver Facturas',
                                 'Registrar Facturas',
                                 'Editar Facturas',
                                 'Eliminar Facturas',

                                 /* Empleados */
                                 'Ver Empleado',
                                 'Registrar Empleado',
                                 'Editar Empleado',
                                 'Eliminar Empleado',

                                 /* Nominas */
                                 'Ver Nomina',
                                 'Registrar Nomina',
                                 'Editar Nomina',
                                 'Eliminar Nomina',

                                 /* RetencionNominas */
                                 'Ver Retencion de Nomina',
                                 'Registrar Retencion de Nomina',
                                 'Editar Retencion de Nomina',
                                 'Eliminar Retencion de Nomina',

                                 /* Departamentos */
                                 'Ver Departamento',
                                 'Registrar Departamento',
                                 'Editar Departamento',
                                 'Eliminar Departamento',

                                 /* Vacaciones */
                                 'Ver Vacaciones',
                                 'Registrar Vacaciones',
                                 'Editar Vacaciones',
                                 'Eliminar Vacaciones',

                                 /*Módulos*/

                                 //'Modulo de Seguridad',
                                 'Modulo de Punto de Venta',
                                 'Modulo de Gastos',
                                 'Modulo de Compras',
                                 //'Modulo de Servicio Tecnico',
                                 //'Modulo de Recursos humanos',





                               


                              ];


        /*
        set the permissions for the user role, by default
        role admin we will assign all the permissions
        */
        $this->supervisor_permissions = [

                                /* Punto de Venta */
                                'Ver Venta',
                                'Editar Venta',
                                'Eliminar Venta',
                                'Ver ListaDePrecios',


                                /* Productos */
                                'Ver Productos',
                                'Editar Productos',
                                'Eliminar Productos',
                              

                                /* Proveedores */
                                'Ver Proveedores',
                                'Editar Proveedores',
                                'Eliminar Proveedores',

                                 /* Clientes */
                                 'Ver Clientes',
                                 'Registrar Clientes',
                                 'Editar Clientes',
                                 'Eliminar Clientes',

                                  /* Empleados */
                                 'Ver Empleado',
                                 'Registrar Empleado',
                                 'Editar Empleado',
                                 'Eliminar Empleado',


                                 /* Cajas */
                                 'Ver Caja',
                                 'Registrar Caja',
                                 'Editar Caja',
                                 'Eliminar Caja',

                                 /* Inventarios */
                                 'Ver Inventario',
                                 'Registrar Inventario',
                                 'Editar Inventario',
                                 'Eliminar Inventario',


                                 /* Gastos */
                                 'Ver Gasto',
                                 'Registrar Gasto',
                                 'Editar Gasto',
                                 'Eliminar Gasto',

                                 /* Compras */
                                 'Ver Compra',
                                 'Registrar Compra',
                                 'Editar Compra',
                                 'Eliminar Compra',


                                 /* Facturass */
                                 'Ver Facturas',

                                 'Editar Facturas',
                                 'Eliminar Facturas',


                                 //'Modulo de Seguridad',
                                 'Modulo de Punto de Venta',
                                 'Modulo de Gastos',
                                 'Modulo de Compras',
                                 //'Modulo de Servicio Tecnico',
                                 //'Modulo de Recursos humanos',

                                


                              ];

            /*
        set the permissions for the user role, by default
        role admin we will assign all the permissions
        */
        $this->vendedor_permissions = [
                                    
                               

                                /* Punto de Venta */
                                'Registrar Venta',
                            

                                'Modulo de Punto de Venta',
                                

                                


                              ];
        
    }




    public function run()
	  {
    	  // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        // create permissions
        foreach ($this->super_admin_permissions as $permission)
        {
            Permission::create(['name' => $permission]);
        }


        // create the admin role and set all default permissions
        $role = Role::create(['name' => 'Super Administrador']);
        $role->givePermissionTo($this->super_admin_permissions);


        // create the admin role and set all default permissions
        $role = Role::create(['name' => 'Administrador']);
        $role->givePermissionTo($this->permissions_admin);

        // create the user role and set all user permissions
        $role = Role::create(['name' => 'Supervisor']);
        $role->givePermissionTo($this->supervisor_permissions);

         // create the user role and set all user permissions
        $role = Role::create(['name' => 'Vendedor']);
        $role->givePermissionTo($this->vendedor_permissions);

         // create the user role and set all user permissions
        $role = Role::create(['name' => 'Encargado']);
        $role->givePermissionTo($this->encargado_permissions);

    }
}
