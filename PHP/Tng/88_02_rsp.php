<?php

// $in_str = fgets(STDIN);

// echo "입력값 : {$in_str}";

// $rnd = array("rock", "scissors", "paper");
// $user = array_rand($rnd);
// $cpt = array_rand($rnd);

// if($use != $cpt){
//     $user = "가위", $cpt = "바위" && $user = "바위", $cpt = "보" && $user = "보", $cpt = "가위";
//     echo "컴퓨터 승리";
//     } else if($user != $cpt) {
//         $user === "가위" $cpt === "보" && $user === "바위" $cpt === "가위" && $user === "보" $cpt === "바위";
//         echo "유저 승리";
//     } else if($user = $cpt){
//         $user === "가위" $cpt === "가위" && $user === "바위" $cpt === "바위" && $user === "보" $cpt === "보";
//         echo "무승부";
//     } else {
//         "error";
// }

$user = $in_str = fgets("rock");

$arr = array("rock", "soci", "paper");
$compu = array_rand($arr);
$computer = $arr[$compu];
echo "내가 낸 값 : {$user}\n상대방이 낸 값 : {$computer}\n";

if($user === $computer){
    echo "무승부";
} else if($user === "rock"){
    if($computer === "soci") {
        echo "유저 승리";
    } else if($computer === "paper"){
        echo "컴퓨터 승리";
    }
} else if($user === "soci"){
    if($computer === "paper"){
        echo "유저 승리";
    } else if($computer === "rock"){
        echo "컴퓨터 승리";
    }
} else if($user === "paper"){
    if($computer === "rock"){
        echo "내가 승리";
    } else if($computer === "soci"){
        echo "컴퓨터 승리";
    }
} else {
        "error";
}