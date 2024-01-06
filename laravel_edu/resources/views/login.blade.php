<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>
</head>
<body>
    <form action="{{route('login.post')}}" method="POST">
        @csrf
        <label for="user_id">아이디
        <input type="text" id="user_id" name="user_id"></label>
        <br>
        <label for="password">비밀번호
        <input type="password" id="password" name="password"></label>
        <br><br>
        <button type="submit">로그인</button>
        <a href="./registration">회원가입</a>
    </form>
</body>
</html>