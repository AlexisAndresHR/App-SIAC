<?php

use App\Http\Controllers\AuthController;
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

Route::get('/', function () {
    return view('welcome');
});

// Auth router (sign in)
Route::get('login', AuthController::class)->name('login');

// Register (sign up) router
Route::get('register', [AuthController::class, 'showSignUp'])->name('register');
Route::post('register', [AuthController::class, 'newSignUp'])->name('new-register');
