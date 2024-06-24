<?php

namespace App\Http\Requests\TaskRequest;

use App\Models\Task;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CreateTaskRequest extends FormRequest
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
            'task_name' => 'required|string|unique:tasks,task_name|max:56',
            'description' => 'nullable|string',
            'status_id' => 'required|exists:statuses,id',
            'project_id' => 'required|exists:projects,id',
            'start_date' => 'required|string',
            'end_date' => 'required|string',
            'task_priority' => ['required', Rule::in(config('taskpriorities.task_priorities'))],
            'members' => 'nullable|array',
            'tags' => 'nullable|array',
        ];
    }



    public function saveOrUpdateTask($request){

        $data = [
         'user_id' => auth()->user()->id,
         'task_name' =>  $request->task_name,
         'description' =>  $request->description,
         'status_id' =>  $request->status_id,
         'project_id' =>  $request->project_id,
         'start_date' =>  $request->start_date,
         'end_date' =>  $request->end_date,
         'task_priority' =>  $request->task_priority,
        //  'task_color' =>  $request->task_color ??  randomColor(),
         'members' => isset($request->members) ? json_encode($request->members, true) : null,
         'tags' => isset($request->tags) ? json_encode($request->tags, true) : null,
        ];

         $taskData = Task::updateOrCreate(
            ['id' => $this->id],
             $data
        );
        // $returnData = $taskData->user()
        // ->tasks();

        $returnData = $request->user()->tasks()->get();

        return apiResponse($returnData, 201);
 }





}
