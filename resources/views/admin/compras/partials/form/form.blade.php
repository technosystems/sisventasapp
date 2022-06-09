<div class="row">
  <div class="col-6">
     <div class="form-group">
      <label>Nombre de la empresa</label>
       <div class="input-group">
        <div class="input-group-prepend">
         <div class="input-group-text">
          <i class="fas fa-user"></i>
         </div>
        </div> 
        {!! Form::text('company_name',null,['class'=>'form-control','placeholder' =>'Nombre de la empresa', 'required' => 'required','autocomplete' =>'off']) !!}
      </div>
     </div>
  </div>
  <div class="col-6">
     <div class="form-group">
      <label>Número de valor agregado</label>
       <div class="input-group">
        <div class="input-group-prepend">
         <div class="input-group-text">
          <i class="fas fa-id-card"></i>
         </div>
        </div> 
        {!! Form::text('vat_number',null,['class'=>'form-control','placeholder' =>'Número de valor agregado', 'required' => 'required','autocomplete' =>'off']) !!}
      </div>
     </div>
  </div>
  <div class="col-12">
     <div class="form-group">
      <label>RIF/RUT de la empresa</label>
       <div class="input-group">
        <div class="input-group-prepend">
         <div class="input-group-text">
          <i class="fas fa-id-card"></i>
         </div>
        </div> 
        {!! Form::text('rif_number',null,['class'=>'form-control','placeholder' =>'RIF/RUT de la empresa', 'required' => 'required','autocomplete' =>'off']) !!}
      </div>
     </div>
  </div>
  <div class="col-6">
     <div class="form-group">
      <label>Correo de la empresa</label>
       <div class="input-group">
        <div class="input-group-prepend">
         <div class="input-group-text">
          <i class="">@</i>
         </div>
        </div> 
        {!! Form::text('email',null,['class'=>'form-control','placeholder' =>'Correo de la empresa', 'required' => 'required','autocomplete' =>'off']) !!}
      </div>
     </div>
  </div>
 <div class="col-6">
     <div class="form-group">
      <label>Teléfono de la empresa</label>
       <div class="input-group">
        <div class="input-group-prepend">
         <div class="input-group-text">
          <i class="fas fa-phone"></i>
         </div>
        </div> 
        {!! Form::text('phone_number',null,['class'=>'form-control','placeholder' =>'Teléfono de la empresa', 'required' => 'required','autocomplete' =>'off']) !!}
      </div>
     </div>
  </div>
  <div class="col-12">
     <div class="form-group">
      <label>Dirección de la empresa</label>
       <div class="input-group">
        <div class="input-group-prepend">
         <div class="input-group-text">
          <i class="fas fa-map"></i>
         </div>
        </div> 
        {!! Form::textarea('address',null,['class'=>'form-control char-textarea', 'required' => 'required','autocomplete' =>'off','id' =>'textarea-counter',' data-length' => '60','rows'=>'2']) !!}
      </div>
     </div>
  </div>

  <div class="col-12 text-center">
    <label class="font-weight-bolder" for="status">Estado del proveedor</label>
    <div class="checkbox icheck">
      <label class="font-weight-bolder">
        <input type="radio" name="status" value="1" checked> Activo&nbsp;&nbsp;
        <input type="radio" name="status" value="0"> Deshabilitado
      </label>
    </div>
  </div>
</div><br>