<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_board_pratice/src");
define("FILE_HEADER",ROOT."/header.php");
// define("ERROR_MSG_PARAM", "%s : 필수 입력 사항입니다.");
require_once(ROOT."/lib/lib.php");

$conn = null; // DB Connection 변수
$http_method = $_SERVER["REQUEST_METHOD"]; // Method 확인
$arr_err_msg = []; // 에러 메세지 저장용
$title = "";
$name = "";
$content = "";

// POST로 request가 왔을 때 처리
if($http_method === "POST") {
	try {
		// 파라미터 획득
		$title = isset($_POST["title"]) ? trim($_POST["title"]) : ""; // title 셋팅
		$name = isset($_POST["name"]) ? trim($_POST["name"]) : ""; // title 셋팅
		$content = isset($_POST["content"]) ? trim($_POST["content"]) : ""; // content 셋팅

		if($title === "") {
			$arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "제목");
		}
		if($name === "") {
			$arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "작성자");
		}
		
		if(count($arr_err_msg) === 0) {
			// DB 접속
			if(!my_db_conn($conn)) {
				// DB Instance 에러
				throw new Exception("DB Error : PDO Instance");
			}
			$conn->beginTransaction(); // 트랜잭션 시작

			// 게시글 작성을 위헤 파라미터 셋팅
			$arr_param = [
				"title" => $_POST["title"]
				,"name" => $_POST["name"]
				,"content" => $_POST["content"]
				// ,"file" => $_POST["file"]

			];

			// insert
			if(!db_insert_pratice($conn, $arr_param)) {
				// DB Insert 에러
				throw new Exception("DB Error : Insert pratice");
			}

			$conn->commit(); // 모든 처리 완료 시 커밋

			// 리스트 페이지로 이동
			header("Location: /mini_board_pratice/src/list.php");
			exit;
		}
	} catch(Exception $e) {
		if($conn !== null){
			$conn->rollBack();
		}
		echo $e->getMessage(); // 예외발생 메세지 출력  //v002 del
		// header("Location: /mini_board_pratice/src/error.php/?err_msg={$e->getMessage()}"); // v002 add
		exit;
	} finally {
		db_destroy_conn($conn); // DB 파기
	}

}
?>

<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="./common.css">
	<title>작성페이지</title>
</head>
<body>
	<header><h1>공지사항</h1></header>
	<main class="insert_main">
		<form action="/mini_board_pratice/src/insert.php" method="POST">
			<div class="mb-3">
				<label for="title" class="form-label">제목</label>
				<input type="text" class="form-control" id="title" name="title"  value="<?php echo $title ?>" required>
			 </div>
			<div class="mb-3">
				<label for="name" class="form-label">작성자</label>
				<input type="text" class="form-control" id="name" name="name"  value="<?php echo $name ?>" required>
			</div>
			<div class="mb-3">
				<label for="content" class="form-label">내용</label>
				<textarea class="form-control" id="content" name="content" rows="3"  value="<?php echo $content ?>"></textarea>
			</div>
			<div class="mb-3">
				<input class="form-control" type="file" id="formFile" name="file">
			</div>
			<br><br>
			<div class="insert_div">
				<button class="btn btn-primary" type="submit">완료</button>
				<a class="btn btn-secondary" href="mini_board_pratice/src/list.php">취소</a>
			</div>	
		</form>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	</main>
</body>
</html>