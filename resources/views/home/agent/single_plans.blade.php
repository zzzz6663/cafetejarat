@extends('masters.home')
@section('main_body')
<div class="content-box">
    <div class="main-title">
        <h3>طرحها</h3>
        <a href="{{route('login')}}"></a>

    </div>

    <div class="box-content">

        <a class="linky" href="{{route('agent.plans')}}">
            بازگشت
            <img style="width: 20px" src="/home/images/back.png" alt="">
        </a>
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

        <div class="design-in">

        <div class="design-info">
            <div class="img">
                <img style="clip-path:none" src="{{$plan->image()}}" alt="">
            </div>
            <div class="lefts" style="padding-top:0">
                <h4> {{$plan->name}}

                    <br>
                    @if(!$plan->ostan && !$plan->shahr)
طرح کشوری
                    @else
                    {{$plan->ostan?$plan->ostan->name:''}}
                    {{$plan->shahr?$plan->shahr->name:''}}
                    @endif

                </h4>
            </div>
        </div>
        <div class="txt">
            <p>
                {!! $plan->text !!}
            </p>
        </div>
        <div class="design-form">
            <form action="{{route('agent.join.plans',$plan->id)}}" method="POST">
            @csrf
            @method('post')
                <ul>
                    <li>
                        <input type="text" hidden  name="plan_id" value="{{$plan->id}}">
                        <input type="text" hidden  name="producer" value="0">
                        <input type="checkbox" {{$user->plans_pivot($plan->id,'producer')=='1'?'checked':''}} name="producer" value="1">
                         <span>تولید کننده</span>
                    </li>
                    <li>
                        <input type="text" hidden  name="user" value="0">
                        <input type="checkbox" {{$user->plans_pivot($plan->id,'user')=='1'?'checked':''}} name="user" value="1">
                         <span>مصرف کننده</span>
                    </li>
                    <li>
                        <input type="text" hidden  name="investor" value="0">
                        <input type="checkbox" {{$user->plans_pivot($plan->id,'investor')=='1'?'checked':''}} name="investor" value="1">
                         <span>سرمایه گذار</span>
                    </li>
                    <li>
                        <input type="text" hidden  name="facilitator" value="0">
                        <input type="checkbox" {{$user->plans_pivot($plan->id,'facilitator')=='1'?'checked':''}} name="facilitator" value="1">
                         <span>تسهیلگر</span>
                    </li>
                </ul>
                <div class="button-container">


                    @if($user->plans->contains($plan->id))
                    <button class="green">  به روز رسانی  </button>

                     @else
                    <button class="green">عضویت  </button>

                    @endif
                </div>
            </form>
        </div>
        </div>



    </div>
</div>
@endsection
