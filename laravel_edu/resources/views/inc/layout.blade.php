<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- @yield : 자식 템플릿에서 해당하는 section에게 자리를 양도
                    자식한테 section이 없을 경우는 두번째 파라미터를 사용한다.    
    --}}

    {{-- blade 의 기본 불러오는 문법이 '@'로  시작함 --}}
    <title>@yield('title', '부모 타이틀')</title>
    {{--  자식이 명이 없을 때 기본 값으로 띄워지는 타이틀 --}}
</head>
<body>
    {{-- 다른 템플릿을 포함 시키는 방법 --}}
    @include('inc.header')
    {{-- 다른 블레이드를 불러올경우 views에 하기 --}}

    {{-- main영역 --}}
    @yield('main')

    {{-- @sction ~ @show : 자식 템플릿에 해당하는 section이 없을 때,
                            부모의 것이 실행
     --}}

    @section('show')
        <h2>부모의 show입니다.</h2>
        <p>부모부모부모</p>
    @show

    {{-- 다른 템플릿을 포함시킬때 변수 셋팅하는 방법 --}}
    {{-- @include('inc.footer', ['key1' => 'key1 부모에서 셋팅']) --}}
    @include('inc.footer', ['key1' => '끝났어요'])

</body>
</html>