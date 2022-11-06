<?php

use App\Http\Controllers\QuestionController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(CheckAuth::class)->group(function () {
    Route::get('/', function () {
        return 'Hello World';
    });
    Route::put('/changepassword', [UserController::class, 'changepassword']);

    Route::post('/question', [QuestionController::class, 'create']);
    Route::put('/question/{id}/upvote', [QuestionController::class, 'upvote']);
    Route::put('/question/{id}/downvote', [QuestionController::class, 'downvote']);
    Route::put('/question/{id}', [QuestionController::class, 'update']);
    Route::delete('/question/{id}', [QuestionController::class, 'destroy']);
    Route::put('/comment/{id}/upvote', [CommentController::class, 'upvote']);
    Route::put('/comment/{id}/downvote', [CommentController::class, 'downvote']);
});

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::get('/questions', [QuestionController::class, 'index']);
Route::get('/user/{id}', [UserController::class, 'show']);
Route::get('/question/{id}', [QuestionController::class, 'show']);

Route::get('/question/comments', [QuestionController::class, 'getComments']);
Route::get('/comment/comments', [QuestionController::class, 'getComments']);
