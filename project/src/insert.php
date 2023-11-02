<?php
define("ROOT",$_SERVER["DOCUMENT_ROOT"]."/project/src");
define("FILE_HEADER", ROOT."/header.php");
require_once(ROOT."/lib.php");

$conn = null;
$http_method = $_SERVER["REQUEST_METHOD"];
$title = "";
$name = "";
$type = "";
$memo = "";

$arr_err_msg = [];

if($http_method === "POST") {
	try {
		$title = isset($_POST["title"]) ? trim($_POST["title"]) : "";
		$name = isset($_POST["name"]) ? trim($_POST["name"]) : "";
		$type = isset($_POST["type"]) ? trim($_POST["type"]) : "";
		$memo = isset($_POST["memo"]) ? trim($_POST["memo"]) : "";

		if($title === "") {
			$arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "제목");
		}
		if($name === "") {
			$arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "가수명");
		}
		if($type === "") {
			$arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "분야");
		}
		
		if(count($arr_err_msg) === 0) {
			if(!my_db_conn($conn)) {
				throw new Exception("DB Error : PDO Instance");
			}
			$conn->beginTransaction();

			$arr_param = [
				"title" => $_POST["title"]
				,"name" => $_POST["name"]
				,"type" => $_POST["type"]
				,"memo" => $_POST["memo"]
			];

			if(!db_insert_boards($conn, $arr_param)) {
				throw new Exception("DB Error : Insert Boards");
			}

			$conn->commit();

			header("Location:/project/src/list.php");
			exit;
		}
	} catch(Exception $e) {
		if($conn !== null){
			$conn->rollBack();
		}
	} finally {
		db_destroy_conn($conn);
	}
}

?>

<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>작성 페이지</title>
	<link rel="stylesheet" href="./common.css">
</head>
<body>
	<?php
	require_once(FILE_HEADER);
	?>
	<main>
		<?php 
				foreach($arr_err_msg as $val) {
		?>
						<p><?php echo $val ?></p>			
		<?php
				}
		?>
		<form action="/project/src/insert.php" method="post">
			<div>
				<label for="">제목</label>
				<input type="text" name="title" value="<?php echo $title ?>">
			</div>
			<div>
				<label for="">가수</label>
				<input type="text" name="name" value="<?php echo $name ?>">
			</div>
			<div>
				<label for="music">장르</label>
				<select name="type" id="music" value="<?php echo $type ?>">
					<option value="0">선택해주세요</option>
					<option value="1">발라드</option>
					<option value="2">댄스</option>
					<option value="3">힙합</option>
				</select>	
			</div>
			<div>
				<label for="memo">메모</label>
				<textarea name="memo" id="memo" cols="25" rows="5" value="<?php echo $memo ?>"></textarea>
			</div>
		</form>	
	</main>
	<section>
		<button type="submit">작성</button>
		<a href="/project/src/list.php">취소</a>
	</section>
</body>
</html>