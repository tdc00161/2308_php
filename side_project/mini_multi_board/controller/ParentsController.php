<?php

namespace controller;

class ParentsController {
	protected $controllerchkUrl;

	public function __construct($action) {
		// 뷰관련 체크 접속 url 셋팅
		$this -> controllerchkUrl = $_GET["url"];
		// $this 로 시작될 경우 그 뒤에 변수는 $를 적어주면 안 됨


		// controller 메소드 호출
		$resultAction = $this -> $action();

		// view 호출
		require_once($resultAction);
		exit();
	}
}