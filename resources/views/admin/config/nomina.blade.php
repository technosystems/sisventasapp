@extends('layouts.admin')
@section('content')
<div class="content-header-left col-md-9 col-12 mb-2">
    <div class="row breadcrumbs-top">
        <div class="col-12">
            <h2 class="content-header-title float-left mb-0">CONFIGURACIÓN DE NOMINA</h2>
            <div class="breadcrumb-wrapper">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/home') }}">Inicio</a>
                    </li>
                    <li class="breadcrumb-item"><a >General</a>
                    </li>
                    <li class="breadcrumb-item active"> Registro de nómina
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div><br> 
<div class="card card-line-primary">
    <div class="card-body">       
        <div class="row">
            <div class="col-md-12">
              
               {!! Form::model($nomina, ['url' => ['admin/config/nomina',$nomina->id],'method' => 'PUT','enctype' =>'multipart/form-data']) !!}

                    <div class="row">
                        <div class="col-4">
                       <div class="form-group ">
                            <label>Días de utilidades</label>
                            <i class="ml-1 red-text animate__animated animate__bounce fas fa-info fa-1x" data-bs-toggle="tooltip" data-bs-placement="top" title="Artículo 131. Las entidades de trabajo deberán distribuir entre todos sus trabajadores y trabajadoras, por lo menos, el quince por ciento de los beneficios líquidos que hubieren obtenido al fin de su ejercicio anual. A este fin, se entenderá por beneficios líquidos, la suma de los enriquecimientos netos gravables y de los exonerados conforme a la Ley de Impuesto Sobre la Renta.

                            Esta obligación tendrá, respecto de cada trabajador o trabajadora como límite mínimo, el equivalente al salario de treinta días y como límite máximo el equivalente al salario de cuatro meses. Cuando el trabajador o trabajadora no hubiese laborado todo el año, la bonificación se reducirá a la parte proporcional correspondiente a los meses completos de servicios prestados. Cuando la terminación de la relación de trabajo ocurra antes del cierre del ejercicio, la liquidación de la parte correspondiente a los meses servidos podrá hacerse al vencimiento del ejercicio." data-container="body" data-animation="true"></i>
                            <input class="form-control form-empresa-required" type="text" name="dias_utilidades" placeholder="Razón social" value="{{ $nomina->dias_utilidades }}">
                        </div>
                     </div>
                     <div class="col-4">
                         <div class="form-group ">
                            <label>Días de disfrute vacacional</label>  <i class="ml-1 red-text animate__animated animate__bounce fas fa-info fa-1x" data-bs-toggle="tooltip" data-bs-placement="top" title="Artículo 190. Cuando el trabajador o la trabajadora cumpla un año de trabajo ininterrumpido para un patrono o una patrona, disfrutará de un período de vacaciones remuneradas de quince días hábiles. Los años sucesivos tendrá derecho además a un día adicional remunerado por cada año de servicio, hasta un máximo de quince días hábiles.
     
                            Las vacaciones que se interrumpan por hechos no imputables al trabajador o a la trabajadora, se reactivarán al cesar esas circunstancias.
                             
                            Durante el periodo de vacaciones el trabajador o la trabajadora tendrá derecho a percibir el beneficio de alimentación, conforme a las previsiones establecidas en la ley que regula la materia.
                             
                            Durante el periodo de vacaciones no podrá intentarse ni iniciarse algún procedimiento para despido, traslado o desmejora contra el trabajador o la trabajadora." data-container="body" data-animation="true"></i>
                            <input class="form-control form-empresa-required" type="text" name="disfrute_vacacional" placeholder="Días de disfrute vacacional" value="{{ $nomina->disfrute_vacacional }}">
                        </div>
                    </div>
                    <div class="col-4">
                         <div class="form-group ">
                            <label>Días de Bono vacacional</label> <i class="ml-1 red-text animate__animated animate__bounce fas fa-info fa-1x" data-bs-toggle="tooltip" data-bs-placement="top" title="Artículo 192. Los patronos y las patronas pagarán al trabajador o a la trabajadora en la oportunidad de sus vacaciones, además del salario correspondiente, una bonificación especial para su disfrute equivalente a un mínimo de quince días de salario normal más un día por cada año de servicios hasta un total de treinta días de salario normal. Este bono vacacional tiene carácter salarial." data-container="body" data-animation="true"></i>
                            <input class="form-control form-empresa-required" type="text" name="bono_vacacional" placeholder="Días de disfrute vacacional" value="{{ $nomina->bono_vacacional }}">
                        </div>
                    </div>
                      <div class="col-4">
                         <div class="form-group ">
                            <label>Días laborales del mes</label>
                            <input class="form-control form-empresa-required" type="text" name="dias_laborales" placeholder="Días de disfrute vacacional" value="{{ $nomina->dias_laborales }}">
                        </div>
                       </div>
                        <div class="col-4">
                             <div class="form-group ">
                                <label>Días hábiles del mes</label>
                                <input class="form-control form-empresa-required" type="text" name="dias_habiles" placeholder="Días de disfrute vacacional" value="{{ $nomina->dias_habiles }}">
                            </div>
                       </div>
                       <div class="col-4">
                             <div class="form-group ">
                                <label>Días feriados del mes</label>
                                <input class="form-control form-empresa-required" type="text" name="dias_feriados" placeholder="Días de disfrute vacacional" value="{{ $nomina->dias_feriados }}">
                            </div>
                       </div>
                       <div class="col-6">
                             <div class="form-group ">
                                <label>Cantidad de Lunes en el año</label>
                                <input class="form-control form-empresa-required" type="text" name="nu_lunes" placeholder="Días de disfrute vacacional" value="{{ $nomina->nu_lunes }}">
                            </div>
                       </div>
                       <div class="col-6">
                             <div class="form-group ">
                                <label>Días de jornada laboral</label>
                                <input class="form-control form-empresa-required" type="text" name="dias_jornada_laboral" placeholder="Días de disfrute vacacional" value="{{ $nomina->dias_jornada_laboral }}">
                            </div>
                       </div>
                       <div class="col-4">
                             <div class="form-group ">
                                <label>Modo de pago</label>
                                <input class="form-control form-empresa-required" type="text" name="tipo_pago" placeholder="Días de disfrute vacacional" value="{{ $nomina->tipo_pago }}">
                            </div>
                       </div>
                        <div class="col-4">
                             <div class="form-group ">
                                <label>Porcentaje de pago</label>
                                <input class="form-control form-empresa-required" type="text" name="porcentaje_pago" placeholder="Días de disfrute vacacional" value="{{ $nomina->porcentaje_pago }}">
                            </div>
                       </div>
                       <div class="col-4">
                             <div class="form-group ">
                                <label>Porcentaje de pago</label>
                                <select name="mes" class="form-control select2">
                                    <option value="{{ $nomina->mes }}">{{ $nomina->mes }}</option>
                                    <option value="Enero">Enero</option>
                                    <option value="Febrero">Febrero</option>
                                    <option value="Marzo">Marzo</option>
                                    <option value="Abril">Abril</option>
                                    <option value="Mayo">Mayo</option>
                                    <option value="Junio">Junio</option>
                                    <option value="Julio">Julio</option>
                                    <option value="Agosto">Agosto</option>
                                    <option value="Septiembre">Septiembre</option>
                                    <option value="Octubre">Octubre</option>
                                    <option value="Noviembre">Noviembre</option>
                                    <option value="Diciembre">Diciembre</option>
                                </select>
                            </div>
                       </div>
                    </div><br><br>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary form-control">Guardar</button>
                    </div>
               {!! Form::close()!!}
            </div>     
        </div>
  </div>
</div>

@endsection