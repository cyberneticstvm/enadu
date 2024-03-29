<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FranchiseController;

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

/*Route::get('/geebinapp', [HomeController::class, 'geebinapp'])->name('geebinapp');*/
Route::get('/geebinapp', [HomeController::class, 'geebinapp'])->name('geebinapp');
Route::get('/home', [HomeController::class, 'products'])->name('products');
Route::get('/cart', [CartController::class, 'cart'])->name('cart');
Route::post('/cart', [CartController::class, 'addtocart'])->name('cart.add');
Route::get('/cart/update', [CartController::class, 'updatecart'])->name('cart.update');
Route::get('/cart/delete', [CartController::class, 'deletecart'])->name('cart.delete');

Route::get('/signup', [AuthController::class, 'register'])->name('register');
Route::post('/signup', [AuthController::class, 'signup'])->name('signup');
Route::get('/otp', [AuthController::class, 'otp'])->name('otp');
Route::post('/otp', [AuthController::class, 'otpcheck'])->name('otp.check');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginn'])->name('loginn');
Route::get('/forgot', [AuthController::class, 'forgot'])->name('forgot');
Route::post('/forgot', [AuthController::class, 'forgotpwd'])->name('forgotpwd');
Route::get('/changepwd', [AuthController::class, 'changepwd1'])->name('changepwd1');
Route::post('/changepwd', [AuthController::class, 'changepwd'])->name('changepwd');

Route::get('/cmd', [AuthController::class, 'cmd'])->name('cmd');
Route::get('/', [AuthController::class, 'adminlogin'])->name('adminlogin');
Route::get('/privacy-policy', [HomeController::class, 'privacy'])->name('privacy');

Route::group(['middleware' => ['web', 'auth', 'admin']], function(){
    Route::get('/admin/dash', [AdminController::class, 'dash'])->name('admin.dash');
    Route::get('/admin/order', [AdminController::class, 'order'])->name('admin.order');
    Route::post('/admin/order', [AdminController::class, 'fetchorder'])->name('admin.order.fetch');
    Route::get('/admin/order-details/{id}', [AdminController::class, 'orderdetails'])->name('admin.orderdetails');
    Route::post('/admin/order/assign', [AdminController::class, 'assignorder'])->name('admin.order.assign');

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

    Route::get('/admin/franchise', [FranchiseController::class, 'index'])->name('admin.franchise');
    Route::get('/admin/franchise/create', [FranchiseController::class, 'create'])->name('admin.franchise.create');
    Route::post('/admin/franchise/create', [FranchiseController::class, 'store'])->name('admin.franchise.save');
    Route::get('/admin/franchise/edit/{id}', [FranchiseController::class, 'edit'])->name('admin.franchise.edit');
    Route::put('/admin/franchise/edit/{id}', [FranchiseController::class, 'update'])->name('admin.franchise.update');
    Route::delete('/admin/franchise/delete/{id}', [FranchiseController::class, 'destroy'])->name('admin.franchise.delete');

    Route::get('/admin/feedback', [AdminController::class, 'feedback'])->name('admin.feedback');
    Route::post('/admin/feedback', [AdminController::class, 'savefeedback'])->name('admin.feedback.save');
    Route::get('/admin/comment/reply/{id}', [AdminController::class, 'showcomment'])->name('admin.comment');
    Route::post('/admin/comment/reply', [AdminController::class, 'replycomment'])->name('admin.comment.reply');

    Route::get('/admin/service', [AdminController::class, 'services'])->name('admin.services');
    Route::get('/admin/meeting', [AdminController::class, 'meetings'])->name('admin.meetings');
    Route::get('/admin/attendance', [AdminController::class, 'fetchattendance'])->name('admin.fetchattendance');
});

Route::group(['middleware' => ['web', 'auth', 'user']], function(){
    Route::get('/contact', [UserController::class, 'contact'])->name('contact');
    Route::get('/about', [UserController::class, 'about'])->name('about');
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::put('/profile/{id}', [UserController::class, 'profileupdate'])->name('profile.update');
    Route::get('/account', [AuthController::class, 'account'])->name('account');
    Route::get('/address', [AddressController::class, 'index'])->name('address');
    Route::post('/address', [AddressController::class, 'store'])->name('address.save');
    Route::delete('/address/{id}', [AddressController::class, 'destroy'])->name('address.delete');
    Route::get('/orders', [UserController::class, 'order'])->name('order');
    Route::post('/checkout', [CartController::class, 'checkout'])->name('checkout');
    Route::get('/thankyou', [CartController::class, 'thankyou'])->name('thankyou');
    Route::get('/feedback', [UserController::class, 'feedback'])->name('feedback');
    Route::post('/feedback', [UserController::class, 'savefeedback'])->name('feedback.save');    
    Route::get('/milestone/{id}', [UserController::class, 'show'])->name('milestone');    
    Route::get('/service', [UserController::class, 'service'])->name('service');
    Route::post('/service', [UserController::class, 'saveservice'])->name('service.save');
    Route::get('/localbody/{district}', [UserController::class, 'localbody'])->name('localbody');
});


Route::group(['middleware' => ['web', 'auth', 'staff']], function(){
    Route::get('/staff/dash', [AdminController::class, 'staffdash'])->name('staff.dash');
    Route::get('/staff/orders', [AdminController::class, 'stafforders'])->name('staff.orders');
    Route::get('/staff/delivery/update/{id}', [AdminController::class, 'delivery'])->name('staff.delivery');
    Route::post('/staff/delivery/update', [AdminController::class, 'updatedelivery'])->name('staff.delivery.update');
    Route::get('/staff/meetings', [AdminController::class, 'staffmeetings'])->name('staff.meetings');
    Route::post('/staff/meetings', [AdminController::class, 'savestaffmeetings'])->name('staff.meetings.save');
    Route::get('/staff/attendance', [AdminController::class, 'attendance'])->name('staff.attendance');
    Route::get('/staff/attendance/update', [AdminController::class, 'attendanceupdate'])->name('staff.attendance.update');
});

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

