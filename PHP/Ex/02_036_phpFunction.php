<?php

// trim() : 문자열의 공백을 없애주는 함수
// echo " sdsd ", "\n", trim(" sdsd ");

// strtoupper // strtolower : 문자열을 대/소문자로 변환하는 함수
// echo strtoupper("asdasd"), strtolower("ASDASFD");


// strlen() : 문자열의 길이를 반환
// mb_strlen() : 멀티바이트 문자열의 길이를 반환
// echo strlen("asdasd");
// echo mb_strlen("가나다");

// str_replace() : 특정 문자를 치환해주는 함수
// echo str_replace("a", "/", "efsdfsdfsd");

//substr() : 문자열을 자르는 함수
//mb_substr() : 멀티바이트 문자열을 자르는 함수
// echo substr("abcdefg", 1, 4);

// strpos() : 문자열에서 특정 문자의 위치를 반환하는 함수
// echo strpos("abcdefg", "d");


//time() : 1970/01/01을 기준으로 타임스탬프 시간 확인하는 함수
// echo time();

// date() : 원하는 형식으로 시간 표시해주는 함수
echo date("Y-m-d H:i:s", time());