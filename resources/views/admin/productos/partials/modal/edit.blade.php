<div class="modal fade" id="EditarProducto{{ $producto->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar datos del producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       {!! Form::model($producto, ['route' => ['admin.productos.update',$producto->id],'method' => 'PUT']) !!}
        @include('admin.productos.partials.form.input')

        <button type="submit" class="btn blue darken-4 text-white form-control">Guardar cambios</button>
         {!! Form::close()!!}
      </div>
     
    </div>
  </div>
</div>