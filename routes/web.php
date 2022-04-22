<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::resource('exercises', ExerciseController::class)->middleware('auth');
Route::resource('exercises.questions', QuestionController::class)->middleware('auth');
Route::resource('questions.answers', AnswerController::class)->middleware('auth');