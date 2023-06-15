<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Forum\CommentsController;
use App\Http\Controllers\Forum\TopicController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/topics/{topic}/comments/{comment}', [CommentsController::class, 'show']);
Route::post('/topics/{topic}/comments',[CommentsController::class, 'store'])->withoutMiddleware(['web', 'csrf']);
Route::delete('/topics/{topic}/comments/{comment}', [CommentsController::class, 'destroy'])->withoutMiddleware(['web', 'csrf']);
Route::put('/topics/{topic}/comments/{comment}', [CommentsController::class, 'update'])->withoutMiddleware(['web', 'csrf']);


Route::get('/topics', [TopicController::class, 'index']);
Route::get('/topics/{id}', [TopicController::class, 'show']);
Route::post('/topics', [TopicController::class, 'store'])->withoutMiddleware(['web', 'csrf']);
Route::put('/topics/{topic}', [TopicController::class, 'update'])->withoutMiddleware(['web', 'csrf']);
Route::delete('/topics/{topic}', [TopicController::class, 'destroy'])->withoutMiddleware(['web', 'csrf']);