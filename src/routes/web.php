<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Livewire\Posts\Index AS PostsIndex;
use \App\Http\Livewire\Posts\Form AS PostForm;
use \App\Http\Livewire\Posts\Show AS PostShow;
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

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/', PostsIndex::class)->name('posts.index');
    Route::get('/posts/create', PostForm::class)->name('posts.create');
    Route::get('/posts/{post}', PostShow::class)->name('posts.show');
    Route::get('/posts/{post}/edit', PostForm::class)->name('posts.edit');
});
