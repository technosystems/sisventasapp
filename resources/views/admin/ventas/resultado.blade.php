@extends('layouts.admin')
@section('title','Ganancias')
@section('content')
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">Ganancias por ventas</h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/home') }}">Inicio</a>
                        </li>
                       <li class="breadcrumb-item"><a href="{{ url('admin/panel/ventas/historial') }}">Listado de ventas</a>
                        </li>
                        <li class="breadcrumb-item active"> Ganancias por ventas
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div><br>

<div class="container-fluid">
	<div class="row" id="contenido" >
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
	    
	    @if(Session::has('danger'))
	    <div class="col-lg-12">
	        <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert" style="color: #ffffff;background-color: #ed2b2b;">
	            {{Session::get('danger')}}
	            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	                <span aria-hidden="true">&times;</span>
	            </button>
	        </div>
	    </div>
	 @endif 

		<div class="col-lg-12">
		    <div class="card card-line-primary">
		        <div class="card-body">
		            <div class="row">
		                
		                <div class="col-lg-3">
		                    <a class="btn btn-dark btn-lg btn-block centrar" href="{{route('admin.abrir_caja.contabilidad')}}">
		                        <img src="{{asset('images/caja/dinero.png')}}" style="width: 2.1rem !important;">
		                        &nbsp;<span style="margin-left: 5px;">Abrir caja</span></a>
		                </div>
		                <div class="col-lg-3">
		                    <a class="btn btn-danger btn-lg btn-block centrar" href="{{route('admin.registro.venta')}}">
		                        <img src="{{asset('images/caja/tienda.png')}}" style="width: 2.1rem !important;">
		                        &nbsp;<span style="margin-left: 5px;">Facturar</span></a>
		                </div>
		                <div class="col-lg-3">
		                    <a class="btn btn-primary btn-lg btn-block centrar" href="{{route('admin.grafico.venta')}}">
		                        <img src="{{asset('images/caja/grafica.png')}}" style="width: 2.1rem !important;">
		                        &nbsp;<span style="margin-left: 5px;">Rendimiento</span></a>
		                   
		                </div>
		                <div class="col-lg-3">
		                    <a class="btn btn-success btn-lg btn-block centrar" href="{{route('admin.ventas.vencimiento')}}">
		                        <img src="{{asset('images/caja/libro.png')}}" style="width: 2.1rem !important;">
		                        &nbsp;<span style="margin-left: 5px;">Facturas por cobrar</span></a>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
         <div class="col-lg-12">
			<div class="card">
				<div class="card-header">
					<h3 class="text-center">
						Buscar ventas por rangos de fechas
					</h3>
				</div>
				<div class="card-body">
					 <div class="col-lg-6 form-group">
                    {!! Form::open(array('url'=>'/admin/panel/venta/ganancias','method'=>'POST','autocomplete'=>'off','role'=>'search'))!!}
                    <div class="row">
                        
                        <div class="col-md-4">
                            <input class="form-control" type="date" name="from" value="">
                        </div>
                        <div class="col-md-4">
                            <input class="form-control" type="date" name="to" value="" >
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-primary "><i class="zmdi zmdi-search fa-4x"></i> Buscar</button>
                        </div>
                    </div>
                     
                    {{Form::close()}}
                  </div>	
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
