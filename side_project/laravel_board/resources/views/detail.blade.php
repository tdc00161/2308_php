@extends('layout.layout')

@section('title', 'List')

@section('main')
    <main>

            <div>
                <p>글번호</p>
                <p>{{$data->b_id}}</p>
            </div>

            <div>
                <p>제목</p>
                <p>{{$data->b_title}}</p>
            </div>

            <div>
                <p>내용</p>
                <p>{{$data->b_content}}</p>
            </div>

            <div>
                <p>조회수</p>
                <p>{{$data->b_hits}}</p>
            </div>

            <div>
                <p>작성일</p>
                <p>{{$data->created_at}}</p>
            </div>

            <div>
                <p>수정일</p>
                <p>{{$data->b_title}}</p>
            </div>
            <br><br>
            <form action="{{route('board.destroy', ['board' => $data->b_id])}}" method="POST">
                @csrf
                @method('DELETE')
                <button type='submit' class="btn btn-primary" >삭제</button>
            </form>
            <a href="{{route('board.index')}}" class="btn btn-secondary">취소</a>
            <a href="{{route('board.edit', ['board' => $data->b_id])}}" class="btn btn-danger">수정</a>
            {{-- @forelse($data as $item)
                <div>{{ $item->b_id}}</div>
                <div>{{ $item->b_title}}</div>
                <div>{{ $item->b_content}}</div>
                <div>{{ $item->created_at}}</div>
            @empty
            @endforelse --}}
        {{-- {{ var_dump($data)}} --}}

    </main>
@endsection