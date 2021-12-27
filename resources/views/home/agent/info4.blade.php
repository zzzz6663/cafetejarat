@extends('masters.home')
@section('main_body')

<div class="content-box">
    <div class="main-title">
        <h3>تکمیل اطلاعات</h3>
        <a href="{{route('login')}}"></a>
    </div>

    <div class="box-content">
        <div class="txt">
            <p>
                {{$user->name}}
                {{$user->family}}
                عزیز</p>
            <p>اطلاعات شما در پروفایل کاربری ثبت شد. همکاران ما از طریق پیامک، واتس اپ و یا تماس تلفنی، به زودی با شما ارتباط خواهند گرفت و اطلاعات دقیقتری رو در اختیارت قرار می دن.</p>
            <div class="clr"></div>
            <p>
                در این فاصله حتما
                    <a href="#">دفترچه راهنمای دهکده کارآفرینی</a>
                    رو با دقت مطالعه کن و قبل از هر کاری اول شروع به کادر سازی بکن. به امید دیدار در شهرستان شما.
            </p>
        </div>
        <div class="button-container">
            <a href="{{route('agent.panel')}}" class="green">بسم الله ...</a>
        </div>
    </div>
</div>

@endsection
