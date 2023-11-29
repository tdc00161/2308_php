<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{

    //로그인 화면
    public function loginget() {
        //로그인이 되었을 때는 메인페이지로(로그인여부체크)
        if(Auth::check()){
            return redirect()->route("main");
        }
        
        return view("/login");
    }

    public function loginpost(Request $request) {
        $result = users::where('email', $request->email)->first();
        if(!$result|| !(Hash::check($request->password, $result->password))){
            $errorMsg = '아이디와 비밀번호를 다시 한 번 확인해 주세요.';
        }
        return redirect()->route("login.get")->withErrors($errorMsg);
    }

    public function registget() {
        return view("regist");
    }

    public function registpost() {
        

        return view("regist");
    }

}
