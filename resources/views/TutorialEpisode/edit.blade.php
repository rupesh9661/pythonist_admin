@extends('layouts.master')
@section('main')

<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Update Tutorial Video</h5>

          <!-- Vertical Form -->
          <form class="row g-3" method="POST" action="{{route('tutorialepisode.update', $data['tutorialepisode']->id)}}" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="col-md-3">
              <label for="inputPassword4" class="form-label">Title</label>
              <input type="text" class="form-control" id="title" value="{{$data['tutorialepisode']->title}}" name="title" required>
            </div>
            <div class="col-md-3">
              <label for="inputPassword4" class="form-label">Tutorial</label>
              <select name="tutorial" id="tutorial" class="form-control">
                <option value="">Select Tutorial</option>
                @foreach($data['tutorial'] as $t)
                @if($data['tutorialepisode']->tutorial_id==$t->id)
                <option selected value="{{$t->id}}">{{$t->title}}</option>
                @else
                <option value="{{$t->id}}">{{$t->title}}</option>
                @endif
                @endforeach
              </select>
            </div>
            <div class="col-md-3">
              <label for="inputPassword4" class="form-label">Description</label>
              <input type="text" class="form-control" id="description" value="{{$data['tutorialepisode']->description}}" name="description" required>
            </div>
            <div class="col-md-3">
              <label for="inputPassword4" class="form-label">Youtube Url</label>
              <input type="text" class="form-control" id="url" name="url" value="{{$data['tutorialepisode']->url}}" required>
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