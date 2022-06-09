@php
	$empleados = App\Models\Empleado::where('status',1)->get();
	$metodo = App\Models\MetodoPago::where('status',1)->get()
@endphp

<div class="row">
	<div class="col-12">
		<label for="">Empleado</label>
	    <select name="empleado_id" id="" class="select2 form-control-lg form-control">
		    <option value="0">Seleccione el empleado</option>
		    @foreach ($empleados as $element)
		    	<option value="{{ $element->id }}">{{ $element->display_name }}</option>
		    @endforeach
	    </select>
	</div>
	<div class="col-6">
		<label for="">Fecha desde</label>
	     {!! Form::date('fecha_desde',null,['class'=>'form-control', 'required' => 'required','autocomplete' =>'off','placeholder' =>'Cantidad a pagar $']) !!} 
	</div>

	<div class="col-6">
		<label for="">Fecha hasta</label>
	     {!! Form::date('fecha_hasta',null,['class'=>'form-control', 'required' => 'required','autocomplete' =>'off','placeholder' =>'Cantidad a pagar $']) !!} 
	</div>

	<div class="col-lg-12 mt-2">
	    <label>Nota de las vacaciones del empleado: </label>
	   {!! Form::textarea('nota',null,['class'=>'form-control', 'required' => 'required','autocomplete' =>'off','placeholder' =>'Nota de las vacaciones del empleado','cols'=>'10','rows'=>'5']) !!}
	    @if ($errors->has('address'))
	        <span class="invalid-feedback" role="alert">
	            <strong>{{ $errors->first('address') }}</strong>
	        </span>
	    @endif
   </div>

</div><br><br>
