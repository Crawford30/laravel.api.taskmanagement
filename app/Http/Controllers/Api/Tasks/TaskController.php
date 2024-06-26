<?php

namespace App\Http\Controllers\Api\Tasks;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest\CreateTaskRequest;
use App\Http\Requests\TaskRequest\DeleteTaskRequest;
use App\Http\Requests\TaskRequest\RestoreDeletedTaskRequest;

class TaskController extends Controller
{

    public function getAllTasks() {
        $tasks = Task::whereNull('deleted_at')->with('status', 'user')->get();
        return apiResponse($tasks, 200);

    }


public function getDeletedTasks()
{
    $deletedTasks = Task::onlyTrashed()->with('status', 'user')->get();
    return apiResponse($deletedTasks, 200);
}

    public function saveOrUpdateTask(CreateTaskRequest $request)
    {
         return $request->saveOrUpdateTask($request);
    }


    public function deleteTask(DeleteTaskRequest $request)
    {
         return $request->deleteTask($request);
    }

    public function restoreDeletedTask(RestoreDeletedTaskRequest $request)
    {
         return $request->restoreDeletedTask($request);
    }
}
