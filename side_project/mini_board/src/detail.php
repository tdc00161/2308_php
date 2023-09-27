<?php
	define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_board/src/"); // 웹서버
	define("FILE_HEADER", ROOT."header.php"); // 헤더 패스
	require_once(ROOT."lib/lib_db.php"); // DB관련 라이브러리

	$id = ""; // 게시글 id
	$conn = null; // DB Connect
 
	try {

		if(!my_db_conn($conn)) {
			//DB Instance 에러
			throw new Exception("DB Error : PDO Instance"); // 강제 예외발생 : DB Instance
		}

		// id 확인
		if(!isset($_GET["id"]) || $_GET["id"] === "") {
			throw new Exception("Parameter ERROR : No id"); // 강제 예외 발생 : Parameter ERROR : No id
		}

		$id = $_GET["id"]; // id 셋팅

		// 게시글 데이터 조회
		$result = db_select_boards_id($conn, $id);
		
		// 게시글 조회 예외처리
		if(!$result) {
			// 게시글 조회 에러
			throw new Exception("DB Error : PDO Select_id");
		} else if(!(count($result) === 1)) {
			// 게시글 조회 conut 에러
			throw new Exception("DB Error : PDO Select_id count, ".count($result));
		}

		$item = $result[0];
	} catch(Exception $e) {
		echo $e->getMessage(); // 예외 메세지 출력 
		exit; // 처리 종료
	} finally {
		db_destroy_conn($conn); // DB 파기
	}
	$input_id = $_GET["id"];
	$page_num = $_GET["page"];
?>

<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/mini_board/src/css/common.css">
	<title>상세 페이지</title>
</head>
<body>
	<?php	
		require_once(FILE_HEADER);
	?>
	<table class="det">
		<tr>
			<th class="cla">글 번호</th>
			<td><?php echo $item["id"]; ?></td>
		</tr>
		<tr>
			<th class="cla">제목</th>
			<td><?php echo $item["title"]; ?></td>
		</tr>
		<tr>
			<th class="cla">내용</th>
			<td><?php echo $item["content"]; ?></td>
		</tr>
		<tr>
			<th class="cla">작성일자</th>
			<td><?php echo $item["create_at"]; ?></td>
		</tr>
	</table>
	<a class="but" href="/mini_board/src/update.php/?id=<?php echo $id; ?>&page=<?php echo $page_num; ?>">수정페이지로</a>
	<a class="but" href="/mini_board/src/list.php/?page=<?php echo $page_num; ?>">취소</a>
	<a class="but" href="/mini_board/src/delete.php/?id=<?php echo $id; ?>&page=<?php echo $page_num; ?>">삭제</a>
</body>
</html>