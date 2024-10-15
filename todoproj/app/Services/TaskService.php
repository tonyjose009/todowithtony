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
        return Task::create($taskData);
    }

    public function delete($taskId){
        $task = Task::find($taskId);

//        print_r($task->priority);
//        echo "pro=".$task->project_id;exit;
        if($task) {
           return $task->delete();
        } else {
            return false;
        }




//        $tasks = Task::where('project_id', $task->project_id)->get();

//        echo "<pre>";
//        print_r($tasks);
//        exit;
        if ($tasks->isEmpty()) {
            return;
        }

//
//        $when_then = "";
//        $where_in = "";
//        foreach ($tasks as $task) {
//            $when_then .= "WHEN ".$task->id
//                ." THEN ".($task->priority - 1)." ";
//            $where_in .= $task->id.",";
//        }
//
//        $table_name = (new Task())->getTable();
//        $bulk_update_query = "UPDATE `".$table_name
//            ."` SET `priority` = (CASE `id` ".$when_then."END)"
//            ." WHERE `id` IN(".substr($where_in, 0, -1).");";
//
//        \DB::enableQueryLog(); // Enable query log
//        dd(\DB::getQueryLog()); //
//
//        exit;


//        echo $bulk_update_query;exit;
//        DB::update($bulk_update_query);

    }


    public function reOrder($project_id, $task_id, $start, $end){

    }

    //other functions are pending to add

}
