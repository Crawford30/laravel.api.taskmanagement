<?php

namespace App\Http\Requests\TaskRequest;

use App\Models\Task;
use Illuminate\Foundation\Http\FormRequest;

class DeleteTaskRequest extends FormRequest
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

    public function deleteTask()
    {
        $task = Task::findOrFail($this->task_id);
        $task->delete();
        return apiResponse("DELETED", 200);
    }
}
