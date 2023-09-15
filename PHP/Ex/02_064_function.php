<?php

// 두 숫자를 받아서 더해주는 함수를 만들어봅시다.
// // 리턴이 없는 함수
// function my_sum($a, $b) {
//     echo $a + $b;
// }

// // my_sum(5, 4);

// // 리턴이 있는 함수
// function my_sum2($a, $b) {
//     return $a + $b;
// }

// echo my_sum2(1, 2);



// function ma2($a, $b) {
//     return $a - $b;
// }
// echo ma2(2, 3);

// function ma3($c, $d) {
//     return $c * $d;
// }

// echo ma3(2, 3);

// function ma4($e, $f) {
//     return $e / $f;
// }

// echo ma4(2, 3);


// 파라미터의 기본값이 설정되어 있는 함수
// function my_sum3($a, $b = 5) {
//     return $a + $b;
// }
// echo my_sum3(3);

// 가변 파라미터
//php-5.6 이상 가능
// function my_args_param(...$items){
//     echo $items[1];
// }

my_args_param("a", "b", "c");

//php-5.5 이하에서 사용방법
function my_args_param() {
    $items = func_get_args();
    print_r($items);
}