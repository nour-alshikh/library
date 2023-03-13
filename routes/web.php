<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatController;
use App\Http\Controllers\AuthController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('isLogin')->group(function(){

    //books::create
    Route::get('/books/create', [BookController::class ,'create'])->name('books.create');
    Route::post('/books/store', [BookController::class ,'store'])->name('books.store');

    //books::update
    Route::get('/books/edit/{id}', [BookController::class ,'edit'])->name('books.edit');
    Route::post('/books/update/{id}', [BookController::class ,'update'])->name('books.update');


    //cats::create
    Route::get('/cats/create', [CatController::class ,'create'])->name('cats.create');
    Route::post('/cats/store', [CatController::class ,'store'])->name('cats.store');

    //cats::update
    Route::get('/cats/edit/{id}', [CatController::class ,'edit'])->name('cats.edit');
    Route::post('/cats/update/{id}', [CatController::class ,'update'])->name('cats.update');


    //Logout
    Route::get('/logout', [AuthController::class ,'logout'])->name('auth.logout');

});

Route::middleware('isGeust')->group(function(){
    //Auth

    //Register
    Route::get('/register', [AuthController::class ,'register'])->name('auth.register');
    Route::post('/handle-register', [AuthController::class ,'handleRegister'])->name('auth.handleRegister');

    //Login
    Route::get('/login', [AuthController::class ,'login'])->name('auth.login');
    Route::post('/handle-login', [AuthController::class ,'handleLogin'])->name('auth.handleLogin');

});

Route::middleware('isLoginAdmin')->group(function(){

    //cats::delete
    Route::get('/cats/delete/{id}', [CatController::class ,'delete'])->name('cats.delete');

    //books::delete
    Route::get('/books/delete/{id}', [BookController::class ,'delete'])->name('books.delete');

});

//books::read
Route::get('/books', [BookController::class ,'index'])->name('books');
Route::get('/books/show/{id}', [BookController::class ,'show'])->name('books.show');


//cats::read
Route::get('/cats', [CatController::class ,'index'])->name('cats');
Route::get('/cats/show/{id}', [CatController::class ,'show'])->name('cats.show');

