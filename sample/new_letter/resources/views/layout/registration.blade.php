@extends('layout.laout')

@section('main')
    <form action="">
        <input type="text" name=id placeholder="아이디를 입력해주세요">
        <input type="password" name=pw placeholder="비밀번호 8자이상 입력해주세요">
        <input type="password" name=pwchk placeholder="다시 비밀번호 입력해주세요">
        <input type="text" name=name placeholder="닉네임 입력해주세요">
        <br>
        <input type="checkbox"> 모두 동의합니다
        <input type="checkbox"> 만 14세 이상 가입 동의(필수)
        <input type="checkbox"> 이용약관 동의(필수) <a href="#">약관보기</a>
        <input type="checkbox"> 개인정보 수집/이용 동의(필수) <a href="#">약관보기</a>
        <input type="checkbox"> 뉴스레터 및 마케팅 정보 수신 동의(선택) <a href="#">약관보기</a>
        <br><br>
        <button type="submit">가입하기</button>
    </form>
@endsection