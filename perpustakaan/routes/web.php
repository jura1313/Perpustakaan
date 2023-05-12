<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserRegisteredController;
use App\Http\Controllers\BookStoreController;
use App\Http\Controllers\CategoryController;



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

Route::get('try', function () {
    return view('try');
});
Route::post('post-a', [BookStoreController::class, 'try']);


Route::get('register', [UserRegisteredController::class, 'create']);

Route::post('new_user', [UserRegisteredController::class, 'store']);

Route::get('login', [UserRegisteredController::class, 'login']);

Route::post('login', [UserRegisteredController::class, 'verified']);

Route::get('home', [BookStoreController::class, 'index']);

Route::get('view/{bookStore:slug}', [BookStoreController::class, 'show']);


Route::middleware(['auth'=>'ceklevel:admin,staff,member'])->group(function () {

    Route::get('download', [BookStoreController::class, 'download']);

    Route::get('show-categories', [CategoryController::class, 'index']);

    Route::post('logout', [UserRegisteredController::class, 'destroy']);

});

Route::middleware(['auth'=>'ceklevel:admin,staff'])->group(function () {

    Route::get('users', [UserRegisteredController::class, 'all_user']);

    Route::get('post-a-book', [BookStoreController::class, 'create']);
    Route::post('post-a-book', [BookStoreController::class, 'store']);

    Route::get('slug', [BookStoreController::class, 'checkSlug']);


    Route::get('update-a-book/{bookStore:slug}', [BookStoreController::class, 'edit']);
    Route::post('update-a-book/{bookStore:slug}', [BookStoreController::class, 'update']);

    Route::delete('delete-a-book/{bookStore:slug}', [BookStoreController::class, 'destroy']);

    Route::get('my-book', [BookStoreController::class, 'my_book']);

    Route::get('post-a-category', [CategoryController::class, 'create']);
    Route::post('post-a-category', [CategoryController::class, 'store']);

    Route::get('update-a-category/{category:slug}', [CategoryController::class, 'edit']);
    Route::post('update-a-category/{category:slug}', [CategoryController::class, 'update']);

    Route::get('delete-a-category/{category:slug}', [CategoryController::class, 'destroy']);

});

Route::middleware(['auth'=>'ceklevel:admin'])->group(function () {

    Route::get('staff', [ValidUserController::class, 'all_users']);

});
