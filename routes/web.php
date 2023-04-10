<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\DiaryController;
use App\Http\Controllers\PhotosController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
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

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

Route::get('/diary/{user}', [DiaryController::class, 'show'])->name('diary');
Route::get('/album/{id}', [AlbumController::class, 'show'])->name('album');

Route::resource('diary.posts', PostsController::class)->middleware(['auth', 'verified'])->shallow()->names([
    'edit' => 'posts.edit',
    'update' => 'posts.update',
    'create' => 'posts.create',
    'store' => 'posts.store',
]);

Route::resource('diary.photos', PhotosController::class)->middleware(['auth', 'verified'])->shallow()->names([
    'edit' => 'photos.edit',
    'update' => 'photos.update',
    'create' => 'photos.create',
    'store' => 'photos.store',
]);

Route::get('/album', [AlbumController::class, 'index']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

require __DIR__.'/auth.php';
