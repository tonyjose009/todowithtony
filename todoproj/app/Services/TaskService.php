<?php

namespace App\Services;
use App\Models\Task;
use App\Models\Project;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Pagination\PaginationState;
//use Illuminate\Support\Facades\DB;
//use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Pagination\Paginator;
use function PHPUnit\Framework\isEmpty;

class TaskService
{

    public function list()
    {

        $tasks = Task::all();
//        return $tasks->sort();
        return  $tasks->sortByDesc('priority');
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
        $last_priority_id = Task::latest('priority')->where('project_id', $taskData['project_id'])->first()->priority;
        $taskData['priority'] = $last_priority_id+1;
        return Task::create($taskData);
    }

    public function delete($taskId){
        $task = Task::find($taskId);

//        echo Task::where('project_id', $task->project_id)
//            ->where('priority', '>', $task->priority)->toRawSql();
//        exit;

        if($task) {
            $task->delete();
        } else {
            return false;
        }


        Task::where('project_id', $task->project_id)
            ->where('priority', '>', $task->priority)->update(['priority' => DB::raw('priority-1')]);

        return true;

    }


    public function reOrder($project_id, $task_id, $start, $end){

    }

    //other functions are pending to add

}
