@extends('layouts.master')
@section('main')

<section class="section">
  <div class="row">
    <div class="col-md-12">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Add New User</h5>

          <!-- Vertical Form -->
          <form class="row g-3" method="POST" action="{{route('user.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="col-md-4">
              <label for="inputNanme4" class="form-label">Name</label>
              <input type="text" class="form-control" id="name" name="name" required>
            </div>
          
            <div class="col-md-4">
              <label for="inputPassword4" class="form-label">Phone</label>
              <input type="number" class="form-control" id="phone" name="phone"  required>
            </div>
            <div class="col-md-4">
              <label for="inputEmail4" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="col-md-4">
              <label for="inputEmail4" class="form-label">Role</label>
              <select name="role" id="role" class="form-control" required>
                <option value="">Select</option>
                @foreach($data['role'] as $role)
                <option value="{{$role}}">{{$role}}</option>
                @endforeach
              </select>
            </div>
           
            <div class="col-md-4">
              <label for="inputAddress" class="form-label">Password</label>
              <input type="password" class="form-control" placeholder="" id="password" name="password" required>
            </div>
            <div class="col-md-4">
              <label for="inputAddress" class="form-label">Confirm Password</label>
              <input type="text" class="form-control" placeholder="" id="confirm_password" name="confirm_password" required>
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
              <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
          </form><!-- Vertical Form -->

        </div>
      </div>


    </div>
  </div>
</section>

@endsection