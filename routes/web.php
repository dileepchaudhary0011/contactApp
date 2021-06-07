<?php

use App\Http\Controllers\ContactController;
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

Route::get('/', [ContactController::class, 'index']);

Route::get('contacts', [ContactController::class, 'index']);
Route::get('contacts/view/{id}', [ContactController::class, 'view']);
Route::get('contacts/create', [ContactController::class, 'create']);

Route::post('contacts', [ContactController::class, 'store']);
Route::delete('contacts/{id}', [ContactController::class, 'destroy']);
Route::get('contacts/{id}', [ContactController::class, 'edit']);
Route::put('contacts/{id}', [ContactController::class, 'update']);
