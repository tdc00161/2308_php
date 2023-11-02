<?php

// php 할 때 닫는 태그는 사용 안 할 예정 왜? 객체에서 잘 못 닫을 경우 에러나게됨
// html 작성시에는 php 닫는 태그 사용

require_once("config.php"); // 설정 파일 불러오기
require_once("autoload.php"); // 오토로트 파일 불러오기


// 라우터 호출
new router\Router();

