@extends('masters.home')
@section('main_body')
<div class="content-box">
    <div class="main-title">
        <h3>    دوره های آموزشی</h3>
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

     <div class="videos">
        <div class="row">
            @foreach ($cats as  $cat)

            <div class="col-lg-6" style="margin-bottom:20px">
                <div>
                    <div class="single-designs">
                        <div  class="img" style="background: url('') ;">
                            <img src="{{$cat->image()}}" alt="">
                        </div>
                        <h4>          {{$cat->title}}</h4>
                        <div class="button-container">
                            <a class="green" href="{{route('agent.single.vcat',$cat->id)}}">   مشاهده</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
     </div>

     {{-- <div class="row">
         <div class="col-lg-12  ">

            <div class="button-container">
                <a class="green" href="{{route('agent.panel')}}">   برگشت</a>
            </div>
         </div> --}}
     </div>

    </div>
</div>
@endsection
