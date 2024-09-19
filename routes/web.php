<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\front\HomeController;
use App\Http\Controllers\front\PagesController;
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

//Static Pages.
Route::get('/',[HomeController::class,"index"])->name('home');
Route::get('/about',[PagesController::class,"about"])->name('about');
Route::get('/contact',[PagesController::class,"contact"])->name('contact');
Route::post('/contact',[PagesController::class,"contactForm"])->name('contactForm');



