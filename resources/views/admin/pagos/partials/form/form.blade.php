@php
	$empleados = App\Models\Empleado::where('status',1)->get();
	$metodo = App\Models\MetodoPago::where('status',1)->get()
@endphp

<div class="row">
	<div class="col-6">
		<label for="">Empleado</label>
	    <select name="empleado_id" id="" class="select2 form-control ">
		    <option value="0">Seleccione el empleado</option>
		    @foreach ($empleados as $element)
		    	<option value="{{ $element->id }}">{{ $element->display_name }}</option>
		    @endforeach
	    </select>
	</div>
	<div class="col-6">
		<label for="">Método de pago</label>
	    <select name="metodo_pago_id" id="" class="form-control">
		    <option value="0">Seleccione el método de pago</option>
		     @foreach ($metodo as $element)
		    	<option value="{{ $element->id }}">{{ $element->name }}</option>
		    @endforeach
	    </select>
	</div>


	<div class="col-12 mt-1">
		<label for="">Fecha de pago</label>
	    <input  type="text" name="fecha_emision" id="" class="form-control"  value="{{ date('d/m/Y') }}"> 
	</div>

	<div class="col-6 mt-1">
		<label for="">Sábados trabajados</label>
	     {!! Form::text('st',null,['class'=>'form-control', 'required' => 'required','autocomplete' =>'off','placeholder' =>'Sábados trabajados']) !!} 
	</div>
	<div class="col-6 mt-1">
		<label for="">Domingos trabajados</label>
	     {!! Form::text('dt',null,['class'=>'form-control', 'required' => 'required','autocomplete' =>'off','placeholder' =>'Domingos trabajados']) !!} 
	</div>
	<div class="col-6 mt-1">
		<label for="">Horas extras trabajadas</label>
	     {!! Form::text('he',null,['class'=>'form-control', 'required' => 'required','autocomplete' =>'off','placeholder' =>'Horas extras trabajadas']) !!} 
	</div>
	<div class="col-6 mt-1">
		<label for="">Horas nocturnas trabajadas</label>
	     {!! Form::text('hn',null,['class'=>'form-control', 'required' => 'required','autocomplete' =>'off','placeholder' =>'Horas nocturnas trabajadas']) !!} 
	</div>
	<div class="col-6 mt-1">
		<label for="">Horas extras nocturnas trabajadas</label>
	     {!! Form::text('hen',null,['class'=>'form-control', 'required' => 'required','autocomplete' =>'off','placeholder' =>'Horas extras nocturnas trabajadas']) !!} 
	</div>
	<div class="col-6 mt-1">
		<label for="">Dias feriados trabajados</label>
	     {!! Form::text('df',null,['class'=>'form-control', 'required' => 'required','autocomplete' =>'off','placeholder' =>'Dias feriados trabajados']) !!} 
	</div>

</div><br><br>
