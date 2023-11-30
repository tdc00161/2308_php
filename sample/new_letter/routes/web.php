<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('main');
});

Route::get('/login', [UserController::class,'loginget'])->name('login.get'); //로그인 화면 이동
Route::middleware('user.validation')->post('/login', [UserController::class,'loginpost'])->name('login.post'); //로그인 처리

Route::get('/regist', [UserController::class,'registget'])->name('regist.get'); //회원가입 화면 이동
Route::middleware('user.validation')->post('/regist', [UserController::class,'registpost'])->name('regist.post'); //회원가입 처리


