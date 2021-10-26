<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserProductController;



use Illuminate\Routing\Route as RoutingRoute;
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
Route::redirect('/', '/login');
Route::middleware(['login'])->group(function () {
    Route::get('/login', function () {
        return view('user.userLogin',['msg'=>'']);
    });
        Route::get('/admin', function () {
        return view('admin.login');
    });
});

Route::get('/signup', [UserController::class,'register']);
Route::post('/userLogin',[UserController::class,'login'])->name('userLogin');
Route::post('/login',[UserController::class,'login'])->name('login');
Route::post('/userRegister',[UserController::class,'register']);

Route::get('/logout',[UserController::class,'logOut']);



Route::middleware(['admin'])->group(function () {
    Route::get('/productList',[ProductController::class,'product'] )->name('product');
    /* Route::get('/addProduct', function () {
        return view('admin.addProduct',['msg'=>'']);
    }); */
    Route::get('/addProduct/{id?}',[ProductController::class,'productId']);

    Route::post('/uploadProduct',[ProductController::class,'upload']);

});

Route::middleware(['user'])->group(function () {
    Route::get('/home',[UserProductController::class,'index']);
    Route::post('/addToCart',[UserProductController::class,'addToCart']);



});


