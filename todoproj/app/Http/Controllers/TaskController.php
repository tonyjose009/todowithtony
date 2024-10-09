<?php

namespace App\Http\Controllers;

use App\Http\Requests\Task\GetTaskRequest;
use Illuminate\Http\Request;
use App\Http\Requests\Task\CreateTaskRequest;
use App\Http\Requests\Task\ListTasksRequest;
use App\Http\Requests\Task\ReorderTasksRequest;
use App\Http\Requests\Task\UpdateTaskRequest;
use App\Services\ProjectService;
use App\Services\TaskService;
use Illuminate\Http\JsonResponse;

class TaskController extends Controller
{
    //

    protected ?TaskService $taskService = null;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function index()
    {
        $projects = (new ProjectService())->getAll();
//        return  view('tasks.index', compact($projects));
        return  $projects;
    }



    public function list(ListTasksRequest $request)
    {
//        echo "reached till here";
//        exit;

        $tasks = $this->taskService->list($request->get('project_id'));
        return response()->json([
            'success' => true,
            'tasks' => $tasks,
            'message' => "Tasks retrieved successfully",
        ]);
        // 200
    }

    public function get(int $task_id)
    {

        $task = $this->taskService->getById($task_id);
        if($task){
            return  response()->json([
                'success' => true,
                'task' => $task,
                'message' => "task retrieved successfully",
            ]);
        } else {
            return  response()->json([
                'success' => false,
                'message' => "task not found",
            ], 404);
        }

    }

    public function store()
    {

    }


    public function update(UpdateTaskRequest $request, int $taskId)
    {
       $up = $this->taskService->update($taskId, $request->all());
       if($up) {
           return  response()->json([
               'success' => true,
               'message' => "task updated successfully",
           ]);
       } else {
           return  response()->json([
               'success' => false,
               'message' => "task not updated",
           ], 404);
       }
    }

    public function delete()
    {

    }

    public function reorder()
    {

    }
}
