<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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
    return view('home');
});

Route::get('/signup', [AuthController::class, 'register'])->name('register');
Route::post('/signup', [AuthController::class, 'signup'])->name('signup');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginn'])->name('loginn');

Route::group(['middleware' => ['web', 'auth', 'user']], function(){
    Route::get('/account', [AuthController::class, 'account'])->name('account');
});

Route::group(['middleware' => ['web', 'auth', 'admin']], function(){
    
});

Route::group(['middleware' => ['web', 'auth', 'staff']], function(){
    
});

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

