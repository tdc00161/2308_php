
    @forelse ($errors->all() as $val)
    {{-- all 을 쓰게되면 정보를 배열로 가져올 수 있음 --}}
    {{-- errors 변수명은 함부러 사용하면 안됨 --}}
    <div id="errorMsg" class="form-text text-danger">{{$val}}</div>
    @empty
    @endforelse
