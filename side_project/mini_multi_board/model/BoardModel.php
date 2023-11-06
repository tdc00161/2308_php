<?php
 //Model 명은 테이블 명과 동일하게 감

namespace model;

class BoardModel extends ParentsModel {

	public function getBoardList($arrBoardInfo) {
		$sql =
			" SELECT "
			." id " // 현업에서는 필요한 요소가 거의 대부분이라도 다 입력해주는 방향으로 함
			." ,u_pk "
			." ,b_title "
			." ,b_content "
			." ,b_img "
			." ,created_at "
			." ,updated_at "
			." FROM board "
			." WHERE "
			." 		b_type = :b_type "
			." AND deleted_at IS NULL "
			;

		$prepare = [
			":b_type" => $arrBoardInfo["b_type"]
		];

		try {
			$stmt = $this -> conn -> prepare($sql);
			$stmt -> execute($prepare);
			$result = $stmt->fetchAll();
			return $result;
		} catch(Exception $e) {
			echo "BoardModel->getBoardList Error : ".$e->getMessage();
			exit();
		}
	}

	// public function addBoardList($arrAddBoardInfo) {
	// 	$sql =
	// 		" INSERT INTO "
	// 		." board( "
	// 		." id "
	// 		." ,b_title "
	// 		." ,b_content "
	// 		." ,b_img "
	// 		." ) "
	// 		." VALUES ( "
	// 		." 		b_title = :b_title "
	// 		." 		b_content = :b_content "
	// 		." 		b_img = :b_img "
	// 		." ) "
	// 		;

	// 		$prepare = [
	// 			$arrInput["b_title"]
	// 			$arrInput["b_content"]
	// 			$arrInput["b_content"]
	// 			$arrInput["b_content"]
	// 			$arrInput["b_content"]
	// 		];


	// 	try {
	// 		$stmt = $this -> conn -> prepare($sql);
	// 		$result = $stmt -> execute($prepare);
	// 		return $result;
	// 	} catch(Exception $e) {
	// 		echo "BoardModel->getBoardList Error : ".$e->getMessage();
	// 		exit();
	// 	}
	// }

	//작성글 인서트
	public function addBoard($arrAddBoardInfo) {
		$sql = 
			" INSERT INTO board ( "
			." u_pk "
			." ,b_type "
			." ,b_title "
			." ,b_content "
			." ,b_img "
			." ) "
			." VALUES ( "
			." :u_pk "
			." ,:b_type "
			." ,:b_title "
			." ,:b_content "
			." ,:b_img "
			." ) "
			;

		$prepare = [
			":u_pk" => $arrAddBoardInfo["u_pk"]
			,":b_type" => $arrAddBoardInfo["b_type"]
			,":b_title" => $arrAddBoardInfo["b_title"]
			,":b_content" => $arrAddBoardInfo["b_content"]
			,":b_img" => $arrAddBoardInfo["b_img"]
		];

		try {
			$stmt = $this-> conn -> prepare($sql);
			$result = $stmt -> execute($prepare);
			return $result;
		} catch(Exception $e) {
			echo "BoardModel->addBoard Error : ".$e->getMessage();
			exit();
		}

	}

}