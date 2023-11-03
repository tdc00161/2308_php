<?php
define("ROOT",$_SERVER["DOCUMENT_ROOT"]."/project/src");
define("FILE_HEADER", ROOT."/header.php");
require_once(ROOT."/lib.php");

$arr_err_msg = [];

try {
	$conn = null;

	if(!my_db_conn($conn)) {
		throw new Exception("DB Error : PDO Instance");
	}

	$http_method = $_SERVER["REQUEST_METHOD"];

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
		
		$arr_param = [
			"id" => $id
		];
		$result = db_select_boards_id($conn, $arr_param);

		if($result === false) {
			throw new Exception("DB Error : Select id");
		} else if(!(count($result) === 1)) {
			throw new Exception("DB Error : Select id Count");
		}
		$item = $result[0];

	} else {
		$id = isset($_POST["id"]) ? $_POST["id"] : "";
		if($id === "") {
			$arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "id");
		}
		if(count($arr_err_msg) >= 1) {
			throw new Exception(implode("<br>", $arr_err_msg));
		}

		$conn->beginTransaction();

		$arr_param = [
			"id" => $id
		];

		if(!db_delete_boards_id($conn, $arr_param)) {
			throw new Exception("DB Error : Delete Boards id");
		}

		$conn->commit();
		header("Location: /project/src/list.php");
		exit;
	}
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
	<title>삭제 페이지</title>
	<link rel="stylesheet" href="./common.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
	<?php
	require_once(FILE_HEADER);
	?>
	<main>
		<form action="/project/src/delete.php" method="post">
			<table class="table">
				<caption>
					정말로 삭제하시겠습니까?
				</caption>
				<tr>
					<th>제목</th>
					<td><?php echo $item["title"]; ?></td>
				</tr>
				<tr>
					<th>가수</th>
					<td><?php echo $item["name"]; ?></td>
				</tr>
				<tr>
					<th>분야</th>
					<td><?php echo $item["type"]; ?></td>
				</tr>
				<tr>
					<th>메모</th>
					<td><?php echo $item["memo"]; ?></td>
				</tr>
				<tr>
					<th>수정일시</th>
					<td><?php echo $item["update_at"]; ?></td>
				</tr>
			</table>
			<section>
				<input type="hidden" name="id" value="<?php echo $id; ?>">
				<button type="submit">동의</button>
				<a class="common_a" href="/project/src/detail.php/?id=<?php echo $id; ?>&page=<?php echo $page; ?>">취소</a>
			</section>
		</form>
	</main>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>