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
                    ساخت طرح
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
                    <h4 class="card-title"> طرح جدید</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-12">
                            @include('home.error')
                            <form action="{{route('plan.store')}}" class="form-control" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('post')
                                <div class="mb-3">
                                    <label class="form-label">نام</label>
                                    <input type="text" name="name" value="{{old('name')}}" class="form-control" name="example-text-input" placeholder="نام طرح  ">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label s" for="p_type">حالت ارسال</label>
                                    <select class="form-select" name="type" id="p_type">
                                        <option {{old('type')=='personal'?'selected':''}} value="personal">شخصی</option>
                                        <option {{old('type')=='collection'?'selected':''}} value="collection">مجموعه</option>
                                    </select>
                                </div>
                                <div id="p_1" class="{{old('type')=='collection'?'disnon':''}}">
                                    <div class="mb-3">
                                        <label class="form-label" for="user">شخص</label>
                                        <select class="form-select" name="user_id" id="user">


                                            @foreach($introduceds as $in)
                                            @php
                                            $user_in=\App\Models\User::where('mobile',$in->introduced)->first();
                                            @endphp
                                            @if($user_in)
                                            <option {{old('user_id')==$user_in->id?'selected':''}} value="{{$user_in->id}}">
                                                {{$user_in->name}}
                                                {{$user_in->family}}
                                                ({{$user_in->ostan?$user_in->ostan->name:''}})
                                                ({{$user_in->shahr?$user_in->shahr->name:''}})
                                            </option>
                                            @endif

                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div id="p_2" class="{{old('type','personal')!='personal'?'':'disnon'}}">
                                    <div class="mb-3">
                                        <label class="form-label" for="ostan">استان</label>
                                        <select value="{{old('ostan_id')}}" class="form-select" name="ostan_id" id="ostan">
                                            <option value=""> همه استان ها</option>
                                            @foreach(\App\Models\Ostan::all() as $ostan)
                                            <option {{old('ostan_id')==$ostan->id?'selected':''}} value="{{$ostan->id}}">{{$ostan->name}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="">شهرستان</label>
                                        <select class="form-control" value="{{old('shahr_id')}}" name="shahr_id" id="shahr">
                                            <option value="">شهرستان </option>
                                            @if(old('shahr_id'))
                                            @php($sh=\App\Models\Shahr::find(old('shahr_id')))
                                            <option selected value="{{$sh->id}}">{{$sh->name}}</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">توضیحات <span class="form-label-description"></span></label>
                                    <textarea class="form-control" name="text" id="mytextarea" rows="6" placeholder="Content..">{{old('text')}}</textarea>
                                </div>
                                <div class="mb-3">
                                    <div class="form-label"> تصویر طرح</div>
                                    <input style="color: red" type="file" name="image" accept=".png, .jpg, .jpeg" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <button class="btn btn-success">ذخیره</button>
                                    <a class="btn btn-danger" href="{{route('plan.index')}}">برگشت</a>
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
