@extends('layouts.master')
@section('main')

<div class="pagetitle">
  <h1>Expense</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/">Home</a></li>
      <li class="breadcrumb-item">Review</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="table-responsive">
          <h5 class="card-title ms-4">All Reviews</h5>
        
          <!-- Table with stripped rows -->
          <table class="table table-bordered" id="datatable" style="width:100%">
            <thead>
              <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Tutorial</th>
                <th>Review</th>
                <th>Created At</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($data as $d)
              @php
              $encrypted_id=Crypt::encrypt($d->id)
              @endphp
              <tr>
            
                <td>{{$d->name}}</td>
                <td>{{$d->email}}</td>
                <td>{{$d->tutorial->title}}</td>
                <td>{{$d>review}}</td>
                <td>{{$d>created_at}}</td>
                <td>
                  <form action="{{route('review.destroy', $encrypted_id)}}" method="POST">
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
