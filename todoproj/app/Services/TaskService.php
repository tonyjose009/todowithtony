<?php

namespace App\Services;
use App\Models\Task;
use App\Models\Project;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Pagination\PaginationState;
//use Illuminate\Support\Facades\DB;
//use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Pagination\Paginator;

class TaskService
{

    public function list()
    {

        $tasks = Task::all();
//        return $tasks->sort();
        return  $tasks->sortByDesc('id');
    }

    public function getById(int $taskId){
        $task = Task::find($taskId);
        return $task;
    }

    public function update(int $taskId, $task){
        $taskF = Task::find($taskId);
        if($taskF){
            return $taskF->update($task);

        }else {
            return  false;
        }

    }

    public function store($taskData){
        return Task::create($taskData);
    }

    public function delete($taskId){
        $task = Task::find($taskId);
        if($task) {
            echo "Task found";
            $task->delete();
        } else {
            echo "task not found";
        }
        exit;
    }

    //other functions are pending to add

}
