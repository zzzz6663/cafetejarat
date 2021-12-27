@extends('masters.home')
@section('main_body')

<div class="content-box">
    <div class="main-title">
        <h3>تکمیل اطلاعات</h3>
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
                    <div class="name"><span>مرحله دوم</span></div>
                </li>
                <li class="step step3">
                    <div class="name"><span>مرحله سوم</span></div>
                </li>
            </ul>
        </div>


        <div class="info-form">
        @include('home.error')
            <form action="{{route('agent.info1')}}" method="post">
                @csrf
                @method('post')
                <div class="row">
                    <div class="col-lg-6">
                        <div>
                            <div class="input-container gray">
                                <label for="">نام</label>
                                <input type="text"  value="{{old('name')}}" name="name" placeholder="نام  ">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div>
                            <div class="input-container gray">
                                <label for="">نام خانوادگی</label>
                                <input type="text"  value="{{old('family')}}" name="family" placeholder="نام خانوادگی">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div>
                            <div class="input-container gray">
                                <label for="">کد ملی</label>
                                <input type="tell"  value="{{old('code')}}" name="code" placeholder="کد ملی">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div>
                            <div class="input-container gray">
                                <label for="">تلفن</label>
                                <input type="tell"  readonly value="{{auth()->user()->mobile}}" name="tell" placeholder="تلفن به همراه کد">
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-6">
                        <div>
                            <div class="input-container gray">
                                <label for="">استان</label>
                                <select  value="{{old('ostan_id')}}" name="ostan_id" id="ostan">
                                    <option value="">استان محل فعالیت</option>
                                    @foreach(\App\Models\Ostan::all() as $ostan)
                                        <option {{old('ostan_id')==$ostan->id?'selected':''}} value="{{$ostan->id}}">{{$ostan->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div>
                            <div class="input-container gray">
                                <label for="">شهرستان</label>
                                <select class="form-control"  value="{{old('shahr_id')}}" name="shahr_id" id="shahr">
                                    <option value="">شهرستان </option>
                                    @if(old('shahr_id'))
                                    @php($sh=\App\Models\Shahr::find(old('shahr_id')))

                                        <option selected value="{{$sh->id}}">{{$sh->name}}</option>
                                    @endif

                                </select>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div>
                            <div class="input-container gray">
                                <label for="">تحصیلی</label>
                                <select    name="madrak" id="madrak">
                                    <option value="">مدرک تحصیلی</option>
                                    <option {{old('madrak')=='base'?'selected':''}} value="base">پایه </option>
                                    <option {{old('madrak')=='diploma'?'selected':''}} value="diploma">دیپلم</option>
                                    <option {{old('madrak')=='associate'?'selected':''}} value="associate">فوق دیپلم
                                    </option>
                                    <option {{old('madrak')=='masters'?'selected':''}} value="masters">کارشناسی</option>
                                    <option {{old('madrak')=='upmasters'?'selected':''}} value="upmasters">کارشناسی ارشد
                                    </option>
                                    <option {{old('madrak')=='phd'?'selected':''}} value="phd">دکتری</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div>
                            <div class="input-container gray">
                                <label for="">اشتغال</label>
                                <select    name="job" id="">
                                    <option value="">وضعیت اشتغال</option>
                                    <option {{old('job')=='employee'?'selected':''}} value="employee">کارمند</option>
                                    <option {{old('job')=='craftsman'?'selected':''}} value="craftsman">صنعتگر</option>
                                    <option {{old('job')=='farmer'?'selected':''}} value="farmer">کشاورز</option>
                                    <option {{old('job')=='service'?'selected':''}} value="service">سرویس</option>
                                    <option {{old('job')=='unemployed'?'selected':''}} value="unemployed">بدون کار
                                    </option>
                                    <option {{old('job')=='student'?'selected':''}} value="student">دانشجو</option>
                                    <option {{old('job')=='talabe'?'selected':''}} value="talabe">طلبه</option>
                                    <option {{old('job')=='entrepreneur'?'selected':''}} value="entrepreneur">کارآفرین</option>
                                    <option {{old('job')=='other'?'selected':''}} value="other">سایر موارد</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div>
                            <div class="input-container gray">
                                <label for="">واتس آپ</label>
                                <input type="tell"  value="{{old('wmobile')}}" name="wmobile" placeholder="شماره واتس اپ">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div>
                            <div class="input-container gray">
                                <label for="">اینستاگرام</label>
                                <input type="text"  value="{{old('insta')}}" name="insta" placeholder="نشانی اینستاگرام">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div>
                            <div class="input-container gray">
                                <label for="">تلگرام</label>
                                <input type="text"  value="{{old('telegram')}}" name="telegram" placeholder="تلگرام">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div>
                            <div class="input-container gray">
                                <label for="">معرف</label>
                                <input type="tell"    value="{{old('introduced')}}" name="introduced" placeholder="تلفن معرف">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div>
                            <div class="button-container">
                                <button>مرحله بعدی</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
