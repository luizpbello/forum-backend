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

Route::get('/comments/{id}', [CommentsController::class, 'show']);
Route::get('/topics', [TopicController::class, 'index']);
