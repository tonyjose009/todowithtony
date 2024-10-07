<?php

namespace App\Services;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Pagination\PaginationState;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Pagination\Paginator;

class TaskService
{

    public function list(int $projectId){

        $tasks = Task::all()->where('project_id', $projectId)->get();
        return $tasks->orderBy('priority', 'desc');
    }

    public function getById(int $projectId){
        $task = Task::find($projectId);
        return $task;
    }

    //other functions are pending to add

}
