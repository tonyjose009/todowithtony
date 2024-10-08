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

    public function list(int $projectId)
    {

        $tasks = Task::all();
        return  $tasks->sortByDesc('priority');
    }

    public function getById(int $projectId){
        $task = Task::find($projectId);
        return $task;
    }

    //other functions are pending to add

}
