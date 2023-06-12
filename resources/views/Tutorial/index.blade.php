@extends('layouts.master')
@section('main')

<div class="pagetitle">
  <h1>Tutorial</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/">Home</a></li>
      <li class="breadcrumb-item">Tutorial</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="table-responsive">
          <h5 class="card-title ms-4">All Tutorials</h5>
        
          <!-- Table with stripped rows -->
          <table class="table table-bordered" id="datatable" style="width:100%">
            <thead>
              <tr>
                <th>Title</th>
                <th>Price</th>
                <th>Url</th>
                <th>Description</th>
                <th>Image</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($tutorial as $data)
              @php
              $encrypted_id=Crypt::encrypt($data->id)
              @endphp
              <tr>
            
                <td>{{$data->title}}</td>
                <td>{{$data->price}}</td>
                <td>{{$data->url}}</td>
                <td>{{$data->description}}</td>
                <td><img src='{{asset("images/cover_images/$data->cover_image")}}' alt="no image"></td>
                <td>
                  <a href="{{route('tutorial.edit', $encrypted_id)}}" title="edit"><i class="ri-pencil-fill"></i></a>
                  <form action="{{route('tutorial.destroy', $encrypted_id)}}" method="POST">
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
