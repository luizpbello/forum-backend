<?php

use App\Http\Controllers\Forum\CommentsController;
use App\Http\Controllers\Forum\TopicController;
use App\Http\Controllers\ProfileController;
use App\Models\Topic;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


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
    $topics = Topic::with('comment')->get();
    return Inertia::render('Home', ['topics' => $topics]);
})->middleware(['auth', 'verified'])->name('Home');

Route::get('/comments/new/{topic}', function (Topic $topic) {
    return Inertia::render('AddComment', ['topic' => $topic]);
})->middleware(['auth', 'verified'])->name('AddComment');


Route::middleware('auth')->group(function () {
  
Route::get('/topics/{topicId}/comments/{commentId}', [CommentsController::class, 'show'])->name('comments.show');
Route::delete('/topics/{topic}/comments/{comment}', [CommentsController::class, 'destroy'])->withoutMiddleware(['web', 'csrf']);
Route::put('/topics/{topic}/comments/{comment}', [CommentsController::class, 'update'])->withoutMiddleware(['web', 'csrf']);
Route::get('/topics/{topic}/comments/{create}', [CommentsController::class, 'create'])->name('comments.create');
 Route::post('/topics/{topic}/comments', [CommentsController::class, 'store'])->name('comments.store');

Route::get('/topics/{id}', [TopicController::class, 'show'])->name('topic.show');

Route::post('/topics', [TopicController::class, 'store'])->withoutMiddleware(['web', 'csrf']);
Route::put('/topics/{topic}', [TopicController::class, 'update'])->withoutMiddleware(['web', 'csrf']);
Route::delete('/topics/{topic}', [TopicController::class, 'destroy'])->withoutMiddleware(['web', 'csrf']);
  
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
