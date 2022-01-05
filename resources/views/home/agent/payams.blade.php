@extends('masters.home')
@section('main_body')
<div class="content-box">
    <div class="main-title">
        <h3>پیامها</h3>
        <a href="{{route('login')}}"></a>
    </div>

    <div class="box-content">
        <a class="linky" href="{{route('agent.panel')}}">
            بازگشت
            <img style="width: 20px" src="/home/images/back.png" alt="">
        </a>

        <div class="profile-top">
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
            </div>
        </div>
        <div class="messages">
            @foreach ($payams as $payam )
            <div class="message {{$payam->pivot->seen ?'':'bold'}}" style="border: none; ">
                <h4 style="display: inline-block; width:80%;">{{$payam->title}} </h4>
                <div  style="display: inline-block; width:20%;" class="button-container">
                  <a style="width: auto;padding:0 10px" href="{{route('agent.single.payams' ,$payam->id)}}">بیشتر</a>
                </div>
            </div>
            @endforeach


        </div>



    </div>
    {{-- <div class="col-lg-12" style="margin-bottom: 20px">
        <div>
            <div class="button-container">
               <a href="{{route('agent.panel')}}">برگشت</a>
            </div>
        </div>
    </div> --}}
</div>
@endsection
