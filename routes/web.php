<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
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
Route::get( '/', function () {
    return view( 'auth.login' );
} );
Auth::routes();
Route::group( ['middleware' => ['auth']], function () {
    // dashboard
    Route::resource( 'dashboard', DashboardController::class);
    // User
    Route::resource( 'users', UserController::class);
    // Category
    Route::resource( 'categories', CategoryController::class);
    // Book
    Route::resource( 'books', BookController::class);
} );

// Route::get( '/', function () {
//     return view( 'welcome' );
// } );

// Auth::routes();

// Route::get( '/home', [App\Http\Controllers\HomeController::class, 'index'] )->name( 'home' );
// Route::get( '/user', [App\Http\Controllers\UserController::class, 'index'] )->name( 'home' );