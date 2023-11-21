@extends('layout.layout')

@section('title','new_letter')

@section('main')
<main class="login_main">
    <form action="">
        <div>
            <label for="id">아이디</label>
            <input type="text" id=id name=id>
        </div>
        <div>
            <label for="pw">패스워드</label>
            <input type="password" id=pw name=pw>
        </div>
        <button type="submit">로그인</button>
        <a href="#">회원가입</a>
    </form>
</main>
@endsection