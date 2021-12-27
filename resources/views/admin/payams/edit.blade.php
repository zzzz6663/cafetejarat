@component('admin.section.content',['title'=>' داشبورد'])
@slot('bread')
<li class="breadcrumb-item">پنل مدیریت</li>
@endslot
<div class="container-xl">
    <!-- Page title -->
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">
                   ویرایش پیام
                   {{$payam->title}}
                </h2>
            </div>
        </div>
    </div>
</div>

<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">
            <div class="col-12">
                <div class="card-header">
                    <h4 class="card-title">  پیام    </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-12">
                            @include('home.error')
                            <form action="{{route('payam.update', $payam->id)}}" class="form-control" method="post"   >
                                @csrf
                                @method('patch')
                            <div class="mb-3">
                                <label class="form-label">نام</label>
                                <input type="text" name="title" value="{{old('title',$payam->title)}}" class="form-control" name="example-text-input" placeholder="نام پیام  ">
                            </div>


                            <div class="mb-3">
                                <label class="form-label">توضیحات <span class="form-label-description"></span></label>
                                <textarea class="form-control" name="text" rows="6" placeholder="Content..">{{old('text',$payam->text)}}</textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="ostan">استان</label>
                                <select   class="form-select" name="ostan_id" id="ostan">
                                    <option  value=""> همه استان ها</option>
                                    @foreach(\App\Models\Ostan::all() as $ostan)
                                    <option {{old('ostan_id',$payam->ostan?$payam->ostan->id:"")==$ostan->id?'selected':''}} value="{{$ostan->id}}">{{$ostan->name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="">شهرستان</label>
                                <select class="form-control" value="{{old('shahr_id')}}" name="shahr_id" id="shahr">
                                    <option disabled value="">شهرستان </option>
                                    @if(old('shahr_id',$payam->shahr?$payam->shahr->id:""))
                                    @php($sh=\App\Models\Shahr::find(old('shahr_id',$payam->shahr?$payam->shahr->id:"")))
                                    <option selected value="{{$sh->id}}">{{$sh->name}}</option>
                                    @endif
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="">انتخاب طرح ها</label>
                                <select class="form-control"   name="plan_id" id="plan">
                                    <option  value="">همه طرح  </option>
                                    @foreach(\App\Models\Plan::all() as $plan)
                                    <option {{old('plan_id',$payam->plan?$payam->plan->id:"")==$plan->id?'selected':''}} value="{{$plan->id}}">{{$plan->name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                              <div class="mb-3">
                                <button class="btn btn-success">ذخیره</button>
                                <a  class="btn btn-danger" href="{{route('payam.index')}}">برگشت</a>
                              </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endcomponent
