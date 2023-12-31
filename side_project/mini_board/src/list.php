<?php

define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_board/src/"); // 웹서버
define("FILE_HEADER", ROOT."header.php"); // 헤더 패스
require_once(ROOT."lib/lib_db.php"); // DB관련 라이브러리

$conn = null;
$list_cnt = 5; // 한 페이지 최대 표시 수
$page = 1; // 페이지 번호 초기화


try {
	// DB 접속
	if(!my_db_conn($conn)) {
		//DB Instance 에러
		throw new Exception("DB Error : PDO Instance"); // 강제 예외발생 : DB Instance
	}
	
	//-------------
	// 페이징 처리
	//-------------
	// 총 게시글 수 검색
	$boards_cnt = db_select_boards_cnt($conn);
	if($boards_cnt === false) {
		throw new Exception("DB Error :SELECT Count"); // 강제 예외발생 : SELECT Count
	}

	$max_page = ceil($boards_cnt / $list_cnt); // 최대 페이지 수

	if(isset($_GET["page"])) {
		$page = $_GET["page"]; // 유저가 보내온 페이지 셋팅
	}
	$offset = ($page - 1) * $list_cnt; // 오프셋 계산

	// 이전버튼
	$prev_page = $page - 1;
	if($prev_page === 0) {
		$prev_page = 1;
	}

	// 다음버튼
	$next_page = $page + 1;
	if($next_page > $max_page) {
		$next_page = $max_page;
	}

	// DB 조회시 사용할 데이터 배열
	$arr_param = [
		"list_cnt" => $list_cnt
		,"offset" => $offset
	];

	// 게시글 리스트 조회
	$result = db_select_boards_paging($conn, $arr_param);
	if(!$result) {
		// select 에러	
		throw new Exception("DB Error : SELECT boards Paging");
	}

} catch(Exception $e) {
	// echo $e->getMessage(); // 예외발생 메세지 출력
	header("Location: error.php/?err_msg={$e->getMessage()}");
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
	<link rel="stylesheet" href="/mini_board/src/css/common.css">
	<title>리스트 페이지</title>
</head>
<body>
	<?php
	require_once(FILE_HEADER);
	?>
	<main class="list_m">
		<form action="a">
			<input class="list_in" type="text" name="search" id="search" placeholder="검색어 입력">
			<label class="list_in" for="search">검색</label>
		</form>
		<table class="list_t">
			<colgroup>
				<col width="20%">
				<col width="50%">
				<col width="30%">
			</colgroup>
			<tr class="list_tr">
				<td>번호</td>
				<td>제목</td>
				<td>작성일자</td>
			</tr>
			<?php
				// 리스트를 생성

				foreach($result as $item) {
			?>
					<tr>
						<td class="list_td"><?php echo $item["id"] ?></td>
						<td class="list_td"><a href="/mini_board/src/detail.php/?id=<?php echo $item["id"]; ?>&page=<?php echo $page; ?>">
								<?php echo $item["title"]; ?>
							</a>
						</td>
						<td class="list_td"><?php echo $item["create_at"]; ?></td>
					</tr>
			<?php   } ?>
		</table>
		<section class="list_s">
			<a class="page-btn" href="/mini_board/src/list.php/?page=<?php echo $prev_page ?>">이전</a>
			<?php
				for($i = 1; $i <= $max_page; $i++) {
			?>
						<a class="page-btn" href="/mini_board/src/list.php/?page=<?php echo $i; ?>"><?php echo $i; ?></a>
			<?php
				}
			?>
						<a class="page-btn" href="/mini_board/src/list.php/?page=<?php echo $next_page ?>">다음</a>
		</section>
		<!-- <br><br> -->
		<a class="text" href="/mini_board/src/insert.php">글작성</a>
	</main>
</body>
</html>