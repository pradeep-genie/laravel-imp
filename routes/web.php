<?php
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UploadFileController;
use Illuminate\Support\Facades\Route;

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
Route::get('/',[HomeController::class,'index']);
Route::get('/about-us',[HomeController::class,'about'])->name('about');
Route::get('/team',[HomeController::class,'team'])->name('team');
Route::get('/contact',[HomeController::class,'contact'])->name('contact');

//post controller 
Route::get('/post',[Postcontroller::class,'index']);
Route::get('/post-create',[Postcontroller::class,'create']);
Route::post('/post-store',[Postcontroller::class,'create_post']);

//photos controller
Route::get('/photos',[UploadFileController::class,'index'])->name('photos.index');
Route::get('/photos/create',[UploadFileController::class,'create'])->name('photos.create');
Route::post('/photos/store',[UploadFileController::class,'upload'])->name('photos.store');
Route::get('/photos/edit/{id}',[UploadFileController::class,'edit'])->name('photos.edit');
Route::get('/photos/delete/{id}',[UploadFileController::class,'delete'])->name('photos.delete');