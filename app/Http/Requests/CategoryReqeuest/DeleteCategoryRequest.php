<?php

namespace App\Http\Requests\CategoryReqeuest;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;


class DeleteCategoryRequest extends FormRequest
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
            "category_id" => "required"
        ];
    }

    public function deleteCategory()
    {
        $category = Category::findOrFail($this->category_id);
        $category->delete();
        return apiResponse("DELETED", 200);
    }
}
