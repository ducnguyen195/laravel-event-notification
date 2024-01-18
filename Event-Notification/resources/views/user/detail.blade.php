@extends('layouts.app')
@section('content')
    <div class="container">
        <h3 class="text-center mt-3 mb-5 ">BÀI VIẾT</h3>

            <div >
                <a class="text-decoration-none">
                    <h3 >{{$posts ->name}} </h3>
                </a>
                <p> {{$posts -> content}}</p>
            </div>
            <p>Lượt Xem: {{$posts -> num_view}}</p>

    </div>
@endsection
