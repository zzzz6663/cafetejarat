@extends('masters.home')
@section('main_body')
<div class="content-box">
    <div class="main-title">
        <h3>تماس با ما</h3>
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
                <div class="col-lg-6 col-sm-12">
                    <div>
                        <div class="bo">
                            <h2>
                                مسئول سفرها
                            </h2>
                            <span>خانم یساول</span>
                           <div>
                            <a target="_blank" href="wa.me/+989122437897">09122437897</a>
                           </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <div>
                        <div class="bo">
                            <h2>
                                مسئول هماهنگی
                            </h2>
                            <span>  آقای محمد نژاد</span>
                           <div>
                            <a target="_blank" href="wa.me/+989914781591">09914781591</a>
                           </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <div>
                        <div class="bo">
                            <h2>
                                مسئول صادرات
                            </h2>
                            <span>  آقای یارمحمدی</span>
                           <div>
                            <a target="_blank" href="wa.me/+989128892585">09128892585</a>
                           </div>
                        </div>
                    </div>
                </div>

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
