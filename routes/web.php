<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\DB;
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

Route::get('/home', function () {
    return view('welcome');
});

Route::prefix("books")->group(function (){
    Route::get('/',[BookController::class,"showAll"])->name("book.list");
    Route::get('/{id}/detail',[BookController::class,"show"])->name("book.detail");
    Route::get('/create',[BookController::class,"create"])->name("book.create");
    Route::post('/create',[BookController::class,"store"])->name("book.store");
});

Route::prefix("categories")->group(function (){
    Route::get('/',[CategoryController::class,"index"])->name("category.list");
    Route::get('/{id}/detail',[CategoryController::class,"show"])->name("category.detail");
    Route::get('/create',[CategoryController::class,"create"])->name("category.create");
    Route::post('/create',[CategoryController::class,"store"])->name("category.store");
});

