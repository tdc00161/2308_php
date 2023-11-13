{{-- 상속 --}}
@extends('inc.layout')

{{-- blade.php 에서는 / 가 아닌 . 으로 경로를 들어가게 됨 --}}

{{-- @section : 부모 템플릿에 해당하는 yield 부분에 삽입 --}}
{{-- 부모의 yidel 명이랑 동일하게 통일 --}}
@section('title', '자식1 타이틀')


{{-- @section ~ @endsection : 처리해야 될 코드가 많을 경우 --}}
{{-- @endsection 은 닫는 태그 --}}
@section('main')
    <h2>자식1 화면입니다.</h2>
    <p>여러 데이터를 표시합니다.</p>

    {{-- 조건문 --}}
    @if ($gender === '0')
        <span>성별 : 남자</span>
    @elseif($gender === '1')
        <span>성별 : 여자</span>
    @else
        <span>성별 : 기타</span>
        {{-- if 문이 마치는 쪽을 모르기때문에 end를 붙여서 마침을 해준다. --}}
    @endif
    <hr>

    {{-- 반복문 --}}
    <h3>for문</h3>
    @for ($i = 0; $i < 5; $i++)
        <span>{{ $i }}</span>
        {{-- blade 문은 {{}} 가 echo 의 의미이다/ 화면의 변수를 출력하는 방법 --}}
    @endfor


    <hr>
    <h3>foreach문</h3>
    @foreach ($data as $key => $val)
        {{-- <p>{{$loop->count.' >> '.$loop->iteration}}</p> --}}
        {{-- loop 라는게 몇번째 루프를 돌고있는지 출력해줌 --}}
        <p>{{ $loop->count }}</p>
        <span>{{ $key . ':' . $val }}</span>
        <br>
    @endforeach

    <hr>

    <h3>forelse</h3>

    @forelse($data2 as $key => $val)
        <span>{{ $key . ':' . $val }}</span>
        <br>
    @empty
        {{-- 비여있을때는 empty 에 내용을 담아서 출력해주는 문법 --}}
        <span>빈배열입니다.</span>
    @endforelse


@endsection

{{-- 부모 show 테스트용 --}}
@section('show')
    <h2>자식 1 show입니다.</h2>
    <p>자식1자식1자식1</p>
@endsection
