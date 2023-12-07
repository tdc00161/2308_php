// 인라인 이벤트
// html 파일 9-10라인 확인


// ------------
// 이벤트 생성
// ------------
// 프로버티 리스너
const BINGOOGLE = document.getElementById('btn_google');
BINGOOGLE.onclick = function() {
	location.href = 'http:\/\/google.com';
};

// addEventListner(eventType, function) 방식

// ------------
// 팝업창 열기
// ------------
function popOpen() {
	winOpen = open('http:\/\/www.daum.net', '', 'width=500 height=500');
}

function popClose() {
	winOpen.close();
}


const BINDAUM = document.getElementById('btn_daum');
let winOpen;// 전역변수를 부른 이유는 안에 변수에 접근하기 위해서
BINDAUM.addEventListener('click', popOpen);
// () => {
// 	winOpen = open('http:\/\/www.daum.net', '', 'width=500 height=500'); //새창으로 열 수 있음, 로그인 창이나 약관 창 같은 창 열 때 많이 사용함
// });

// ------------
// 팝업창 닫기
// ------------
const BINCLOSE = document.getElementById('btn_close');
BINCLOSE.addEventListener('click', popClose);

// --------------
// 이벤트 삭제
// --------------
// BINDAUM.removeEventListener('click', popOpen);
BINCLOSE.removeEventListener('click', popClose);
function popOpen(window) {
	winOpen = open('http:\/\/www.daum.net', '', 'width=500 height=500'); //새창으로 열 수 있음, 로그인 창이나 약관 창 같은 창 열 때 많이 사용함
};
function popClose() {
	winOpen.close(); //새창으로 열 수 있음, 로그인 창이나 약관 창 같은 창 열 때 많이 사용함
};

const DIV1 = document.querySelector('#div1');
DIV1.addEventListener('mouseenter', () => {
	alert('DIV1에 들어왔어요.');
	DIV1.style.backgroundColor = 'yellow';
});


// ------------
// 콜백함수 다시한번 확인
// 'test'를 콘솔에 출력하는 함수
function test() {
	console.log("test");
};

// 콜백함수를 실행하는 함수
function cb(fnc) {
	fnc();
}

// 이벤트 타입
// 1. 마우스 이벤트
// - mousedown - 마우스가 요소안에서 클릭이 눌릴 때
// - mouseup - 마우스가 요소안에서 클릭이 해제될 때
// - mouseenter - 마우스 포인터가 요소 안으로 진입 했을 때
const DIV1 = document.querySelector('#div1');
DIV1.addEventListener('mouseenter', () => {
	alert('DIV1에 들어왔어요.');
	DIV1.style.backgroundColor = '#000000';
});

// - mouseleave - 마우스 포인터가 요소 밖깥으로 나갔을 때
// - mousemove - 마우스 포인터가 요소 안에서 움직일 때
// - event.clientX, event.clientY - 브라우저 화면 기준 X, Y 좌표
// - event.pageX, event.pageY - 전체화면 기준(스크롤 포함) X, Y좌표
// - event.target.getBoundingClientRect() - 요소의 크기와 뷰포트로 부터 상대적인 위치를 반환

// 2. 키보드 이벤트
// - keydown
// - keypress
// - keyup
// - event.key : 사용자가 누른 키 값을 반환합니다.
// - event.keyCode : 사용자가 누른 키 코드(ASCII) 값을 반환합니다.
// const INTXT = document.getElementById('intxt');
// INTXT.addEventListener('keyup', (e) => console.log(e));

// 3. 포커스 이벤트
// - focus
// - blur
// - change

// 4. 폼 이벤트
// 	- submit : 양식(Form)이 제출하기전에 발생 하는 이벤트 입니다. 주로 전송될 값을 유효성 체크할 때 사용합니다.

// 5. 진행(progress) 이벤트
//	- load
//	- error
