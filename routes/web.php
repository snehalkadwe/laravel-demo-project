<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UploadDocumentController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AddMoreDynamicProductController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UploadVideoController;

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

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// example for sweet-alert 2
Route::post('/dashboard', [DashboardController::class, 'store'])->name('dashboard');

Route::get('upload-document', [UploadDocumentController::class, 'index'])->name('upload-document');
Route::post('create', [UploadDocumentController::class, 'store'])->name('documents.store');

// example of notification
Route::get('notify/index', [NotificationController::class, 'index'])->name('notify');

// example of event, listeners and send email to all users when new post is created
Route::get('posts', [PostController::class, 'index'])->name('post');
Route::post('posts', [PostController::class, 'store'])->name('post.store');

// ex of dynamically add input fields and store
Route::get('add-more', [AddMoreDynamicProductController::class, 'index'])->name('add-more');
Route::post('add-more', [AddMoreDynamicProductController::class, 'store'])->name('add-more.store');
Route::get('upload-video', [UploadVideoController::class, 'index'])->name('upload-video');
Route::post('upload_video', [UploadVideoController::class, 'store'])->name('upload-video.store');
Route::get('upload_video/{video}/show', [UploadVideoController::class, 'getVideo'])->name('upload-video.getVideo');
Route::get('upload_video/{video}/edit', [UploadVideoController::class, 'edit'])->name('upload-video.edit');
Route::put('upload_video/{video}', [UploadVideoController::class, 'update'])->name('upload-video.update');
Route::get('upload_video/{video}', [UploadVideoController::class, 'destroy'])->name('upload-video.destroy');
Route::get('product', [ProductController::class, 'index'])->name('product.index');
Route::get('product/create', [ProductController::class, 'create'])->name('product.create');
Route::post('product/create', [ProductController::class, 'store'])->name('product.store');
require __DIR__.'/auth.php';