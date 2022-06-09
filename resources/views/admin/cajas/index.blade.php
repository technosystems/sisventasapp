@extends('layouts.admin')
@section('title','CAJAS')
@section('content')
 

    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">Cajas</h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/home') }}">Inicio</a>
                        </li>
                        <li class="breadcrumb-item"><a >General</a>
                        </li>
                        <li class="breadcrumb-item active"> Listado de cajas
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div><br>

  
            <div id="ui-view"></div>
            <div>
              
                <div class="row" id="contenido" style="display:none"> 
                    @if(Session::has('success'))
                        <div class="col-lg-12">
                             <div class="demo-spacing-0">
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <div class="alert-body">
                                      {{Session::get('success')}}
                                    </div>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>       
                              </div>
                        </div>
                    @endif 
                    
                    @if(Session::has('danger'))
                        <div class="col-lg-12">
                             <div class="demo-spacing-0">
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <div class="alert-body">
                                      {{Session::get('danger')}}
                                    </div>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>       
                              </div>
                        </div>
                    @endif 

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row" >
                                   
                                    <div class="col-lg-3">
                                        <a class="btn btn-success   green darken-4 btn-lg btn-block centrar" href="{{url('/admin/panel/abrir_caja')}}">
                                            <img src="{{asset('images/caja/dinero.png')}}" style="width: 2.1rem !important;">
                                            &nbsp;<span style="margin-left: 5px;" class="text-white" >Abrir caja</span></a>
                                    </div>
                                    <div class="col-lg-3">
                                        <a class="btn btn-danger  red darken-4   btn-lg btn-block centrar" href="{{route('admin.gastos.contabilidad')}}">
                                            <img src="{{asset('images/caja/gasto.png')}}" style="width: 2.1rem !important;">
                                            &nbsp;<span style="margin-left: 5px;" class="text-white" >Gastos</span></a>
                                    </div>
                                    <div class="col-lg-3">
                                        <a class="btn btn-primary  purple darken-4 btn-lg btn-block centrar" href="{{route('admin.semanal.contabilidad')}}">
                                            <img src="{{asset('images/caja/grafica.png')}}" style="width: 2.1rem !important;">
                                            &nbsp;<span style="margin-left: 5px;" class="text-white" >Grafica</span></a>
                                       
                                    </div>
                                    <div class="col-lg-3">
                                        <a class="btn btn-warning btn-lg btn-block centrar" href="{{route('admin.historial.contabilidad')}}">
                                            <img src="{{asset('images/caja/libro.png')}}" style="width: 2.1rem !important;">
                                            &nbsp;<span style="margin-left: 5px;" class="text-white" >Historial</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                       @php
        
                        $today = getdate();
                        $data_month = ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
                        //$config = \DB::table('configuraciones')->first();
                        $current_month = $today['mon'];
                        $current_year = $today['year'];
                        $mes_actual =$data_month[$current_month - 1];
                        $nombre_dia = date('w');
                        switch($nombre_dia)
                        {
                            case 1: $nombre_dia="Lunes";
                            break;
                            case 2: $nombre_dia="Martes";
                            break;
                            case 3: $nombre_dia="Miercoles";
                            break;
                            case 4: $nombre_dia="Jueves";
                            break;
                            case 5: $nombre_dia="Viernes";
                            break;
                            case 6: $nombre_dia="Sabado";
                            break;
                        }
                        //dd($nombre_dia);   
                        
                        $config = App\Models\Configuraciones::first() 

                    @endphp 
                    
                    <div class="col-lg-12">
                        
                        <div class="card card-line-primary">
                            
                          
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-3 form-group">
                                        <div class="row">
                                           
                                        </div>
                                    </div>
                                   
                                    <div class="col-lg-12 table-responsive">
                                        <table id="tableExport" class="table  " >
                                            <thead class="thead-light">
                                                <tr>
                                                    <th class="text-center">Identificador</th>
                                                    <th class="text-center">Fecha</th>
                                                    <th class="text-center">Hora de apertura</th>
                                                    <th class="text-center">Hora de cierre</th>
                                                    <th class="text-center">Monto de apertura</th>
                                                    <th class="text-center">Monto de cierre</th>
                                                    <th class="text-center">Estado</th>
                                                    <th class="text-center">Caja</th>
                                                    <th class="text-center">Opciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($cajas as $item)
                                                   
                                                        <tr>
                                                            <td class="text-center">{{strtoupper($item->codigo)}}</td>
                                                            <td class="text-center">{{$item->fecha}}</td>
                                                            <td class="text-center">{{$item->hora}}</td>
                                                            <td class="text-center">
                                                                @if (!$item->hora_cierre)
                                                                <span class="badge badge-dark">Aun no cerrada</span>
                                                                @else
                                                                    {{$item->hora_cierre}}
                                                                @endif        
                                                            </td>
                                                            <td class="text-center">{{ $config->prefijo_moneda }} {{$item->monto}} </td>
                                                            <td class="text-center">
                                                                @if ($item->monto_cierre == '0.00' || !$item->monto_cierre)
                                                                    <span class="badge badge-dark">Aun no cerrada</span>
                                                                @else
                                                                {{$item->monto_cierre}} {{ $config->prefijo_moneda }}
                                                                @endif
                                                            </td>
                                                            <td class="text-center">{{$item->estado}}</td>
                                                            <td class="text-center">{{$item->caja}}</td>
                                                            <td class="text-center">
                                                                <div class="btn-group">
                                                                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                       <i class="fas fa-cog"></i>
                                                                    </button>
                                                                    <div class="dropdown-menu" x-placement="bottom-start" style="will-change: transform; margin: 0px;">
                                                                        <a class="dropdown-item" href="{{route('admin.data_caja.detalle',$item->codigo)}}">
                                                                           &nbsp;Ventas</a>
                                                                        @if ($item->user_id == auth()->user()->id && $item->estado == 'Abierta')
                                                                            <a class="dropdown-item" href="{{route('admin.cerrar_caja.contabilidad',$item->id)}}">
                                                                           
                                                                            &nbsp;Cerrar caja</a>
                                                                        @else
                                                                        <button class="dropdown-item" disabled title="Solo">
                                                                           
                                                                           &nbsp;Cerrar caja</button>
                                                                        @endif
                                                                        
                                                                    
                                                                    </div>
                                                                </div>
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
@push('scripts')
    <script>
 
        window.onload = function(){
           var loader = document.getElementById('loader');
           var contenido = document.getElementById('contenido');

            contenido.style.display = 'block';
 
            $('#loader').remove();
       }
    </script>
@endpush
@endsection