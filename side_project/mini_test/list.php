<?php

define("ROOT", $_SERVER["DOCUMENT_ROOT"]."mini_test/src"); // 웹서버


?>

<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>리스트 페이지</title>
</head>
<body>
	<header>
		<h1>학원 게시판</h1>
	</header>
	<main>
		<table>
			<colgroup>
				<col width="10%">
				<col width="25%">
				<col width="50%">
				<col width="15%">
			</colgroup>
			<tr>
				<td>NO</td>
				<td>제목</td>
				<td>내용</td>
				<td>작성일시</td>
			</tr>
			<tr>
				<td>1</td>
				<td>제목1</td>
				<td>내용1</td>
				<td>date_time_set</td>
			</tr>
			<tr>
				<td>2</td>
				<td>제목2</td>
				<td>내용2</td>
				<td>작성일시2</td>
			</tr>
			<tr>
				<td>3</td>
				<td>제목3</td>
				<td>내용3</td>
				<td>작성일시3</td>
			</tr>
			<tr>
				<td>4</td>
				<td>제목4</td>
				<td>내용4</td>
				<td>작성일시4</td>
			</tr>
			<tr>
				<td>5</td>
				<td>제목5</td>
				<td>내용5</td>
				<td>작성일시5</td>
			</tr>
		</table>
		
	</main>
</body>
</html>