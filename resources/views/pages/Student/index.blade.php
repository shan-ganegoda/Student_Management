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
                            <a href="#" class="btn btn-warning" onclick="updatestudentModel({{ $task->id }})"><i class="bi bi-pencil-fill"></i></a>
                        </td>
                      </tr>
                     @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
<!-- Modal -->
<div class="modal fade" id="updateStudent" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Update Student</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="updateStudentbody">
          <h1>Student</h1>
        </div>
      </div>
    </div>
  </div>
<!-- Modal -->
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

@push('js')
  <script>
    function updatestudentModel($task_id){
      var data = {
        task_id: task_id,
      };
      $.ajax({
        url:"{{  route('student.edit') }}",
        headers: {
          'X-CSRF-Token':$('meta[name="csrf_token"]').attr('content');
        },
        type: 'GET',
        dataType: '',
        data: data
        success: function(response){
          $('#updateStudent').modal('show');
          $('#updateStudentbody').html(response);
        }
      });
    }
  </script>
@endpush
