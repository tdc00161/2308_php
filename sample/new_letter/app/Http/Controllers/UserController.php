<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class UserController extends Controller
{

    //로그인 화면
    public function loginget() {
        //로그인이 되었을 때는 메인페이지로(로그인여부체크)
        if(Auth::check()){
            return redirect("board");
        }
        
        return view("login");
    }

    public function loginpost(Request $request) {
        $result = users::where('email', $request->email)->first();
        if(!$result|| !(Hash::check($request->password, $result->password))){
            $errorMsg = '이메일과 비밀번호를 다시 한 번 확인해 주세요.';
        }
        return redirect()->route("login.get")->withErrors($errorMsg);
   

        // 유저 인증작업
        Auth::login($result);
        if (Auth::check()) {
            session($result->only('email'));
            // only 는 소괄호로 작성해야함
        } else {
            $errorMsg = '인증 에러가 발생했습니다.';
            return view('login')->withErrors($errorMsg);
        }
        // redirect 사용을 하지않으면 라라벨 사용에 제약이 많을 수도 있음
        return redirect()->route('board');
        //    return view('list');

    }

    public function registget() {
        return view("regist");
    }

    public function registpost(Request $request) {
        // 데이터 베이스에 저장할 데이터 획득
        $data = $request
            ->only('email', 'password', 'passwordchk', 'nickname', 'totalchk' ,'agechk' ,'usechk' ,'perchk' ,'mkchk');
        // only 를 적고 안에 필요한 항목만 호출해서 배열로 만들어 줌.

        // 비밀번호 암호화
        $data['password'] = Hash::make($data['password']);

        // 회원 정보 DB에 저장
        $result = User::create($data);
        // user 파일에 내용이 없더라도 내용추가가 가능함

        return redirect()->route('login.get');
    }


    // ---------------------
    // 로그아웃 처리
    // ---------------------
    public function logoutget() {
        Session::flush(); //세션파기
        Auth::logout(); // 로그아웃
        return redirect()->route('login.get');
    }
}
