<?php
// $sang = "6등";
// $award = "";

// switch( $sang ) {
//     case "1등";
//         // echo "금상";
//         $award = "금상";
//         break;
//     case "2등";
//         // echo "은상";
//         $award = "은상";
//         break;
//     case "3등";
//         // echo "동상";
//         $award = "동상";
//         break;
//     case "4등";
//         // echo "장려상";
//         $award = "장려상";
//         break;
//     default:
//         // echo "노력상";
//         $award = "노력상";
//         break;
// }

// echo $award;

$sang = 7;
$award = "";


if($sang === 1){
    $award = "금상";
}
else if($sang === 2){
    $award = "은상";
}
else if($sang === 3){
    $award = "동상";
}
else if($sang === 4){
    $award = "장려상";
}
else {
    $award = "노력상";
}

echo $award;