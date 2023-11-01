<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/project/src");
define("FILE_HEADER", ROOT."/header.php");
// difine("");
// require_once(ROOT."lib.php");




?>

<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>리스트 페이지</title>
	<link rel="stylesheet" href="./common.css">
</head>
<body>
	<?php
	require_once(FILE_HEADER);
	?>
	<input type="text">
	<button type="submit">검색</button>
	<table class="table">
	<thead>
		<tr>
		<th scope="col">순번</th>
		<th scope="col">제목</th>
		<th scope="col">가수명</th>
		<th scope="col">장르</th>
		<th scope="col">작성일시</th>
		</tr>
	</thead>
	<tbody>
		<tr>
		<th scope="row">1</th>
		<td>Mark</td>
		<td>Otto</td>
		<td>@mdo</td>
		<td>@mdo</td>
		</tr>
		<tr>
		<th scope="row">2</th>
		<td>Jacob</td>
		<td>Thornton</td>
		<td>@fat</td>
		<td>@fat</td>
		</tr>
		<tr>
		<th scope="row">3</th>
		<td colspan="2">Larry the Bird</td>
		<td>@twitter</td>
		<td>@twitter</td>
		</tr>
	</tbody>
	</table>

	<a href="#"><<</a>
	<a href="#"><</a>
	<a href="#">number</a>
	<a href="#">></a>
	<a href="#">>></a>
</body>
</html>