<?php

// for($i=1; $i <=10; $i++){
//     echo $i, "\n"; 
// }


// for($i=1;  $i <=9; $i++){
//     $num1 = $i * 2;
//     echo "2 x {$i} = {$num1}", "\n";
// }




    // for($i=1; $i <=9; $i++){
    //     if($i >=2 and $i <=8){
    //         continue;
    //     }
    //     echo "{$i}단 \n";
    //         for($a=1; $a <=9; $a++) {
    //             $num1 = $i * $a;
    //             echo "{$i} x {$a} = {$num1}", "\n";
    //         }
    // }


    
    for($i=1; $i <=9; $i++){
        if($i++){
            continue;
        }
        echo "{$i}단 \n";
            for($a=1; $a <=9; $a++) {
                $num1 = $i * $a;
                echo "{$i} x {$a} = {$num1}", "\n";
            }
    }