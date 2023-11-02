<?php
define("ROOT",$_SERVER["DOCUMENT_ROOT"]."/project/src");
define("FILE_HEADER", ROOT."/header.php");
require_once(ROOT."/lib.php");

$conn = null;
$http_method = $_SERVER["REQUEST_METHOD"];

$arr_err_msg = [];

try {
	if(!my_db_conn($conn)) {
		throw new Exception("DB Error : PDO Instance");
	}

	if($http_method === "GET") {
		$id = isset($_GET["id"]) ? $_GET["id"] : "";
		$page = isset($_GET["page"]) ? $_GET["page"] : "";

		if($id === "") {
			$arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "id");
		}
		if($page === "") {
			$arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "page");
		}
		if(count($arr_err_msg) >= 1) {
			throw new Exception(implode("<br>", $arr_err_msg));
		}
	} else {
		$id = isset($_POST["id"]) ? $_POST["id"] : "";
		$page = isset($_POST["page"]) ? $_POST["page"] : "";
		$title = trim( isset($_POST["title"]) ? $_POST["title"] : "" );
		$name = trim( isset($_POST["name"]) ? $_POST["name"] : "" );
		$type = trim( isset($_POST["type"]) ? $_POST["type"] : "" );
		$memo = trim( isset($_POST["memo"]) ? $_POST["memo"] : "" );

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
		if($name === "") {
			$arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "name");
		}
		if($type === "") {
			$arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "type");
		}
		if($memo === "") {
			$arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "memo");
		}

		if(count($arr_err_msg) === 0) {

			$arr_param = [
				"id" => $id
				,"title" => $title
				,"name" => $name
				,"type" => $type
				,"memo" => $memo
			];
			
			$conn->beginTransaction();
			
			if(!db_update_boards_id($conn, $arr_param)) {
				throw new Exception("DB Error : Update_Boards_id");
			}
			$conn->commit();
			
			header("Location: /project/src/detail.php/?id={$id}&page={$page}");
			exit;
		}
	}

	$arr_param = [
		"id" => $id
	];


	$result = db_select_boards_id($conn, $arr_param);

	if($result === false) {
		throw new Exception("DB Error : PDO Select_id");
	} else if(!(count($result) === 1)) {
		throw new Exception("DB Error : PDO Select_id Count, ".count($result));
	}
	$item = $result[0];

} catch(Exception $e) {
	if($http_method === "POST") {
		$conn->rollBack();
	}
	echo $e->getMessage();
	exit;
} finally {
	db_destroy_conn($conn);
}

?>

<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>수정 페이지</title>
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
		<form action="/project/src/update.php" method="post">
			<table>
				<input type="hidden" name="id" value="<?php echo $id; ?>">
				<input type="hidden" name="page" value="<?php echo $page; ?>">
				<tr>
					<th>제목</th>
					<td><input type="text" name="title" value="<?php echo $item["title"]; ?>"></td>
				</tr>
				<tr>
					<th>가수</th>
					<td><input type="text" name="name" value="<?php echo $item["name"]; ?>"></td>
				</tr>
				<tr>
					<th>장르</th>
					<td>
						<select name="type" id="music" value="<?php echo $item["type"]; ?>">
							<option value="hidden">선택해주세요</option>
							<option value="발라드">발라드</option>
							<option value="댄스">댄스</option>
							<option value="힙합">힙합</option>
						</select>	
					</td>
				</tr>
				<tr>
					<th>메모</th>
					<td><textarea name="memo" id="memo" cols="25" rows="5"><?php echo $item["memo"]; ?></textarea></td>
				</tr>
			</table>
			
			<section>
				<button type="submit">완료</button>
				<a href="/project/src/detail.php/?id=<?php echo $id; ?>&page=<?php echo $page; ?>">취소</a>
			</section>
		</form>
	</main>
	
</body>
</html>