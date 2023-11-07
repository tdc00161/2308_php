<?php

namespace controller;

use model\UserModel;

class UserController extends ParentsController {
	// 로그인
	protected function loginGet( ) {
		return "view/login.php";
	}

	// 로그인 처리
	protected function loginPost() {
		// ID, PW 설정(DB에서 사용할 데이터 가공)
		$arrInput = [];
		$arrInput["u_id"] = $_POST["u_id"];
		$arrInput["u_pw"] = $this -> encryptionPassword($_POST["u_pw"]);

		$modelUser = new UserModel();
		$resultUserInfo = $modelUser -> getUserInfo($arrInput, true);

		// 유저 유무 체크
		if(count($resultUserInfo) === 0) {
			$this -> arrErrorMsg[] = "아이디와 비밀번호를 다시 확인해주세요.";
			// 로그인 페이지로 리턴
			return "view/login.php";
		}

		// 세션에 u_id 저장
		$_SESSION["u_pk"] = $resultUserInfo[0]["id"];

		// return "view/list.php"; 이렇게 할 경우 호스트명에 제대로 안보여짐
		return "Location: /board/list?b_type=0";
	}

	// 로그아웃 처리
	protected function logoutGet() {
		session_unset(); // 다 비워주는 함수
		session_destroy(); // 고유 아이디를 파기해주는 함수
		// 2개 같이 사용함


		//로그인 페이지 리턴
		return "Location: /user/login";
	}



	// 회원가입 페이지 이동
	protected function registGet() {
		return "view/regist"._EXTENSION_PHP;
	}

	// 회원가입 처리
	protected function registPost() {
		$u_id = $_POST["u_id"];
		$u_pw = $_POST["u_pw"];
		$u_name = $_POST["u_name"];
		$arrAddUserInfo = [
			"u_id" => $u_id
			,"u_pw" => $this -> encryptionPassword($u_pw)
			,"u_name" => $u_name
		];

		$patternId = "/^[a-zA-Z0-9]{8,20}$/";
		$patternPw = "/^[a-zA-Z0-9!@]{8,20}$/";
		$patternName = "/^[a-zA-Z가-힣]{2,50}$/";

		if(preg_match($patternId, $u_id, $match) === 0) {
			// ID 에러처리
			$this -> arrErrorMsg[] = "아이디는 영어대소문자와 숫자로 8~20자 입력해 주세요. ";
		}
		if(preg_match($patternPw, $u_pw, $match) === 0) {
			// PW 에러처리
			$this -> arrErrorMsg[] = "비밀번호는 영어대소문자와 숫자, !, @로 8~20자 입력해 주세요. ";
		}
		if(preg_match($patternName, $u_name, $match) === 0) {
			// Name 에러처리
			$this -> arrErrorMsg[] = "이름은 영어대소문자와 한글로 2~50자 입력해 주세요. ";
		}

		// TODO : 아이디 중복 체크 필요


		// 유효성 체크 실패
		if(count($this->arrErrorMsg) > 0) {
			return "view/regist.php";
		}

		// 인서트 처리
		$userModel = new UserModel();
		$userModel->beginTransaction();
		$result = $userModel->addUserInfo($arrAddUserInfo);

		if($result !== true) {
			$userModel->rollBack();
		} else {
			$userModel->commit();
		}
		$userModel->destroy();

		return "Location: /user/login";
	}


	// 비밀번호 암호화
	private function encryptionPassword($pw) {
		return base64_encode($pw);
	}




}