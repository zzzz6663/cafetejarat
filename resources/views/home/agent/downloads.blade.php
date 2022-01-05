@extends('masters.home')
@section('main_body')
<div class="content-box">
    <div class="main-title">
        <h3>     دانلود ها</h3>
        <a href="{{route('login')}}"></a>
    </div>

    <div class="box-content">

        <a class="linky" href="{{route('agent.panel')}}">
            بازگشت
            <img style="width: 20px" src="/home/images/back.png" alt="">
        </a>
        <br>
        <br>
        <br>

        <div class="messages">
            <div class="row">
                @foreach ($downloads as  $download)
                <div class="col-lg-12" style="margin-bottom:20px; padding-bottom:20px; border-bottom: 1px solid #000">
                    <div>
                        <div class="single-design" style="">
                         <div class="side_right">
                            <img style="width: 100%" src="{{$download->img()}}" alt="">
                         </div>

                          <div class="side_left">
                            <h3>          {{$download->title}}</h3>

                            @if($download->content)
                            <p>
                                {{$download->content}}
                            </p>
                            @endif
                            <div class="button-container">
                            <a class="green" href="{{$download->file()}}" >دانلود</a>

                            </div>
                          </div>
                        </div>
                    </div>
                </div>

                @endforeach


            </div>


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
