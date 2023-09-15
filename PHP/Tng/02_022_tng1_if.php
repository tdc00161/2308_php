<?php
$num = 55;
$grade = "";
$anwser = "당신의 점수는 %u점 입니다. <%s>";

if ( $num >= 0 && $num <= 100 ){

    if ( $num === 100){
        $grade = "A+";
    }
    else if ( $num >= 90){
        $grade = "A";
    }
    else if ( $num >= 80){
        $grade = "B";
    }
    else if ( $num >= 70){
        $grade = "C";
    }
    else if ( $num >= 60){
        $grade = "D";
    }
    else {
        $grade = "F";
    }

    $str = sprintf($anwser, $num, $grade);
    echo $str;

}

else {
    echo "잘못된 값을 입력 했습니다.";
}