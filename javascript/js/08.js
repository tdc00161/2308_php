
// 조건문
// if(조건) {
// 	//처리
// } else if(조건) {
// 	//처리
// } else {
// 	//처리
// } 

// let age = 10;
// switch(age) {
// 	case 20:
// 		console.log("20대");
// 		break;
// 	case 30:
// 		console.log("30대");
// 	break;
// 	default:
// 		console.log("모르겠다");
// 		break;
// }

// ---------------------------------------------------------------
// 반복문 ( while, do_while, for, foreach, for...in, for...of )
// ---------------------------------------------------------------

// foreach : 배열만 사용가능
// let arr = [1, 2, 3, 4];
// arr.forEach( function( val, key ){
// 	console.log(`${key} : ${val}`)
// });

// for...in : 모든 객체를 루프 가능, key에만 접근이 가능(배열에는 접근 못함)
// let obj = {
// 	key1: 'val1'
// 	,key2: 'val2'
// }

// for( let key in obj ) {
// 	console.log(key);
// }

// // for...of : 모든 interable 객체를 루프 가능, value에 접근 가능(string, Array, Map, Set, TypeArray..)
// for( let val of obj ) {
// 	console.log(val);
// }


// 정렬해주세요.

// let sort_arr = [3, 5, 2, 7, 10];

function bubbleSort (array) {
	for (let i = 0; i < array.length; i++){
		let swap;
		for (let j = 0; j < array.length - 1 - i; j++) {
			if (array[j] > array[j + 1]) {
				swap = array[j];
				array[j] = array[j + 1];
				array[j + 1] = swap;
			}
		}

		console.log(`${i}회전 : ${array}`);
		if (!swap) {
			break;
		}
	}
	return array;
}
console.log(bubbleSort([3, 5, 2, 7, 10]));
