use Morilog\Jalali\Jalalian;
@component('admin.section.content',['title'=>' داشبورد'])
@slot('bread')
<li class="breadcrumb-item">پنل مدیریت</li>
@endslot

<div class="page-body">
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        طرح ها
                        ({{$plans->total()}})
                    </h2>

                </div>
            </div>
            <form action="{{route('plan.index')}}" method="get">
                @csrf
                @method('get')
                <div class="row align-items-center">

                    <!-- Page title actions -->
                    <div class="col-md-6">
                        <div class="form-label">استان</div>
                        <select value="{{old('ostan_id')}}" class="form-select" name="ostan_id">
                            <option value=""> همه استان ها</option>
                            @foreach(\App\Models\Ostan::all() as $ostan)
                            <option {{request('ostan_id')==$ostan->id?'selected':''}} value="{{$ostan->id}}">{{$ostan->name}}
                                (active:{{$ostan->active_user()->count()}})---------
                                (deactive:{{$ostan->deactive_user()->count()}})
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <div class="form-label">شهرستان</div>
                        <select value="{{old('shahr_id')}}" class="form-select" name="shahr_id">
                            <option value=""> همه شهرستان ها</option>
                            @foreach(\App\Models\Shahr::all() as $shahr)
                            <option {{request('shahr_id')==$shahr->id?'selected':''}} value="{{$shahr->id}}">{{$shahr->name}}

                                (active:{{$shahr->active_user()->count()}})---------
                                (deactive:{{$shahr->deactive_user()->count()}})
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-auto ms-auto d-print-none mt-4">
                        <div class="d-flex">
                            <a class="btn btn-success active w-100" href="{{route('plan.create')}}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                                طرح جدید
                            </a>
                        </div>
                    </div>
                    <div class="col-auto ms-auto d-print-none mt-4">
                        <div class="d-flex">

                            <input type="search" name="search" value="{{request('search')}}" class="form-control d-inline-block w-9 me-3" placeholder="جستجوی نماینده  ">
                            <button class="btn btn-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <circle cx="10" cy="10" r="7"></circle>
                                    <line x1="21" y1="21" x2="15" y2="15"></line>
                                </svg>
                                جستوجو
                            </button>

                        </div>
                    </div>

                </div>
            </form>

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
                            <th>استان </th>
                            <th>شهرستان </th>
                            <th>شخصی </th>
                            <th>تعداد عضو</th>
                            <th>تاریخ</th>
                            <th>اقدام</th>
                            <th class="w-1"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($plans as $plan )
                        <tr>
                            <td>  {{$loop->iteration}}</td>
                            <td>  {{$plan->name}}</td>
                            <td>  {{$plan->ostan?$plan->ostan->name:''}}</td>
                            <td>  {{$plan->shahr?$plan->shahr->name:''}}</td>
                            <td>  {{$plan->user?$plan->user->name:''}}</td>
                            <td>  {{$plan->users()->count()}}</td>
                            <td>  {{\Morilog\Jalali\Jalalian::forge($plan->created_at)}}</td></td>
                            <td>
                                <a class="btn btn-secondary  " href="{{route('plan.edit',$plan->id)}}">ویرایش</a>
                                <form style="display: inline-block" action="{{route('plan.destroy',$plan->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <input type="submit" class="btn btn-danger " value="حذف"   >
                                </form>
                                <a href="{{$plan->image()}}" class="btn btn-primary  " data-lightbox="roadtrip">عکس</a>
                            </td>


                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
           </div>
        </div>
        <div class="d-flex mt-4">
            {{ $plans->appends(Request::all())->links('admin.section.pagination') }}
        </div>
    </div>
</div>
</div>

@endcomponent
