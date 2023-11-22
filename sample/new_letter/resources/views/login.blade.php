@extends('layout.layout')

@section('title','login')

@section('main')
<main>

    <form action="">

        <div class="login_div">
            <p class="login_title">CK CK NEWSLETTER</p>
            <br>
            <a class="login_bt" href="#">구글로 시작하기</a>
            <br>
            <hr class="login_hr">
            <br>
                <input type="text" id=id name=id placeholder="아이디">
            <br>
                <input type="password" id=pw name=pw placeholder="비밀번호">
            <br>
            <p class="login_pw">비밀번호를 잊으셨나요?</p>
            <br><br>
            <button class="login_btn" type="submit">로그인</button>
            <br>
            <a class="login_rg" href="#">회원가입하기</a>
        </div>    
    </form>
</main>
@endsection