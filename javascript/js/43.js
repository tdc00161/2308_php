/*
1. HTTP ( Hypertext Transfer Protocol) 란?
	어떻게 Hypertext를 주고 받을지 규약한 프로토콜로
	클라이언트가 서버에 데이터를 request(요청)을 하고,
	서버가 해당 request에 따라 response(응답)을 클라이언트에 보내주는 방식입니다.
	Hypertext는 웹사이트에서 이용되는 하이퍼 링크나 리소스, 문서, 이미지 등을 모두 포함합니다.

2. AJAX ( Asynchronous JavaScript And XML) 이란?
	웹페이지에서 비동기 방식으로 서버에게 데이터를 request하고,
	서버의 response를 받아 동적으로 웹페이지를 갱신하는 프로그래밍 방식입니다.
	즉, 웹 페이지 전체를 다시 로딩하지 않고도 일부분만을 갱신 할 수 있습니다.
	대표적으로 XMLHttpRequest 방식과 Fetch Api 방식이 있습니다.

3. JSON ( JavaScript Object Notation ) 이란?
	JavaSctipt의 Object에 큰 영감을 받아 만들어진 서버 간의 HTTP 통신을 위한 텍스트 데이터 포맷입니다.
	장점은 다음과 같습니다.
		- 데이터를 주고 받을 때 쓸 수 있는 가장 간단한 파일 포맷
		- 가벼운 텍스트를 기반
		- 가독성이 좋음
		- Key와 Value가 짝을 이루고 있음
		- 데이터를 서버와 주고 받을 때 직렬화(Serialization)[*1 참조]하기 위해 사용
		- 프로그래밍 언어나 플랫폼에 상관없이 사용 가능

	JSON.stringify( obj ) : Object를 JSON 포맷의 String으로 변환(Serializing)해주는 메소드
	JSON.parse( json ) : JSON 포맷의 String을 Object로 변환(Deserializing)해주는 메소드

	4. API 예제 사이트
		https://picsum.photos/

	// ----------  참조  -----------
	//1. 직렬화(Serialization)
	// 	데이터 구조나 오브젝트 상태를 동일 혹은 다른 컴퓨터 환경에 저장하고,
	// 	나중에 재구성 할 수 있는 포맷으로 변환하는 과정

// XML
<xml>
	<data>
		<id>56</id>
		<name>홍길동</name>
	</data>
</xml>

// json
{
	data: {
		id: 56
		,name: '홍길동'
	}
}

*/


const MY_URL = "https://picsum.photos/v2/list?page=2&limit=10"
const BTN_API = document.querySelector('#btn-api');
// const BTN_DEL = document.querySelector('#btn-del');
BTN_API.addEventListener('click', my_fetch );
// BTN_DEL.addEventListener('click', btn_del );

// function my_del() {
// 	removeEventListener('click',my_fetch)
// };
// function imgDel (){
// 		const DIV_NEW = document.querySelector('img');
// 		const DIV_IMG = document.querySelector('#div-img');
// 	};
// }

const BTN_CLEAR = document.querySelector('#btn-del');
BTN_CLEAR.addEventListener('click', btn_del);

function btn_del() {
	// window.location.reload();  // 방법 1
	// const IMG = document.querySelectorAll('img');

	// for(let i = 0; i < IMG.length; i++) {
	// 	IMG[i].remove(); // 방법 2
	// }

	// const DIV_IMG = document.querySelector('#div-img');
	// DIV_IMG.replaceChildren(); // 방법 3

	const DIV_IMG = document.querySelector('#div-img');
	DIV_IMG.innerHTML = ""; // 방법 4 // 한꺼번에 삭제 하는 경우는 이 방법을 많이 사용
	// 루프를 돌려 다르게 처리할 경우에는 어려움
}




function my_fetch() {
	const INPUT_URL = document.querySelector('#input-url');

	fetch(INPUT_URL.value.trim()) // fetch 서버로 requset 를 보내고 response 를 받는 함수 , promise의 객체
	.then( response => response.json() ) //response 웹브라우저가 서버에 요청, 등록된 콜백들은 then 메소드로 등록한 순서대로 실행
	// 받기 보기 쉽게하기 위해서 json 으로 배열로 받으려고 호출
	.then( data => makeImg(data) )
	.catch( error => console.log(error) );

	function makeImg(data) {
		data.forEach( item => {
			const NEW_IMG = document.createElement('img');
			const DIV_IMG = document.querySelector('#div-img');

			NEW_IMG.setAttribute( 'src', item.download_url ); //setAttribute : 속성의 이름을 지정하는 문자열
			NEW_IMG.style.width = '200px';
			NEW_IMG.style.height = '200px';
			document.body.appendChild(NEW_IMG);
		});
	}
}
// console.log() 문은 확인용으로 사용하는 용도이며, 고객에게 전달할 때는 console.log() 문이 들어가면 안됨
// API 정의서는 스스로
// <img src="">
// const 와 let 
// : const 는 ' = ' 의 구문이 하나 이상이 어려움
// let 은 중복 호출이 가능함

const BTN_CLEAR = document.querySelector('#btn-clear');
BTN_CLEAR.addEventListener('click', imgClear);

function imgClear() {
	// ---- 방법 1
	// window.location.reload(); // 51 / 100
	// ---- 방법 1

	// ---- 방법 2
	// const IMG = document.querySelectorAll('img');

	// for(let i = 0; i < IMG.length; i++) {
	// 	IMG[i].remove();
	// } // 80 / 100
	// ---- 방법 2

	
	// ---- 방법 3
	// const DIV_IMG = document.querySelector('#div-img');
	// DIV_IMG.remove();
	// ---- 방법 3 // 20 / 100


	// ---- 방법 4
	// const DIV_IMG = document.querySelector('#div-img');
	// DIV_IMG.replaceChildren();
	// ---- 방법 4 90/100

	// ---- 방법 5
	const DIV_IMG = document.querySelector('#div-img');
	DIV_IMG.innerHTML = "";
	// ---- 방법 5 90/100

}

// fetch 2번째 아규먼트 셋팅 방법

function infinityLoop() {
	let apiUrl = "http://112.222.157.156:6001/03_insert.php"
	let init = {
		method: "POST" // 디폴트값이 GET 이다.
		,headers: {
			accept: "*"
		}
		,body: {
			title: "아아아아"
			,content: "오오오오"
			,em_id: "2"
		}
	};

	fetch(apiUrl, init)
	.then( response => console.log(response))
	.catch( error => console.log( error ));
}