@extends('layouts.admin')
@section('title', '')
@section('content')
<div class="row">
    <div class="col-12">
      <div class="card card-line-primary">
        <div class="card-header text-center">
          <h3>Historial del equipo</h3>
        </div>
        <div class="card-body">
          <div class="section-body">
            <h2 class="section-title text-uppercase">{{$mes}}. {{ date('Y') }}</h2><br>
            <div class="row">
              <div class="col-12">
                @foreach ($historiales as $historial)
                  {{-- expr --}}
               
                <div class="activities">
                  <div class="activity">
                    <div class="activity-icon bg-primary text-white">
                      <i class="mdi mdi-comment"></i>
                    </div>
                    <div class="activity-detail">
                      <div class="mb-2">
                        @php
                          Carbon\Carbon::setLocale('es');
                          $fecha = Carbon\Carbon::parse($historial->updated_at)
                        @endphp
                        <span class="text-job text-black">{{ $fecha }}</span>
                        <span class="bullet"></span>
                        {{ $historial->equipos->descripcion }} | {{ $historial->marca->descripcion }} | {{ $historial->modelo->descripcion }}
                      </div>
                      <p>{{ $historial->observacion_recepcion }}.</p>
                    </div>
                  </div>
                </div>
                 @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
