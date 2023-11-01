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
	<title>수정 페이지</title>
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
		<select name="music" id="music">
			<option value="0">선택해주세요</option>
			<option value="1">발라드</option>
			<option value="2">댄스</option>
			<option value="3">힙합</option>
		</select>	
	</div>
	<div>
		<label for="memo">메모</label>
		<textarea name="memo" id="memo" cols="25" rows="5"></textarea>
	</div>

	<section>
		<button type="submit">완료</button>
		<a href="#">취소</a>
	</section>
</body>
</html>