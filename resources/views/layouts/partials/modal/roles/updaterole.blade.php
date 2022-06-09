<div class="modal fade" id="updateRole{{$role->id}}" tabindex="-1" role="dialog" aria-labelledby="formModal"
          aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formModal">Registrar nuevo tipo de reparación</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                 {!! Form::model($role, ['route' => ['roles.update',$role->id],'method' => 'PUT']) !!}
                <input type="hidden" id="guard_name" value="web">
           
              <div class="row">
                 <div class="col-sm-6">
                   <div class="form-group pading">
                   <label class="font-weight-bolder" for="name">Nombre</label>
                  <input class="form-control" style="font-size: 15px;" id="name" value="{{ $role->name }}" name="name" placeholder="Nombres">
                  <span class="missing_alert text-danger" id="name_alert"></span>
              </div>
                </div> 
                 <div class="col-sm-6">
                   <div class="form-group pading">
                <label class="font-weight-bolder" for="name">Organismo</label>
                @php
                $organismos = App\Models\Organismos::where('role_id',\Auth::user()->role_id)->get()
                @endphp
                <select name="organismo_id" class="form-control">
                  @foreach ($organismos as $organismo)
                   <option value="{{$organismo->id}} "> {{$organismo->nombre_negocio}} </option>
                  @endforeach
                </select>

                <span class="missing_alert text-danger" id="name_alert"></span>
              </div>
                </div>
                 <div class="col-sm-12">
                   <div class="form-group pading">
                <label class="font-weight-bolder" for="name">Sucursales</label>
                @php
                $sucursales = App\Models\Sucursales::where('organismo_id',\Auth::user()->role_id)->get()
                @endphp
                <select name="sucursal_id" class="form-control">
                  @foreach ($sucursales as $sucursal)
                   <option value="{{$sucursal->id}} "> {{$sucursal->nombre}} </option>
                  @endforeach
                </select>

                <span class="missing_alert text-danger" id="name_alert"></span>
              </div>
                </div>
              </div>
              
             
            </div>
              <div class="card-footer">
                <button type="submit" class="btn blue darken-4 text-white form-control  ajax" id="submit">
                  <i id="ajax-icon" class="fa fa-save"></i> Ingresar
                </button>
               
              </div>
            {!! Form::close()!!}
              </div>
            </div>
          </div>
        </div>
 