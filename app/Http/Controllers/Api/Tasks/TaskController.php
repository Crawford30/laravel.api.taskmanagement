<?php

namespace App\Http\Controllers\Api\Tasks;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest\CreateTaskRequest;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // public function getAllContacts() {
    //     $allContacts = Contact::with('messages', 'user')->get();
    //     return apiResponse([$allContacts], 201);
    // }

    public function saveOrUpdateTask(CreateTaskRequest $request)
    {
         return $request->saveContact($request);
    }
}
