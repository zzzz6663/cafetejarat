@extends('masters.home')
@section('main_body')
<div class="content-box">
    <div class="main-title">
        <h3>پیامها</h3>
        <a href="{{route('login')}}"></a>
    </div>

    <div class="box-content">

        <a class="linky" href="{{route('agent.payams')}}">
            بازگشت
            <img style="width: 20px" src="/home/images/back.png" alt="">
        </a>
        <div class="profile-top mb20">
            <div class="img">
                <img src="images/user3.png" alt="">
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
            {{$payam->text}}
        </div>
        {{-- <div class="col-lg-12">
            <div>
                <div class="button-container">
                   <a href="{{route('agent.payams')}}">برگشت</a>
                </div>
            </div>
        </div> --}}


    </div>
</div>
@endsection
