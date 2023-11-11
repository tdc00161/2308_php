<?

//----------------------------------------
//함수명          : my_db_conn
// 기능           : DB Connect
// 파라미터       : PDO   &$conn
// 리턴           : boolean
//----------------------------------------

function my_db_conn( &$conn ) {
	$db_host    = "localhost"; // host
	$db_user    = "root"; // user
	$db_pw      = "php504"; // password
	$db_db_name = "mini_board_pratice"; // DB name
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
};


// ---------------------------------
// 함수명   : db_destroy_conn
// 기능     : DB Destroy
// 파라미터 : PDO   &$conn
// 리턴     : 없음
// ---------------------------------
function db_destroy_conn(&$conn) {
	$conn = null;
}

// ---------------------------------
// 함수명   : db_select_pratice_paging
// 기능     : pratice paging 조회
// 파라미터 : PDO		&$conn
//			 Array		&$arr_param 쿼리 작성용 배열
// 리턴(타입을 여기에)     : Array / false
// ---------------------------------
function db_select_pratice_paging(&$conn, &$arr_param) {
	try {
		$sql = 
		" SELECT "
		."		id "
		."		,title "
		."		,name "
		."		,created_at "
		." FROM "
		." 		pratice "
		// ." WHERE "
		// ." 		delete_flg = '0' "
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
		echo $e->getMessage(); // Exception 메세지 출력
		return false; // 예외발생 : false 리턴
	}
}

// ---------------------------------
// 함수명   : db_select_pratice_cnt
// 기능     : pratice count 조회
// 파라미터 : PDO		&$conn
// 리턴     : Int / false
// ---------------------------------
function db_select_pratice_cnt(&$conn) {
	$sql =
		" SELECT "
		."		COUNT(id) as cnt "
		." FROM "
		."		pratice "
		// ." WHERE "
		// ." 		delete_flg = '0' "
		;
	
		try {
			$stmt = $conn->query($sql);
			$result = $stmt->fetchAll();

			return (int)$result[0]["cnt"]; // 정상 : 쿼리 결과 리턴
		} catch(Exception $e) {
			echo $e->getMessage(); // Exception 메세지 출력
			return false; // 예외발생 : false 리턴
		}
}

// ---------------------------------
// 함수명   : db_insert_pratice
// 기능     : pratice 레코드 작성
// 파라미터 : PDO		&$conn
//			 Array		&$arr_param 쿼리 작성용 배열
// 리턴     : Boolean
// ---------------------------------
function db_insert_pratice(&$conn, &$arr_param) {
	$sql =
		" INSERT INTO pratice ( "
		."		title "
		."		,name "
		."		,content "
		." ) "
		." VALUES ( "
		."		:title "
		."		,:name "
		."		,:content "
		." ) "
		;
	$arr_ps = [
		":title" => $arr_param["title"]
		,":name" => $arr_param["name"]
		,":content" => $arr_param["content"]
	];

	try {
		$stmt = $conn->prepare($sql);
		$result = $stmt->execute($arr_ps);
		return $result; //  // 정상 : 쿼리 결과 리턴
	} catch(Exception $e) {
		echo $e->getMessage(); // Exception 메세지 출력
		return false; // 예외발생 : false 리턴
	}
}




// ----------------------------------------
// 함수명          : db_select board id
// 기능           : boards 레코드 작성
// 파라미터       : PDO   &$conn
// 						Array   &$arr_param 쿼리 작성용 배열
// 리턴           : Array / false
// ----------------------------------------


// 리턴을 왜 저렇게 받는 거지?
function db_select_pratice_id(&$conn, &$arr_param) {
	$sql =
		" SELECT "
		."		id "
		."		,title "
		."		,name "
		."		,content "
		."		,created_at "
		." FROM "
		." 		pratice "
		." WHERE "
		." 		id = :id "
		// ." AND "
		// ."		delete_flg = '0'"
		;
	
	$arr_ps = [
		":id" => $arr_param["id"] 
	];

	try {
		$stmt = $conn->prepare($sql);
		$stmt->execute($arr_ps);
		$result = $stmt->fetchAll();
		return $result;
	} catch(Exception $e) {
		echo $e->getMessage(); // Exception 메세지 출력
		return false; // 예외발생 : false 리턴
	} 
}


?>