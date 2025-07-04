<?php

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

Route::get('/intros', [App\Http\Controllers\IntroController::class,'show']);
Route::get('/test', [App\Http\Controllers\IntroController::class, 'testfun']);
// delete two routes (about, contact)

Route::get('/about', [App\Http\Controllers\TemplateController::class, 'about']);
//Route::get('/post', [App\Http\Controllers\TemplateController::class, 'post']);
//Route::get('/contact', [App\Http\Controllers\TemplateController::class, 'contact']);