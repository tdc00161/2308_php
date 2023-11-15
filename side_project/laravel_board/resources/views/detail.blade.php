@extends('layout.layout')

@section('title', 'List')

@section('main')
    <main class="justify-content-center align-items-center h-75">

    
            @forelse($data as $item)
                <div>{{ $item->b_id}}</div>
                <div>{{ $item->b_title}}</div>
                <div>{{ $item->b_content}}</div>
                <div>{{ $item->created_at}}</div>
            @empty
            @endforelse
        {{-- {{ var_dump($data)}} --}}

    </main>
@endsection