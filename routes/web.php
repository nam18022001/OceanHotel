<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PageController;

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

Route::get('/', function () {
    return view('layout_page.master_view');
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
