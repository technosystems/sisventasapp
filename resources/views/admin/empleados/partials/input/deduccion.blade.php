@php
	$tiempo =  ['Indefinido','Eventual'];
   $moneda =  ['$','Bs'];
@endphp

<div class="row">
	<div class="col-12 form-group mb-1">
    <label>Descripción de la deducción: </label>
       {!! Form::text('descripcion_deduccion',null,['class'=>'form-control', 'required' => 'required','autocomplete' =>'off','placeholder' =>'Descripción']) !!}
    </div>
    <div class="col-12 form-group mb-1">
    <label>Moneda de la deducción: </label>
      {!! Form::select('moneda', $moneda, null, ['class' => 'select2 form-control form-control-lg ']) !!}
    </div>
    <div class="col-12 form-group mb-1">
    <label>Cantidad de deducción: </label>
       {!! Form::text('cantidad',null,['class'=>'form-control', 'required' => 'required','autocomplete' =>'off','placeholder' =>'Cantidad de deducción']) !!}
    </div>
    <div class="col-12 form-group mt-1 text-center">
         <label>
               <b for="textarea-counter">Estado de deducción</b><br>
               <input type="radio" name="status" id="status" value="1" checked>  Entregado&nbsp;&nbsp;
         </label>
    </div>
</div>