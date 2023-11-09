<?php

namespace controller;

use model\UserModel;
use lib\Validation;

class UserController extends ParentsController {
	// 로그인
	protected function loginGet( ) {
		return "view/login.php";
	}

	// 로그인 처리
	protected function loginPost() {
		$inputData = [
			"u_id" => $_POST["u_id"]
			,"u_pw" => $_POST["u_pw"]
		];

		// 유효성 체크(암호화 하기전 데이터로 유효성 체크를 해야함)
		if(!Validation::userChk($inputData)) {
			$this->arrErrorMsg = Validation::getArrErrorMsg();
			return "view/login.php";
		}

		
		// ID, PW 설정(DB에서 사용할 데이터 가공)
		$arrInput = [];
		$arrInput["u_id"] = $_POST["u_id"];
		$arrInput["u_pw"] = $this -> encryptionPassword($_POST["u_pw"]);

	

		// 유저정보 획득
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
		$inputData = [
			"u_id" => $_POST["u_id"]
			,"u_pw" => $_POST["u_pw"]
			,"u_pw_chk" => $_POST["u_pw_chk"]
			,"u_name" => $_POST["u_name"]
		];

		$arrAddUserInfo = [
			"u_id" => $_POST["u_id"]
			,"u_pw" => $this->encryptionPassword($_POST["u_pw"])
			,"u_name" => $_POST["u_name"]
		];

		// TODO : 발리데이션 체크
		
		// DB에꺼를 

		// 유효성 체크
		$errFlg = "0";
        $errMsg = "";
        $u_id = $_POST["u_id"];
        $inputData["u_id"] = $u_id;

        if (!Validation::userChk($inputData)) {
            $errFlg = "1";
            $errMsg = Validation::getArrErrorMsg()[0];
        }
        // 모델 인스턴스
        $userModel = new UserModel();
        // idChk 결과 획득
        $result = $userModel->getUserInfo($inputData);
        // 사용 모델 파기
        $userModel->destroy();
        if(count($result) > 0) {
            $errFlg = "1";
            $errMsg = "중복된 아이디입니다.";
        }
        $response = [
            "errflg" => $errFlg
            ,"msg" => $errMsg
        ];
        // response 처리
        header('Content-type: application/json');
        echo json_encode($response); // 값을 출력해서 그냥 주는 듯
        exit();




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

	// TODO : 아이디 중복 체크 필요
	protected function idChkGet() {
		$errFlg = "0";
        $errMsg = "";
        $u_id = $_GET["u_id"];
        $inputData["u_id"] = $u_id;
		
        // 유효성 체크
        if (!Validation::userChk($inputData)) {
            $errFlg = "1";
            $errMsg = Validation::getArrErrorMsg()[0];
        }
        // 모델 인스턴스
        $userModel = new UserModel();

        // idChk 결과 획득
        $result = $userModel->getUserInfo($inputData);

        // 사용 모델 파기
        $userModel->destroy();
        if(count($result) > 0) {
            $errFlg = "1";
            $errMsg = "중복된 아이디입니다.";
        }
        $response = [
            "errflg" => $errFlg
            ,"msg" => $errMsg
        ];
        // response 처리
        header('Content-type: application/json');
        echo json_encode($response); // 값을 출력해서 그냥 주는 듯
        exit();

	}
	

	// 비밀번호 암호화
	private function encryptionPassword($pw) {
		return base64_encode($pw);
	}




}