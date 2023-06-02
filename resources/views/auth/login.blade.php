@extends('layouts.auth_master')

@section('main')
<div class="container">

<section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

        <div class="d-flex justify-content-center py-4">
          <a href="/" class="logo d-flex align-items-center w-auto">
            <img src="{{asset('images/logo.jpeg')}}" alt="">
            <span class="d-none d-lg-block">Pythonist India</span>
          </a>
        </div><!-- End Logo -->

        <div class="card mb-3">

          <div class="card-body">

            <div class="pt-4 pb-2">
              <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
              <p class="text-center small">Enter your username & password to login</p>
            </div>

            <form class="row g-3 needs-validation" method="POST" action="{{route('login')}}">
                @csrf

              <div class="col-12">
                <label for="yourUsername" class="form-label">Email</label>
                <div class="input-group has-validation">
                  <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="email" required>
                @error('email')
                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                @enderror
                </div>
              </div>

              <div class="col-12">
                <label for="yourPassword" class="form-label">Password</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" required>
                
                @error('password')
                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                @enderror
              </div>

              <div class="col-12">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                  <label class="form-check-label" for="rememberMe">Remember me</label>
                </div>
              </div>
              <div class="col-12">
                <button class="btn btn-primary w-100" type="submit">Login</button>
              </div>
              <div class="col-12">
                <!-- <p class="small mb-0">Don't have account? <a href="{{url('register')}}">Create an account</a></p> -->
                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                @endif 
            </div>
            </form>

          </div>
        </div>

        <div class="credits">
        Designed & Developed by <a href="https://pythonistindia.com/">Pythonist India</a>
        </div>

      </div>
    </div>
  </div>

</section>

</div>
@endsection
