<div class="modal fade" id="historialOrdenServicio{{$orden->id}}">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Historial de la orden de servicio</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="section-body">
            <h2 class="section-title text-uppercase">00000{{ $orden->id }}</h2><br>
            <div class="row">
              <div class="col-12">
                 @php
                  $historiales  = App\Models\HistorialEquipo::where('orden_servicio_id',$orden->id)->get();
                @endphp

                @foreach ($historiales as $historial)
                
                <ul class="timeline">
                <li class="timeline-item">
                  <span class="timeline-point">
                    <i data-feather="dollar-sign"></i>
                  </span>
                  <div class="timeline-event">
                    <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                      <h6>{{ $historial->usuario->display_name }}</h6>
                       @php
                          Carbon\Carbon::setLocale('es');
                          $fecha = Carbon\Carbon::parse($historial->updated_at)
                        @endphp
                      <span class="timeline-event-time">{{ $fecha }}</span>
                    </div>
                    <p>{{ $historial->observacion_recepcion }}.</p>
                    <div class="media align-items-center">
                      
                    </div>
                  </div>
                </li>
              </ul>
                 @endforeach
              </div>
            </div>
          </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
