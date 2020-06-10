@extends('layouts.app4')
<div class="container-login">
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Designaciones</h1>
                  </div>
                  <form class="user" method="POST" action="{{ route('login') }}">
				  	@csrf
                    <div class="form-group">
                      <input id="email" type="email" class="form-control" aria-describedby="emailHelp"
						placeholder="Ingrese Usuario o Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
						@error('email')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
                    </div>
                    <div class="form-group">
					  <input placeholder="contraseña" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
					  	@error('password')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small" style="line-height: 1.5rem;">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Recordarme
                          </label>
                      </div>
                    </div>
                    <div class="form-group">
						<button type="submit" class="btn btn-primary btn-block">
							{{ __('Ingresar') }}
						</button>
						@if (Route::has('password.request'))
							<a class="btn btn-link" href="{{ route('password.request') }}">
								{{ __('Forgot Your Password?') }}
							</a>
						@endif
                    </div>
                    
                  </form>
                  <hr>
                  <div class="text-center">
                  </div>
                  <div class="text-center">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
