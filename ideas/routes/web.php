<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::group(['prefix' => 'ideas/', 'as' => 'ideas.', 'middleware' => ['auth']], function(){
    Route::get('/{idea}', [IdeaController::class, 'show'])->name('show');

    Route::group(['middleware' => ['auth']], function () {
        Route::get('/{idea}/edit', [IdeaController::class, 'edit'])->name('edit');
        Route::post('/create', [IdeaController::class, 'store'])->name('create');
        Route::put('/{idea}', [IdeaController::class, 'update'])->name('update');
        Route::delete('/{idea}', [IdeaController::class, 'destroy'])->name('destroy');
        Route::post('/{idea}/comments', [CommentController::class, 'store'])->name('comments.store');
    });
});

Route::resource('users', UserController::class)->only('show', 'edit', 'update')->middleware('auth');

Route::get('/profile', [UserController::class, 'profile'])->middleware('auth')->name('profile');

Route::post('users/{user}/follow', [FollowerController::class, 'follow'])->middleware('auth')->name('users.follow');
Route::post('users/{user}/unfollow', [FollowerController::class, 'unfollow'])->middleware('auth')->name('users.unfollow');

Route::get('/terms', function () {
    return view('terms');
})->name('terms');