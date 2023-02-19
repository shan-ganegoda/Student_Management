@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="title">Student Management</h1>
            </div>
            <div class="col-lg-12 mt-5">
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
            <div class="col-lg-12 mt-5">
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Age</th>
                        <th scope="col">Image</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                     @foreach ($tasks as $key =>$task)
                     <tr>
                        <th scope="row">{{ ++$key }}</th>
                        <td>{{ $task->name }}</td>
                        <td>{{ $task->age }}</td>
                        <td>{{ $task->image }}</td>
                        <td>
                            @if ($task->status == 0)
                                <span class="badge bg-warning">Inactive</span>
                            @else
                                <span class="badge bg-success">Active</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('student.delete', $task->id) }}" class="btn btn-danger"><i class="bi bi-trash3-fill"></i></a>
                            <a href="{{ route('student.status', $task->id) }}" class="btn btn-success"><i class="bi bi-check-circle-fill"></i></a>
                        </td>
                      </tr>
                     @endforeach
                    </tbody>
                  </table>
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
