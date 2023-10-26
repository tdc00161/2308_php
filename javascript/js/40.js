// 인라인 이벤트
// html 파일 9-10라인 확인

// 프로버티 리스너
const BINGOOGLE = document.getElementById('btn_google');
BINGOOGLE.onclick = function() {
	location.href = 'http:\/\/google.com';
};

// addEventListner(eventType, function)
const BINDAUM = document.getElementById('btn_daum');
let winOpen;// 전역변수를 부른 이유는 안에 변수에 접근하기 위해서
BINDAUM.addEventListener('click', popOpen);
// () => {
// 	winOpen = open('http:\/\/www.daum.net', '', 'width=500 height=500'); //새창으로 열 수 있음, 로그인 창이나 약관 창 같은 창 열 때 많이 사용함
// });

// 팝업창 닫기
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











