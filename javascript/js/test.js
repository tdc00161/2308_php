
// 두 수를 받아서 더한 값을 리턴해주는 함수를 만들어 봅시다.

function (a,b) {
	return a+b;
}

// 함수를 3개 만들어주세요.
// -1:  php를 출력하는 함수
// -2:  504를 출력하는 함수
// -3:  풀스택을 출력하는 함수


// 1번함수는 3초뒤에 출력
// 2번함수는 5초뒤에 출력
// 3번함수는 바로 출력

function myPhp(){
	console.log('php');
};

function myInt(){
	console.log('504');
};

function myFull(){
	console.log('풀스택');
};

setTimeout(myPhp, 3000);
setTimeout(myInt, 5000);
// setTimeout(myFull, 1000);
setTimeout(myFull,0);
// myFull(); 로도 가능함


// 현재 시간 구해주세요

// const DATE1 = document.createElement('time');
// const TODAY = new Date();
// DATE1 = TODAY.toLocaleTimeString();


// 버튼 만들기
// 버튼을 클릭하면 네이버로 이동

const BTN = document.getElementById('naver');
BTN.addEventListener('click', function() {
	location.href = 'http:\/\/naver.com';
});