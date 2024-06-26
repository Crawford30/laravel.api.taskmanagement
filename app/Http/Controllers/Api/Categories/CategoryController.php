<?php

namespace App\Http\Controllers\Api\Categories;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryReqeuest\CreateCategoryRequest;
use App\Http\Requests\CategoryReqeuest\DeleteCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getAllCategories() {
        $allCat = Category::orderBy('created_at', 'desc')->get();
        return apiResponse($allCat, 201);
    }

    public function saveOrUpdateCategory(CreateCategoryRequest $request)
    {
         return $request->saveOrUpdateCategory($request);
    }


    public function deleteCategory(DeleteCategoryRequest $request)
    {
         return $request->deleteCategory($request);
    }
}
