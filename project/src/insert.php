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
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
			<div class="input-group mb-3">
				<label class="input-group-text" for="">제목</label>
				<input  type="text" name="title" value="<?php echo $title ?>" required>
			</div>
			<div class="input-group mb-3">
				<label class="input-group-text" for="">가수</label>
				<input type="text" name="name" value="<?php echo $name ?>" required>
			</div>
			<div class="input-group mb-3">
				<label class="input-group-text" for="music">장르</label>
				<select name="type" id="music" value="<?php echo $type ?>" required>
					<option type="hidden" value="선택해주세요" ></option>
					<option value="발라드">발라드</option>
					<option value="댄스">댄스</option>
					<option value="힙합">힙합</option>
				</select>	
			</div>
			<div class="input-group mb-3">
				<label for="memo">메모</label>
				<textarea class="form-control" name="memo" id="memo" cols="25" rows="5" value="<?php echo $memo ?>" required></textarea>
			</div>
			<section>
				<button type="submit">작성</button>
				<a class="common_a" href="/project/src/list.php">취소</a>
			</section>
		</form>	
	</main>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>