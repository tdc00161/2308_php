<?php

// 폴더(디렉토리) 만들기

if(mkdir("../tng/testdir",777)){
    echo "정상";
} else {
    echo "실패";
}

rmdir("../tng/testdir");

//////////////////
// 파일
/////////////////
$file = fopen("zz.txt", "r");
var_dump($file);

// 파일 쓰기

$f_wirte = fwrite($file, "탕수육\n");

// 파일 읽기
$line = fread($file, "5");
echo $line;

// 파일 읽기(한줄씩)
echo fgets($file);

if($file) {
    echo "참";
} else {
    echo "거짓";
}

fclose($file);


