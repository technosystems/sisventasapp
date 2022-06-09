

<div class="row">
	<div class="col-sm-6">
        <div class="form-group">
        <label class="form-label">Código del producto</label>
        {!! Form::text('codigo',null,['class'=>'form-control','placeholder' =>'Nombre del producto', 'required' => 'required','autocomplete' =>'off','id'=>'txtCodigo']) !!}
        
       </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
        <label class="form-label">Nombre del producto</label>
        {!! Form::text('descripcion',null,['class'=>'form-control','placeholder' =>'Nombre del producto', 'required' => 'required','autocomplete' =>'off']) !!}
        
       </div>
    </div>
     {{-- <div class="col-sm-4">
        <div class="form-group">
        <label class="form-label">Precio de compra</label>
         {!! Form::text('precio_costo',null,['class'=>'form-control', 'placeholder'=>'$ Monto', 'required' => 'required','onkeypress'=>'return filterFloat(event,this);']) !!}
        
       </div>
    </div> --}}
    <div class="col-sm-6">
        <div class="form-group">
        <label class="form-label">Precio de venta</label>
         {!! Form::text('precio_venta',null,['class'=>'form-control', 'placeholder'=>'$ Monto', 'required' => 'required','onkeypress'=>'return filterFloat(event,this);']) !!}
        
       </div>
    </div>
    {{-- <div class="col-sm-4">
        <div class="form-group">
        <label class="form-label">Precio de mayoreo</label>
         {!! Form::text('precio_mayoreo',null,['class'=>'form-control', 'placeholder'=>'$ Monto', 'required' => 'required','onkeypress'=>'return filterFloat(event,this);']) !!}
        
       </div>
    </div>
     <div class="col-lg-6 form-group">
        <label><b>Fecha de vencimiento del producto</b></label>
        <input type="date" name="fecha_vencimiento" class="form-control {{ $errors->has('fecha_vencimiento') ? ' is-invalid' : '' }}" value="1" placeholder="Fecha de vencimiento del producto">
        @if ($errors->has('fecha_vencimiento'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('fecha_vencimiento') }}</strong>
            </span>
        @endif
    </div> --}}
    <div class="col-lg-6 form-group">
        <label><b>Categoría</b></label>
         {!! Form::select('categoria', $categorias, null,array('class' => 'form-control input-sm','placeholder'=>'Selecione la categoria del producto','id'=>'estado_id')) !!}
    </div> 
    <div class="col-lg-6 form-group">
        <label><b>Marca</b></label>
       {!! Form::select('marca', $marcas, null,array('class' => 'form-control input-sm','placeholder'=>'Selecione la marca del producto','id'=>'estado_id')) !!}
        @if ($errors->has('marca'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('marca') }}</strong>
            </span>
        @endif
    </div>
     <div class="col-lg-6 form-group">
        <label><b>Presentación</b></label>
          {!! Form::select('presentacion', $presentaciones, null,array('class' => 'form-control input-sm','placeholder'=>'Selecione la presentación del producto','id'=>'estado_id')) !!}
        @if ($errors->has('presentacion'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('presentacion') }}</strong>
            </span>
        @endif
    </div>
   {{--  <div class="col-sm-6">

        <div class="form-group">
        <label class="form-label">Stock actual</label>
        {!! Form::number('stock_actual',null,['class'=>'form-control', 'required' => 'required','autocomplete' =>'off']) !!}
        
       </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
        <label class="form-label">Stock mínimo</label>
        {!! Form::number('stock_minimo',null,['class'=>'form-control', 'required' => 'required','autocomplete' =>'off']) !!}
        
       </div>
    </div> --}}

   

    <div class="col-sm-12">
        <div class="form-group">
        <label class="form-label">Estado del producto</label>
        <select name="status" id="" class="form-control">
            <option value="1">Disponible</option>
            <option value="2">Agotado</option>
            <option value="3">En espera</option>
        </select>
        
       </div>
    </div>




</div>


