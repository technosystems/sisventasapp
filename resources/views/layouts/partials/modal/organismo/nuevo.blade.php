<div id="myModal" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Favor ingresar datos faltantes del organismo</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                 {!! Form::model($organismo, ['route' => ['organismos.update',$organismo->id],'method' => 'PUT','enctype'=>'multipart/form-data']) !!}
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="">Dirección</label>
                            <input type="text" name="direccion" id="" class="form-control">
                        </div>
                        <div class="col-sm-6">
                            <label for="">Razón social</label>
                            <input type="text" name="razon_social" id="" class="form-control">
                        </div>
                        <div class="col-sm-6 mt-3">
                            <label for="">Correo</label>
                            <input type="text" name="correo" id="" class="form-control">
                        </div>
                        <div class="col-sm-6 mt-3">
                            <label for="">Nombre del director</label>
                            <input type="text" name="nom_director" id="" class="form-control">
                        </div>
                         <div class="col-sm-6 mt-3">
                            <label for="">RFC</label>
                            <input type="text" name="rfc" id="" class="form-control">
                        </div>
                         <div class="col-sm-6 mt-3">
                            <label for="">CP</label>
                            <input type="text" name="cp" id="" class="form-control">
                        </div>
                        <div class="col-sm-12 mt-3">
                            <label for="">Logo de la empresa</label>
                             <input type="file" class="form-control" name="photo" value="{{ old('photo') }}" />
                        </div>
                    </div><br><br>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block btn-lg">Sign In</button>
                    </div>
                
            </div>
        </div>
    </div>
</div>
