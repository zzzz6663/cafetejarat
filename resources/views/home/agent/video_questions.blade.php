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
        <form action="{{route('agent.submit.questions')}}" method="post">
            @csrf
            @method('post')

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
        <div class="messages">
                <ul id="qlist">
                    @foreach ($questions as $question )
                    <li>
                        <h4> {{$question->q}} </h4>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div>
                                        <input type="text" name="video_id"  hidden value="{{$video->id}}">
                                        <input type="text" name="q{{$loop->iteration}}"  hidden value="0">
                                        <input type="radio" value="a" name="q{{$loop->iteration}}" id="a{{$question->id}}">
                                        <label for="a{{$question->id}}"> {{$question->a}}</label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div>
                                        <input type="radio" value="b" name="q{{$loop->iteration}}" id="b{{$question->id}}">
                                        <label for="b{{$question->id}}"> {{$question->b}}</label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div>
                                        <input type="radio" value="c" name="q{{$loop->iteration}}" id="c{{$question->id}}">
                                        <label for="c{{$question->id}}"> {{$question->c}}</label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div>
                                        <input type="radio" value="d" name="q{{$loop->iteration}}" id="d{{$question->id}}">
                                        <label for="d{{$question->id}}"> {{$question->d}}</label>
                                    </div>
                                </div>
                            </div>
                    </li>
                    @endforeach


                </ul>
        </div>
        <div class="col-lg-12">
            <div>
                <div class="button-container" style="margin-top:20px">
                    <button class="green">  ثبت</button>
                    {{-- <a href="{{route('agent.single.vcat',$video->vcat->id)}}">برگشت</a> --}}
                </div>
            </div>
        </div>
    </form>



    </div>
</div>
@endsection
