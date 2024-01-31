@extends('layouts.app')
@section('content')
<div class="container">
    <h3 class="text-center mt-3 mb-5 ">BÀI VIẾT</h3>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Them bai viet
    </button>
    <form action="" id="submitForm">
        @csrf
       <div>
           <label for="title"> Tiêu đề</label>
           <input type="text" id="name" name="name">
       </div>
        <div>
            <label for="content"> Nội dung </label>
            <input type="text" id="content" name="content">
        </div>
        <button type="submit"> <span class="spin-image" style="display: none"> <img src="{{asset('backend/image/spin.gif')}}" alt="" width="20px" height="20px"> </span> Submit</button>

    </form>
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
   <section class="text-center">
       <div class="column-gap-xl-1">

       </div>
   </section>
</div>
@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).ready(function (){
        $('#submitForm').submit(function (e){
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
               url: '{{route('post.store')}}',
                type: 'POST',
                data: {
                    name:$('#name').val(),
                    content:$('#content').val(),
                },
                beforeSend: function () {
                  $('.spin-image').css('display','block');

                },
                success: function (response) {
                    console.log(response);
                    $('.spin-image').css('display','none');
                    alert('Thêm bài viết thành công');
                    $("#submitForm")[0].reset();
                    location.reload();
                },

            });
        });
    })
</script>
