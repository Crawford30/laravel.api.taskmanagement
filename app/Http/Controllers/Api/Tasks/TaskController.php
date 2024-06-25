<?php

namespace App\Http\Controllers\Api\Tasks;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest\CreateTaskRequest;
use App\Http\Requests\TaskRequest\DeleteTaskRequest;

class TaskController extends Controller
{
    public function getAllTasks() {
        $tasks = Task::with('status', 'user')->get();
        return apiResponse($tasks, 201);
    }

    public function saveOrUpdateTask(CreateTaskRequest $request)
    {
         return $request->saveOrUpdateTask($request);
    }


    public function deleteTask(DeleteTaskRequest $request)
    {
         return $request->deleteTask($request);
    }
}
