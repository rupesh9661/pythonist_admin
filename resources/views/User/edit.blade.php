@extends('layouts.master')
@section('main')

<section class="section">
  <div class="row">
    <div class="col-md-12">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Update User Data</h5>

          <!-- Vertical Form -->
          <form class="row g-3" method="POST" action="{{route('user.update',$data['user']->id)}}" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="col-md-3">
              <label for="inputNanme4" class="form-label"> Name</label>
              <input type="text" class="form-control" value="{{$data['user']->name}}" id="name" name="name" required>
            </div>
           
            <div class="col-md-3">
              <label for="inputPassword4" class="form-label">Phone</label>
              <input type="text" class="form-control" value="{{$data['user']->phone}}" id="phone" name="phone" required>
            </div>
            <div class="col-md-3">
              <label for="inputEmail4" class="form-label">Email</label>
              <input type="email" class="form-control" value="{{$data['user']->email}}" id="email" name="email" required>
            </div>
            <div class="col-md-3">
              <label for="inputPassword4" class="form-label">Role</label>
              <select name="role" id="role" class="form-control" required>
                <option value="">Select</option>
                @foreach($data['role'] as $role)
                @if($data['user']->role==$role)
                <option value="{{$role}}" selected>{{$role}}</option>
                @else
                <option value="{{$role}}">{{$role}}</option>
                @endif
                @endforeach
              </select>
            </div>
            <div class="col-md-3">
              <label for="inputAddress" class="form-label">Password</label>
              <input type="password"  class="form-control"  id="password" name="password" >
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