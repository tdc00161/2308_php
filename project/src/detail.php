<?php
define("ROOT",$_SERVER["DOCUMENT_ROOT"]."/project/src");
define("FILE_HEADER", ROOT."/header.php");
// difine("");
// require_once(ROOT."lib.php");




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
	<div>
		<label for="">제목</label>
		<input type="text">
	</div>
	<div>
		<label for="">가수</label>
		<input type="text">
	</div>
	<div>
		<label for="music">장르</label>
		<input type="text">
	</div>
	<div>
		<label for="memo">메모</label>
		<textarea name="memo" id="memo" cols="25" rows="5"></textarea>
	</div>
	<div>
		<label for="music">수정일시</label>
		<input type="text">
	</div>

	<section>
		<button type="submit">수정</button>
		<a href="#">삭제</a>
		<a href="#">취소</a>
	</section>
</body>
</html>