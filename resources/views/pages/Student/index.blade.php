@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="title">Student Management</h1>
            </div>
            <div class="col-lg-12">
                <form action="{{ route('student.store') }}" method="post" enctype="multipart/form">
                    @csrf
                    <div class="mb-3">
                      <label for="nameinput" class="form-label">Name</label>
                      <input type="text" class="form-control" id="nameinput" name="name" aria-describedby="emailHelp">
                      <div id="ErrMsg" class="form-text"></div>
                    </div>
                    <div class="mb-3">
                      <label for="ageinput" class="form-label">Age</label>
                      <input type="text" class="form-control" name="age" id="ageinput">
                    </div>
                    <div class="mb-3">
                        <label for="imageinput" class="form-label">Image</label>
                        <input type="file" class="form-control" name="image" id="imageinput">
                      </div>
                      <div class="mb-3">
                      <label for="statusinput" class="form-label">Staus</label>
                      <input type="text" class="form-control" name="status" id="statusinput">
                    </div>
                    <button type="submit" class="btn btn-primary">ADD</button>
                  </form>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <style>
        .title {
            text-align: center;
            font-size: 3rem;
            color: darkslateblue;
        }
    </style>
@endpush
