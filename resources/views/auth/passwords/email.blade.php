@extends('layouts.auth_master')

@section('main')

<div class="container">

<section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

        <div class="d-flex justify-content-center py-4">
          <a href="/" class="logo d-flex align-items-center w-auto">
            <img src="{{asset('images/logo.png')}}" alt="">
            <span class="d-none d-lg-block">Royal Techno School</span>
          </a>
        </div><!-- End Logo -->

        <div class="card mb-3">

          <div class="card-body">
          @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
         @endif
            <div class="pt-4 pb-2">
              <h5 class="card-title text-center pb-0 fs-4">Reset Password</h5>
            </div>

            <form class="row g-3 needs-validation" method="POST" action="{{route('password.email')}}">
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
                <button class="btn btn-primary w-100" type="submit">Send Reset Link</button>
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
