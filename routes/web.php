<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\KHController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\Auth\RegisterController;

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
// Route::get('/', [PageController::class, '__construct']);

Route::get('/', [PageController::class, 'index']);

Auth::routes(['verify' => true]);
Route::get('login', [KHController::class, 'login']);
Route::post('login', [KHController::class, 'postlogin']);
Route::get('logout', [KHController::class, 'logout']);
Route::get('regis', [KHController::class, 'registering']);
Route::post('regis', [KHController::class, 'postregistering']);

Route::group(['middleware' => 'khachhangLogin'], function () {
    Route::post('booking/{id}', [KHController::class, 'booking']);
    // Route::get('ho-so-khach-hang', [KHController::class, 'profile']);
    Route::get('khach-hang', [KHController::class, 'khpage']);
    Route::get('khach-hang-da-dat', [KHController::class, 'phongdadat']);
    Route::get('cai-dai-khach-hang', [KHController::class, 'setting']);

});
Route::get('quanly/login', [UserController::class, 'login']);
Route::get('quanly/logout', [UserController::class, 'logout']);

Route::post('quanly/login', [UserController::class, 'adminLogin']);

Route::group(['middleware' => 'adminLogin'], function () {
    Route::group(['prefix' => 'quanly'], function () {
        Route::get('/', [UserController::class, 'index']);
        Route::get('danh-sach-nhan-vien', [UserController::class, 'index']);
        Route::get('xoa-nhan-vien/{id}',[UserController::class, 'xoanhanvien']);
        Route::get('them-nhan-vien',[UserController::class, 'themnhanvien']);
        Route::post('them-nhan-vien',[UserController::class, 'postthemnhanvien']);

        Route::get('sua-nhan-vien/{id}',[UserController::class, 'suanhanvien']);
        Route::post('sua-nhan-vien/{id}',[UserController::class, 'postsuanhanvien']);

        Route::get('sua-quan-ly/{id}',[UserController::class, 'suaquanly']);
        Route::post('sua-quan-ly/{id}',[UserController::class, 'postsuaquanly']);
    });
    Route::group(['prefix' => 'nhanvien'], function () {
        Route::get('/', [UserController::class, 'nhanvien']);
        });
});

Route::get('phong/{idtang}',[AjaxController::class, 'getphong']);
