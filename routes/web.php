<?php

use App\Http\Controllers\AuthController;
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
Route::middleware('checkAuth')->group(function (){
    Route::prefix("books")->group(function (){
        Route::get('/',[BookController::class,"index"])->name("book.index");
        Route::get('/{id}/detail',[BookController::class,"show"])->name("book.detail");
        Route::get('/create',[BookController::class,"create"])->name("book.create");
        Route::post('/create',[BookController::class,"store"])->name("book.store");
        Route::get('{id}/delete',[BookController::class,"destroy"])->name("book.destroy");
    });
    Route::resource('categories', CategoryController::class);
});


//Route::prefix("categories")->group(function (){
//    Route::get('/',[CategoryController::class,"index"])->name("categories.index");
//    Route::get('/{id}/detail',[CategoryController::class,"show"])->name("categories.show");
//    Route::get('/create',[CategoryController::class,"create"])->name("categories.create");
//    Route::post('/create',[CategoryController::class,"store"])->name("categories.store");
//    Route::get('/{id}/update',[CategoryController::class,"edit"])->name("categories.edit");
//    Route::post('/{id}/update',[CategoryController::class,"update"])->name("categories.update");
//    Route::get('/{id}/delete',[CategoryController::class,"destroy"])->name("categories.destroy");
//});


Route::get('register',[AuthController::class,"showForm"])->name("showFormRegister");
Route::post('register',[AuthController::class,"register"])->name("register")->middleware('checkRegister');


Route::get('login',[AuthController::class,"showFormLogin"])->name("showFormLogin");
Route::post('login',[AuthController::class,"login"])->name("login");
Route::get('logout',[AuthController::class,"logout"])->name("logout");
