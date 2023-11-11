<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_board_pratice/src");
define("FILE_HEADER",ROOT."/header.php");
require_once(ROOT."/lib/lib.php");



?>

<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="./common.css">
	<title>수정페이지</title>
</head>
<body>
	<header><h1>공지사항</h1></header>
	<main class="insert_main">
		<form action="">
			<div class="mb-3">
				<label for="title" class="form-label">제목</label>
				<input type="text" class="form-control" id="title" name="title" required>
			 </div>
			<div class="mb-3">
				<label for="name" class="form-label">작성자</label>
				<input type="text" class="form-control" id="name" name="name" required>
			</div>
			<div class="mb-3">
				<label for="content" class="form-label">내용</label>
				<textarea class="form-control" id="content" rows="3"></textarea>
			</div>
			<div class="mb-3">
				<input class="form-control" type="file" id="formFile">
			</div>
			<br><br>
			<div class="insert_div">
				<button class="btn btn-primary" type="submit">완료</button>
				<a class="btn btn-secondary" href="./list.php">취소</a>
			</div>	
		</form>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	</main>
</body>
</html>