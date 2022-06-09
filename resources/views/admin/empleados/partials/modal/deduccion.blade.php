<div class="modal fade" id="RegistrarDeduccion{{ $element->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registro de deducción para el empleado <b>{{ $element->display_name }}</b> </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       {!! Form::model($element, ['url' => ['/admin/empleados/deduccion',$element->id],'method' => 'PUT','enctype'=>'multipart/form-data']) !!}
        @include('admin.empleados.partials.input.deduccion')
        <br><br>
        <button type="submit" class="btn blue darken-4 text-white form-control">Guardar cambios</button>
         {!! Form::close()!!}
      </div>
     
    </div>
  </div>
</div>