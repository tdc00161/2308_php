<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Models\users;
use App\Http\Middleware\Validation;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function loginget()
    {
        // 로그인 한 유저는 보드 리스트로 이동
        if(Auth::check()) {
            return redirect()->route('main');
        }

        return view('login');
    }

    public function loginpost(Request $request)
    {
        // 유저 정보 습득
        $result = users::where('user_id', $request->user_id)->first();
        if(!$result || !(Hash::check($request->password, $result->password))) {
            $errorMsg = '아이디와 비밀번호를 다시 확인해 주세요.';
            return redirect()->route('login.get')->withErrors($errorMsg);
        }

        // 유저 인증작업
        Auth::login($result);
        if(Auth::check()) {
            session($result->only('user_id'));
        } else {
            $errorMsg = "인증 에러가 발생했습니다.";
            return view('login')->withErrors($errorMsg);
        }

        return redirect()->route('main');
    }

    public function registrationget()
    {
        return view('/registration');
    }

    public function registrationpost(Request $request)
    {
        // 데이터 베이스에 저장할 데이터 획득
        $data = $request->only('user_id', 'password');

        // 비밀번호 암호화
        // $data['password'] = Hash::make($data['password']);

        // 회원 정보 DB에 저장
        $result = users::create($data);
        // dump($result);

        // return redirect()->route('login.get');
    }

    public function logoutget()
    {
        Session::flush(); // 세션파기
        Auth::logout(); // 로그아웃
        return redirect()->route('login.get');
    }
}
