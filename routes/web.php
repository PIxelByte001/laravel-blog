<?php

use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect(url('/dashboard'));
});

Route::get('/dashboard', function () {
    // $posts = Blog::all();
    return redirect(url('/feed'));
    // return view('dashboard', ['posts'=>$posts]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/feed', [BlogController::class, 'index']) -> name('blog.index');
Route::get('/create', [BlogController::class, 'create']) -> name('blog.post');
Route::post('/publish', [BlogController::class, 'publish']) -> name('post.create');

Route::get('/post/{pk}', [BlogController::class, 'read']) -> name('post.read');