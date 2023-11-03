<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/project/src");
define("FILE_HEADER", ROOT."/header.php");
require_once(ROOT."/lib.php");

$conn = null;
$list_cnt = 10;
$page_num = 1;

$arr_err_msg = [];

try {
	if(!my_db_conn($conn)) {
		throw new Exception("DB Error : PDO Instance");
	}

	$page_num = isset($_GET["page"]) ? $_GET["page"] : "1";
	if($page_num === "") {
		$arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "page");
	}
	if(count($arr_err_msg) >= 1) {
		throw new Exception(implode("<br>", $arr_err_msg));
	}

	$boards_cnt = db_select_boards_cnt($conn);
	if($boards_cnt === false) {
		throw new Exception("DB Error : SELECT Boards Count");
	}

	$max_page_num = ceil($boards_cnt / $list_cnt);

	$offset = ($page_num - 1) * $list_cnt;

	// 이전버튼
	$prev_page_num = $page_num - 1 > 0 ? $page_num - 1 : 1;

	// 다음버튼
	$next_page_num = $page_num + 1 > $max_page_num ? $max_page_num : $page_num + 1;

	// DB 조회 시 사용할 데이터 배열
	$arr_param = [
		"list_cnt" => $list_cnt
		,"offset" => $offset
	];

	// 게시글 리스트 조회
	$result = db_select_boards_paging($conn, $arr_param);

	// 게시글 조회 예외처리
	if($result === false) {
		// var_dump($result);
		throw new Exception("DB Error : Select boards Paging");
	}

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
	<title>리스트 페이지</title>
	<link rel="stylesheet" href="./common.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
	<?php
		require_once(FILE_HEADER);
	?>
	<br>
	<main>
		<div>
			<input type="text" class="list_input">
			<button type="submit">검색</button>
		</div>
		<br>
		<a class="common_a" class="list_wirte" href="/project/src/insert.php">작성</a>
		<br><br>
		<table class="table text-center">
			<thead>
				<tr class="table-dark">
					<th scope="col">순번</th>
					<th scope="col">제목</th>
					<th scope="col">가수명</th>
					<th scope="col">장르</th>
					<th scope="col">작성일시</th>
				</tr>
			</thead>
			<tbody>
					<?php
						// 리스트를 생성
						foreach($result as $item) {
					?>
						<tr>
							<td><?php echo $item["id"]; ?></td>
							<td>
								<a class="common_a" href="/project/src/detail.php/?id=<?php echo $item["id"]; ?>&page=<?php echo $page_num; ?>">
									<?php echo $item["title"]; ?>
								</a>
							</td>
							<td><?php echo $item["name"]; ?></td>
							<td><?php echo $item["type"]; ?></td>
							<td><?php echo $item["create_at"]; ?></td>
						</tr>
					<?php
						} 
					?>
			</tbody>
		</table>
	</main>
	<br>
	<section class="text-center">				
		<a class="common_a" href="/project/src/list.php/?page=<?php echo $prev_page_num ?>"><<</a>
		<?php 
				for($i = 1; $i <= $max_page_num; $i++) {
					$str = (int)$page_num === $i ? "bk-a" : "";
			?>
					<a class="common_a" class="button_a" <?php echo $str ?>" href="/project/src/list.php/?page=<?php echo $i; ?>"><?php echo $i; ?></a>
		<?php
			}
		?>
		<a class="common_a" href="/project/src/list.php/?page=<?php echo $next_page_num ?>">>></a>
	</section>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>