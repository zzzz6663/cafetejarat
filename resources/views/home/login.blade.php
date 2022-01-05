@extends('masters.home')
@section('main_body')
    <div class="logo">
        <a href="#">
            <img src="/home/images/title.png" alt="">
        </a>
    </div>
    <div class="tab">
        <div class="tab-nav">
            <ul>
                <li ><span>ورود به سیستم</span></li>
                <li class="active"><span>ثبت نام</span></li>
            </ul>
        </div>
        <div class="tab-container">
            <ul>

                <li >
                    <p>به دهکده کارآفرینی خوش آمدید!
                       برای شروع شماره همراه خود را با
                       یک رمز حداقل 6 رقمی ثبت کنید.
                        ‍‍‍‍‍‍‍                            </p>
                        <form action="" id="login_form" data-url="{{route('login.sms')}}" method="POST">
                            @csrf
                            @method('post')
                            <div class="input-container">
                            <input type="number" id="lmobile" name="mobile" placeholder="همراه">
                            </div>
                            <div class="input-container">
                            <input class="dis" type="number" name="password"   placeholder="رمز  ">
                            </div>

                            <div class="try" >
                                <span id="remember_sms"   style="cursor: pointer" data-url="{{route('remember.sms')}}">
                                   فراموشی رمز
                                </span>
                                <div class="cdown">  </div>
                            </div>
                            <div class="button-container">
                            <button>
                            <span >ادامه</span>
                            </button>
                            </div>
                        </form>
                </li>
                <li class="active">
                    <div id="regis">
                        <p>به دهکده کارآفرینی خوش آمدید!
                       برای شروع شماره همراه خود را با
                       یک رمز حداقل 6 رقمی ثبت کنید.
                        ‍‍‍‍‍‍‍                            </p>
                        <form action="" id="register_form" data-url="{{route('register.sms')}}" method="POST">
                            @csrf
                            @method('post')
                            <div class="input-container">
                            <input type="number" id="mobile" name="mobile" placeholder="همراه">
                            </div>
                            <div class="input-container">
                            <input class="dis" type="number" name="password"   placeholder="رمز پیشنهادی">
                            </div>
                            <div class="button-container">
                            <button>
                            <span>ادامه</span>
                            </button>
                            </div>
                        </form>
                    </div>
                    <div id="confirm" hidden>
                        <span id="nmobile"></span>
                        <p>کد تایید 4 رقمی برای شما ارسال شد.
                            پس از دریافت آن را وارد، و کلید تایید
                            را بزنید تا ثبت نام شما انجام شود.
‍‍‍‍‍‍‍
                        </p>

                        <form action="" data-url="{{route('check.sms')}}" id="confirm_form" >
                            <div class="pass-container">
                                <input class="inputs" id="code" type="number" name="code" pattern="[0-9]" maxlength="4">

                            </div>
                            <div class="try">
                                <span id="resend_sms" style="cursor: pointer" data-url="{{route('resend.sms')}}">
                                    تلاش مجدد
                                </span>
                                <div class="cdown">  </div>
                            </div>
                            <div class="button-container">
                            <button id="check_sms" data-url="{{route('check.sms')}}">
                            <span >	تایید</span>
                            </button>
                            </div>
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
@endsection
