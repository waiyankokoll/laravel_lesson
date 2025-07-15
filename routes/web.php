<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookController;

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

// Route::get('/', function () {
//     return view('welcome');
// })->name('home');

Route::get('/intros', [App\Http\Controllers\IntroController::class,'show']);
Route::get('/test', [App\Http\Controllers\IntroController::class, 'testfun']);
// delete two routes (about, contact)

Route::get('/', [App\Http\Controllers\TemplateController::class, 'home'])->name('homepage');
Route::get('/about', [App\Http\Controllers\TemplateController::class, 'about'])->name('about');
Route::get('/post', [App\Http\Controllers\TemplateController::class, 'post'])->name('post');
Route::get('/contact', [App\Http\Controllers\TemplateController::class, 'contact'])->name('contact');
Route::resource('categories', CategoryController::class);
Route::resource('students', App\Http\Controllers\StudentController::class);
Route::resource('books', BookController::class);