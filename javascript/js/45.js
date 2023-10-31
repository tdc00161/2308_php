
// 1. promise 객체
// 	- 비동기 프로그래밍의 근간이 되는 기법 중 하나
// 	- 프로미스를 사용하면 콜백 함수를 대체하고, 비동기 작업의 흐름을 쉽게 제어 가능
// 	- promise 객체는 비동기 작업의 최종 완료 또는 실패를 나타내는 독자적인 객체

// 2. promise 사용법

const PROMISSE1 = new Promise( function(resolve, reject) {
	let flg = true;
	if(flg) {
		return resolve('성공'); // 요청 성공 시 resolve()를 호출
	} else {
		return reject('실패'); // 요청 실패 시 reject()를 호출
	}
});

PROMISE1
.then( data => console.log(data) )
.catch( err => console.log(err) )
.finally( () => console.log('finally 입니다.') )

// const PRO2 = new Promise( function(resolve, reject){
// 	setTimeout(() => resolve(), +)
// })

const PRO2 = function(ms) {
	return new Promise( (resolve) => {
		setTimeout(() => resolve(ms), ms );
	})
}

PRO2(1000)
.then( data => console.log('A'))

// 3. promise 함수 등록
// 재사용성, 가독성, 확장성을 이유로 현업에서는 아래와 같이 함수를 등록하고 사용

function PRO2() {
	new Promise( function(resolve, reject) {
		let flg = true;
		if(flg) {
			return resolve('성공'); // 요청 성공 시 resolve()를 호출
		} else {
			return reject('실패'); // 요청 실패 시 reject()를 호출
		}
	});
}

PRO2
.then()
.catch()
.finally()