<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
</head>
<body>
    <h1>HOME!!!!</h1>
    <br><br>
    <form action="/home" method="POST">

        @csrf
        <button type="submit">POST</button>

        <!-- //고객정보 유효성 체크
        //올바른 정보를 요청하는 건지 토큰 발행 - 쿠키, 세션에 저장해두고 그 토큰이
        일치하는지 테스트해서 csrf 대응 -->
    </form>
    <br><br>
    <form action="/home" method="POST">
        @csrf
        @method('PUT')
        <button type="submit">PUT</button>
    </form>
    <br><br>
    <form action="/home" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">DELETE</button>
    </form>
</body>
</html>