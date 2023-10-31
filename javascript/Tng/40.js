//1. 버튼을 클릭시 아래 내용의 알러트가 나옵니다.
	"안녕하세요."
	"숨어있는 div를 찾아보세요"


//2-1. 특정 영역에 마우스 포인터가 진입하면 아래 내용의 알러트가 나옵니다.
	//"두근두근"

const DIV1 = document.querySelector('#div1')
DIV1.addEventListener('mouseenter', () => {
	alert('두근두근'); 
});
// DIV1.addEventListener('mouseleave', () => close;)

//2-2. 들킨 상태에서는 알러트가 안나옵니다.
	// (들켰다면 알러트 호출 -> if문으로 들킬 때랑 안 들킬 때를 구분해줘서 알러트 호출)



//3. 2번의 영역을 클릭하면 아래의 알러트를 출력하고, 배경색이 베이지색으로 바뀌어 나타납니다.
	//"들켰다!"

const DIVCL = document.querySelector('#div1')
DIVCL.addEventListener('click', () => {
	while(조건문){
		if($i === 0) {
			if(true){
			alert('들켰다!');
			DIVCL.style.backgroundColor = 'beige';
			} else {
				DIVCL.style.backgroundColor = 'beige';
			}
		} else if ($i !== 0) {
			alert('다시 숨는다');
			DIVCL.style.backgroundColor = 'white';
		}
	}
});
// 위 조건문을 적용할 해당 클래스를 지정해주어야 함.
// 클릭해서 들켰을 때 문구 출력하고 한 번 더 클릭하면 다시 숨는다 출력
// 들켰을 때는 추가적으로 문구 출력 안 함 

// 1. 홀 수 클릭했을 때와 짝 수 클릭했을 때로 구분해서 출력
// 2. 




// DIVCL.removeEventListener('click', () => {
// 	alert('다시 숨는다')
// 	DIVCL.style.backgroundColor = 'white'
//  })

//4. 3번의 상태에서 다시 한번 더 클릭하면 아래의 알러트를 출력하고, 배경색이 흰색으로 바뀌어
// 안보이게 합니다.
	//"다시 숨는다."

	// const DIVCL1 = document.querySelector('#div1')
	// DIVCL.addEventListener('click', () => {
	// 	alert('다시 숨는다');
	// 	DIVCL.style.backgroundColor = 'white';
	// });

//  1 >> 2-1 >> 3 >> 2-2 >> 4