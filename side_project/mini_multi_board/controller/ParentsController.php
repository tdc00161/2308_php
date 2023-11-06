<?php

namespace controller;

use model\BoardNameModel; // 어떤 모델을 사용할지 먼저 선언해두는 것

class ParentsController {
	protected $controllerchkUrl; // 헤더 표시 제어용 문자열
	protected $arrErrorMsg = []; // 화면에 표시할 에러메세지 리스트
	protected $arrBoardNameInfo; // 헤더 게시판 드롭다운 표시용
	//protected 를 사용한 이유는 자식쪽에서 사용하기 위함

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

		// 헤더 게시판 드롭박스 데이터 획득
		$boardNameModel = new BoardNameModel();
		$this->arrBoardNameInfo = $boardNameModel->getBoardNameList();
		$boardNameModel->destroy();

		// controller 메소드 호출
		$resultAction = $this -> $action();

		// view 호출
		$this -> callView($resultAction);
		exit();
	}

	// 유저 권한 체크용 메소드
	private function chkAuthorization() {
		$url = $_GET["url"];

		// 접속권한이 없는 페이지 접속차단
		if( !isset($_SESSION["u_pk"]) && in_array($url, $this->arrNeedAuth) ) {
			header("Location: /user/login");
			exit();
		}

		// 로그인한 상태에서 로그인 페이지 접속시 board/list로 이동
		if( isset($_SESSION["u_pk"]) && $url === "user/login" ) {
			header("Location: /board/list");
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