@extends('layout.layout')

@section('title', 'insert')

@section('main')
    <br><br>
    <main>
		<div>
            <div>
              <form action="{{route('board.store')}}" method="post">
                @csrf
                {{-- 안적어주면 419 에러뜸 --}}
                  <div>
                      <input type="text" name="b_title" class="form-control" placeholder="제목을 입력하세요.">
                  </div>
                  <div>
                  <textarea class="form-control" name="b_content" cols="30" rows="10" placeholder="내용을 입력하세요."></textarea>
                  </div>
                    <div>
                        <button type="submit" class="btn btn-primary">작성</button>
                        <a href="{{route('board.index')}}" class="btn btn-secondary">취소</a>
                    </div>
                </form>
            </div>
          </div>

    </main>
@endsection