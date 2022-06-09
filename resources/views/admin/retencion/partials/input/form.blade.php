<div class="row">

  <div class="col-6">
    <label>Descripción de la retención </label>
     <div class="input-group input-group-merge mb-2">
         {!! Form::text('descripcion',null,['class'=>'form-control', 'required' => 'required','autocomplete' =>'off','placeholder' =>'Descripción']) !!}
      
     </div>
 </div>
  <div class="col-6">
    <label>Valor de la retención: </label>
      <div class="input-group input-group-merge mb-2">
       {!! Form::text('valor',null,['class'=>'form-control', 'required' => 'required','autocomplete' =>'off','placeholder' =>'Descripción']) !!}
    </div>
  </div>
</div>

@push('scripts')
    
   
@endpush
