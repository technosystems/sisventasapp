@extends('layouts.admin')
@section('title','GASTOS')
@section('breadcrumb','GASTOS')
@section('content')
 <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">GASTOS</h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/home') }}">Inicio</a>
                        </li>
                        <li class="breadcrumb-item"><a >General</a>
                        </li>
                        <li class="breadcrumb-item active"> Registro y listado de gastos
                        </li>
                    </ol>
                </div>
            </div>
        </div>
</div><br>

  @php
    $tipogasto = App\Models\TipoGasto::where('status',1)->get()
  @endphp

<div style="display: none" id="contenido">
    <div class="card card-line-primary">
        <div class="card-body">
        <div class="row">
        <div class="col-lg-8">
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{route('admin.store_gasto.contabilidad')}}" method="POST">
                        @csrf
                        <div class="card">

                            <div class="card-body">
                                <div class="row mb-4">
                                    <div class="col-lg-6">
                                    <label><b>Tipo de gasto:</b></label>
                                    <select class="form-control md-form" name="tipo_gasto_id">
                                        <option value="" disabled selected>Selecciona</option>
                                        @foreach ($tipogasto as $element)
                                            <option value="{{ $element->id }}">{{ $element->descripcion }}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <label><b>Total pagado:</b></label>
                                        <input type="number" name="precio_gasto" required class="form-control {{ $errors->has('precio_gasto') ? ' is-invalid' : '' }}" placeholder="Total pagado">
                                        <input type="hidden" name="idcaja" value="{{$idcaja}}">
                                        @if ($errors->has('precio_gasto'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('precio_gasto') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                </div>
                                <div class="row form-group">
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <textarea name="detalle" required class="form-control {{ $errors->has('detalle') ? ' is-invalid' : '' }}" placeholder="Detalles del gasto" style="height:80px"></textarea>
                                                @if ($errors->has('detalle'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('detalle') }}</strong>
                                                    </span>
                                                @endif
                                            </div>

                                        </div>
                                    </div>
                                </div>


                            <button type="submit" class="form-control btn btn-primary">Registrar gasto</button>


                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header text-center">
                    INFORMACIÓN
                </div>
                <div class="table-wrapper-scroll-y my-custom-scrollbar">
                    <table class="table table-responsive-sm table-hover table-outline mb-0 table-sm" >
                        <tr>
                            <td><b>Usuario</b></td>
                            <td>{{auth()->user()->display_name}}</td>
                        </tr>
                        <tr>
                            <td><b>Caja</b></td>
                            <td>{{strtoupper($caja->codigo)}}</td>
                        </tr>
                        <tr>
                            <td><b>Fecha</b></td>
                            <td>{{$fecha}}</td>
                        </tr>

                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-12 form-group">
                    <div class="card">
                        <div class="table-wrapper-scroll-y my-custom-scrollbar">
                            <table  class=" table table-striped" style="width:100%" id="tableExport">
                                <thead>
                                <tr>
                                <th></th>
                                <th class="text-center">
                                    Detalle
                                    </th>
                                <th class="text-center">Monto</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $total=0;
                                 @endphp
                                @foreach ($gastos as $item)
                                <tr class="row{{ $login->id }}">
                                    <td class="text-center">{{$item->descripcion}}</td>
                                    <td class="text-center">{{$config->prefijo_moneda}}{{$item->cantidad}}</td>

                                </tr>
                                @endforeach
                                </tr>
                                </tbody>
                                <tfoot>
                                    <td></td>
                                    <td  class="text-center">
                                        Total
                                    </td>
                                    <td  class="text-center">{{$config->prefijo_moneda}}<?php echo $total; ?>
                                    </td>
                                </tfoot>
                            </table>
                        </div>
                      </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
   <script>
       window.onload = function(){
           var loader = document.getElementById('loader');
           var contenido = document.getElementById('contenido');

            contenido.style.display = 'block';

            $('#loader').remove();
       }

       $('#btn-one').click(function() {
            $('#btn-one').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Enviando...').addClass('disabled');
        });

        function cerrada(){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ocurrió un problema!',
                footer: '<a href>No se puede agregar gastos mientras la caja este cerrada</a>'
            });
        }
   </script>

@endpush


