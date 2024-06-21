<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Projects\ProjectController;
use App\Http\Controllers\Api\Tags\TagController;
use App\Http\Controllers\Api\Tasks\TaskController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:passport')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'Api', 'middleware' => 'return-json'], function () {


    //======Manage Users ====
    Route::group(['prefix' => 'auth'], function () {
        Route::post('/login', [AuthController::class, 'login']);
        Route::post('/register', [AuthController::class, 'register']);
        Route::post('/logout', [AuthController::class, 'logout']);

    });


// //OPEN API ENDPOINTS FOR DEVELOPMENT

// //======Get All Messages
// Route::group(['prefix' => 'message'], function () {
//     Route::get('/all-messages', [MessageController::class, 'getAllMessages']);

// });

// //======Get All  Contacts ====
// Route::group(['prefix' => 'contact'], function () {
//     Route::get('/all-contacts', [ContactController::class, 'getAllContacts']);

// });



Route::group(['middleware' => 'auth:api'], function () {

    //======Manage Tags ====
    Route::group(['prefix' => 'tag'], function () {
        Route::post('/create-or-update-tag', [TagController::class, 'saveOrUpdateTag']);
        Route::post('/delete-tag', [TagController::class, 'deleteTag']);
    });

     //======Manage Projects ====
     Route::group(['prefix' => 'project'], function () {
        Route::post('/create-or-update-project', [ProjectController::class, 'saveOrUpdateProject']);
        Route::post('/delete-project', [ProjectController::class, 'deleteProject']);
    });

  //======Manage Tasks ====
    Route::group(['prefix' => 'task'], function () {
        Route::post('/create-or-update-task', [TaskController::class, 'saveOrUpdateTask']);
        Route::post('/delete-task', [TaskController::class, 'deleteTask']);
    });




    // //======Manage Contacts ====
    // Route::group(['prefix' => 'contact'], function () {
    //     Route::post('/save-contact', [ContactController::class, 'saveContactDetails']);

    // });

});


});
