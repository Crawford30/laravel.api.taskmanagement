<?php

namespace App\Http\Requests\TagRequest;

use App\Models\Tag;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CreateTagRequest extends FormRequest
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

            'tag_name' => [
                'required',
                'string',
                'max:56',
                Rule::unique('tags')->ignore($this->id),
            ],
            // 'tag_name' => 'required|string|unique:tags,tag_name',
            'tag_color' => 'nullable|string',
        ];

    }

    public function saveOrUpdateTag($request){

        $data = [
         'user_id' => auth()->user()->id,
         'tag_name' =>  $request->tag_name,
         'tag_color' =>  $request->tag_color ??  randomColor(),
        ];

         $tagData = Tag::updateOrCreate(
            ['id' => $this->id],
             $data
        );
        return apiResponse($tagData, 201);
 }


}
