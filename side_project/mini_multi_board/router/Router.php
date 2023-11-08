<?php
namespace router;

// 사용할 컨트롤러들 지정
use controller\UserController;
use controller\BoardController;

// 라우터 : 유지의 요청을 분석해서 해당 Controller 로 연결해주는 클래스
class Router {
	public function __construct() {
		// URL 규칙
		// 1. 회원 정보 관련 URL
		//		user/[해당기능]
		//		ex) 로그인 : 호스트/user/login
		//		ex) 회원가입 : 호스트/user/registe
		// 2. 게시판 관련 URL
				//		board/[해당기능]
		//		ex) 리스트 : 호스트/board/list
		//		ex) 수정 : 호스트/board/edit

		$url = $_GET["url"]; // 접속 url
		$method = $_SERVER["REQUEST_METHOD"]; // 메소드 획득

		if($url === "user/login") {
			if($method === "GET") {
				new UserController("loginGet"); // 메소드에 소괄호를 붙여주면 실행시킴
				// 해당 컨트롤러 호출
			} else {
				// 해당 컨트롤러 호출
				new UserController("loginPost");
			}
		} else if($url === "user/logout") {
			if($method === "GET") {
				// 해당 컨트롤러 호출
				new UserController("logoutGet");
			}
		} else if ($url === "user/regist") {
			if($method === "GET") {
				new UserController("registGet");
			} else {
				new UserController("registPost");
			}
		} else if ($url === "board/list") {
			if($method === "GET") {
				new BoardController("listGet");
			}
			// if($method === "POST") {
			// 	new BoardController("insertPost");
			// }
		} else if($url === "board/add") {
			if($method === "GET") {
				// 처리없음
			} else {
				new BoardController("addPost");
			}
		} else if($url === "board/detail") {
			if($method === "GET") {
				new BoardController("detailGet");
			}
		} else if($url === "board/count"){
			if($method === "GET") {
				new UserController("countGet");
			}
		}

		// 없는 경로일 경우
		echo "이상한 URL : " .$url;
		exit();
	}
}