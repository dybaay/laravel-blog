<?php

use App\Http\Controllers\AdminPostsController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\MyServices\Newsletter;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;
use MailchimpMarketing\ApiClient;

Route::post('post/{post}/comments', [PostCommentsController::class, 'store']);
Route::post('/newsletters', NewsletterController::class);
Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('post/{post:slug}', [PostController::class, 'show']);


Route::get('/dashboard', [AdminPostsController::class, 'index'])->middleware('auth', 'verified');
Route::get('/admin/posts/create', [AdminPostsController::class, 'create'])->middleware('admin');
Route::post('/admin/post', [AdminPostsController::class, 'store'])->middleware('admin');
Route::get('/admin/post/{post}/edit', [AdminPostsController::class, 'edit'])->middleware('admin');
Route::patch('/admin/post/{post}', [AdminPostsController::class, 'update'])->middleware('admin');
Route::delete('/admin/post/{post}/delete', [AdminPostsController::class, 'destroy'])->middleware('admin');



require __DIR__.'/auth.php';
