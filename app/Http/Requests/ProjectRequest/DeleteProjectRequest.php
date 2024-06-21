<?php

namespace App\Http\Requests\ProjectRequest;

use App\Models\Task;
use App\Models\Project;
use Illuminate\Foundation\Http\FormRequest;

class DeleteProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            "project_id" => "required"
        ];
    }

    public function deleteProject()
    {

        $project = Project::findOrFail($this->project_id);

        // Delete tasks associated with the project
        Task::where("project_id", $project->id)->delete();
        // Delete the project itself
        $project->delete();
        return response()->json("DELETED", 200);
    }
}
