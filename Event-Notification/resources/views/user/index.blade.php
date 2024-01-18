@extends('layouts.app')
@section('content')
<div class="container">
    <h3 class="text-center mt-3 mb-5 ">BÀI VIẾT</h3>
    @foreach($posts as $item)
    <div >
        <a class="text-decoration-none" href="{{route('post.detail', $item->id)}}">
            <h3 >{{$item ->name}} </h3>
        </a>
        <p> {{$item -> content}}</p>
    </div>
    <p>Lượt Xem: {{$item ->num_view}}</p>
        <p>--------------------------------------------</p>
    @endforeach
</div>
@endsection
