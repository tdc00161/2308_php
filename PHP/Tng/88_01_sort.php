<?php

// 버블 정렬
$arr = [5, 34, 3, 7, 12];

$cnt = count($arr);

$i = 1;
while ($i <= $cnt-1){
    $a = 0;
    while ($a < $cnt-1) {
        if($arr[$a] > $arr[$a+1]){
            $tmp = $arr[$a];
            $arr[$a] = $arr[$a+1];
            $arr[($a+1)] = $tmp;
        }
        $a++;
    }
    $i++;
}
print_r($arr);

// $arr2 = [3, 2, 1];

// $tmp = $arr2[0];
// $arr2[0] = $arr2[1];
// $arr2[1] = $tmp;

// print_r($arr2);