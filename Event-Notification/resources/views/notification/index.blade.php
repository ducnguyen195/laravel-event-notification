@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <p class="text-center">Thông Bao</p>
        @foreach($notifi as $item)
        <div class="col-lg-8">
            <p> {{$item->data['viewer_name']   .'da xem'. $item->data['post_name']}}</p>
            <p> {{$item->created_at->diffForHumans()}}</p>
        </div>
        <div class="col-lg-4">
            <a  href="">
                <i class="fa-solid fa-check"> </i>
                check
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection
