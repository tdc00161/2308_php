// -------------
스코프
// -------------
// 전역 스코프
let gender = "M";

//함수레벨 스코프
function test() {
	let test1 = "test1";
	console.log(test1);
}

// 블록레벨 스코프
function test1() {
	let test1 = "test1";
	if(true) {
		let test1 = "test2";
		test1 = "test3";
		console.log(test1);
	}
	console.log(test1);
}

// ------------------
// 호이스팅 (hoisting)
// ------------------

// console.log(htest1());
console.log(hvar);

function htest1() {
	return "htest1 함수입니다.";
}

var hvar = "var로 선언";//호출시 잘못되었을 경우에도 진행
let hlet = "let으로 선언"; //호출시 잘못되었을 경우 에러되어 멈추게 함