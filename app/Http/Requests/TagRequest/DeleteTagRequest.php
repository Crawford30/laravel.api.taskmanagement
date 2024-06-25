<?php

namespace App\Http\Requests\TagRequest;

use App\Models\Tag;
use Illuminate\Foundation\Http\FormRequest;

class DeleteTagRequest extends FormRequest
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
            "tag_id" => "required"
        ];
    }

    public function deleteTag()
    {
        $tag = Tag::findOrFail($this->tag_id);
        $tag->delete();
        return apiResponse("DELETED", 200);
    }
}

