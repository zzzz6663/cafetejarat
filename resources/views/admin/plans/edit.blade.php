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
                    ویرایش طرح
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
                    <h4 class="card-title">    ویرایش
                        {{$plan->name}}
                    </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-12">
                            @include('home.error')
                            <form action="{{route('plan.update',$plan->id)}}" class="form-control" method="post"  enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                            <div class="mb-3">
                                <label class="form-label">نام</label>
                                <input type="text" name="name" value="{{old('name',$plan->name)}}" class="form-control" name="example-text-input" placeholder="نام طرح  ">
                            </div>
                            {{-- <div class="mb-3">
                                <label class="form-label" for="p_type">حالت ارسال</label>
                                <select class="form-select" name="type" id="p_type">
                                    <option {{old('type',$plan->type)=='personal'?'selected':''}} value="personal">شخصی</option>
                                    <option {{old('type',$plan->type)=='collection'?'selected':''}} value="collection">مجموعه</option>
                                </select>
                            </div> --}}
                            <div id="p_1" class="{{$plan->type=='personal'?'':'disnon'}}">
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

                            <div id="p_2" class="{{$plan->type=='personal'?'disnon':''}}">
                                <div class="mb-3">
                                    <label class="form-label" for="ostan">استان</label>
                                    <select value="{{old('ostan_id')}}" class="form-select" name="ostan_id" id="ostan">
                                        <option value=""> همه استان ها</option>
                                        @foreach(\App\Models\Ostan::all() as $ostan)
                                        <option {{old('ostan_id',$plan->ostan?$plan->ostan->id:'')==$ostan->id?'selected':''}} value="{{$ostan->id}}">{{$ostan->name}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="">شهرستان</label>
                                    <select class="form-control" value="{{old('shahr_id')}}" name="shahr_id" id="shahr">
                                        <option value="">شهرستان </option>
                                        @if(old('shahr_id',$plan->shahr))
                                        @php($sh=\App\Models\Shahr::find(old('shahr_id',$plan->shahr?$plan->shahr->id:'')))
                                        <option selected value="{{$plan->shahr?$plan->shahr->id:''}}">{{$plan->shahr?$plan->shahr->name:''}}</option>
                                       @foreach ($sh->other_shahr()   as  $shah)
                                       <option  value="{{$shah->id}}">{{$shah->name}}</option>
                                       @endforeach
                                       @endif

                                    </select>
                                </div>
                            </div>




                            <div class="mb-3">
                                <label class="form-label">توضیحات <span class="form-label-description"></span></label>
                                <textarea class="form-control" id="mytextarea" name="text" rows="6" placeholder="Content..">{!!old('text',$plan->text)!!}</textarea>
                            </div>
                            <div class="mb-3">
                                <div class="form-label">    تصویر طرح</div>
                                <input style="color: red" type="file" name="image" accept=".png, .jpg, .jpeg" class="form-control">
                              </div>
                              <div class="mb-3">
                                <button class="btn btn-success">ذخیره</button>
                                <a  class="btn btn-danger" href="{{route('plan.index')}}">برگشت</a>
                              </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">
           <div class="card">
            <div class="table-responsive">
                <table class="table table-vcenter card-table">
                    <thead>
                        <tr>
                            <th>ردیف </th>
                            <th>نام </th>
                            <th>همراه </th>
                            <th>مکان </th>
                            <th>تاریخ</th>
                            <th>اقدام</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($plan->users as $user )
                        <tr>
                            <td>  {{$loop->iteration}}</td>
                            <td>
                            <a href="{{route('admin.agents.show',$user->id)}}">
                                {{$user->name}} {{$user->family}}
                            </a>
                            </td>
                            <td>  {{$user->mobile }}</td>

                            <td>
                                {{$user->ostan?$user->ostan->name:'تکمیل نشده'}}
                                {{$user->shahr?$user->shahr->name:'تکمیل نشده'}}
                            </td>

                            <td>  {{\Morilog\Jalali\Jalalian::forge($user->created_at)}}</td></td>
                            <td>
                                <a class="btn btn-secondary  " href="{{route('admin.agents.show',$user->id)}}"> مشاهده</a>
                            </td>


                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
           </div>
        </div>

    </div>
</div>

@endcomponent
