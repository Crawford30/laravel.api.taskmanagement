<?php

namespace App\Http\Requests\CategoryReqeuest;

use App\Models\Category;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CreateCategoryRequest extends FormRequest
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

            'category_name' => [
                'required',
                'string',
                'max:56',
                Rule::unique('categories')->ignore($this->id),
            ],
            'category_color' => 'nullable|string',
        ];

    }

    public function saveOrUpdateCategory($request){

        $data = [
         'user_id' => auth()->user()->id,
         'category_name' =>  $request->category_name,
         'category_color' =>  $request->category_color ??  randomColor(),
        ];

         $categoryData = Category::updateOrCreate(
            ['id' => $this->id],
             $data
        );
        return apiResponse($categoryData, 201);
 }

}
