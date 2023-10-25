
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



