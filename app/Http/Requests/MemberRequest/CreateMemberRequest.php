<?php

namespace App\Http\Requests\MemberRequest;


use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\AccountCreatedEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Http\FormRequest;

class CreateMemberRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|string|email',
            'color' => 'nullable|string',
        ];
    }



      //=====User Registration =====
      public function registerMember($request)
      {

        $password = "taskManage#" . mt_rand(1000, 9999);

          $user =   User::create([
              'email' => $request->email,
              'name' => $request->name,
              'password' => bcrypt($password),
              'color' =>  $request->color ??  randomColor(),
          ]);

          $token = $user->createToken('API Token')->accessToken;


          //Send Email To The User With Generated PAssword
          Mail::to($user->email)->send(new AccountCreatedEmail($user->name, $user->email, $password));

          return apiResponse(['user' => $user, 'token' => $token], 201);
      }
}
