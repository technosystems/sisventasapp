@extends('layouts.adminfront')
@section('title', 'Login')
@section('content')

<div class="auth-wrapper auth-v1 px-2 animate__animated animate__fadeIn">
    <div class="auth-inner my-1">
        <!-- Login basic -->
        <div class="card mb-0 card-top-primary card-bottom-primary card-start-primary line-end-primary">
            <div class="card-body">
                <a href="{{ url('/login') }}" class="brand-logo">
                    <img src="{{ asset('images/logo/6230aefd86ad0.png') }}" height="150" alt="">
                    
                </a>

                <h4 class="card-title mb-1">¡Bienvenidos! 👋</h4>
                <p class="card-text mb-2">Por favor, ingresa tu usuario y contraseña.</p>

               <form action="{{ url('login') }}" method="POST" autocomplete="off" class="auth-login-form mt-2"><br>
                  @csrf
                    <div class="form-group mb-1">
                        <label for="username" class="form-label">Usuario</label>
                        <input id="username" 
                                type="text" 
                                class="form-control @error('username') is-invalid @enderror" 
                                name="username" 
                               
                                autofocus 
                                placeholder="Ingresa el usuario"
                                >

                      @error('username')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                    <div class="form-group mb-1">
                      <div class="form-group">
                            <div class="d-flex justify-content-between">
                                <label for="login-password">Contraseña</label>
                               
                            </div>
                            <div class="input-group input-group-merge form-password-toggle">
                                <input  
                                name="password" 
                                type="password" 
                                
                                class="form-control form-control-merge 
                                @error('password') is-invalid @enderror" 
                                d="login-password" 
                                name="login-password"
                                 tabindex="2" 
                                 placeholder="Ingresa la contraseña" 
                                 aria-describedby="login-password" />
                                <div class="input-group-append">
                                    <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                </div>
                            </div>
                            @error('password')
                                <span class="invalid-feedback text-center" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-1">
                        
                    </div>
                    <button type="submit" class="btn blue darken-4 form-control" id="boton">
                        <i class="fas fa-sign-in-alt text-white" id="ajax-icon"></i> <span class="text-white ml-3">{{ __('Iniciar Sesión') }}</span>
                    </button>            
                </form>
            </div>
        </div>
        <!-- /Login basic -->
    </div>
 </div>

@endsection

@push('scripts')
    <script src="{{ asset('js/admin/auth/validation.js') }}"></script>
    <script src="{{ asset('js/admin/auth/login.js') }}"></script>
@endpush