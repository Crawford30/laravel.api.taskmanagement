<?php

namespace App\Http\Controllers\Api\Tags;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest\CreateTagRequest;
use App\Http\Requests\TagRequest\DeleteTagRequest;
use Illuminate\Http\Request;

class TagController extends Controller
{
     //  public function getAllTags() {
    //     $allContacts = Contact::with('messages', 'user')->get();
    //     return apiResponse([$allContacts], 201);
    // }

    public function saveOrUpdateTag(CreateTagRequest $request)
    {
         return $request->saveOrUpdateTag($request);
    }


    public function deleteProject(DeleteTagRequest $request)
    {
         return $request->deleteTag($request);
    }
}
