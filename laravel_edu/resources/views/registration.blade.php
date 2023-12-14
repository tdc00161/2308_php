<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>registration</title>
</head>
<body>
    <form action="{{route('registration.post')}}" method="POST">
        @csrf
        <label for="id">아이디
        <input type="text" id='user_id' name='user_id'></label>
        <br>
        <label for="pw">비밀번호
        <input type="password" id='password' name="password"></label>
        <br>
        <label for="passwordchk">비밀번호확인
        <input type="password" id='passwordchk' name="passwordchk"></label>
        <br><br>
        <button type="submit">회원가입</button>
    </form>
</body>
</html>