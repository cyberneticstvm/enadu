<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

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

Route::get('/', [AuthController::class, 'home'])->name('home');

Route::get('/signup', [AuthController::class, 'register'])->name('register');
Route::post('/signup', [AuthController::class, 'signup'])->name('signup');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginn'])->name('loginn');

Route::group(['middleware' => ['web', 'auth', 'user']], function(){
    Route::get('/account', [AuthController::class, 'account'])->name('account');
});

Route::group(['middleware' => ['web', 'auth', 'admin']], function(){
    Route::get('/admin/dash', [AdminController::class, 'dash'])->name('admin.dash');
    Route::get('/admin/order', [AdminController::class, 'order'])->name('admin.order');

    Route::get('/admin/category', [CategoryController::class, 'index'])->name('admin.category');
    Route::get('/admin/category/create', [CategoryController::class, 'create'])->name('admin.category.create');
    Route::post('/admin/category/create', [CategoryController::class, 'store'])->name('admin.category.save');
    Route::get('/admin/category/edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::put('/admin/category/edit/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
    Route::delete('/admin/category/delete/{id}', [CategoryController::class, 'destroy'])->name('admin.category.delete');

    Route::get('/admin/product', [ProductController::class, 'index'])->name('admin.product');
    Route::get('/admin/product/create', [ProductController::class, 'create'])->name('admin.product.create');
    Route::post('/admin/product/create', [ProductController::class, 'store'])->name('admin.product.save');
    Route::get('/admin/product/edit/{id}', [ProductController::class, 'edit'])->name('admin.product.edit');
    Route::put('/admin/product/edit/{id}', [ProductController::class, 'update'])->name('admin.product.update');
    Route::delete('/admin/product/delete/{id}', [ProductController::class, 'destroy'])->name('admin.product.delete');

    Route::get('/admin/staff', [UserController::class, 'index'])->name('admin.staff');
    Route::get('/admin/staff/create', [UserController::class, 'create'])->name('admin.staff.create');
    Route::post('/admin/staff/create', [UserController::class, 'store'])->name('admin.staff.save');
    Route::get('/admin/staff/edit/{id}', [UserController::class, 'edit'])->name('admin.staff.edit');
    Route::put('/admin/staff/edit/{id}', [UserController::class, 'update'])->name('admin.staff.update');
    Route::delete('/admin/staff/delete/{id}', [UserController::class, 'destroy'])->name('admin.staff.delete');
});

Route::group(['middleware' => ['web', 'auth', 'staff']], function(){
    Route::get('/staff/dash', [AdminController::class, 'staffdash'])->name('staff.dash');
});

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

