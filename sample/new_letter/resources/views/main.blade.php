@extends('layout.layout')

@section('title','new_letter')

@section('main')
<main>
    <div class="main_firstdiv">
        <img class="main_titleimg" src="/css/img/titleimg.png" alt="">
        <div class="main_title">우리가 시간이 없지, 세상이 안 궁금하냐!</div>
        <div class="main_titlediv">   
           <div class="main_intro">
                <img src="." alt=""> 지금 <span>579,962명</span>이 뉴레를 읽고 있어요
                <br><br>
                세상 돌아가는 소식, 알고는 싶지만 신문 볼 새 없이 바쁜 게 우리 탓은 아니잖아요!
                <br>
                월/화/수/목/금 아침마다 세상 돌아가는 소식을 메일로 받아보세요.
                <br><br>
                <form action=".">
                    <input class="main_introip" type="email" id="email" name="email" placeholder="이메일 주소" required>
                    <br>
                    <input class="main_introip" type="text" id="u_name" name="u_name" placeholder="닉네임" required>
                    <br>
                    <label for=""><input class="main_inputchk" type="checkbox" name="agree" required><span>개인정보 수집·이용</span>에 동의합니다</label>
                    <br>
                    <label for=""><input class="main_inputchk" type="checkbox" name="agree" required><span>광고성 정보 수신</span>에 동의합니다</label>
                    <br><br>
                    <button class="main_btn" type="submit">뉴스레터 무료로 구독하기</button>
                    <a class="main_bt" href="#">앱 다운로드하기 →</a>
                </form>
            </div>
        </div>
    </div>
        <ul class="main_ul">
            <li class="main_li"><a href=".">전체</a></li>
            <li class="main_li"><a href="."><img class="main_ulimg" src="/css/img/politics.png" alt="">정치</a></li>
            <li class="main_li"><a href="."><img class="main_ulimg" src="/css/img/money.png" alt="">경제</a></li>
            <li class="main_li"><a href="."><img class="main_ulimg" src="/css/img/world.png" alt="">세계</a></li>
            <li class="main_li"><a href="."><img class="main_ulimg" src="/css/img/tag.png" alt="">테그</a></li>
            <li class="main_li"><a href="."><img class="main_ulimg" src="/css/img/employee.png" alt="">노동</a></li>
            <li class="main_li"><a href="."><img class="main_ulimg" src="/css/img/environment.png" alt="">환경</a></li>
            <li class="main_li"><a href="."><img class="main_ulimg" src="/css/img/cooperation.png" alt="">인권</a></li>
            <li class="main_li"><a href="."><img class="main_ulimg" src="/css/img/society.png" alt="">사회</a></li>
            <li class="main_li"><a href="."><img class="main_ulimg" src="/css/img/culture.png" alt="">문화</a></li>
            <li class="main_li"><a href="."><img class="main_ulimg" src="/css/img/life.png" alt="">라이프</a></li>
        </ul>
        <div class="main_card">
                <div class="main_divcard">
                    <img class="main_cardimg" src="." alt="">
                    <div>
                        <h3>제목</h3>
                        <div>작성일자</div>
                        <div>카테고리</div>
                        <br>
                        <div><img class="main_ulimg" src="/css/img/eye.png" alt="">조회수</div>
                        <div><img class="main_ulimg" src="/css/img/heart.png" alt="">좋아요</div>
                    </div>
                </div>
                <div class="main_divcard">
                    <img class="main_cardimg" src="." alt="">
                    <div >
                        <h3>제목</h3>
                        <div>작성일자</div>
                        <div>카테고리</div>
                        <br>
                        <div><img class="main_ulimg" src="/css/img/eye.png" alt="">조회수</div>
                        <div><img class="main_ulimg" src="/css/img/heart.png" alt="">좋아요</div>
                    </div>
                </div>
                <div class="main_divcard">
                    <img class="main_cardimg" src="." alt="">
                    <div>
                        <h3>제목</h3>
                        <div>작성일자</div>
                        <div>카테고리</div>
                        <br>
                        <div><img class="main_ulimg" src="/css/img/eye.png" alt="">조회수</div>
                        <div><img class="main_ulimg" src="/css/img/heart.png" alt="">좋아요</div>
                    </div>
                </div>
                <div class="main_divcard">
                    <img class="main_cardimg" src="." alt="">
                    <div>
                        <h3>제목</h3>
                        <div class="main_uldiv">작성일자</div>
                        <div class="main_uldiv">카테고리</div>
                        <br>
                        <div class="main_uldiv"><img class="main_ulimg" src="/css/img/eye.png" alt="">조회수</div>
                        <div class="main_uldiv"><img class="main_ulimg" src="/css/img/heart.png" alt="">좋아요</div>
                    </div>
                </div>
        </div>
        <a class="main_plusbtn" href=".">더보기</a>

</main>


@endsection