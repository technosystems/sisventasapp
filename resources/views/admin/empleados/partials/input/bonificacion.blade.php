@php
	$tiempo =  ['Indefinido','Eventual'];
   $moneda =  ['$','Bs'];
@endphp

<div class="row">
	<div class="col-12 form-group mb-1">
    <label>Descripción de la bonificación: </label>
       {!! Form::text('descripcion_bono',null,['class'=>'form-control', 'required' => 'required','autocomplete' =>'off','placeholder' =>'Descripción']) !!}
    </div>
    <div class="col-12 form-group mb-1">
    <label>Tiempo bonificación: </label>
       {!! Form::select('tiempo_bonificacion', $tiempo, null, ['class' => 'select2 form-control form-control-lg ']) !!}
    </div>
    <div class="col-12 form-group mb-1">
    <label>Moneda de la bonificación: </label>
      {!! Form::select('moneda', $moneda, null, ['class' => 'select2 form-control form-control-lg ']) !!}
    </div>
    <div class="col-12 form-group mb-1">
    <label>Cantidad de bonificación: </label>
       {!! Form::text('cantidad',null,['class'=>'form-control', 'required' => 'required','autocomplete' =>'off','placeholder' =>'Cantidad de bonificación']) !!}
    </div>
    <div class="col-12 form-group mt-1 text-center">
            <label>
               <b for="textarea-counter">Estado de bonificación</b><br>
              <input type="radio" name="status" id="status" value="1" checked>  Activo&nbsp;&nbsp;
              <input type="radio" name="status" id="status" value="0"> Inactivo&nbsp;&nbsp;
            </label>
    </div>
</div>