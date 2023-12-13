<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BoardController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


//유저 관련
Route::get('/login',[UserController::class,'loginget'])->name('login.get');
Route::middleware('user.validation')->post('login',[UserController::class, 'loginpost'])
->name('login.post');
Route::get('/registration',[UserController::class],'registget')->name('regist.get');
Route::middleware('user.validation')->post('registe',[UserController::class, 'registpost'])
->name('regist.post');

Route::get('/board', [BoardController::class, 'index']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
