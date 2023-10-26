
const TITLE = document.getElementById('title');


// 태그만으로 요소를 선택
const H2 = document.getElementsByTagName('h2');

// 클래스로 요소를 선택
const NONE = document.getElementsByClassName('none-li');

// CSS 선택자를 사용해 요소를 찾는 메서드
// querySelector() : 복수일경우 가장 첫번째 요소만 선택
const S_ID = document.querySelector('#subtitle2');
const S_NONE = document.querySelector('.none-li');

const S_NONE_ALL = document.querySelectorAll('.none-li');


// --------------------------
// 3. 요소 조작
// --------------------------
// textContent : 순수한 텍스트 데이터를 전달, 이전의 태그들을 모두 제거
TITLE.textContent = '<p>탕수육</p>';

// innerHTML : 태구는 태그로 인식해서 전달, 이전의 태그들은 모두 제거
TITLE.innerHTML = '<p>탕수육</p>';

// setAttribute('', '') : 요소에 속성을 추가
// ** 몇몇 속성들은 DOM 객체에서 바로 설정 가능
// ex) INTXT.placeholder = '바로 접근 가능';

const INTXT = document.getElementById('intxt');
INTXT.setAttribute('placeholder', '셋어트리뷰트로 삽입');

// removeAttribute('') : 요소의 속성을 제거
INTXT. removeAttribute('placeholder');

// ----------------------------------
// 4. 요소 스타일링
// ----------------------------------
// style : 인라인으로 스타일 추가
TITLE.style.color = 'red';

// classList : 클래스로 스타일 추가
TITLE.classList.add('class1', 'class2', 'class3');
TITLE.classList.remove('class1', 'class3');


// ----------------------------------
// 5. 새로운 요소 생성
// ----------------------------------
// 요소 만들기
// const LI = document.createElement('li');
// LI.innerHTML = "글글글글";


// // 삽입할 부모 요소 접근
// const UL = document.querySelector('#ul');

// // 부모요소의 가장 마지막 위치에 삽입
// UL.appendChild(LI);

// // 요소를 특정 위치에 삽입하는 방법
// const SPACE = document.querySelector('li:nth-child(3)');

// UL.insertBefore(LI, SPACE);


// 1. 사과게임 위에 장기를 넣어주세요.
// const LI = document.createElement('li');
// LI.innerHTML = "장기";

// const UL2 = document.querySelector('#ul');

// const SPACE2 = document.querySelector('li:nth-child(4)');
// UL2.insertBefore(LI, SPACE2);


// 2. 어메이징브릭에 베이지 배경색을 넣어주세요.
// const BRI = document.querySelector('li:nth-child(9)');
// BRI.style.backgroundColor = 'beige';

// 3. 리스트에서 짝수는 빨간색글씨, 홀수는 파란색글씨로 만들어주세요.
const UL_LI = document.getElementsByClassName('none-li');

for (i = 0; i < 9; i++) {
	if (i % 2 === 1){
		UL_LI[i].style.color = 'red';
	} else {
		UL_LI[i].style.color = 'blue';
	};
}
// for 문안에 작성할 때 꼭 let 을 함께 작성해두자.


// 9번의 반복 후 끝 : for - 기본(초기), 제한, 증감
// 만약 짝수라면 빨간색 : if - 변수% 2 === 0
// 아니라면 파란색 : else
// 색깔 : id.style.color = '';
// 		ㄴ 어떻게 가져오냐 : getElement, querySelectorAll
// 				ㄴ형태 : 배열
// 	1.모델 :
// 		for(i){
// 			getElementclass('none-li:nth-child(i)')
// 			if(짝){
// 				배경: 레드
// 			}아니면{
// 				블루
// 			}
// 		}
// 	2.모델:
// 		const 이름 getElement클래스(none-li); (=수박,지뢰,...등)
// 		for(i){
// 			if(i==짝){
// 			이름[i].style.color = '레드';

// 			} 아니면 {
// 			이름[i].style.color = '블루';
// 			}
// 		}
