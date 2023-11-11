<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_board_pratice/src");
define("FILE_HEADER",ROOT."/header.php");
require_once(ROOT."/lib/lib.php");

$id = ""; // 게시글 id
$conn = null; // DB Connect

try {
	// DB 연결
	if(!my_db_conn($conn)) {
		// DB Instance 에러
		throw new Exception("DB Error : PDO Instance");
	}

	// 파라미터 획득
	$id = isset($_GET["id"]) ? $_GET["id"] : ""; // id 셋팅
	$page = isset($_GET["page"]) ? $_GET["page"] : ""; // page 셋팅

	// if($id === "") {
	// 	$arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "id");
	// }
	// if($page === "") {
	// 	$arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "page");
	// }
	// if(count($arr_err_msg) >= 1) {
	// 	throw new Exception(implode("<br>", $arr_err_msg));
	// }
	// 게시글 데이터 조회
	$arr_param = [
		"id" => $id
	];
	$result = db_select_pratice_id($conn, $arr_param);

	// 게시글 조회 예외처리
	if($result === false) {
		// 게시글 조회 에러
		throw new Exception("DB Error : PDO Select_id");
	} else if(!(count($result) === 1)) {
		// 게시글 조회 count 에러
		throw new Exception("DB Error : PDO Select_id count");
	}
	$item = $result[0];
} catch(Exception $e) {
	echo $e->getMessage(); // 예외발생 메세지 출력  //v002 del
	// header("Location: /mini_board/src/error.php/?err_msg={$e->getMessage()}"); // v002 add
	exit; // 처리종료
} finally {
	db_destroy_conn($conn); // DB 파기
}

?>

<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="./common.css">
	<title>상세페이지</title>
</head>
<body>
	<header><h1>공지사항</h1></header>
	<main class="detail_main">
			<div class="mb-3">
				<div><?php echo $item["title"]; ?></div>
			</div>
			<div class="mb-3">
				<div><?php echo $item["name"]; ?></div>
			</div>
			<div class="mb-3">
				<div><?php echo $item["content"]; ?></div>
			</div>
			<div class="mb-3">
				<div>파일.jpg</div>
			</div>
			<br><br>
			<div class="detail_div">
				<a class="btn btn-secondary" href="/mini_board_pratice/src/update.php?id=<?php echo $id; ?>&page=<?php echo $page; ?>">수정</a>
				<a class="btn btn-secondary" href="/mini_board_pratice/src/delete.php?id=<?php echo $id; ?>&page=<?php echo $page; ?>">삭제</a>
				<a class="btn btn-secondary" href="/mini_board_pratice/src/list.php?page=<?php echo $page; ?>">취소</a>
			</div>	
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	</main>
</body>
</html>