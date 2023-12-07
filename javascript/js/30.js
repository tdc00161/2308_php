

// Date
let now = new Date(); // 오늘 date
let sDate = new Date('2023-09-30 19:20:10');

// getfullyear() : 연도만 가져오는 메소드
console.log(now.getFullYear());

// getMonth() : 월만 가져오는 메소드 (+1를 해줘야지 현재월과 같습니다.)
console.log(now.getMonth() + 1);

// getDate() : 일을 가져오는 메소드
console.log(now.getDate());

// getDay() : 요일을 가져오는 메소드 ( 0(일요일) ~ 6(토요일) )
console.log(now.getDay());
let kDay = '';
switch (day) {
	case 1:
		kDay = '월요일';
		break;
	case 2:
		kDay = '화요일';
		break;
	case 3:
		kDay = '수요일';
		break;
	case 4:
		kDay = '목요일';
		break;
	case 5:
		kDay = '금요일';
		break;
	case 6:
		kDay = '토요일';
		break;
	default:
		kDay = '일요일';
		break;
}
console.log(now.getDay() + ' : ' + kDay);

// getHours() : 시를 가져오는 메소드
console.log(now.getHours());

// getMinutes() : 분을 가져오는 메소드
console.log(now.getMinutes());

// getSeconds() : 초를 가져오는 메소드
console.log(now.getSeconds());

// getMilliseconds() : 밀리초를 가져오는 메소드
console.log(now.getMilliseconds());

// gettime() :  19970/01/01 기준으로 얼마나 지났는지 

console.log(now.getTime());

// 기준일 : 2023-09-30 19:20:10
// 오늘로부터 몇일 전인지 구해봅시다.
now = new Date(); // 오늘 date
sDate = new Date('2023-09-30 19:20:10');
now2 = new Date(year, month, date, 0, 0, 0, 0); // 오늘날짜 0시 0분 0초 0밀리초 가져오는 방법


let diffDate = sDate.getTime() - now.getTime();
let today = Math.abs(diffDate / (1000 * 60 * 60 *24));

console.log(today);

