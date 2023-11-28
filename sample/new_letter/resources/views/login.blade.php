{{-- @extends('layout.layout')

@section('title','login')

@section('main')
<main class="login_main">

    <form class="login_form" action="{{route('login.post')}}" method="POST">
        @csrf
        <div class="login_div">
            <p class="login_title">CK CK NEWSLETTER</p>
            <br>
            <a class="login_bt" href="#">
                <div class="login_bta">
                    <img class="login_img" src="css/img/google.png" alt="">
                    <div class="login_btb">구글로 시작하기</div>
                </div>
            </a>
            <hr class="login_hr">
                <input class="login_input" type="text" id=id name=id placeholder="아이디">
            <br>
                <input class="login_input" type="password" id=pw name=pw placeholder="비밀번호">
            <br>
            <a class="login_pw" href=".">비밀번호를 잊으셨나요?</a>
            <br>
            <button class="login_btn" type="submit">로그인</button>
            <br>
            <a class="login_rg" href="{{route('regist.get')}}">회원가입하기</a>
        </div>    
    </form>
</main>
@endsection --}}