<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
    return view('welcome');
});


//-----------------
// 라우트 정의
//-----------------
// 문자열 리턴
Route::get('/hi', function () {
// hi 위치에 url 이 들어감
    return '안녕하세요.';
});

// 없는 뷰파일을 리턴할 때
Route::get('/myview', function() {
    return view('myview');
});



//---------------
// HTTP 메소드 대응하는 라우터
// 여러 라우터에 해당될 경우 가장 마지막에 정의 된 것이 실행
//---------------
// 여러 라우터를 만드는 것은 지양하기 왜? 관리에 있어 어려움이 있음

// get 메소드로 localhost/home으로 접속했을 때 home라는 뷰파일을 리턴해주세요.

Route::get('/home', function () {
        return view('home');
    });


Route::post('/home', function() {
    return '메소드 : POST';
});

// get, post, put/fetch, delete

Route::put('/home', function() {
    return '메소드 : PUT';
});

Route::delete('/home', function() {
    return '메소드 : DELETE';
});


// ------------------------
// 라우트에서 파라미터 제어
// ------------------------

// 쿼리 스트링에 파라미터가 셋팅되서 요청이 올 때 파라미터 획득
Route::get('/query', function(Request $request) {
    return $request->id.", ".$request->name;
});


// URL 세그먼트로 지정 파라미터 획득
Route::get('/segment/{id}', function($id) {
    return '세그먼트 파라미터 : '.$id;
});
// localhost/segment 까지 적으면 인식을 못하고 오류가 남
// segment까지 로컬호스트로 인식함


// 2개 이상의 URL 세그먼트로 지정 파라미터 획득
Route::get('/segment/{id}/{name}', function($id, $name) {
    return '세그먼트 파라미터 2개 이상 : '.$id.','.$name ;
});

// 쿼리스트링 , 세그먼트도 같이 사용 가능 ->
// 리케이스트랑 같이 쓸 경우 불필요한 정보까지도 출력이 가능할 수 있음
Route::get('/segment2/{id}/{name}', function(Request $request, $id) {
    return '세그먼트 파라미터 22222 : '.$request->name.','.$id;
});


// "" , '' 둘 다 사용이 가능하나 ''를 더 많이씀


// URL 세그먼트로 지정 파라미터 획득 : 기본값 설정
Route::get('/segment3/{id?}', function ($id = 'base') {
    return 'segment3 : '.$id;
});


// ----------------
// 라우트 매칭 실패시 대체 라우트 정의
// ----------------
Route::fallback(function () {
    return '잘못된 경로를 입력하셨습니다.';
});
//fallback : 경로가 없을 경우 404로 가는게 아니고 위에 멘트로 이동함.


// -------------------
// 라우트의 이름 지정
// -------------------
Route::get('/name', function () {
    return view('name');
});

Route::get('/name/home/php504/root', function () {
    return '이름 없는 라우트';
});

Route::get('/name/home/php504/user', function () {
    return '이름 있는 라우트';
})->name('name.user');
//-> : 체이닝 기법

// ----------------
// 컨트롤러
// ----------------
// 커맨드로 컨트롤러 생성 : php artisan make:controller 컨트롤러명

use App\Http\Controllers\TestController;


Route::get('/test', [TestController::class, 'index'])
->name('test.index');
// Route::get(url,액션명) -> 문법
// 해당기능명(url).액션명(메소드명) 으로 라우터 이름을 지어줌

// php artisan make:controller 컨트롤러명 --resource
// 동일한 파일이 만들어지나, 

use App\Http\Controllers;
Route::resource('/task', TaskController::class);