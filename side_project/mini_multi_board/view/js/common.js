// const BTN_DETAIL =  document.querySelector('#btnDetail');
// const BTN_MODAL_CLOSE = document.querySelector('#btnModalClose');

// BTN_DETAIL.addEventListener('click', () => {
// 	const MODAL = document.querySelector('#modal');
// 	MODAL.classList.remove('displayNone');
// } );

// BTN_MODAL_CLOSE.addEventListener('click', () => {
// 	const MODAL = document.querySelector('#modal');
// 	MODAL.classList.add('displayNone');
// } );

let test;

// 상세 모달 제어
function openDetail(id) {
	const URL = '/board/detail?id='+id;
	console.log(URL);

	fetch(URL)
	.then( response => response.json() )
	.then( data => {
		// 요소에 데이터 셋팅
		const TITLE = document.querySelector('#b_title');
		const CONTENT = document.querySelector('#b_content');
		const IMG = document.querySelector('#b_img');
		const CREATED_AT = document.querySelector('#created_at')
		const UPDATED_AT = document.querySelector('#updated_at')

		TITLE.innerHTML = data.data.b_title;
		CONTENT.innerHTML = data.data.b_content;
		CREATED_AT.innerHTML = data.data.created_at;
		UPDATED_AT.innerHTML = data.data.updated_at;
		IMG.setAttribute('src', data.data.b_img);
		// DATE.innerHTML = '작성일: ' + data.data.created_at + ' / 수정일: '  + data.data.updated_at;

		// 모달 오픈
		openModal();


	})
	.catch( error => console.log(error) )

}

// 모달 오픈 함수
function openModal() {
	const MODAL = document.querySelector('#modalDetail');
	MODAL.classList.add('show');
	MODAL.style = 'display: block; background-color:rgba(0, 0, 0, 0.7);';
}

// 모달 닫기 함수
function closeDetailModal() {
	const MODAL = document.querySelector('#modalDetail');
	MODAL.classList.remove('show');
	MODAL.style = 'display: none;';
}

function idchk() {
	// const U_ID = document.querySelector('#u_id').value;
	// const URL = '/board/count?u_id='+U_ID;
	// // url 을 post 로 보내는 방식 작성

	// fetch(URL)
	// .then( response => response.json() )
	// .then( data => {
	// 	// 요소에 데이터 셋팅
	// 	let countError = data.data.cnt !==0 ? '가능':'불가능';
	// 	window.alert('중복된 아이디입니다.');

	const INPUT_ID = document.getElementById('u_id');
	const URL = ' /user/idchk' ;
	const HEADER = {
		method: "GET"
		,body: {
			"u_id": INPUT_ID.value
		}
	};

		// DATE.innerHTML = '작성일: ' + data.data.created_at + ' / 수정일: '  + data.data.updated_at;

	})
	.catch( error => console.log(error) )

}