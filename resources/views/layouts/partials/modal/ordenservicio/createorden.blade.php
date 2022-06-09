<div class="modal fade" id="createModalOrdenServicio">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Crear orden de servicio</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         {!! Form::open(['url' => ['ordenservicios/guardar'],'method' => 'POST','id'=>'main-form']) !!}
            <h3 class="text-center"><br>
              Datos del cliente
            </h3>
           <div class="row">
            <div class="col-sm-6  form-group">
            <label>Cliente</label><br>
             @php
                 $clientes = App\Models\Cliente::get()
                @endphp
                   <select class="form-control select2" name="cliente_id" id="cliente">

                    @foreach ($clientes as $cliente)
                      <option value="{{ $cliente->id }}" >{{ $cliente->name }}</option>
                    @endforeach
                  </select>
            </div>
            <div class="col-sm-6  form-group">
              <label>Teléfono del cliente</label>
              <input type="text" name="telefono" id="telefono_cliente" class="form-control" disabled>
            </div>
            </div>
            <h3 class="text-center mt-5">
              Datos de identificación del equipo.
            </h3>
            <div class="row">
              <div class="col-sm-4 form-group">
              <label>Dipositivos</label>
                @php
                 $tipoequipos = App\Models\TipoEquipo::pluck('name','id')
                @endphp
                 {!! Form::select('tipo_equipo_id', $tipoequipos, old('tipo_equipo_id'), ['class' => 'form-control select2','placeholder' => '-- Seleccione un dispositivo  --','id'=>'tipoequipos']) !!}
                </div>
                  <div class="col-sm-4 form-group">
                   <label>Marcas</label><br>
                    <select class="form-control select2 " name="marca_id" id="marcas">
                   </select>
              </div>
              <div class="col-sm-4 form-group">
                <label>Modelos</label><br>
                  <select class="form-control select2 " name="modelo_id" id="modelos">
                  </select>
              </div>
              <div class="col-sm-4 form-group mt-4">
                <label>Tipo de reparaciones</label><br>
                 @php
                 $tiporeparaciones = App\Models\TipoReparaciones::get()
                @endphp
                   <select class="form-control select2 blue" multiple="" name="tipo_reparacion[]" id="tiporeparaciones">
                    @foreach ($tiporeparaciones as $tiporeparacion)
                      <option value="{{ $tiporeparacion->descripcion }}" >{{ $tiporeparacion->descripcion }}</option>
                    @endforeach
                  </select>
              </div>
              <div class="col-sm-4 form-group mt-4">
                <label>Descripciones de recepción</label>
                 <textarea name="orservacion_recepcion" class="form-control" id="" cols="30" rows="10"></textarea>
              </div>
              <div class="col-sm-4 form-group mt-4">
                <label>Accesorios</label>
                 <textarea name="accesorios" class="form-control" id="" cols="30" rows="10"></textarea>
              </div>
              <div class="col-sm-4 form-group mt-3">
              <label>Imei/Serie</label>
              <input type="text" name="imei"  class="form-control" >
            </div>
            <div class="col-sm-4 form-group mt-3">
              <label>Color</label>
              <input type="text" name="color"  class="form-control" >
            </div>
            <div class="col-sm-4 form-group mt-3">
              <label>Clave</label>
                   <select class="form-control select2 blue" name="clave">
                      <option value="0" >Seleccione</option>
                      <option value="Ninguna" >Ninguna</option>
                      <option value="Contraseña" >Contraseña</option>
                      <option value="Patrón" >Patrón</option>
                  </select>
            </div>
            <div class="col-sm-4 form-group mt-3"> 
              <label>Costo</label>
              <input type="text" name="costo"  class="form-control" >
            </div>
            <div class="col-sm-4 form-group mt-3">
              <label>Anticipo</label>
              <input type="text" name="anticipo"  class="form-control" >
            </div>
            <div class="col-sm-4 form-group mt-3">
              <label>Fecha de entrega</label>
              <input type="date" name="fecha_entrega"  class="form-control" >
            </div>
            </div>
            <div class="">
                <button type="submit" class="btn blue darken-4 text-white btn-lg ajax" id="submit">
                  <i id="ajax-icon" class="fa fa-save"></i> Ingresar
                </button>
               
              </div>
             {!! Form::close()!!}

        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
