<?php

spl_autoload_register( function($path) {
	$path = str_replace("\\", "/", $path);

	require_once($path._EXTENSION_PHP);
});


//spl_autoload_register 는 주어진 함수를 autoload()로 구현해서 등록해줌
//str_replace 는 문자열에서 문자열로 변경해줌