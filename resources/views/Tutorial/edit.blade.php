@extends('layouts.master')
@section('main')

<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Update Tutorial</h5>

          <!-- Vertical Form -->
          <form class="row g-3" method="POST" action="{{route('tutorial.update', $data['tutorial']->id)}}" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="col-md-3">
              <label for="inputPassword4" class="form-label">Title</label>
              <input type="text" class="form-control" id="title" value="{{$data['tutorial']->title}}" name="title" required>
            </div>
            <div class="col-md-3">
              <label for="inputPassword4" class="form-label">Cover Image</label>
              <input type="file" class="form-control" id="cover_image" name="cover_image" >
              @php
              $cover_image=$data['tutorial']->cover_image;
              @endphp
              <img src='{{asset("images/cover_images/$cover_image")}}' alt="" width="100px" height="100px">
            </div>
            <div class="col-md-3">
              <label for="inputPassword4" class="form-label">Description</label>
              <input type="text" class="form-control" id="description" value="{{$data['tutorial']->description}}" name="description" required>
            </div>
            <div class="col-md-3">
              <label for="inputPassword4" class="form-label">Youtube Url</label>
              <input type="text" class="form-control" id="url" name="url" value="{{$data['tutorial']->url}}" required>
            </div>
            <div class="col-md-3">
              <label for="inputEmail4" class="form-label">Price</label>
              <input type="number" step="any" class="form-control" id="price" name="price" value="{{$data['tutorial']->price}}">
            </div>


            <div class="col-md-3" style="margin-top:40px">
              <button type="submit" class="btn btn-primary">Update</button>
              <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
          </form><!-- Vertical Form -->

        </div>
      </div>


    </div>
  </div>
</section>

@endsection