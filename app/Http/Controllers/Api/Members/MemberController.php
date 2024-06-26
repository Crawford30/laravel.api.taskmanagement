<?php

namespace App\Http\Controllers\Api\Members;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\MemberRequest\CreateMemberRequest;
use App\Http\Requests\MemberRequest\DeleteMemberRequest;

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


    public function deleteMember(DeleteMemberRequest $request)
    {
         return $request->deleteMember($request);
    }

}
