@extends('layouts.master')
@section('main')

<div class="pagetitle">
  <h1>Users</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/">Home</a></li>
      <li class="breadcrumb-item">Users</li>
    
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class=" table-responsive">
          <h5 class="card-title">All Users</h5>

          <!-- Table with stripped rows -->
          <table class="table table-bordered" id="datatable" style="width:100%">
            <thead>
              <tr>
                <th >Id</th>
                <th >Name</th>
                <th >Phone</th>
                <th >Email</th>
                <th >Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($users as $user)
              @php
              $encrypted_id=Crypt::encrypt($user->id)
              @endphp
              <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->phone}}</td>
                <td>{{$user->email}}</td>
                <td>
                  <a href="{{route('user.edit', $encrypted_id)}}" title="edit"><i class="ri-pencil-fill"></i></a>
                <form action="{{route('user.destroy', $encrypted_id)}}" method="POST">
                  @method('delete')
                  @csrf
                  <button type="submit"><i class="ri-delete-bin-line text-danger" title="delete"></i></button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <!-- End Table with stripped rows -->

        </div>
      </div>

    </div>
  </div>
</section>



@endsection