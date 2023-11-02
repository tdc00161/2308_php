<?php

// autoload 는 객체 지향에서 많이 사용하게 됨
spl_autoload_register( function($path) {
	$path = str_replace("\\", "/", $path);

	require_once($path._EXTENSION_PHP);
});
