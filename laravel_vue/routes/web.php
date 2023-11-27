<?php

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

Route::get('/', function () {
    $data = ['name' => '루트', 'id' => 1];
    return view('welcome')->with('data', json_encode($data));
});

Route::get('/login', function () {
    $data = ['name' => '로그인', 'id' => 2];
    return view('welcome')->with('data', json_encode($data));
});

Route::get('/board', function () {
    $data = ['name' => '보드', 'id' => 3];
    return view('welcome')->with('data', json_encode($data));
});
// 넘겨주는 데이터는 이제 json 으로 넘겨주기. 아니면 오류남
// 라라벨 이랑 뷰랑 연동시켰을때는 라라벨 라우트의 웹이랑 뷰의 라우트랑 동일하게 시켜놔야
// 연결이 됨