@extends('masters.home')
@section('main_body')

<div class="content-box">  
    <div class="main-title">
        <h3>تکمیل اطلاعات</h3>
        <a href="{{route('login')}}"></a>
    </div>
    <div class="box-content">
        <div class="txt">
            <p>به جمع جهادی ما خوش اومدی!</p>
            <p>ان‌شاءالله با همت شما رفقا، به زودی حال اقتصاد ایران ما خوب می‌شه؛ لطفا اطلاعاتت رو خیلی دقیق و با حوصله تکمیل کن که بتونیم با شناخت بهتر نتیجه بیشتری بگیریم.</p>
        </div>

        <div class="process">
            <ul>
                <li class="step step1">
                    <div class="name active"><span>مرحله اول</span></div>
                </li>
                <li class="step step2">
                    <div class="name active"><span>مرحله دوم</span></div>
                </li>
                <li class="step step3">
                    <div class="name  active"><span>مرحله سوم</span></div>
                </li>
            </ul>
        </div>

        <div class="info-form">
            @include('home.error')
            <form action="{{route('agent.info3')}}" method="post">
                @csrf
                @method('post')
                <div class="row">
                    <div class="col-lg-12">
                        <div>
                            <div class="input-container textarea full gray">
                                <textarea name="tendency" id="" cols="30" rows="10" placeholder="چه زمانی رو برای همکاری می تونی در اختیار مجموعه قرار بدی و چه فعالیتی رو بیشتر علاقه داری که انجام بدی؟">{{old('tendency')}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div>
                            <div class="warn">
                                <p>شرایط و راهنمای رابط  رو دقیق مطالعه کن و انتخاب کن.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div>
                            <label for="" class="bold">اگر تمایل داری رابط دهکده کارآفرینی هم باشی ؛</label>
                            <div class="check-row">
                                <input type="radio" {{old('connector')=='reg_con'?'checked':''}} value="reg_con" name="connector">
                                <span>به عنوان رابط منطقه ای</span>
                            </div>
                            <div class="check-row">
                                <input type="radio" {{old('connector')=='ostan_con'?'checked':''}} value="ostan_con" name="connector">
                                <span>به عنوان رابط استانی</span>
                            </div>
                            <div class="check-row">
                                <input type="radio" {{old('connector')=='shahr_con'?'checked':''}} value="shahr_con" name="connector">
                                <span>به عنوان رابط شهرستان</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div>
                            <div class="button-container">
                                <button>ارسال اطلاعات</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
