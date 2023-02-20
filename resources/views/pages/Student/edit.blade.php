<form action="{{ route('student.update',$task->id) }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-lg-8">
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Enter Name" name="name" value="{{ $tasks->name }}">
            </div>
        </div>
        <div class="col-lg-4">
            <button type="submit" class="btn btn-warning">Update</button>
        </div>
    </div>
</form>