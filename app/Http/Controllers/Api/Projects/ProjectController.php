<?php

namespace App\Http\Controllers\Api\Projects;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest\CreateProjectRequest;
use App\Http\Requests\ProjectRequest\DeleteProjectRequest;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    //  public function getAllProjects() {
    //     $allContacts = Contact::with('messages', 'user')->get();
    //     return apiResponse([$allContacts], 201);
    // }

    public function saveOrUpdateProject(CreateProjectRequest $request)
    {
         return $request->saveOrUpdateProject($request);
    }


    public function deleteProject(DeleteProjectRequest $request)
    {
         return $request->deleteProject($request);
    }
}
