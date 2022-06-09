  <!-- BEGIN: Main Menu-->
  <div class="horizontal-menu-wrapper">
        <div class="header-navbar navbar-expand-sm navbar navbar-horizontal floating-nav navbar-light navbar-shadow menu-border container-xxl" role="navigation" data-menu="menu-wrapper" data-menu-type="floating-nav">
            <div class="navbar-header">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item me-auto"><a class="navbar-brand" href="../../../html/ltr/horizontal-menu-template/index.html"><span class="brand-logo">
                                <svg viewbox="0 0 139 95" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="24">
                                    <defs>
                                        <lineargradient id="linearGradient-1" x1="100%" y1="10.5120544%" x2="50%" y2="89.4879456%">
                                            <stop stop-color="#000000" offset="0%"></stop>
                                            <stop stop-color="#FFFFFF" offset="100%"></stop>
                                        </lineargradient>
                                        <lineargradient id="linearGradient-2" x1="64.0437835%" y1="46.3276743%" x2="37.373316%" y2="100%">
                                            <stop stop-color="#EEEEEE" stop-opacity="0" offset="0%"></stop>
                                            <stop stop-color="#FFFFFF" offset="100%"></stop>
                                        </lineargradient>
                                    </defs>
                                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <g id="Artboard" transform="translate(-400.000000, -178.000000)">
                                            <g id="Group" transform="translate(400.000000, 178.000000)">
                                                <path class="text-primary" id="Path" d="M-5.68434189e-14,2.84217094e-14 L39.1816085,2.84217094e-14 L69.3453773,32.2519224 L101.428699,2.84217094e-14 L138.784583,2.84217094e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L6.71554594,44.4188507 C2.46876683,39.9813776 0.345377275,35.1089553 0.345377275,29.8015838 C0.345377275,24.4942122 0.230251516,14.560351 -5.68434189e-14,2.84217094e-14 Z" style="fill:currentColor"></path>
                                                <path id="Path1" d="M69.3453773,32.2519224 L101.428699,1.42108547e-14 L138.784583,1.42108547e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L32.8435758,70.5039241 L69.3453773,32.2519224 Z" fill="url(#linearGradient-1)" opacity="0.2"></path>
                                                <polygon id="Path-2" fill="#000000" opacity="0.049999997" points="69.3922914 32.4202615 32.8435758 70.5039241 54.0490008 16.1851325"></polygon>
                                                <polygon id="Path-21" fill="#000000" opacity="0.099999994" points="69.3922914 32.4202615 32.8435758 70.5039241 58.3683556 20.7402338"></polygon>
                                                <polygon id="Path-3" fill="url(#linearGradient-2)" opacity="0.099999994" points="101.428699 0 83.0667527 94.1480575 130.378721 47.0740288"></polygon>
                                            </g>
                                        </g>
                                    </g>
                                </svg></span>
                            <h2 class="brand-text mb-0">Vuexy</h2>
                        </a></li>
                    <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i></a></li>
                </ul>
            </div>
            <div class="shadow-bottom"></div>
            <!-- Horizontal menu content-->
            <div class="navbar-container main-menu-content" data-menu="menu-container">
                <!-- include ../../../includes/mixins-->

                <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
                    <li><a class="nav-link d-flex align-items-center" href="{{ url('/dashboard') }}" ><i data-feather="home"></i><span data-i18n="Dashboards">Inicio</span></a>
                        
                    </li>
                    @can('Modulo de Seguridad')
                        <li class="dropdown nav-item  text-white" data-menu="dropdown">
                     <a class="dropdown-toggle nav-link d-flex align-items-center" 
                        href="index.html" 
                        data-bs-toggle="dropdown">
                        <i data-feather="lock"></i>
                        <span data-i18n="Dashboards">Seguridad</span>
                    </a>
                        <ul class="dropdown-menu" data-bs-popper="none">
                            
                           @can('Ver Usuario')                    
                            <li class="{{ Active::check('admin/usuario') }} ">
                             <a class="dropdown-item d-flex align-items-center" 
                                href="{{ url('admin/usuario') }}" 
                                data-toggle="dropdown" 
                                data-i18n="Analytics">
                                <i data-feather="user"></i>
                                <span data-i18n="Analytics">
                                 Usuarios</span>
                             </a>
                         </li>
                          @endcan
                          @can('Ver Role')                    
                            <li class="{{ Active::check('admin/roles') }} ">
                            <a class="dropdown-item d-flex align-items-center" 
                            href="{{ url('admin/roles') }}" 
                            data-toggle="dropdown" 
                            data-i18n="Analytics">
                            <i class="fas fa-user-tie"></i>
                            <span data-i18n="Analytics">Roles</span>
                             </a>
                            </li>
                         @endcan
                          @can('Ver Permisos')                    
                            <li class="{{ Active::check('admin/permission') }} ">
                               <a class="dropdown-item d-flex align-items-center" 
                               href="{{ url('admin/permission') }}"
                               data-toggle="dropdown" 
                               data-i18n="Analytics">
                               <i class="fas fa-shield-alt"></i>
                               <span data-i18n="Analytics">Permisos</span>
                             </a>
                            </li>
                         @endcan
                          @can('Ver Logins')                    
                            <li class="{{ Active::check('admin/logins') }} ">
                             <a class="dropdown-item d-flex align-items-center" 
                               href="{{ url('admin/logins') }}" 
                               data-toggle="dropdown" 
                               data-i18n="Analytics">
                               <i class="fas fa-sign-in-alt"></i>
                               <span data-i18n="Analytics">Logins</span>
                             </a>
                            </li>
                         @endcan
                        </ul>
                    </li>
                    @endcan
                    @can('Modulo de Punto de Venta')
                    <li class="dropdown nav-item  text-white" data-menu="dropdown">
                        
                     <a class="dropdown-toggle nav-link d-flex align-items-center"
                        href="index.html" 
                        data-bs-toggle="dropdown">
                        <i data-feather="credit-card"></i>
                        <span class="menu-title text-truncate" 
                        data-i18n="Card">Punto de venta</span>
                      </a>
                        <ul class="dropdown-menu" data-bs-popper="none">
                        @can('Ver Caja')
                        <li class="dropdown dropdown-submenu" 
                            data-menu="dropdown-submenu">
                             <a class="dropdown-item d-flex align-items-center dropdown-toggle" 
                                href="#" 
                                data-toggle="dropdown" 
                                data-i18n="Cards">
                                <i class="dashicons dashicons-database mbo-1"></i>
                                <span data-i18n="Cards"
                                >Cajas
                            </span>
                              </a>
                                <ul class="dropdown-menu">
                                <li class="{{ Active::check('admin/panel/contabilidad') }} ">
                                 <a class="dropdown-item d-flex align-items-center" 
                                    href="{{ url('/admin/panel/contabilidad') }}" 
                                    data-toggle="dropdown"
                                    data-i18n="Calendar">
                                    <span data-i18n="Calendar">
                                        Listado
                                    </span>
                                 </a>
                                </li>
                              <li class="{{ Active::check('admin/panel/abrir_caja') }} ">
                                <a class="dropdown-item d-flex align-items-center" 
                                href="{{ url('/admin/panel/abrir_caja') }}" 
                                data-toggle="dropdown" 
                                data-i18n="Calendar">
                                <span data-i18n="Calendar">
                                    Registrar apertura
                                </span>
                              </a>
                            </li>
                            <li class="{{ Active::check('admin/panel/ganancias/mensual') }} ">
                                <a class="dropdown-item d-flex align-items-center" 
                                href="{{ url('/admin/panel/ganancias/mensual') }}" 
                                data-toggle="dropdown" 
                                data-i18n="Calendar">
                                <span data-i18n="Calendar">
                                    Ganancias mensuales
                                </span>
                              </a>
                            </li>
                            <li class="{{ Active::check('admin/panel/margen/historial') }} ">
                                <a class="dropdown-item d-flex align-items-center" 
                                href="{{ url('/admin/panel/margen/historial') }}" 
                                data-toggle="dropdown" 
                                data-i18n="Calendar">
                                <span data-i18n="Calendar">
                                   Ver  historial de cajas
                                </span>
                              </a>
                            </li>
                          </ul>
                        </li>
                        @endcan
                         @can('Ver Servicio')
                        <li class="dropdown dropdown-submenu" 
                            data-menu="dropdown-submenu">
                             <a class="dropdown-item d-flex align-items-center dropdown-toggle" 
                                href="#" 
                                data-toggle="dropdown" 
                                data-i18n="Cards">
                                <i class="dashicons dashicons-plus-alt mbo-1"></i>
                                <span data-i18n="Cards"
                                >Servicios
                            </span>
                              </a>
                                <ul class="dropdown-menu">
                                <li class="{{ Active::check('admin/servicio') }} ">
                                 <a class="dropdown-item d-flex align-items-center" 
                                    href="{{ url('/admin/servicio') }}" 
                                    data-toggle="dropdown"
                                    data-i18n="Calendar">
                                    <span data-i18n="Calendar">
                                        Listado
                                    </span>
                                 </a>
                                </li>
                              <li class="{{ Active::check('admin/servicio/create') }} ">
                                <a class="dropdown-item d-flex align-items-center" 
                                href="{{ url('/admin/servicio/create') }}" 
                                data-toggle="dropdown" 
                                data-i18n="Calendar">
                                <span data-i18n="Calendar">
                                    Registrar servicio
                                </span>
                              </a>
                            </li>
                          </ul>
                        </li>
                        @endcan
                       
                        <li class="dropdown dropdown-submenu" 
                            data-menu="dropdown-submenu">
                             <a class="dropdown-item d-flex align-items-center dropdown-toggle" 
                                href="#" 
                                data-toggle="dropdown" 
                                data-i18n="Cards">
                                <i class="dashicons dashicons-calculator mbo-1" ></i>
                                <span data-i18n="Cards">
                                    Ventas
                                </span>
                              </a>

                                <ul class="dropdown-menu">
                                @can('Ver Venta')
                                <li class="{{ Active::check('admin/panel/ventas/historial') }} ">
                                 <a class="dropdown-item d-flex align-items-center" 
                                    href="{{ url('/admin/panel/ventas/historial') }}" 
                                    data-toggle="dropdown" 
                                    data-i18n="Calendar">
                                    <span data-i18n="Calendar">
                                        Listado
                                    </span>
                                   </a>
                                </li>
                                @endcan
                                  @can('Registrar Venta')
                                 <li class="{{ Active::check('admin/panel/venta/generar') }} ">
                                  <a class="dropdown-item d-flex align-items-center" 
                                     href="{{ url('/admin/panel/venta/generar') }}" 
                                     data-toggle="dropdown" 
                                     data-i18n="Calendar">
                                     <span data-i18n="Calendar">
                                         Facturar ventas
                                     </span>
                                    </a>
                                </li>
                                @endcan
                                @can('Ver Facturas')
                                <li class="{{ Active::check('admin/panel/venta/vencimiento') }} ">
                                  <a class="dropdown-item d-flex align-items-center" 
                                     href="{{route('admin.ventas.vencimiento')}}" 
                                     data-toggle="dropdown" 
                                     data-i18n="Calendar">
                                     <span data-i18n="Calendar">
                                         Facturas por cobrar
                                     </span>
                                    </a>
                                </li>
                                @endcan
                                @can('Ver Facturas')
                                <li class="{{ Active::check('admin/panel/venta/ganancia') }} ">
                                  <a class="dropdown-item d-flex align-items-center" 
                                     href="{{route('admin.ganancia.venta')}}" 
                                     data-toggle="dropdown" 
                                     data-i18n="Calendar">
                                     <span data-i18n="Calendar">
                                         Ganancias por ventas
                                     </span>
                                    </a>
                                </li>
                                @endcan
                          </ul>
                        </li>
 
                        @can('Ver Clientes')
                        <li class="{{ Active::check('admin/clientes') }} ">
                        <a class="dropdown-item d-flex align-items-center" 
                           href="{{ url('/admin/clientes') }}" 
                           data-toggle="dropdown" 
                           data-i18n="Calendar">
                           <i class="dashicons dashicons-admin-users mbo-1"></i>
                           <span data-i18n="Calendar">
                               Clientes
                            </span>
                          </a>
                        </li>
                         @endcan
                        @can('Ver Proveedores')
                        <li class="{{ Active::check('admin/proveedores') }} ">
                         <a class="dropdown-item d-flex align-items-center" 
                            href="{{ url('/admin/proveedores') }}" 
                            data-toggle="dropdown" 
                            data-i18n="Calendar">
                            <i class="dashicons dashicons-car mbo-1"></i>
                            <span data-i18n="Calendar">
                                Proveedores
                            </span>
                          </a>
                        </li>
                         @endcan
                         @can('Ver Pedido')
                        <li class="{{ Active::check('admin/pedido/create') }} ">
                         <a class="dropdown-item d-flex align-items-center" 
                            href="{{ url('/admin/pedido/create') }}" 
                            data-toggle="dropdown" 
                            data-i18n="Calendar">
                            <i class="dashicons dashicons-phone mbo-1"></i>
                            <span data-i18n="Calendar">
                                Pedidos
                            </span>
                          </a>
                        </li>
                         @endcan
                         @can('Ver Productos')
                         <li class="{{ Active::check('admin/productos') }} ">
                          <a class="dropdown-item d-flex align-items-center" 
                             href="{{ url('/admin/productos') }}" 
                             data-toggle="dropdown" 
                             data-i18n="Calendar">
                             <i class="dashicons dashicons-tickets-alt mbo-1"></i>
                             <span data-i18n="Calendar">
                                 Productos
                                </span>
                            </a>
                         </li>
                         @endcan
                        </ul>
                    </li>
                    @endcan
                    @can('Modulo de Gastos')
                        @can('Ver Gasto')
                        <li class="{{ Active::check('admin/panel/gastos') }} ">
                            <a class="nav-link d-flex align-items-center" 
                               href="{{ url('/admin/panel/gastos') }}" >
                               <i class="fas fa-coins"></i>
                               <span data-i18n="Gastos">
                                  Gastos generales
                                </span>
                            </a>
                       </li>
                        @endcan
                    @endcan
                     @can('Modulo de Compras')
                      <li class="dropdown nav-item  text-white" data-menu="dropdown">
                     <a class="dropdown-toggle nav-link d-flex align-items-center" 
                        href="index.html" 
                        data-bs-toggle="dropdown">
                        <i data-feather="lock"></i>
                        <span data-i18n="Dashboards">Compras generales</span>
                    </a>
                        <ul class="dropdown-menu" data-bs-popper="none">
                            
                                            
                           @can('Ver Compra')
                            <li class="{{ Active::check('admin/compras') }} ">
                             <a class="dropdown-item d-flex align-items-center" 
                                href="{{ url('admin/compras') }}" 
                                data-toggle="dropdown" 
                                data-i18n="Analytics">
                               <i class="fas fa-handshake"></i>
                                <span data-i18n="Analytics">
                                 Listado de compras</span>
                             </a>
                         </li>
                           @endcan
                          
                          @can('Registrar Compra')                    
                            <li class="{{ Active::check('admin/compras/nuevo') }} ">
                            <a class="dropdown-item d-flex align-items-center" 
                            href="{{ url('admin/compras/nuevo') }}" 
                            data-toggle="dropdown" 
                            data-i18n="Analytics">
                            <i class="fas fa-plus-square"></i>
                            <span data-i18n="Analytics">Registro de compra</span>
                             </a>
                            </li>
                         @endcan
                            @can('Registrar Facturas')            
                            <li class="{{ Active::check('admin/panel/compras/vencimiento') }} ">
                               <a class="dropdown-item d-flex align-items-center" 
                               href="{{ url('admin/panel/compras/vencimiento') }}"
                               data-toggle="dropdown" 
                               data-i18n="Analytics">
                               <i class="fas fa-shield-alt"></i>
                               <span data-i18n="Analytics">Facturas por pagar</span>
                             </a>
                            </li>
                            @endcan
                        
                        </ul>
                    </li>
                     @endcan
                       @can('Modulo de Servicio Tecnico')
                       <li class="dropdown nav-item" 
                           data-menu="dropdown">
                           <a class="dropdown-toggle nav-link d-flex align-items-center" 
                              href="#" 
                              data-toggle="dropdown">
                              <i data-feather="layers"></i>
                              <span data-i18n="User Interface">
                                 Servicio técnico
                            </span>
                         </a>
                         @can('Ver TipoEquipos')
                        <ul class="dropdown-menu">
                           <li class="{{ Active::check('admin/tipoequipos') }} ">
                            <a class="dropdown-item d-flex align-items-center" 
                            href="{{ url('/admin/tipoequipos') }}" 
                            data-toggle="dropdown" 
                            data-i18n="Calendar">
                            <span data-i18n="Calendar">
                                Clase de Equipos
                            </span>
                           </a>
                         </li> 
                         @endcan
                         @can('Ver Marca')
                         <li class="{{ Active::check('admin/marcas') }} ">
                            <a class="dropdown-item d-flex align-items-center" 
                            href="{{ url('/admin/marcas') }}" 
                            data-toggle="dropdown" 
                            data-i18n="Calendar">
                            <span data-i18n="Calendar">
                                Marcas 
                            </span>
                           </a>
                         </li> 
                         @endcan
                         @can('Ver Modelo')
                          <li class="{{ Active::check('admin/modelos') }} ">
                            <a class="dropdown-item d-flex align-items-center" 
                            href="{{ url('/admin/modelos') }}" 
                            data-toggle="dropdown" 
                            data-i18n="Calendar">
                            <span data-i18n="Calendar">
                                Modelos
                            </span>
                           </a>
                         </li>
                         @endcan
                         @can('Ver EstadoServicio')
                         <li class="{{ Active::check('admin/estadoservicios') }} ">
                            <a class="dropdown-item d-flex align-items-center" 
                            href="{{ url('/admin/estadoservicios') }}" 
                            data-toggle="dropdown" 
                            data-i18n="Calendar">
                            <span data-i18n="Calendar">
                                Estado de servicio
                            </span>
                           </a>
                         </li>
                         @endcan
                         @can('Ver Reparaciones')
                           <li class="{{ Active::check('admin/tiporeparaciones') }} ">
                             <a class="dropdown-item d-flex align-items-center" 
                                href="{{ url('/admin/tiporeparaciones') }}" 
                                data-toggle="dropdown" 
                                data-i18n="Calendar">
                                 <span data-i18n="Calendar">
                                     Clase de reparaciones
                                    </span>
                                 </a>
                            </li>
                            @endcan
                            @can('Ver OrdenServicio')
                                <li class="{{ Active::check('admin/ordenservicios') }} ">
                                    <a class="dropdown-item d-flex align-items-center" 
                                       href="{{ url('/admin/ordenservicios') }}" 
                                       data-toggle="dropdown" 
                                       data-i18n="Calendar">
                                       <span data-i18n="Calendar">
                                            Órden de servicio
                                       </span>
                                    </a>
                                </li>
                            @endcan
                            </ul>
                         </li>
                       @endcan
                         @can('Modulo de Recursos humanos')
                          <li class="dropdown nav-item" 
                           data-menu="dropdown">
                           <a class="dropdown-toggle nav-link d-flex align-items-center" 
                              href="#" 
                              data-toggle="dropdown">
                              <i data-feather="layers"></i>
                              <span data-i18n="User Interface">
                                  Recursos humanos
                            </span>
                         </a>
                        <ul class="dropdown-menu">
                            @can('Ver Nomina')
                           <li class="{{ Active::check('admin/config/nomina/1') }} ">
                            <a class="dropdown-item d-flex align-items-center" 
                            href="{{ url('/admin/config/nomina/1') }}" 
                            data-toggle="dropdown" 
                            data-i18n="Calendar">
                            <span data-i18n="Calendar">
                                Configurar Nómina
                            </span>
                           </a>
                         </li> 
                         @endcan
                         @can('Ver RetencionNomina')
                         <li class="{{ Active::check('admin/retencion/nomina') }} ">
                            <a class="dropdown-item d-flex align-items-center" 
                            href="{{ url('/admin/retencion/nomina') }}" 
                            data-toggle="dropdown" 
                            data-i18n="Calendar">
                            <span data-i18n="Calendar">
                                Retenciones de Nómina
                            </span>
                           </a>
                         </li> 
                         @endcan
                         @can('Ver Departamento')
                          <li class="{{ Active::check('admin/departamentos') }} ">
                            <a class="dropdown-item d-flex align-items-center" 
                            href="{{ url('/admin/departamentos') }}" 
                            data-toggle="dropdown" 
                            data-i18n="Calendar">
                            <span data-i18n="Calendar">
                                Departamentos
                            </span>
                           </a>
                         </li>
                         @endcan
                         @can('Ver Empleado')
                           <li class="{{ Active::check('admin/empleados') }} ">
                             <a class="dropdown-item d-flex align-items-center" 
                                href="{{ url('/admin/empleados') }}" 
                                data-toggle="dropdown" 
                                data-i18n="Calendar">
                                 <span data-i18n="Calendar">
                                     Empleados
                                    </span>
                                 </a>
                            </li>
                            @endcan
                            @can('Ver Nomina')
                                <li class="{{ Active::check('admin/pago/nomina') }} ">
                                    <a class="dropdown-item d-flex align-items-center" 
                                       href="{{ url('/admin/pago/nomina') }}" 
                                       data-toggle="dropdown" 
                                       data-i18n="Calendar">
                                       <span data-i18n="Calendar">
                                            Nómina de sueldos
                                       </span>
                                    </a>
                                </li>
                            @endcan
                            @can('Ver Vacaciones')
                                <li class="{{ Active::check('admin/empleado/vacaciones') }} ">
                                    <a class="dropdown-item d-flex align-items-center" 
                                      href="{{ url('/admin/empleado/vacaciones') }}" 
                                      data-toggle="dropdown" 
                                      data-i18n="Calendar">
                                      <span data-i18n="Calendar">
                                      Vacaciones
                                  </span>
                                  </a>
                                </li>
                            @endcan
                            </ul>
                         </li>
                         @endcan
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- END: Main Menu-->
