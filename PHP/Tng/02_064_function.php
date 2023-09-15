<?php

// 몇개일지 모르는 숫자를 다 더해주는 함수를 만들어주세요.

// function my_sum4(...$items){
//     for($div=0; $div >= 0; $div++){
//         echo array_sum($div);
//     }
// }



// 재귀 함수

// my_reverse();

// function my_fun(...$items){
//     for($i=1; $i<= 10000 $i++)
// }


$i = 1;

// while (count($i) <= 9){
//     str{*};
//     $i++;
// }

// $i = 1;
// while($i <= 5) {
//     for($a = 1; $a <= $i; $a++){
//         echo  "*";
//     }
//     $i++;
//     echo "\n";
// }

$i = 1;
while($i <= 5) {
    for($a = 1; $a <= $i; $a++){
        echo  "*" ;
    }
    $i++;
    echo str_pad(" ",5," ",STR_PAD_LEFT);

}