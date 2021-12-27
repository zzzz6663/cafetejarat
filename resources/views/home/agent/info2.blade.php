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
                    <div class="name"><span>مرحله سوم</span></div>
                </li>
            </ul>
        </div>

        <div class="info-form">
            @include('home.error')
            <form action="{{route('agent.info2')}}" method="post">
                @csrf
                @method('post')
                <div class="row">
                    <div class="col-lg-12">
                        <div>
                            <div class="input-container textarea full gray">
                                <textarea name="ability" id="" cols="30" rows="10"
                                placeholder="در مورد توانمندی ها و ظرفیت و تجربیات خودت شرح بده !">{{old('ability')}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div>
                            <div class="input-container textarea full gray">
                                <textarea name="rel" id="" cols="30" rows="10" placeholder="ارتباطات خودت رو خوب توصیف کن، مثلا ارتباط با گروههای مردمی جهادی، مسجد محل، دوستان و اقوام، مسئولین استان و شهرستان">{{old('rel')}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div>
                            <div class="input-container textarea full gray">
                                <textarea name="about" id="" cols="30" rows="10" placeholder="در مورد اشتغال خودت، و کمکی که به اشتغال منطقه می تونی بکنی یا اگر ایده ای داری به طور کامل بگو ...">{{old('about')}}</textarea>
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
