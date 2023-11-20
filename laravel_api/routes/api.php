<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;

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



// 라우트 그룹
// prefix: 공통된 부분을 어떻게 묶을꺼냐
// api: 유저 요청을 만들어서 유저에게 전달만 해주는 역할
 Route::prefix('/item')->group( function (){
    Route::get('/', [ItemController::class, 'index']); // 게시글 전체 조회
    Route::post('/', [ItemController::class,'store']); // 게시글 작성
    Route::put('/{id}', [ItemController::class,'update']); //게시글 수정
    Route::delete('/{id}', [ItemController::class,'destroy']); //게시글 삭제
 });

 // 장점: 묶여있기때문에 어디서 어디까지 한 작업인지 알 수 있음. 그룹별로 묶어서 작성할 수도 있음.
 // prefix 를 사용하지 않을경우 경로앞에 아이템('/item')만 추가해주면 됨


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// api 쪽에 만들면 앞쪽에 api 가 자동으로 붙어서 그 이후의 주소값만 설정하면 됨.