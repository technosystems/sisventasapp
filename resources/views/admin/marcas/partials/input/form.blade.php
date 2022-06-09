<div class="row">
  @php
    $equipos = App\Models\TipoEquipo::pluck('name','id')
  @endphp
  <div class="col-6">
    <label>Tipo de equipos: </label>
     <div class="input-group input-group-merge mb-2">
        
      {!! Form::select('tipo_equipo_id', $equipos, null, ['class' => 'form-control ']) !!}
     </div>
 </div>
  <div class="col-6">
    <label>Descripción de la marca: </label>
      <div class="input-group input-group-merge mb-2">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon-search2"><i class="fas fa-user"></i></span>
        </div>
       {!! Form::text('name',null,['class'=>'form-control', 'required' => 'required','autocomplete' =>'off','placeholder' =>'Descripción']) !!}
    </div>
  </div>
 <div class="col-12 text-center">
    <label class="font-weight-bolder" for="status">Estado</label>
    <div class="checkbox icheck">
      <label class="font-weight-bolder">
        <input type="radio" name="status" value="1" checked> Activo&nbsp;&nbsp;
        <input type="radio" name="status" value="0"> Deshabilitado
      </label>
    </div>
  </div>
</div>

@push('scripts')
    
   
@endpush
