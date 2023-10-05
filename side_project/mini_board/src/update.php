<?php
	define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_board/src/"); // 웹서버
	define("FILE_HEADER", ROOT."header.php"); // 헤더 패스
	define("ERROR_MSG_PARAM", "%s는 필수 입력 사항입니다."); // 파라미터 에러 메세지
	require_once(ROOT."lib/lib_db.php"); // DB관련 라이브러리

	$conn = null; // DB 연결용 변수
	$http_method = $_SERVER["REQUEST_METHOD"]; // Method 확인
	$arr_err_msg=[];

	try {
		// DB 연결
		if(!my_db_conn($conn)) {
			//DB Instance 에러
			throw new Exception("DB Error : PDO Instance");
		}

		// GET Method의 경우
		if($http_method === "GET"){
			// GET Method의 경우

			// 파라미터 획득
			$id = isset($_GET["id"]) ? $_GET["id"] : ""; // id 셋팅
			$page = isset($_GET["page"]) ? $_GET["page"] : ""; // page 셋팅

			if($id === "") {
				$arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "id");
			}
			if($page === "") {
				$arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "page");
			}
			if(count($arr_err_msg) >= 1) {
				throw new Exception(implode("<br>", $arr_err_msg));
			}

			$result = db_select_boards_id($conn, $id);
			// 게시글 조회 예외처리
			if($result === false) {
				throw new Exception("DB Error : PDO Select_id");
			} else if(!count($result) === 1) {
				// 게시글 조회 count 에러
				throw new Exception("DB Error : PDO Select_id Count, ".count($result));
			}
			$item = $result[0];

		} else {
			// POST Method의 경우
			
			// 파라미터 획득
			$id = isset($_POST["id"]) ? $_POST["id"] : ""; // id 셋팅
			$page = isset($_POST["page"]) ? $_POST["page"] : ""; // page 셋팅
			$title = isset($_POST["title"]) ? $_POST["title"] : ""; // title 셋팅
			$content = isset($_POST["content"]) ? $_POST["content"] : ""; // content 셋팅

			if($id === "") {
				$arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "id");
			}
			if($page === "") {
				$arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "page");
			}
			if(count($arr_err_msg) >= 1) {
				throw new Exception(implode("<br>", $arr_err_msg));
			}
			if($title === "") {
				$arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "title");
			}
			if($content === "") {
				$arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "content");
			}

			if(count($arr_err_msg) === 0) {

				// 게시글 수정을 위해 파라미터 셋팅
				$arr_param = [
					"id" => $id
					,"title" => $_POST["title"]
					,"content" => $_POST["content"]
				];

				// 게시글 수정 처리
				$conn->beginTransaction(); // 트랜잭션 시작

				if(!db_update_boards_id($conn, $arr_param)) {
					throw new Exception("DB Error : Update_Boards_id");
				}
				$conn->commit(); // commit

				header("Location: detail.php/?id={$id}&page={$page}"); // 디테일 페이지로 이동
			}
		}

	} catch(Exception $e) {
		if($http_method === "POST") {
			$conn->rollBack(); // 예외 메세지 출력
		}
		// echo $e->getMessage(); // Exception 메세지 출력
		header("Location: /mini_board/src/error.php/?err_msg={$e->getMessage()}");
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
	<link rel="stylesheet" href="/mini_board/src/css/common.css">
	<title>수정 페이지</title>
</head>
<body>
	<?php	
		require_once(FILE_HEADER);
	?>
	<form action="/mini_board/src/update.php" method="post">
		<table class="det">
			<input type="hidden" name="id" value="<?php echo $id ?>">
			<input type="hidden" name="page" value="<?php echo $page ?>">
			<tr>
				<th class="cla">글 번호</th>
				<td><?php echo $item["id"]; ?></td>
			</tr>
			<tr>
				<th class="cla">제목</th>
				<td>
					<input type="text" name="title" value="<?php echo $item["title"] ?>">
				</td>
			</tr>
			<tr>
				<th class="cla">내용</th>
				<td><textarea name="content" id="content" cols="30" rows="10"><?php echo $item["content"]; ?></textarea></td>
			</tr>
		</table>
		<button type="submit">수정확인</button>
		<a class="but" href="/mini_board/src/detail.php/?id=<?php echo $id; ?>&page=<?php echo $page; ?>">수정취소</a>
	</form>
	
</body>
</html>