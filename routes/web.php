<?php

use Illuminate\Support\Facades\Route;
// use app\Http\Image2Question;
use App\Http\Controllers\Image2QuestionController;
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

// Route::post('/generateQuestions', [Image2Question::class, 'generateQuestions']);
Route::post('generateQuestions', [Image2QuestionController::class,'generateQuestions'])->name('generateQuestions');
