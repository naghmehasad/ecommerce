<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\AdminController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [Basecontroller::class,'home']);
Route::get('/home', [Basecontroller::class,'home'])->name('home');
Route::get('/specialOffer', [Basecontroller::class,'specialOffer'])->name('specialOffer');
Route::get('/delivery', [Basecontroller::class,'delivery'])->name('delivery');
Route::get('/contact-us', [Basecontroller::class,'contact'])->name('contact');
Route::get('/cart', [Basecontroller::class,'cart'])->name('cart');
Route::get('/productView', [Basecontroller::class,'productView'])->name('productView');

Route::get('/admin/login', [AdminController::class,'login'])->name('admin.login');
Route::post('/admin/login', [AdminController::class,'makeLogin'])->name('admin.makeLogin');

Route::get('/admin/dashboard', [AdminController::class,'dashboard'])->name('admin.dashboard');
Route::get('/admin/logout', [AdminController::class,'logout'])->name('admin.logout');