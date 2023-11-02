<?php
define("ROOT",$_SERVER["DOCUMENT_ROOT"]."/project/src");
define("FILE_HEADER", ROOT."/header.php");
require_once(ROOT."/lib.php");

$id = "";
$conn = null;

$arr_err_msg = [];

try {
	if(!my_db_conn($conn)) {
		throw new Exception("DB Error : PDO Instance");
	}

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
		var_dump($result);
		throw new Exception("DB Error : PDO Select_id");
	} else if(!(count($result) === 1)) {
		throw new Exception("DB Error : PDO Select_id count");
	}
	$item = $result[0];
} catch(Exception $e) {
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
	<title>상세 페이지</title>
	<link rel="stylesheet" href="./common.css">
</head>
<body>
	<?php
	require_once(FILE_HEADER);
	?>
	<main>
		<table>
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
	</main>

	<section>
		<a href="/project/src/update.php/?id=<?php echo $id; ?>&page=<?php echo $page; ?>">수정</a>
		<a href="/project/src/delete.php/?id=<?php echo $id; ?>&page=<?php echo $page; ?>">삭제</a>
		<a href="/project/src/list.php/?page=<?php echo $page; ?>">취소</a>
	</section>
</body>
</html>