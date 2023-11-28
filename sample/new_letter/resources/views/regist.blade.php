{{-- @extends('layout.layout')

@section('title','regist')

@section('main')
<main class="rgtmain">
    <div class="rgttitlediv">
        <p class="rgth">ck ck newletter</p>
        <br>
        <form action="{{route('regist.post')}}" method="POST">
            @csrf
            <input class="rgtip" type="email" name="email" placeholder="이메일" required>
            <br>
            <input class="rgtip" type="password" name="pw" placeholder="비밀번호(8자 이상)" required>
            <br>
            <input class="rgtip" type="password" name="pwchk" placeholder="비밀번호 확인(8자 이상)" required>
            <br>
            <input class="rgtip" type="text" name="name" placeholder="닉네임" required>
            <div class="rgtagree">
                <div class="divlb"><label for=""><input class="main_inputchk" type="checkbox">모두 동의합니다</label></div>
                <div class="divlb"><label for=""><input class="main_inputchk" type="checkbox">만 14세 이상 가입 동의 (필수)</label><a class="rgta" href=".">약관보기</a></div>
                <div class="divlb"><label for=""><input class="main_inputchk" type="checkbox">이용약관 동의 (필수)</label><a class="rgta" href=".">약관보기</a></div>
                <div class="divlb"><label for=""><input class="main_inputchk" type="checkbox">개인정보 수집/이용 동의 (필수)</label><a class="rgta" href=".">약관보기</a></div>
                <div class="divlb"><label for=""><input class="main_inputchk" type="checkbox">뉴스레터 및 마케팅 정보 수신 동의 (선택)</label><a class="rgta" href=".">약관보기</a></div>
            </div>
            <br><br><br>
            <button class="rgtbtn" type="submit">가입하기</button>
        </form>
    </div>
</main>
@endsection --}}