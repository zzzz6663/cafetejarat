@extends('masters.home')
@section('main_body')
<div class="content-box">
    <div class="main-title">
        <h3>پیامها</h3>
        <a href="{{route('login')}}"></a>
    </div>

    <div class="box-content">
        <a class="linky" href="{{route('agent.single.vcat',$video->vcat->id)}}">
            بازگشت
            <img style="width: 20px" src="/home/images/back.png" alt="">
        </a>
        @include('home.error')


        <div class="profile-top mb20">
            <div class="img">
                @if($user->attr('avatar'))
                <img style="width: 95px" src="{{$user->avatar()}}" alt="">

                 @else
                <img src="/home/images/user3.png" alt="">

                @endif
            </div>
            <div class="lefts">
                <h4>
                    {{$user->name}}
                    {{$user->family}}
                </h4>
                {{-- <span>تولید کننده پوشاک</span> --}}
            </div>
        </div>
        <div class="messages">
            <video   class="js-player2" playsinline  data-poster="{{$video->cover()}}">
                <source src="{{$video->video()}}" type="video/mp4" />
            </video>
        </div>
        {{-- <div class="col-lg-12">
            <div>
                <div class="button-container" style="margin-top:20px">
                    <a href="{{route('agent.single.vcat',$video->vcat->id)}}">برگشت</a>
                </div>
            </div>
        </div> --}}



    </div>
</div>
@endsection
