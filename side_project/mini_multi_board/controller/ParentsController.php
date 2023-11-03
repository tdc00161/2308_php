<?php

namespace controller;

class ParentsController {
	protected $controllerchkUrl; // 헤더 표시 제어용 문자열
	protected $arrErrorMsg = []; // 화면에 표시할 에러메세지 리스트
	private $arrNeedAuth = [
		"board/list"
	]; //권한이 필요한 사이트 작성

	public function __construct($action) {
		// 뷰관련 체크 접속 url 셋팅
		$this -> controllerchkUrl = $_GET["url"];
		// $this 로 시작될 경우 그 뒤에 변수는 $를 적어주면 안 됨


		// 세션 시작
		if(!isset($_SESSION)) {
			session_start();
			// 보안이 필요한 상황에서는 session : 리소스를 많이 먹기에 꼭 필요한거만 저장
			// cooki는 유저의 브라우저에 저장하여 보안에 취약함
		}

		// 유저 로그인 및 권한 체크
		$this -> chkAuthorization();

		// controller 메소드 호출
		$resultAction = $this -> $action();

		// view 호출
		$this -> callView($resultAction);
		exit();
	}

	// 유저 권한 체크용 메소드
	private function chkAuthorization() {
		$url = $_GET["url"];
		if( !isset($_SESSION["u_id"]) && in_array($url, $this->arrNeedAuth) ) {
			header("Location: /user/login");
			exit();
		}
	}

	// 뷰 호출용 메소드
	private function callView($path) {
		// view/list.php
		// Location: /board/list
		if( strpos($path, "Location:") === 0 ) {
			header($path);
		} else {
			require_once($path);
		}
	}
}