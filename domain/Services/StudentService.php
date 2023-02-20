<?php

namespace domain\Services;

use App\Models\Student;

class StudentService{

    protected $task;

    public function __construct(){
        $this->task = new Student();
    }

    public function get($task_id){
        dd($task_id);
        return $this->task->get($task_id);
        
    }
    public function all(){
        return $this->task->all();
     }

    public function store($data){
        $this->task->create($data);
    }

    public function delete($task_id){

        $task = $this->task->find($task_id);
        $task->delete();

    }

    public function status($task_id){

        $task = $this->task->find($task_id);
        $task->status = 1;
        $task->update();

    }

    public function update(array $data,$task_id){
        $task = $this->task->find($task_id);
        $task->update($this->edit($task,$data));
    }

    public function edit(Student $task,$data){
        return array_merge($task->toArray(),$data);
    }
}