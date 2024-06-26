<?php

namespace App\Http\Requests\MemberRequest;


use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class DeleteMemberRequest extends FormRequest
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
            "member_id" => "required"
        ];
    }

    public function deleteMember()
    {
        $member = User::findOrFail($this->member_id);
        $member->delete();
        return apiResponse("DELETED", 200);
    }
}
