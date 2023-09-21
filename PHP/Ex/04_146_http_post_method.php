<?php
// POST Method
// request 할 때의 데이터를 외부에서 볼 수가 없다

print_r($_POST);

?>

<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>POST</title>
</head>
<body>
	<form action="/04_146_http_post_method.php" method="post">
		<fieldset>
			<label for="name"> ID : </label>
			<input type="ID" id="name" name="name">
			
			<br>

			<label for="pw"> PW : </label>
			<input type="PW" id="pw" name="pw">

			<br>

			<button type="submit">전송</button>
		</fieldset>
	</form> 
</body>
</html>