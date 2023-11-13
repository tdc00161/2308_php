<?php

spl_autoload_register( function($path) {
	$path = str_replace("\\", "/", $path);

	require_once($path._EXTENSION_PHP);
});


//spl_autoload_register 는 주어진 함수를 autoload()로 구현해서 등록해줌
//str_replace 는 문자열에서 문자열로 변경해줌

// autoload : 클래스를 사용하기 전에 해당 클래스 파일을 수동으로
// include 또는 require 하지 않고도 자동으로 로드할 수 있게 해줌
// 이렇게 하는 이유는? 코드를 효율적으로 관리하며, 유지보수가 더 쉽다.


// _EXTENSION_PHP : 코드가 실행되는 플랫폼에 따라 올바른 파일 확장자를 자동으로 선택
// -> 플랫폼 간 이식성을 높게 만들어주는데 도움

/* 이식성 = 소프트웨어나 하드웨어가 다른 환경으로 쉽게 이동할 수 있는 능력
여러 플랫폼에서 동작 가능, 수정이나 변경 또는 특정 플랫폼에 의존하지않고
다양한 곳에서 작동할 수 있음
*/

// define : 상수 정의