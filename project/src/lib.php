<?php
//----------------------------------------
//함수명          : my_db_conn
// 기능           : DB Connect
// 파라미터       : PDO   &$conn
// 리턴           : boolen
//----------------------------------------

function my_db_conn( &$conn ) {
	$db_host    = "localhost"; // host
	$db_user    = "root"; // user
	$db_pw      = "php504"; // password
	$db_db_name = "music_board"; // DB name
	$db_charset = "utf8mb4"; // charset
	$db_dns     = "mysql:host=".$db_host.";dbname=".$db_db_name.";charset=".$db_charset;

	try{
		$db_options = [
			PDO::ATTR_EMULATE_PREPARES      => false
			,PDO::ATTR_ERRMODE              => PDO::ERRMODE_EXCEPTION
			,PDO::ATTR_DEFAULT_FETCH_MODE   => PDO::FETCH_ASSOC
		];

	// PDO Class로 DB 연동
		$conn = new PDO($db_dns, $db_user, $db_pw, $db_options);
		return true;
	} catch (Exception $e) {
		$conn = null;  //DB 파기
		return false;
	}
}
//----------------------------------------
//함수명          : db_destroy_conn
// 기능           : DB Destroy
// 파라미터       : PDO   &$conn
// 리턴           : 없음
//----------------------------------------

function db_destroy_conn(&$conn) {
	$conn = null;
}

//----------------------------------------
//함수명          : db_select_boards_paging
// 기능           : boards paging 조회
// 파라미터       : PDO   &$conn
//				   Array  &$arr_param 쿼리 작성용 배열
// 리턴           : Array / false
//----------------------------------------

function db_select_boards_paging(&$conn, &$arr_param) {
	try {
		$sql = 
		" SELECT "
		." 		id "
		." 		,title "
		." 		,name "
		." 		,type "
		." 		,create_at "
		." FROM "
		." 		boards "
		." WHERE "
		." 		delete_flg = '0' "
		." ORDER BY "
		." 		id DESC "
		." LIMIT :list_cnt OFFSET :offset "
		;

		$arr_ps = [
			":list_cnt" => $arr_param["list_cnt"]
			,":offset" => $arr_param["offset"]
		];

		$stmt = $conn->prepare($sql);
		$stmt->execute($arr_ps);
		$result = $stmt->fetchAll();
		return $result; // 정상 : 쿼리 결과 리턴
	} catch(Exception $e) {
		echo $e->getMessage();
		return false; // 예외발생 : flase 리턴
	}
}

// $conn = null;

//----------------------------------------
//함수명          : db_select_boards_cnt
// 기능           : boards paging 전체 갯수
// 파라미터       : PDO   &$conn
//				   Array  &$arr_param 쿼리 작성용 배열
// 리턴           : Array / false
//----------------------------------------

function db_select_boards_cnt(&$conn) {
	$sql = 
		" SELECT "
		." 		count(id) as cnt "
		." FROM "
		." 		boards "
		." WHERE "
		." 		delete_flg = '0' "
		;
	
		try {
			$stmt = $conn->query($sql);
			$result = $stmt->fetchAll();
			return (int)$result[0]["cnt"]; // 정상 : 쿼리 결과 리턴
		} catch(Exception $e) {
			return false; // 예외발생 : flase 리턴
		}
}

//----------------------------------------
//함수명          : db_insert_boards
// 기능           : boards 레코드 작성
// 파라미터       : PDO   &$conn
//				   Array  &$arr_param 쿼리 작성용 배열
// 리턴           : Boolean
//----------------------------------------

function db_insert_boards(&$conn, &$arr_param) {
	$sql = 
		" INSERT INTO boards ( "
		."		title "
		."		,name "
		."		,type "
		."		,memo "
		." ) "
		." VALUES ( "
		." 		:title "
		."		,:name "
		."		,:type "
		."		,:memo "
		." ) "
		;

	$arr_ps = [
		":title" => $arr_param["title"]
		,":name" => $arr_param["name"]
		,":type" => $arr_param["type"]
		,":memo" => $arr_param["memo"]
	];

	try {
		$stmt = $conn->prepare($sql);
		$result = $stmt->execute($arr_ps);
		return $result; // 정상 : 쿼리 결과 리턴
	} catch(Exception $e) {
		return false; // 예외발생 : flase 리턴
	}
}

//----------------------------------------
//함수명          : db_select_boards_id
// 기능           : boards id 작성
// 파라미터       : PDO   &$conn
//				   String  $id 게시글 id
// 리턴           : Array
//----------------------------------------

function db_select_boards_id(&$conn, &$arr_param) {
	$sql =
		" SELECT "
		." id "
		." ,title "
		." ,name "
		." ,type "
		." ,memo "
		." ,create_at "
		." ,update_at "
		." FROM "
		." boards "
		." WHERE "
		." id = :id "
		." AND "
		."	delete_flg = '0' " // 삭제된 리스트에 들어가지 않을 수 있도록 설정해주어야함.
		;

	$arr_ps = [
		":id" => $arr_param["id"]
	];

	try {
		$stmt = $conn->prepare($sql);
		$stmt->execute($arr_ps);
		$result = $stmt->fetchAll();
		return $result; // 정상 : 쿼리 결과 리턴
	} catch(Exception $e) {
		return false; // 예외발생 : flase 리턴
	}
}

//----------------------------------------
//함수명          : db_update_boards_id
// 기능           : boards 레코드 수정
// 파라미터       : PDO   &$conn
//				   Array   &$arr_param 쿼리 작성용 배열
// 리턴           : boolean
//----------------------------------------
function db_update_boards_id(&$conn, &$arr_param) {
	$sql =
		" UPDATE "
		." boards "
		." SET "
		." title = :title "
		." ,name = :name "
		." ,type = :type "
		." ,memo = :memo "
		." WHERE "
		." id = :id "
		;
	$arr_ps = [
		":title" => $arr_param["title"]
		,":name" => $arr_param["name"]
		,":type" => $arr_param["type"]
		,":memo" => $arr_param["memo"]
		,":id" => $arr_param["id"]
	];

	try {
		$stmt = $conn->prepare($sql);
		$result = $stmt->execute($arr_ps);
		return $result;

	} catch(Exception $e) {
		echo $e->getMassage();
		return false;
	}

}

//----------------------------------------
//함수명          : db_delete_boards_id
// 기능           : 특정ID의 레코드 삭제처리
// 파라미터       : PDO   &$conn
//				   Array   &$arr_param
// 리턴           : boolean
//----------------------------------------

function db_delete_boards_id(&$conn, &$arr_param) {
	$sql =
	" UPDATE boards "
	." SET "
	." delete_at = now() "
	." ,delete_flg = '1' "
	." WHERE "
	." id = :id "
	;
	$arr_ps = [
		":id" => $arr_param["id"]
	];

	try {

		$stmt = $conn->prepare($sql);
		$result = $stmt->execute($arr_ps);

		return $result;
	} catch(Exception $e) {
		echo $e->getMessage();
		return false;
	}
}













// 나중에 없애기
// $conn=null;
// $arr_param=[
// 	"title"=>"asdf"
// 	,"content"=>"aafassdfasdf"
// ];
// my_db_conn($conn);
// $result=db_insert_boards($conn, $arr_param);
// var_dump($result);


?>