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
        return view('pages.student.index');
    }

    public function store(Request $request){
        $this->task->create($request->all());

        return redirect()-> back();
    }
}
