<?php

use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\BookCategoryController;
use App\Http\Controllers\Api\BookRentalController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\PreTestController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/**
 * route "/register"
 * @method "POST"
 */
Route::post('/register', RegisterController::class)->name('register');

/**
 * route "/login"
 * @method "POST"
 */
Route::post('/login', LoginController::class)->name('login');

/**
 * route "/user"
 * @method "GET"
 */
// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Book Categories List
Route::get('book-category', [BookCategoryController::class, 'index']);
Route::post('add-book-category', [BookCategoryController::class, 'store']);
Route::post('update-book-category/{id}', [BookCategoryController::class, 'update']);
Route::delete('delete-book-category/{id}', [BookCategoryController::class, 'destroy']);

// Book List
Route::get('books', [BookController::class, 'index']);
Route::get('books/{id}', [BookController::class, 'show']);
Route::post('add-books', [BookController::class, 'store']);
Route::post('update-books/{id}', [BookController::class, 'update']);
Route::delete('delete-books/{id}', [BookController::class, 'destroy']);

// Rental List
Route::get('book-rental', [BookRentalController::class, 'index']);
Route::get('book-rental/{id}', [BookRentalController::class, 'show']);
Route::post('add-book-rental', [BookRentalController::class, 'store']);
Route::post('update-book-rental/{id}', [BookRentalController::class, 'update']);
Route::delete('delete-book-rental/{id}', [BookRentalController::class, 'destroy']);

// User List
Route::get('users', [UserController::class, 'index']);
Route::post('users', [UserController::class, 'store']);
Route::get('users/{user}', [UserController::class, 'show']);
Route::put('users/{user}', [UserController::class, 'update']);
Route::delete('users/{user}', [UserController::class, 'destroy']);

Route::get('pretest', [PreTestController::class, 'index']);

/**
 * route "/logout"
 * @method "POST"
 */
Route::post('/logout', App\Http\Controllers\Api\LogoutController::class)->name('logout');
