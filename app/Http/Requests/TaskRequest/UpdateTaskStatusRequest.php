<?php

namespace App\Http\Requests\TaskRequest;

use App\Models\Task;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskStatusRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'status_id' => 'required|exists:statuses,id',
            'task_id' => 'required|exists:tasks,id',
        ];
    }


    public function updateTaskStatus($request){
         $task = Task::withTrashed()->findOrFail($request->task_id);
         $task->status_id = $request->status_id;
         $task->save();

         // Get all soft-deleted tasks with related status and user
         $allTasks = Task::onlyTrashed()->with('status', 'user')->get();

         // Return the response
         return apiResponse($allTasks, 200);

        // $task = Task::findOrFail($request->task_id);
        // $task->status_id = $request->status_id;
        // $task->save();


        // $allTask =  Task::onlyTrashed()->with('status', 'user')->get();
        //  return apiResponse($allTask, 200);

    }


}
