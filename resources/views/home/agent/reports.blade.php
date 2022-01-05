@extends('masters.home')
@section('main_body')
<div class="content-box">
    <div class="main-title">
        <h3>گزارش ها</h3>
        <a href="{{route('login')}}"></a>
    </div>

    <div class="box-content">

        <a class="linky" href="{{route('agent.panel')}}">
            بازگشت
            <img style="width: 20px" src="/home/images/back.png" alt="">
        </a>
        <div class="profile-top">
            <div class="img">
                <img src="{{$user->avatar()}}" alt="">
            </div>
            <div class="lefts">
                <h4>
                    {{$user->name}}
                    {{$user->family}}
                </h4>
            </div>
        </div>

        <div class="profile-tab">
            <div class="tab-nav ">
                <ul>
                    <li style="width: 33%" class="active"><span> پیش رو</span></li>
                    <li style="width: 33%" ><span>  در جریان </span></li>
                    <li style="width: 33%" ><span>  گذشته</span></li>
                </ul>
            </div>
            <div class="tab-container">
                <ul>
                    <li class="active">
                        <div>

                            <div class="row">

                                @foreach ($future_reports as  $future_report)
                                <div class="col-lg-12" style="margin-bottom:20px">
                                    <div>
                                        <div class="single-design">

                                            <h4>          {{$future_report->title}}</h4>
                                            @if($future_report->content)
                                            <p>
                                                {{$future_report->content}}
                                            </p>
                                            @endif
                                            <ul class="daty_i">
                                                @if($future_report->start)
                                                <li>
                                                   <span class="title ">
                                                   : تاریخ شروع
                                                   </span>
                                                   <span class="content green">
                                                    {{ \Morilog\Jalali\Jalalian::forge($future_report->start)->format('Y-m-d')}}
                                                   </span>
                                                </li>
                                                @endif
                                                @if($future_report->end)
                                                <li>
                                                    <span class="title ">
                                                        :تاریخ پایان
                                                       </span>
                                                       <span class="content red">
                                                        {{ \Morilog\Jalali\Jalalian::forge($future_report->end)->format('Y-m-d')}}
                                                       </span>
                                                </li>
                                                @endif
                                            </ul>
                                            @if($future_report->content)
                                            <div class="messages">
                                                <video   class="js-player3" playsinline  data-poster="{{$future_report->cover()}}">
                                                    <source src="{{$future_report->video()}}" type="video/mp4" />
                                                </video>
                                            </div>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </li>
                    <li >
                        <div>

                            <div class="row">

                                @foreach ($current_reports as  $current_report)
                                <div class="col-lg-12" style="margin-bottom:20px">
                                    <div>
                                        <div class="single-design">

                                            <h4>          {{$current_report->title}}</h4>
                                            @if($current_report->content)
                                            <p>
                                                {{$current_report->content}}
                                            </p>
                                            @endif
                                            <ul class="daty_i">
                                                @if($current_report->start)
                                                <li>
                                                   <span class="title ">
                                                   : تاریخ شروع
                                                   </span>
                                                   <span class="content green">
                                                    {{ \Morilog\Jalali\Jalalian::forge($current_report->start)->format('Y-m-d')}}
                                                   </span>
                                                </li>
                                                @endif
                                                @if($current_report->end)
                                                <li>
                                                    <span class="title ">
                                                        :تاریخ پایان
                                                       </span>
                                                       <span class="content red">
                                                        {{ \Morilog\Jalali\Jalalian::forge($current_report->end)->format('Y-m-d')}}
                                                       </span>
                                                </li>
                                                @endif
                                            </ul>
                                            @if($current_report->content)
                                            <div class="messages">
                                                <video   class="js-player3" playsinline  data-poster="{{$current_report->cover()}}">
                                                    <source src="{{$current_report->video()}}" type="video/mp4" />
                                                </video>
                                            </div>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </li>

                    <li>
                        <div>

                            <div class="row">

                                @foreach ($past_reports as  $past_report)
                                <div class="col-lg-12" style="margin-bottom:20px">
                                    <div>
                                        <div class="single-design">

                                            <h4>          {{$past_report->title}}</h4>
                                            @if($past_report->content)
                                            <p>
                                                {{$past_report->content}}
                                            </p>
                                            @endif
                                            <ul class="daty_i">
                                                @if($past_report->start)
                                                <li>
                                                   <span class="title ">
                                                   : تاریخ شروع
                                                   </span>
                                                   <span class="content green">
                                                    {{ \Morilog\Jalali\Jalalian::forge($past_report->start)->format('Y-m-d')}}
                                                   </span>
                                                </li>
                                                @endif
                                                @if($past_report->end)
                                                <li>
                                                    <span class="title ">
                                                        :تاریخ پایان
                                                       </span>
                                                       <span class="content red">
                                                        {{ \Morilog\Jalali\Jalalian::forge($past_report->end)->format('Y-m-d')}}
                                                       </span>
                                                </li>
                                                @endif
                                            </ul>
                                            @if($past_report->content)
                                            <div class="messages">
                                                <video   class="js-player3" playsinline  data-poster="{{$past_report->cover()}}">
                                                    <source src="{{$past_report->video()}}" type="video/mp4" />
                                                </video>
                                            </div>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>


        {{-- <div class="row">
            <div class="col-lg-12">
                <div>
                    <div class="button-container">
                        <a class="green" href="{{route('agent.panel')}}">   برگشت</a>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
</div>
@endsection
