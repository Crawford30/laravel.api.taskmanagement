<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Categories\CategoryController;
use App\Http\Controllers\Api\Members\MemberController;
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
        Route::post('/v1/login', [AuthController::class, 'login']);
        Route::post('/v1/register', [AuthController::class, 'register']);
        Route::post('/v1/logout', [AuthController::class, 'logout']);
    });




Route::group(['middleware' => 'auth:api'], function () {

    //======Manage Tags ====
    Route::group(['prefix' => 'tag'], function () {
        Route::get('/v1/list-all-tags', [TagController::class, 'getAllTags']);
        Route::post('/v1/create-or-update-tag', [TagController::class, 'saveOrUpdateTag']);
        Route::post('/v1/delete-tag', [TagController::class, 'deleteTag']);
    });

     //======Manage Projects ====
     Route::group(['prefix' => 'project'], function () {
        Route::get('/v1/list-all-projects', [ProjectController::class, 'getAllProjects']);
        Route::post('/v1/create-or-update-project', [ProjectController::class, 'saveOrUpdateProject']);
        Route::post('/v1/delete-project', [ProjectController::class, 'deleteProject']);
    });

  //======Manage Tasks ====
    Route::group(['prefix' => 'task'], function () {
        Route::get('/v1/list-all-tasks', [TaskController::class, 'getAllTasks']);
        Route::post('/v1/create-or-update-task', [TaskController::class, 'saveOrUpdateTask']);
        Route::post('/v1/delete-task', [TaskController::class, 'deleteTask']);
    });


     //======Manage Members ====
     Route::group(['prefix' => 'member'], function () {
        Route::get('/v1/list-all-members', [MemberController::class, 'getAllMembers']);
        Route::post('/v1/create-or-update-member', [MemberController::class, 'saveOrUpdateMember']);
        Route::post('/v1/delete-member', [MemberController::class, 'deleteMember']);
    });


     //======Manage Categories ====
     Route::group(['prefix' => 'category'], function () {
        Route::get('/v1/list-all-categories', [CategoryController::class, 'getAllCategories']);
        Route::post('/v1/create-or-update-category', [CategoryController::class, 'saveOrUpdateCategory']);
        Route::post('/v1/delete-category', [CategoryController::class, 'deleteCategory']);
    });




     //======Manage Logged In User Statuses ====
     Route::group(['prefix' => 'status'], function () {
        Route::get('/v1/list-current-user-task-status', [AuthController::class, 'getCurrentUserStatus']);
    });




});


});
