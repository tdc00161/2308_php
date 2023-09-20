<?php

//함수 선언과 호출의 순서가 변경되어도 상관이 없음


// 함수 선언 : 함수를 만들어두는 것 
function my_sum($num1, $num2) {
	$sum = $num1 + $num2;
	return $sum;
}




// // 함수 호출 : 미리 만들어둔 함수를 부르는 것
// $result = my_sum(2, 5);

// echo $result;

// //실습 

// function my_sub($a, $b, $c) {
// 	// $sub = $a - $b - $c;
// 	// return $sub;
// 	return $a - $b - $c;
// }

// // $result = my_sub(5, 2, 1);
// // echo $result;
// echo my_sub(5,4,6);


// //$test = null;
// //변수에 숫자가 셋팅되어있는 상황에서 조건문에 쓸 때는 조심해야함! isset 함수로 싸면 값을 정확히 알 수 있음
// // 변수에 숫자가 셋팅되어있거나, 1일 경우 true 로 출력이 되고, 0일 경우 false 로 출력 왜? true = 1, false =0 으로 인식하기에 조심해야함.
// if( isset($test)) {
// 	echo "ttt";
// }



//공식을 구할 때 값이 나오면 변수에 담아야 결과값으로 도출하는 방향으로 할 수 있음.

//가변파라미터
function my_all_sum(...$numbers) {
	// print_r($numbers);
	$sum = 0;
	foreach($numbers as $key => $val) {
		$sum = $sum + $val;
	}
	return $sum;
	// return array_sum($numbers);
}

my_all_sum(2,3);

// 래퍼런스 파라미터
// pass by reference
function my_ref( $val, &$ref ) {
	$val = "my_ref"; 
	$ref = "my_ref";
}

$str1 = "str1";
$str2 = "str2";
my_ref($str1, $str2);

echo "str1 : {$str1}\n";
echo "str2 : {$str2}\n";
