<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
     //=====User Login =====
     public function login(Request $request)
     {
         $request->validate([
             'email' => 'required|string|email',
             'password' => 'required|string',
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

         $user =   User::create([
             'email' => $request->email,
             'name' => $request->name,
             'password' => Hash::make( $request->password),
         ]);

         $token = $user->createToken('API Token')->accessToken;
         return apiResponse(['user' => $user, 'token' => $token], 201);
     }


       //=====User Logout =====
     public function logout(Request $request)
     {
       $user = Auth::logout();
       return apiResponse(["Successfully logged out"]);
     }
}
