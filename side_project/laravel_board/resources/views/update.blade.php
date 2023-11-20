@extends('layout.layout')

@section('title', 'update')

@section('main')
    <main>
        <form action="{{route('board.update',['board' => $data->b_id])}}" method="POST">
            @csrf
            @method('PUT')
            <div>
                <p>제목</p>
                <input type="text" name="b_title" class="form-control" value="{{$data->b_title}}">
            </div>

            <div>
                <p>내용</p>
                <input type="text" name="b_content" class="form-control" value="{{$data->b_content}}">
            </div>
            <br><br>
                <div>
                    <button type="submit" class="btn btn-primary">수정</button>
                    <a class="btn btn-dark" href="{{route('board.show',['board' => $data->b_id])}}">취소</a>
                </div>
            </form>


    </main>
@endsection