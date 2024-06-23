<?php

namespace App\Http\Controllers\Api\Members;

use App\Http\Controllers\Controller;
use App\Http\Requests\Members\CreateMemberRequest;
use App\Models\User;
use Illuminate\Http\Request;

class MemberController extends Controller
{


    public function getAllMembers() {
        $allMembers = User::orderBy('created_at', 'desc')->get();
        return apiResponse($allMembers, 201);
    }

    public function saveOrUpdateMember(CreateMemberRequest $request)
    {
         return $request->registerMember($request);
    }

}
