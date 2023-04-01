<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\DiaryController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;
use App\Models\Photo;
use App\Models\Post;
use App\Models\User;
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

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/diary/{diary}', function (User $user) {
//    return $user;
//});
Route::get('/diary/{diary}/album/{album}',
    function (User $user, Photo $photo) {
    return $photo;
    });
Route::get('/diary/{id}', [DiaryController::class, 'show'])->name('diary');
Route::get('/album/{id}', [AlbumController::class, 'show'])->name('album');

Route::get('/album', function () {
    return view('album.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
