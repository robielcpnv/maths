<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/exercises', 'App\Http\Controllers\Api\ExerciseController@index');
Route::get('/operations', 'App\Http\Controllers\Api\OperationController@index');
Route::get('questions/{question}/answers/{answer}', 'App\Http\Controllers\Api\AnswerController@show');
Route::get('exercises/{exercise}/questions/{question}', 'App\Http\Controllers\Api\QuestionController@show');
Route::get('/exercises/{exercise}', 'App\Http\Controllers\Api\ExerciseController@show');
