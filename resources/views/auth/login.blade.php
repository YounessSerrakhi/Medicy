<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href={{ asset("./css/bootstrap.min.css")}}>
    <title>{{ __('Login') }}</title>
</head>
<body>
    <div class="vh-100 d-flex justify-content-center align-items-center">
        <div class="container">
          <div class="row d-flex justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
              <div class="border border-3 border-primary"></div>
              <div class="card bg-white shadow-lg">
                <div class="card-body p-5">
                  <form class="mb-3 mt-md-4" method="POST" action="{{ route('login') }}">
                    @csrf
                    <h2 class="fw-bold mb-2 text-uppercase ">Medicy</h2>
                    <p class=" mb-5">Please enter your login and password!</p>
                    <div class="mb-3">
                      <label for="email" class="form-label ">{{ __('Email Address') }}</label>
                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                    </div>
                    <div class="mb-3">
                      <label for="password" class="form-label ">Password</label>
                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                    </div>
                    <div class="mb-3">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
    
                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>
                    <p>
                        @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                        @endif
                     </p>
                    <div class="d-grid">
                      <button class="btn btn-outline-dark" type="submit">{{ __('Login') }}</button>
                    </div>
                  </form>
                  @if (Route::has('register'))
                  <div>
                    <p class="mb-0  text-center">Don't have an account? <a href="{{ route('register') }}"
                        class="text-primary fw-bold">{{ __('Register') }}</a>
                    </p>
                  </div>
                  @endif
      
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</body>
</html>