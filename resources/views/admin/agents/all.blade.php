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
                        نماینده ها
                        ({{$agents->total()}})
                    </h2>

                </div>
            </div>
            <form action="{{route('admin.agents.all')}}" method="get">
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
                            <input type="search" name="search" value="{{request('search')}}" class="form-control d-inline-block w-9 me-3" placeholder="جستجوی نماینده  ">
                            <button class="btn btn-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <circle cx="10" cy="10" r="7"></circle>
                                    <line x1="21" y1="21" x2="15" y2="15"></line>
                                </svg>
                                جستوجو
                                </a>
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
            @foreach ($agents as $agent )
            <div class="col-md-6 col-lg-3">
                <div class="card">
                    <div class="card-body p-4 text-center">
                        <span class="avatar avatar-xl mb-3 avatar-rounded" style="background-image: url({{$agent->avatar()}})"></span>
                        <h2 class="m-0 mb-1"><a href="#">
                                {{$agent->name??' ---------- '}}
                                {{$agent->family??'---------- '}}
                            </a></h2>
                        <div class="text-muted">
                            <i class="ti ti-map-pin"></i>
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-map-pin" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="#2398b3" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <circle cx="12" cy="11" r="3"></circle>
                                <path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z"></path>
                            </svg>
                            {{$agent->ostan?$agent->ostan->name:'------ '}}
                            {{$agent->shahr?$agent->shahr->name:' ------'}}
                        </div>
                        <div class="mt-3">
                            <span class="badge avatar text-white bg-{{$agent->info_complete=='1' ?'green':'red'}}">{{$agent->info_complete=='1' ?'فعال':'غیر فعال' }}</span>
                        </div>
                    </div>
                    <div class="d-flex">
                        <span class="card-btn">
                            {{$agent->mobile}}
                        </span>
                    </div>
                    <div class="d-flex">


                        <a href="{{route('admin.agents.show', $agent->id)}}" class="btn card-btn btn-success">
                            اطلاعات بیشتر
                        </a>
                    </div>
                </div>
            </div>

            @endforeach

        </div>
        <div class="d-flex mt-4">
            {{ $agents->appends(Request::all())->links('admin.section.pagination') }}
        </div>
    </div>
</div>
</div>

@endcomponent
