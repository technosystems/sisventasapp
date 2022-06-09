@extends('layouts.admin')
@section('title', 'ORDEN DE SERVICIO')
@section('content')
<div class="row">
    <div class="col-12">
      <div class="card card-line-primary">
        <div class="card-header">
          <h4>Guardar imágenes del equipo</h4>
        </div>        
        <div class="card-body">
           <form action="{{url('ordenservicios/fotos/guardar',$ordenes->id)}}" method="POST" enctype="multipart/form-data" autocomplete="off">
          {{ csrf_field() }}
          <div class="col-lg-12">
          <div class="row">
              <div class="col-sm-4">
                  <img src="{{asset('img/default.jpg')}}" id="blah" style="width:100%">
                  <input type="file" id="imgInp" name="poster" class="form-control mt-4 {{ $errors->has('poster') ? ' is-invalid' : '' }}">
                  @if ($errors->has('poster'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('poster') }}</strong>
                      </span>
                  @endif
                  <center><button type="submit" class="btn btn-md blue darken-4 text-white form-control mt-4" style="background-color: #69e781;">Registrar</button></center>
              </div>
              <div class="col-sm-8" >
                <div class="row">
                                         <tr>
                  <div id="aniimated-thumbnials" class="list-unstyled row clearfix">
                  <table class="table table-striped table-hover" style="width:100%;">
                    
                    <tbody>
                      <tr>
                       @foreach ($fotos as $foto)
                          <td>
                          <a href="{{asset('images/equipos/'.$foto->foto) }}" data-sub-html="Demo Description">
                        <img class="img-responsive thumbnail" height="150"  src="{{asset('images/equipos/'.$foto->foto) }}" alt="">
                        </td>
                       @endforeach
                      </tr>
                    </tbody>
                  </table>
                   </div>
                   
                </div>
                
                      @php
                          $orden = App\Models\FotoEquipo::where('orden_servicio_id',$ordenes->id)
                          ->selectRaw('foto_equipos.orden_servicio_id, count(*) as foto')
                          ->first()
                      @endphp
                      <div class="progress mb-3">
                      @if ($orden->foto == 1)
                          <div class="progress-bar" role="progressbar" data-width="20%" aria-valuenow="20" aria-valuemin="0"
                        aria-valuemax="100">20%</div>
                     @elseif ($orden->foto == 2)
                          <div class="progress-bar" role="progressbar" data-width="40%" aria-valuenow="40" aria-valuemin="0"
                        aria-valuemax="100">40%</div>
                     @elseif ($orden->foto == 3)
                          <div class="progress-bar" role="progressbar" data-width="60%" aria-valuenow="60" aria-valuemin="0"
                        aria-valuemax="100">60%</div>

                    @elseif ($orden->foto == 4)
                          <div class="progress-bar" role="progressbar" data-width="80%" aria-valuenow="80" aria-valuemin="0"
                        aria-valuemax="100">80%</div>
                    @elseif($orden->foto == 5)
                    <div class="progress-bar" role="progressbar" data-width="100%" aria-valuenow="100" aria-valuemin="0"
                        aria-valuemax="100">100%</div>
                    @else
                    <div class="progress-bar" role="progressbar" data-width="0%" aria-valuenow="0" aria-valuemin="0"
                        aria-valuemax="0">0%</div>
                      @endif
                    </div>
               
                   
              </div>
            </div>
          </form>                          
        </div>
      </div>
    </div>
  </div>

@endsection
@push('scripts')
  <script>
        window.onload = function(){
           var loader = document.getElementById('loader');
           var contenido = document.getElementById('contenido');

            contenido.style.display = 'block';
 
            $('#loader').remove();
       }

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function(e) {
                $('#blah').attr('src', e.target.result);
                }
                
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInp").change(function() {
            readURL(this);
        });


        $("input[data-type='currency']").on({
            keyup: function() {
            formatCurrency($(this));
            },
            blur: function() { 
            formatCurrency($(this), "blur");
            }
        });


        function formatNumber(n) {
        return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
        }


        function formatCurrency(input, blur) {
            var input_val = input.val();
            
            // don't validate empty input
            if (input_val === "") { return; }
            
            // original length
            var original_len = input_val.length;

            // initial caret position 
            var caret_pos = input.prop("selectionStart");
                
            // check for decimal
            if (input_val.indexOf(".") >= 0) {

                // get position of first decimal
                // this prevents multiple decimals from
                // being entered
                var decimal_pos = input_val.indexOf(".");

                // split number by decimal point
                var left_side = input_val.substring(0, decimal_pos);
                var right_side = input_val.substring(decimal_pos);

                // add commas to left side of number
                left_side = formatNumber(left_side);

                // validate right side
                right_side = formatNumber(right_side);
                
                // On blur make sure 2 numbers after decimal
                if (blur === "blur") {
                right_side += "00";
                }
                
                // Limit decimal to only 2 digits
                right_side = right_side.substring(0, 2);

                // join number by .
               

            } else {
                // no decimal entered
                // add commas to number
                // remove all non-digits
                input_val = formatNumber(input_val);
                
                
                // final formatting
                if (blur === "blur") {
                input_val += ".00";
                }
            }
            
            // send updated string to input
            input.val(input_val);

            var updated_len = input_val.length;
            caret_pos = updated_len - original_len + caret_pos;
            input[0].setSelectionRange(caret_pos, caret_pos);
        }

    </script>
  <script>
$(function () {
    $('#aniimated-thumbnials').lightGallery({
        thumbnail: true,
        selector: 'a'
    });
});
    </script>
@endpush
