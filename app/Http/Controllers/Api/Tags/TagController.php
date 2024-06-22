<?php

namespace App\Http\Controllers\Api\Tags;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest\CreateTagRequest;
use App\Http\Requests\TagRequest\DeleteTagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function getAllTags() {

        $allTags = Tag::orderBy('created_at', 'desc')->get();
        return apiResponse($allTags, 201);
    }


    public function saveOrUpdateTag(CreateTagRequest $request)
    {
         return $request->saveOrUpdateTag($request);
    }


    public function deleteProject(DeleteTagRequest $request)
    {
         return $request->deleteTag($request);
    }
}
