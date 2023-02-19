<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{

    protected $task;

    public function __construct(){
        $this->task =new Student();
    }
    public function index(){
        $response['tasks'] = $this->task->all();
        return view('pages.student.index')->with($response);
    }

    public function store(Request $request){
        $this->task->create($request->all());

        return redirect()-> back();
    }

    public function delete($task_id){

        $task = $this->task->find($task_id);
        $task->delete();

        return redirect()-> back();
    }

    public function status($task_id){

        $task = $this->task->find($task_id);
        $task->status = 1;
        $task->update();

        return redirect()-> back();
    }
}
