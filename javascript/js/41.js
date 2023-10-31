
// 타이머 함수

// 1. setTimeout(콜백함수, 시간(ms)) : 일정시간이 흐른 후에 콜백함수를 실행
setTimeout(() => console.log('시간'), 3000); //ms 단위는 초단위에서 1,000을 곱해주기

// 콘솔에 1초뒤에 A, 2초뒤에 'B' , 3초 'C'가 출력되도록 프로그램을 만들어주세요

// setTimeout(() => console.log('A'), 1000);
// setTimeout(() => console.log('B'), 2000);
// setTimeout(() => console.log('C'), 3000);

function a(chr, ms){
	setTimeout(()=> console.log(chr),ms);
}

a('A', 1000);
a('B', 2000);
a('C', 3000);

// 2. clearTimeout(해당 setTimeout 객체) : 타이머를 삭제하는 기능


let mySet = setTimeout(() => console.log('c'), 5000); // clear 하지 않을 경우 변수로 선언안해도 괜찮음
clearTimeout(mySet);

// 3. setinerval( 콜백함수, 시간(ms) ) : 일정 시간마다 반복
let myInter = setInterval(() => console.log('민경씨 자지마'), 1000);

// 4. clearinterval(해당 setInterval) : 인터벌 삭제
clearInterval(myInter);

// 화면을 로드하고 5초 뒤에 '두둥등장' 이라는 매우 큰 글씨가
// 나타나게 해주세요.


// const TEXT = document.querySelector('#text');
// // let TEXT1 = TEXT.innerHTML = "두둥등장" ;
// setTimeout(() => TEXT.innerHTML = "두둥등장", 5000);

//html 에 영역 만들지 않고 js 에서 작성하는 방법
// const H1 = document.createElement('h1');
// H1.innerHTML = '두둥등장';
// document.body.appendChild(H1);

setTimeout(myAddH1, 5000);


function myAddH1() {
	const H1 = document.createElement('h1');
	H1.innerHTML = '두둥등장';
	document.body.appendChild(H1);
}