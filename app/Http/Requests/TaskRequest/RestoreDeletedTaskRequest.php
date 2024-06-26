<?php

namespace App\Http\Requests\TaskRequest;

use App\Models\Task;
use Illuminate\Foundation\Http\FormRequest;

class RestoreDeletedTaskRequest extends FormRequest
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
    public function rules()
    {
        return [
            "task_id" => "required"
        ];
    }

    public function restoreDeletedTask()
    {
        $deletedTask = Task::withTrashed()->find($this->task_id);
        if ($deletedTask) {
            $deletedTask->restore();
            return apiResponse("Task restored successfully", 201);
        } else {
            return apiResponse("Task not found or restored already", 404);
        }

    }
}

