@extends('layouts.admin')
@section('content')

    </div><br>
<div class="c-body">
    <main class="c-main">
        <div class="container-fluid">
            <div id="ui-view"></div>
            <div>
            
               <div class="row" id="contenido" style="display:none">
                    @if(Session::has('success'))
                        <div class="col-lg-12">
                            <div class="alert alert-success alert-dismissible fade show mb-4" role="alert" style="background: #69e781 !important">
                                {{Session::get('success')}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    @endif 
                   <div class="col-lg-12">
                       <div class="card card-line-primary">
                           <div class="card-body">
                            <div id="invoice">
                                <div class="invoice overflow-auto"> 
                                    <div>
                                        <header>
                                            <div class="row">
                                                <div class="col">
                                                    <a target="_blank" >
                                                        <img src="{{asset('images/logo/colorito.jpg')}}" data-holder-rendered="true" style="width:350px"/>
                                                        </a>
                                                </div>
                                                <div class="col company-details">
                                                    <h2 class="name">
                                                        <a target="_blank" >
                                                        Inversiones Colorito D&D
                                                        </a>
                                                    </h2>
                                                    <div><?php echo nl2br('AV SUR CON AVENIDA OESTE 8 BIS ,CASA NUMERO 2 PISO 1, OFICINA SIN NUMERO SECTOR PARROQUIA SANTA TERESA CARACAS DISTRITO CAPITAL ZONA POSTAL 1010')?></div>
                                                    
                                                </div>
                                            </div>
                                        </header>
                                        <main>
                                            <div class="row contacts">
                                                <div class="col invoice-to">
                                                    <div class="text-gray-light">EMPLEADO:</div>
                                                    <h2 class="to">{{$pago->empleado->name}} {{$pago->empleado->lastname}}</h2>
                                                   
                                                     <div class="address">Documento: {{$pago->empleado->documento}}</div>
                                                   
                                                    
                                                    <div class="email"><a href="">{{$pago->empleado->email}}</a></div>
                                                </div>
                                                <div class="col invoice-details">
                                                    <h3 class="invoice-id">Inversiones Colorito D&D</h3>
                                                    <div class="date">Fecha: {{$pago->fecha_emision}} {{date('H:m:s')}} </div>
                                                    <div class="date mr-2">Método de pago: {{$pago->metodo->name }}</div>
   
                                                </div>
                                            </div>
                                           <div class="col-sn-12 table-responsive">
                                             <table class="table table-bordered table-sm" >
                                                <thead>
                                                    <tr>
                                                        
                                                        <th>Concepto</th>
                                                        <th>Cantidad</th>
                                                        <th>Asignado</th>
                                                        <th>Deducciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                  @php
                                                  //dd($pago->empleado->id);
                                               //Se obtiene el sueldo base registrado
                                               $sueldo_base = $pago->empleado->sueldo_base;

                                               //Se obtiene una bonificación registrada al empleado
                                               $id = $pago->empleado->id;

                                               $bonificacion = App\Models\BonoEmpleado::where('empleado_id', $id)->sum('cantidad');
                                               $bonificacion_emp = App\Models\BonoEmpleado::where('empleado_id', $id)->get();
                                               $deduccion    = App\Models\DeduccionEmpleado::where('empleado_id', $id)->sum('cantidad');

                                               $deduccion_emp = App\Models\DeduccionEmpleado::where('empleado_id', $id)->get();
                                               

                                               /*
                                                
                                               // Bloque de sueldos extras aumentados al sueldo del empleado

                                                */

                                               $sueldo_diario          = $sueldo_base / 30;
                                               $horas_extras           = (($sueldo_base /30/8) * 150 / 100);
                                               $horas_nocturnas        = (($sueldo_base /30/8) * 130 / 100);
                                               $horas_extra_nocturnas  = (($sueldo_base /30/8) * 130 / 100) * 150 /100;
                                               $dias_feriados          = ($sueldo_diario * 150 /100);

                                               $sabadost            = 0;
                                               $domingost           = 0;
                                               $horasextra          = 0;
                                               $horanocturna        = 0;
                                               $horaextranocturna   = 0;
                                               $diasferiados        = 0;
                                               $bono                = 0; 
                                               $sueldo              = 0;
                                               $total_deducciones   = 0;
                                               $deduccionemp        = 0;

                                               $sabadost          += $dias_feriados          * $pago->st;
                                               $domingost         += $dias_feriados          * $pago->dt;
                                               $horasextra        += $horas_extras           * $pago->he;
                                               $horanocturna      += $horas_nocturnas        * $pago->hn;
                                               $horaextranocturna += $horas_extra_nocturnas  * $pago->hen;
                                               $diasferiados      += $dias_feriados          * $pago->df;
                                               $bono              += $bonificacion ;
                                               $sueldo            += $sueldo_base * 50 / 100;
                                               $deduccionemp      += $deduccion;

                                               

                                               $sueldo_asignaciones = number_format($sabadost+ $domingost+$horasextra+$horanocturna+$horaextranocturna+$diasferiados + $sueldo + $bono,2);



                                              $deduccion_ivss   = $sueldo_asignaciones * 0.04 * 1 * 100 / 100;
                                              $prestacional_emp = $sueldo_asignaciones * 0.005 * 1 * 100 / 100;
                                              $vivienda_habitat = $sueldo_asignaciones * 0.01 * 1 * 100 / 100;

                                              $seguroivss = number_format($deduccion_ivss,2);
                                              $prestacional = number_format($prestacional_emp,2);
                                              $viviendah = number_format($vivienda_habitat,2);

                                              $total_deducciones += number_format($seguroivss + $prestacional + $viviendah + $deduccionemp ,2 );
                    
                                              $total =  number_format($sueldo_asignaciones - $total_deducciones ,2);

                           
                                                 @endphp
                                                   
                                                 <tr>
                                                  <td>Sueldo Quincenal</td>
                                                  <td> 15 días</td>
                                                  <td>{{ number_format($pago->detalle->sueldo_neto,2) }} {{ $config->prefijo_moneda }}</td>
                                                 </tr>
                                                  <tr>
                                                   <td>Sabados trabajados</td>
                                                     <td>{{ $pago->st }}</td>
                                                     <td>{{ $sabadost }} {{ $config->prefijo_moneda }}</td>
                                                  </tr>
                                                  <tr>
                                                   <td>Domingos trabajados</td>
                                                     <td>{{ $pago->dt }}</td>
                                                     <td>{{ $domingost }} {{ $config->prefijo_moneda }}</td>
                                                  </tr>
                                                  <tr>
                                                   <td>Horas extras</td>
                                                     <td>{{ $pago->he }}</td>
                                                     <td>{{ $horasextra }} {{ $config->prefijo_moneda }}</td>
                                                  </tr>
                                                  <tr>
                                                   <td>Horas nocturnas</td>
                                                     <td>{{ $pago->hn }}</td>
                                                     <td>{{ $horanocturna }} {{ $config->prefijo_moneda }}</td>
                                                  </tr>
                                                  <tr>
                                                   <td>Horas extras nocturnas</td>
                                                     <td>{{ $pago->hen }}</td>
                                                     <td>{{ $horaextranocturna }} {{ $config->prefijo_moneda }}</td>
                                                  </tr>
                                                  <tr>
                                                   <td>Días feriados</td>
                                                     <td>{{ $pago->df }}</td>
                                                     <td>{{ $diasferiados }} {{ $config->prefijo_moneda }}</td>
                                                  </tr>
                                                  @foreach ($bonificacion_emp as $element)
                                                    <tr>
                                                     @if ($element->tiempo_bonificacion == 'Indefinido')
                                                        <td>{{ $element->descripcion_bono }}</td>
                                                      <td>{{ $element->tiempo_bonificacion }}</td>
                                                      <td>{{ number_format($bono,2)}} {{ $config->prefijo_moneda }}</td>
                                                     @endif
                                                    </tr>
                                                  @endforeach
                                                   <tr>
                                                   <td>Seguro Social (4%)</td>
                                                     <td>4</td>
                                                     <td></td>
                                                     <td>{{ number_format($deduccion_ivss,2) }} {{ $config->prefijo_moneda }}</td>
                                                  </tr>
                                                   <tr>
                                                   <td>Reg. Prestacional de Empleo (0,5%)</td>
                                                     <td>4</td>
                                                     <td></td>
                                                     <td>{{ number_format($prestacional_emp,2) }} {{ $config->prefijo_moneda }}</td>
                                                  </tr>
                                                   <tr>
                                                   <td>Reg. Prest. De Vivienda y Habitat (1%)</td>
                                                     <td>7</td>
                                                     <td></td>
                                                     <td>{{ number_format($viviendah,2) }} {{ $config->prefijo_moneda }}</td>
                                                  </tr>
                                                  @foreach ($deduccion_emp as $element)
                                                    <tr>
                                                      <td>{{ $element->descripcion_deduccion }}</td>
                                                      <td>0</td>
                                                      <td></td>
                                                      <td>{{ number_format($deduccion,2)}} {{ $config->prefijo_moneda }}</td>
                                                    </tr>
                                                  @endforeach

                                                  <tr>
                                                    <td colspan="2" class="text-center text-white" style="background:linear-gradient(to right,#45526e,#45526e,#45526e)">
                                                      <b >
                                                        Totales
                                                      </b>
                                                    </td>
                                                    <td class="text-white" style="background:linear-gradient(to right,#45526e,#45526e,#45526e)">{{ $sueldo_asignaciones }} {{ $config->prefijo_moneda }}</td>
                                                    <td class="text-white" style="background:linear-gradient(to right,#45526e,#45526e,#45526e)">{{ $total_deducciones }} {{ $config->prefijo_moneda }}</td>
                                                  </tr>
                                                   <tr>
                                                    <td colspan="2" class="text-center text-white" style="background:linear-gradient(to right,#6C7C9D,#6C7C9D,#6C7C9D)">
                                                      <b >
                                                        Total neto a pagar
                                                      </b>
                                                    </td>
                                                    <td colspan="2" class="text-white text-center ml-5" style="background:linear-gradient(to right,#6C7C9D,#6C7C9D,#6C7C9D) ">{{ $sueldo_asignaciones - $total_deducciones }} {{ $config->prefijo_moneda }}</td>
                                                  
                                                  </tr>
                                               
                                                     
                                                </tbody><br>  
                                               
                                               
                                            </table>
                                           
                                           </div>
                                           

                                             
                                            
                                    </div>
                                    <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
                                    <div></div>
                                </div>
                            </div>
                           </div>
                       </div>
                   </div>
               </div>
            </div>
        </div>
    </main>
</div>
@endsection

@push('styles')
 <style>
        #invoice{
            padding: 30px;
        }

        .invoice {
            position: relative;
            background-color: #FFF;
            min-height: 680px;
            padding: 15px
        }

        .invoice header {
            padding: 10px 0;
            margin-bottom: 20px;
            border-bottom: 1px solid #3989c6
        }

        .invoice .company-details {
            text-align: right
        }

        .invoice .company-details .name {
            margin-top: 0;
            margin-bottom: 0
        }

        .invoice .contacts {
            margin-bottom: 20px
        }

        .invoice .invoice-to {
            text-align: left
        }

        .invoice .invoice-to .to {
            margin-top: 0;
            margin-bottom: 0
        }

        .invoice .invoice-details {
            text-align: right
        }

        .invoice .invoice-details .invoice-id {
            margin-top: 0;
            color: #3989c6
        }

        .invoice main {
            padding-bottom: 50px
        }

        .invoice main .thanks {
            margin-top: -100px;
            font-size: 2em;
            margin-bottom: 50px
        }

        .invoice main .notices {
            padding-left: 6px;
            border-left: 6px solid #3989c6
        }

        .invoice main .notices .notice {
            font-size: 1.2em
        }

        .invoice table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px
        }

        .invoice table td,.invoice table th {
            padding: 15px;
            background: #eee;
            border-bottom: 1px solid #fff
        }

        .invoice table th {
            white-space: nowrap;
            font-weight: 400;
            font-size: 16px
        }

        .invoice table td h3 {
            margin: 0;
            font-weight: 400;
            color: #3989c6;
            font-size: 1.2em
        }

        .invoice table .qty,.invoice table .total,.invoice table .unit {
            text-align: right;
            font-size: 1.2em
        }

        .invoice table .no {
            color: #fff;
            font-size: 1.6em;
            background: #3989c6
        }

        .invoice table .unit {
            background: #ddd
        }

        .invoice table .total {
            background: #3989c6;
            color: #fff
        }

        .invoice table tbody tr:last-child td {
            border: none
        }

        .invoice table tfoot td {
            background: 0 0;
            border-bottom: none;
            white-space: nowrap;
            text-align: right;
            padding: 10px 20px;
            font-size: 1.2em;
            border-top: 1px solid #aaa
        }

        .invoice table tfoot tr:first-child td {
            border-top: none
        }

        .invoice table tfoot tr:last-child td {
            color: #3989c6;
            font-size: 1.4em;
            border-top: 1px solid #3989c6
        }

        .invoice table tfoot tr td:first-child {
            border: none
        }

        .invoice footer {
            width: 100%;
            text-align: center;
            color: #777;
            border-top: 1px solid #aaa;
            padding: 8px 0
        }

        @media print {
            .invoice {
                font-size: 11px!important;
                overflow: hidden!important
            }

            .invoice footer {
                position: absolute;
                bottom: 10px;
                page-break-after: always
            }

            .invoice>div:last-child {
                page-break-before: always
            }
        }
    </style>
 
@endpush
@push('scripts')


    <script>
        window.onload = function(){
           var loader = document.getElementById('loader');
           var contenido = document.getElementById('contenido');

            contenido.style.display = 'block';
 
            $('#loader').remove();
       }
        $('.datepicker').pickadate();
    </script>


@endpush