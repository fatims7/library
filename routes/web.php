<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\RentlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Models\Category;

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


Route::get('/', [LibraryController::class, 'index']);
Route::get('books', [LibraryController::class, 'index']);
Route::get('books/{category:name}', [LibraryController::class, 'category']);
Route::get('library/bookdetail/{code}', [LibraryController::class, 'show']);
Route::get('/add-book-to-list', [LibraryController::class, 'add']);

Route::get('login', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::post('login', [LoginController::class, 'actlogin']);

Route::get('register', [RegisterController::class, 'register']);
Route::post('register', [RegisterController::class, 'actregister']);

Route::middleware('auth')->group( function() {
    Route::get('logout', [LoginController::class, 'logout']);

    Route::middleware('cekadmin')->group( function() {
        Route::get('dashboard', [DashboardController::class, 'index']);
    
        Route::get('book', [BookController::class, 'index']);
        Route::get('book-add', [BookController::class, 'add']);
        Route::post('book-add', [BookController::class, 'insert']);
        Route::get('book-edit/{code}', [BookController::class, 'edit']);
        Route::post('book-edit/{code}', [BookController::class, 'update']);
        Route::get('book-delete/{code}', [BookController::class, 'delete']);
        Route::get('book-deleted', [BookController::class, 'deleted']);
        Route::get('book-destroy/{code}', [BookController::class, 'destroy']);
        Route::get('book-restore/{code}', [BookController::class, 'restore']);

        
        Route::get('category', [CategoryController::class, 'index']);
        Route::get('category-add', [CategoryController::class, 'add']);
        Route::post('category-add', [CategoryController::class, 'insert']);
        Route::get('category-edit/{name}', [CategoryController::class, 'edit']);
        Route::post('category-edit/{name}', [CategoryController::class, 'update']);
        Route::get('category-destroy/{name}', [CategoryController::class, 'destroy']);

        Route::get('user', [UserController::class, 'index']);
        Route::get('user-delete/{username}', [UserController::class, 'delete']);
        Route::get('user-deleted', [UserController::class, 'deleted']);
        Route::get('user-destroy/{username}', [UserController::class, 'destroy']);
        Route::get('user-restore/{username}', [UserController::class, 'restore']);

        Route::get('rentbooks', [RentlogController::class, 'index']);
        Route::post('rentbooks', [RentlogController::class, 'insert']);
        Route::post('returnbook/{id}', [RentlogController::class, 'return']);
        Route::get('rentbooks-cancel/{id}', [RentlogController::class, 'cancel']);


    });

    Route::middleware('cekuser')->group( function() {
        Route::get('home', [HomeController::class, 'index']);
        Route::get('home-show', [HomeController::class, 'showRentLog']);
        Route::get('rentlogs', [HomeController::class, 'rentLogs']);
        Route::get('rentlogs-show', [HomeController::class, 'showRentLogs']);
        Route::get('list', [HomeController::class, 'list']);
    });
    
});
