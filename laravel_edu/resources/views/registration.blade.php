<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>registration</title>
</head>
<body>
    <form action="./registration" method="POST">
        @csrf
        <label for="id">아이디
        <input type="text" name='id'></label>
        <br>
        <label for="pw">비밀번호
        <input type="password" name="password"></label>
        <br>
        <label for="passwordchk">비밀번호확인
        <input type="password" name="passwordchk"></label>
        <br><br>
        <button type="submit">회원가입</button>
    </form>
</body>
</html>