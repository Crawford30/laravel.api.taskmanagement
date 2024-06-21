<?php

namespace App\Http\Requests\ProjectRequest;

use App\Models\Project;
use Illuminate\Foundation\Http\FormRequest;

class CreateProjectRequest extends FormRequest
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
            'project_name' => 'required|string|unique:projects,project_name',
            'project_color' => 'nullable|string',
        ];

    }

    public function saveOrUpdateProject($request){

        $data = [
         'user_id' => auth()->user()->id,
         'project_name' =>  $request->project_name,
         'project_color' =>  $request->project_color ??  randomColor(),
        ];

         $tagData = Project::updateOrCreate(
            ['id' => $this->id],
             $data
        );
        return apiResponse($tagData, 201);
 }

}
