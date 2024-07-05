<?php

namespace App\Http\Controllers\Api\Auth;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
     //=====User Login =====
     public function login(Request $request)
     {
         $request->validate([
             'email' => 'required|string|email',
             'password' => 'required|string',
             'color' => 'nullable|string',
         ]);

         $user = User::where('email', $request->email)->first();

         if ($user) {
             Log::info('User found', ['email' => $request->email]);

             if (Hash::check($request->password, $user->password)) {
                 Log::info('Password match successful');
                 return $this->proceedToLogin($user);
             } else {
                 Log::warning('Password mismatch', ['email' => $request->email]);
                 return apiResponse(['message' => 'Wrong Credentials'], 401);
             }
         } else {
             Log::warning('User not found', ['email' => $request->email]);
             return apiResponse(['message' => 'Wrong Credentials'], 401);
         }
     }

     private function proceedToLogin($user)
     {
         try {
             Auth::login($user);
             $tokenResult = $user->createToken('API Token');
             $token = $tokenResult->token;
             $token->expires_at = Carbon::now()->addWeeks(1);
             $token->save();

             return apiResponse([
                 'message' => 'API_MESSAGE_PASS',
                 'user' => auth()->user(),
                 'token' => $tokenResult->accessToken,
                 'token_type' => 'Bearer',
                 'expires_at' => Carbon::parse(
                     $tokenResult->token->expires_at
                 )->toDateTimeString()
             ], 201);
         } catch (\Exception $ex) {
             Log::error('Error in proceedToLogin', ['exception' => $ex->getMessage()]);
             return apiResponse(['message' => 'An error occurred'], 500);
         }
     }

       //=====User Registration =====
     public function register(Request $request)
     {
        $userInDB = User::where('email', $request->email)->first();

        if($userInDB){
            return apiResponse([ 'message' => 'A user with the email ' . $request->email . ' already exists in the system.'], 401);
        }else {
         $user =   User::create([
             'email' => $request->email,
             'name' => $request->name,
             'color' =>  $request->color ??  randomColor(),
             'password' => Hash::make( $request->password),
         ]);

         $token = $user->createToken('API Token')->accessToken;

         return apiResponse(['user' => $user, 'token' => $token], 201);
     }
    }


       //=====User Logout =====
     public function logout(Request $request)
     {
       $user = Auth::logout();
       return apiResponse(["Successfully logged out"]);
     }


     public function getCurrentUserStatus(Request $request)
     {
       $userStatus = Status::where('user_id', auth()->user()->id)->get();
       return apiResponse($userStatus, 201);
     }



}
