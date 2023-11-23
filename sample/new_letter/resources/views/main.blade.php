@extends('layout.layout')

@section('title','new_letter')

@section('main')
<main>
    <form action=".">
        <div class="main_title">우리가 시간이 없지, 세상이 안 궁금하냐!</div>
            <img src="." alt=""> 지금 구독하면 <span>내일 아침</span>에 읽을 수 있어요
            <br>
            <img src="." alt=""> 지금 <span>579,962명</span>이 뉴레를 읽고 있어요
            <br><br>
            세상 돌아가는 소식, 알고는 싶지만 신문 볼 새 없이 바쁜 게 우리 탓은 아니잖아요!
            <br>
            월/화/수/목/금 아침마다 세상 돌아가는 소식을 메일로 받아보세요.
            <br>
            <input type="email" id="email" name="email" placeholder="이메일 주소">
            <input type="text" id="u_name" name="u_name" placeholder="닉네임">
            <br>
            <label for=""><input type="checkbox" name="agree"><span>개인정보 수집·이용</span>에 동의합니다</label>
            <label for=""><input type="checkbox" name="agree"><span>광고성 정보 수신</span>에 동의합니다</label>

            <br><br>
            <button type="submit">뉴스레터 무료로 구독하기</button>
            <a href="#">앱 다운로드하기 →</a>
        </div>
        <ul class="main_ul">
            <li><a href="."></a>전체</li>
            <li><a href="."></a>정치</li>
            <li><a href="."></a>경제</li>
            <li><a href="."></a>세계</li>
            <li><a href="."></a>테그</li>
            <li><a href="."></a>노동</li>
            <li><a href="."></a>환경</li>
            <li><a href="."></a>인권</li>
            <li><a href="."></a>사회</li>
            <li><a href="."></a>문화</li>
            <li><a href="."></a>라이프</li>
        </ul>
        <div>
            <div>
                <img src="." alt="">
                <div>
                    <p>제목</p>
                    <br>
                    <span>작성일자</span>
                    <span>카테고리</span>
                    <br>
                    <div><img src="." alt="">조회수</div>
                    <div><img src="." alt="">좋아요</div>
                </div>
            </div>    
        </div>
    </form>
</main>


@endsection