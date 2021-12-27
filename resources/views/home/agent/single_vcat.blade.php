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

        <div class="profile-top mb20">
            <div class="img">
                <img src="{{$user->avatar()}}" alt="">
            </div>
            <div class="lefts">
                <h4>
                      {{$user->name}}
                      {{$user->family}}
                </h4>
                {{-- <span>تولید کننده پوشاک</span> --}}
            </div>
        </div>

        <div class="profile-tab">
            <div class="tab-nav">
                <ul>
                    <li class="active"><span>دیده نشده  </span></li>
                    <li><span>  دیده شده</span></li>
                </ul>
            </div>


                <div class="tab-container videos ">
                <ul>
                    <li class="active">
                        <div>
                            @php
                                $i=1
                            @endphp
                            <div class="row">
                                @foreach ( $videos as $video)
                                @php
                                    $route='';
                                @endphp
                                @if(   $user->videos->contains($video->id))
                                @continue
                                @else
                                @php
                                if ($i==1   ) {
                                    $route=route('agent.check.video.status',$video->id);
                                }
                                       $i++;
                                @endphp
                                @endif

                                <div class="video">

                                    <div class="right">
                                        <div class="img">
                                            <img src="/home/images/html.png" alt="">
                                        </div>
                                    </div>
                                    <div class="left">

                                        <h4><a href="{{$route}}">{{ $video->title}}


                                            @if($video->type=='money')
                                            ({{number_format($video->price)}}
                                            تومان
                                            )
                                            @else
                                            (رایگان)
                                            @endif
                                            @if($video->model=='close')
                                          (سوالی)
                                            @else

                                            @endif

                                        </a></h4>
                                        <p>
                                            {{ $video->content}}


                                        </p>
                                        <span style="top:5px" class="con lock"></span>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </li>
                    <li>
                        <div>
                            <div class="row">
                                @foreach ( $my_videos as $my)

                                <div class="video">

                                    <div class="right">
                                        <div class="img">
                                            <img src="/home/images/html.png" alt="">
                                        </div>
                                    </div>
                                    <div class="left">

                                        <h4><a href="{{route('agent.check.video.status',$my->id)}}">{{ $my->title}}


                                            @if($my->type=='money')
                                            ({{number_format($my->price)}}
                                            تومان
                                            )
                                            @else
                                            (رایگان)
                                            @endif
                                            @if($my->model=='close')
                                          (سوالی)
                                            @else

                                            @endif

                                        </a></h4>
                                        <p>
                                            {{ $my->content}}


                                        </p>
                                        <span style="top:5px" class="con lock"></span>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                        </div>
                    </li>
                </ul>

            </div>
        </div>

        <div class="col-lg-12">
            <div>
                <div class="button-container">
                   <a href="{{route('agent.panel')}}">برگشت</a>
                </div>
            </div>
        </div>


    </div>
</div>
@endsection
