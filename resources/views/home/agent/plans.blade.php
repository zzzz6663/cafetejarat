@extends('masters.home')
@section('main_body')
<div class="content-box">
    <div class="main-title">
        <h3>طرحها</h3>
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

        <div class="profile-tab">
            <div class="tab-nav">
                <ul>
                    <li class="active"><span>همه طرحها</span></li>
                    <li><span>طرحهای من</span></li>
                </ul>
            </div>
            <div class="tab-container">
                <ul>
                    <li class="active">
                        <div>

                            <div class="row">
                                @foreach ($plans as  $plan)

                                <div class="col-lg-6" style="margin-bottom:20px">
                                    <div>
                                        <div class="single-design">
                                            <div  class="img" style="clip-path:none;background: url('{{$plan->image()}}') ; ">
                                            </div>
                                            <h4>          {{$plan->name}}</h4>
                                            <div class="button-container">
                                                <a class="green" href="{{route('agent.single.plans', $plan->id)}}"> انتخاب طرح</a>
                                            </div>
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
                                @foreach ($user->plans as  $plan)

                                <div class="col-lg-6" style="margin-bottom:20px">
                                    <div>
                                        <div class="single-design">
                                            <div  class="img" style="clip-path:none;background: url('{{$plan->image()}}') ;">
                                            </div>
                                            <h4>          {{$plan->name}}</h4>
                                            <div class="button-container">
                                                <a class="green" href="{{route('agent.single.plans', $plan->id)}}"> انتخاب طرح</a>
                                            </div>
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
