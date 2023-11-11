<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_board_pratice/src");
define("FILE_HEADER",ROOT."/header.php");
// define("ERROR_MSG_PARAM", "%s : 필수 입력 사항입니다.");
require_once(ROOT."/lib/lib.php");

$conn = null;
$list_cnt = 5; // 한 페이지 최대 표시 수
$page_num = 1; // 페이지 번호 초기화
$arr_err_msg = []; // 에러 메세지 저장용

try {
	// DB 접속
	if(!my_db_conn($conn)) {
		// DB Instance 에러
		throw new Exception("DB Error : PDO Instance"); // 강제 예외발생 : DB Instance
	}

// 레퍼런스 파라미터로 $conn 값을 받아오고 실행, 레퍼런스 파라미터 활용에 대해 이해가 필요
// 파라미터 = 함수에 대한 정의 , 아규먼트 = 함수 호출에 사용하는 값, 리터럴 = 값 자체
	
	// ---------------
	// 페이징 처리
	// ---------------
	// 파라미터 획득
	$page_num = isset($_GET["page"]) ? $_GET["page"] : "1"; // page 셋팅
	if($page_num === "") {
		$arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "page");
	}
	if(count($arr_err_msg) >= 1) {
		throw new Exception(implode("<br>", $arr_err_msg));
	}

	// 총 게시글 수 검색
	$boards_cnt = db_select_pratice_cnt($conn);
	if($boards_cnt === false) {
		throw new Exception("DB Error : SELECT pratice Count"); // 강제 예외발생 : SELECT Count
	}

	$max_page_num = ceil($boards_cnt / $list_cnt); // 최대 페이지 수

	$offset = ($page_num - 1) * $list_cnt; // 오프셋 계산

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
	$result = db_select_pratice_paging($conn, $arr_param);

	// 게시글 조회 예외처리
	if($result === false) {
		// 게시글 조회 에러
		// var_dump($result);
		throw new Exception("DB Error : Select pratice Paging");
	}

} catch(Exception $e) {
	echo $e->getMessage(); // 예외발생 메세지 출력  //v002 del
	// header("Location: error.php/?err_msg={$e->getMessage()}"); // v002 add
	exit; // 처리 종료
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
	<title>메인페이지</title>
</head>
<body>
	<?php
		require_once(FILE_HEADER);
	?>
	<main class="list_main">
		<br><br>
		<a class="list_btn" class="btn btn-outline-dark" href="mini_board_pratice/src/insert.php">글작성</a>
		<br><br>
		<form action="mini_board_pratice/src/list.php" method="POST">
			<table class="table table-hover" class="list_table">
				<thead>
					<tr class="table-info">
						<th class="list_th">글번호</th>
						<th class="list_th">제목</th>
						<th class="list_th">작성자</th>
						<th class="list_th">작성일</th>
					</tr>
				</thead>
				<tbody>
					<?php
						// 리스트를 생성
						foreach($result as $item) {
					?>
						<tr>
							<td class="list_td"><?php echo $item["id"]; ?></td>
							<td class="list_td">
								<a href="/mini_board_pratice/src/detail.php/?id=<?php echo $item["id"]; ?>&page=<?php echo $page_num; ?>">
									<?php echo $item["title"]; ?>
								</a>
							</td>
							<td class="list_td"><?php echo $item["name"]; ?></td>
							<td class="list_td"><?php echo $item["created_at"]; ?></td>
						</tr>
					<?php
						} 
					?>
				</tbody>
			</table>
			<br><br>
			<div class="list_div">
				<a class="btn btn-primary" href="#">처음</a>
				<a class="btn btn-primary" href="/mini_board_pratice/src/list.php/?page=<?php echo $prev_page_num ?>">이전</a>
				<?php 
					for($i = 1; $i <= $max_page_num; $i++) {
						// 삼항연산자 : 조건 ? 참일때처리 : 거짓일때처리
						$str = (int)$page_num === $i ? "bk-a" : "";
				?>
					<a class="btn btn-primary <?php echo $str ?>" href="/mini_board_pratice/src/list.php/?page=<?php echo $i; ?>"><?php echo $i; ?></a>
				<?php
					}
				?>
				<a class="btn btn-primary" href="/mini_board_pratice/src/list.php/?page=<?php echo $next_page_num ?>">다음</a>
				<a class="btn btn-primary" href="#">마지막</a>
			</div>
		</form>
	</main>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>