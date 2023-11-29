<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BoardController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/board', [BoardController::class, 'index']);

Route::get('/regist', [UserController::class,'registget'])->name('regist.get'); //회원가입 화면 이동
Route::post('/regist', [UserController::class,'registpost'])->name('regist.post'); //회원가입 처리

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
