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
		const DEL_INPUTT = document.querySelector('#del_id')
		const BTN_DEL = document.querySelector('#btn-del')

		TITLE.innerHTML = data.data.b_title;
		CONTENT.innerHTML = data.data.b_content;
		CREATED_AT.innerHTML = data.data.created_at;
		UPDATED_AT.innerHTML = data.data.updated_at;
		IMG.setAttribute('src', data.data.b_img);
		DEL_INPUTT.value = data.data.id;
		// DATE.innerHTML = '작성일: ' + data.data.created_at + ' / 수정일: '  + data.data.updated_at;
		// DELETE.setAttribute('href', '/board/detail?id='+ data.data.id + data.data.b_type);

		// 삭제 버튼 표시 처리
		if(data.data.uflg === "1") {
			BTN_DEL.classList.remove('d-none');
		} else {
			BTN_DEL.classList.add('d-none');
		}

		// 모달 오픈
		openModal();


	})
	.catch( error => console.log(error) )

}

// 모달 오픈 함수detailGet
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

function idChk() {
    const U_ID = document.querySelector('#u_id').value;
    const ERRMSG = document.querySelector('#idChkMsg');
    ERRMSG.innerHTML = ""; // 리셋
    const URL = '/user/idchk?u_id=' + U_ID;

	fetch(URL)
	.then(res => res.json())
	.then(arr => {
		if (arr.errflg === '0') {
			ERRMSG.innerHTML = '사용 가능한 아이디입니다.';
			ERRMSG.classList = 'text-success';
		} else {
			ERRMSG.innerHTML = '사용할 수 없는 아이디입니다.';
			ERRMSG.classList = 'text-danger';
		}
	})
	.catch(err => console.log(err))
} 

//삭제처리
function deleteCard () {
	const B_PK = document.querySelector('#del_id').value;
	const URL = '/board/remove?id=' + B_PK;

	fetch(URL)
	.then( response => response.json())
	.then( data => {
		if(data.errflg === "0") {
			// 모달 닫기
			closeDetailModal();

			// 카드 삭제
			const MAIN = document.querySelector('main');
			const CARD_NAME = '#card' + data.id;
			const DEL_CARD = document.querySelector(CARD_NAME);
			MAIN.removeChild(DEL_CARD);
		} else {
			alert(data.msg);
		}
	})
	.catch(error => console.log(error))

}
// function idchk() {
	// const U_ID = document.querySelector('#u_id').value;
	// const URL = '/board/count?u_id='+U_ID;
	// // url 을 post 로 보내는 방식 작성

	// fetch(URL)
	// .then( response => response.json() )
	// .then( data => {
	// 	// 요소에 데이터 셋팅
	// 	let countError = data.data.cnt !==0 ? '가능':'불가능';
	// 	window.alert('중복된 아이디입니다.');

	// const INPUT_ID = document.getElementById('u_id');
	// const URL = ' /user/idchk' ;
	// const HEADER = {
	// 	method: "GET"
	// 	,body: {
	// 		"u_id": INPUT_ID.value
	// 	}
	// };

	// fetch()

		// DATE.innerHTML = '작성일: ' + data.data.created_at + ' / 수정일: '  + data.data.updated_at;

// 	})
// 	.catch( error => console.log(error) )

// }