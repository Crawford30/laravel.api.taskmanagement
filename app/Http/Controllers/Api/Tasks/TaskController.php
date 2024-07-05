<?php

namespace App\Http\Controllers\Api\Tasks;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest\CreateTaskRequest;
use App\Http\Requests\TaskRequest\DeleteTaskRequest;
use App\Http\Requests\TaskRequest\RestoreDeletedTaskRequest;
use App\Http\Requests\TaskRequest\UpdateTaskStatusRequest;

class TaskController extends Controller
{

    public function getAllTasks() {

        //====Get Logged User Task or Task Assigned to login user====
        $userID = auth()->id();
        $tasks = Task::where(function($query) use ($userID) {
                $query->where('user_id', $userID)
                      ->orWhereJsonContains('members', ['id' => $userID]);
            })
            ->with('status', 'user')
            ->orderBy('created_at', 'desc')
            ->get();

        return apiResponse($tasks, 200);

        // $tasks = Task::where('user_id', auth()->user()->id)
        // ->whereNull('deleted_at')
        // ->with('status', 'user')
        // ->orderBy('created_at', 'desc')
        // ->get();
        // return apiResponse($tasks, 200);
    }


    public function getDeletedTasks()
    {
        //====Only Show the tasks to the user who deleted it==
        $deletedTasks = Task::onlyTrashed()
        ->where('user_id', auth()->user()->id)
        ->with('status', 'user')
        ->orderBy('created_at', 'desc')
        ->get();
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


    public function updateTaskStatus(UpdateTaskStatusRequest $request)
    {
         return $request->updateTaskStatus($request);
    }


}
