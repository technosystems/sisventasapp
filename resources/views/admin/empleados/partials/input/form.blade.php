<div class="row">
  @php
  $generos = App\Models\Genero::pluck('name','id');
  $estadocivil = App\Models\EstadoCivil::pluck('name','id');
  $nacionalidad = App\Models\Nacionalidades::pluck('name','id');
  $sangre = App\Models\TipoDeSangre::pluck('name','id');
  $grado = App\Models\GradoInstruccion::pluck('name','id');
  $estados = App\Models\Estados::get();
  $miembro = App\Models\TipoEmpleado::pluck('name','id');
  $pais = App\Models\Pais::pluck('name','id')
@endphp
  <div class="col-6 form-group mb-1">
    <label>Nombres: </label>
       
       {!! Form::text('name',null,['class'=>'form-control', 'required' => 'required','autocomplete' =>'off','placeholder' =>'Nombres']) !!}
    </div>
  
   <div class="col-6 form-group mb-1">
    <label>Apellidos: </label>

       {!! Form::text('lastname',null,['class'=>'form-control', 'required' => 'required','autocomplete' =>'off','placeholder' =>'Apellidos']) !!}
    </div>
  
  <div class="col-6 form-group mb-1">
    <label>Tipo de documento: </label>

      
      <select name="tipo_documento" class="form-control">
        <option value="cedula">Cédula</option>
        <option value="pasaporte">Pasaporte</option>
      </select>
    </div>
  
  <div class="col-6 form-group mb-1">
    <label>Documento: </label>

       {!! Form::text('documento',null,['class'=>'form-control', 'required' => 'required','autocomplete' =>'off','placeholder' =>'Documento']) !!}
    </div>
  
  <div class="col-6 form-group mb-1">
    <label>Correo: </label>

       {!! Form::text('email',null,['class'=>'form-control', 'required' => 'required','autocomplete' =>'off','placeholder' =>'Correo electrónico']) !!}
    </div>
  
   <div class="col-6 form-group mb-1">
    <label>Teléfono: </label>

       {!! Form::text('telefono',null,['class'=>'form-control', 'required' => 'required','autocomplete' =>'off','placeholder' =>'Teléfono']) !!}
    </div>
  
   <div class="col-6 form-group mb-1">
    <label>País de nacimiento: </label>
 
        
      {!! Form::select('pais_id', $pais, null, ['class' => ' select2 form-control ']) !!}
     
 </div>
  <div class="col-6 form-group mb-1">
    <label>Lugar de nacimiento: </label>

       {!! Form::text('lugar_nacimiento',null,['class'=>'form-control', 'required' => 'required','autocomplete' =>'off','placeholder' =>'Lugar de nacimiento']) !!}
    </div>
  
    <div class="col-6 form-group mb-1">
    <label>Fecha de nacimiento: </label>

       
       {!! Form::date('fecha_nacimiento',null,['class'=>'form-control','autocomplete' =>'off','placeholder' =>'Fecha de nacimiento']) !!}
    </div>
  
  <div class="col-6 form-group mb-1">
    <label>Edad: </label>

      
 
       {!! Form::number('edad',null,['class'=>'form-control', 'required' => 'required','autocomplete' =>'off','placeholder' =>'Edad']) !!}
    </div>
  

 <div class="col-6 form-group mb-1">
    <label>Géneros: </label>

        
      {!! Form::select('genero_id', $generos, null, ['class' => 'select2 form-control  ']) !!}
     
 </div>
  <div class="col-6 form-group mb-1">
    <label>Estado Civil: </label>

        
      {!! Form::select('estado_civil_id', $estadocivil, null, ['class' => 'select2 form-control  ']) !!}
     
 </div>
  <div class="col-6 form-group mb-1">
    <label>Nacionalidad: </label>

        
      {!! Form::select('nacionalidad_id', $nacionalidad, null, ['class' => 'select2 form-control   ']) !!}
     
 </div>
 <div class="col-6 form-group mb-1">
    <label>Tipo de sangre: </label>

        
      {!! Form::select('tipo_sangre_id', $sangre, null, ['class' => 'select2 form-control l  ']) !!}
     
 </div>
  <div class="col-6 form-group mb-1">
    <label>Grado de instruccion: </label>

        
      {!! Form::select('grado_instruccion_id', $grado, null, ['class' => 'select2 form-control  ']) !!}
     
 </div>
  <div class="col-6 form-group mb-1">
    <label>Fecha de ingreso: </label>

       
      {!! Form::date('fecha_ingreso',null,['class'=>'form-control','autocomplete' =>'off','placeholder' =>'Fecha de nacimiento']) !!}
    </div>
  

 <div class="col-sm-4">
  <label class="font-weight-bolder" for="empresa">Estados del país</label>
 <select name="estado_id" id="estado_id" class=" form-control  ">
  <option value="0">Seleccione</option>
   @foreach ($estados as $value)
     <option value="{{ $value->id }} "> {{ $value->name }}</option>
   @endforeach
 </select>
</div>
<div class="col-sm-4">
  <label class="font-weight-bolder" for="empresa">Municipios del país</label>
 <select name="municipio_id" id="municipio_id" class=" form-control ">
  <option value="0" disable="true" selected="true"></option>
  
 </select>
</div>
<div class="col-sm-4">
  <label class="font-weight-bolder" for="empresa">Parroquias del país</label>
 <select name="parroquia_id" id="parroquia_id" class=" form-control ">
  <option value="0" disable="true" selected="true"></option>
  
 </select>
</div>
 <div class="col-12 form-group mb-1 mt-2">
       <label for="textarea-counter">Dirección del empleado</label>
        <div class="form-label-group mb-0">
            
             {!! Form::textarea('direccion',null,['class'=>'form-control char-textarea', 'required' => 'required','autocomplete' =>'off','id' =>'textarea-counter',' data-length' => '60','rows'=>'4']) !!}
         
        </div>
        <small class="textarea-counter-value float-right"><span class="char-count">0</span> / 60 </small>
    </div>
    <div class="col-6 form-group mb-1">
    <label>Clase de empleado: </label>

        
      {!! Form::select('tipo_empleado_id', $miembro, null, ['class' => 'select2 form-control   ']) !!}
     
 </div>
   <div class="col-6 form-group mb-1">
    <label>Sueldo base del empleado: </label>

        
     {!! Form::text('sueldo_base',null,['class'=>'form-control','autocomplete' =>'off','placeholder' =>'Sueldo base']) !!}
     
 </div>


 
  
    <div class="col-md-12 text-center">  
                                      
          <div class="checkbox icheck">  <br>

            <label>
               <b for="textarea-counter">Estado del trabajador</b><br>
              <input type="radio" name="status" id="status" value="1" checked>  Activo&nbsp;&nbsp;
              <input type="radio" name="status" id="status" value="0"> Inactivo&nbsp;&nbsp;
            </label>
          </div>
      </div>
  


 
</div>

@push('scripts')
    <script src="{{ asset('js/admin/pickdate.js') }}"></script>
     <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
    <script>
      var form    = false;


$(document).ready(function() {

  form = $('#main-form');
     
    $.fn.eventos();
    
  

  //$('#objetivos').hide();
    
});


$.fn.eventos = function(){


  $('#estado_id').unbind('change');//borro evento click
  $('#estado_id').on("change", function(e) { //asigno el evento change u otro
  
  console.log($('#estados_id').val())

    estados_id = e.target.value;
    console.log(estados_id);
    if(estados_id != '0')
    {
      $.fn.get_municipio(estados_id);
      
    }else{
      console.log('epa selecciona un proyecto valido');
    }

  });

  $('#municipio_id').unbind('change');//borro evento click
  $('#municipio_id').on("change", function(e) { //asigno el evento change u otro
    
     municipio_id= e.target.value;

   


     $.fn.get_parroquias(municipio_id);

  });

  
}

/********* AJAX ***********/

$.fn.get_municipio = function(estados_id){

      $.ajax({url: "/admin/estado/"+estados_id+"/municipios",
        method: 'GET',
        //data: {'estados_id': estados_id}
      }).then(function(result) {
        console.log(result);
          
        $('#municipio_id').html('<option value="0"> Seleccione </option>');
        

        $(result).each(function( index, element ) {

          $('#municipio_id').append('<option value="'+ element.id +'">'+ element.municipio +'</option>');
      
        });
      })
      .catch(function(err) {
          console.error(err);
      });

}

    $.fn.get_parroquias = function(municipio_id){

 
      $.ajax({url: "/admin/municipio/"+ municipio_id +"/parroquias",
      method: 'GET',

    }).then(function(result) {

          console.log(result);


        $('#parroquia_id').html('<option value="0"> Seleccione </option>');

        $( result).each(function( index, element ) {

          $('#parroquia_id').append('<option value="'+ element.id +'">'+ element.parroquia +'</option>');
      
        });
      })
      .catch(function(err) {
          console.error(err);
      });
      
         
   }
    </script>
@endpush
