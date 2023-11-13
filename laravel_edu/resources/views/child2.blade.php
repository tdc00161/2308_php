
{{-- 상속 --}}
@extends('inc.layout')

{{-- section : 부모 템플릿에 해당하는 yield 부분에 삽입 --}}
@section('title', '자식2 타이틀')

{{-- main 섹션에 생성 : 구구단 찍기 --}}

@section('main')

{{-- 구구단 --}}
<h3>구구단</h3>
@for($i = 1; $i < 10; $i++)
    <br>
    {{'<'.$i.'단>'}}
        @for($a = 1; $a < 10; $a++)
            <br>
        {{$i.'x'.$a.'='.$i*$a}}
        {{--  <span>{{$i}}x{{$a}}={{$i*$a}}</span> --}}
        @endfor
    <br>
@endfor

@endsection