<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\bookController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('books', [bookController::class, 'getAllBooks']);
Route::get('books/{id}', [bookController::class, 'getBook']);
Route::post('books/create', [bookController::class, 'addBook']);
Route::delete('books/delete/{id}',  [bookController::class, 'deleteBook']);
Route::put('books/update/{id}',  [bookController::class, 'updateBook']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
