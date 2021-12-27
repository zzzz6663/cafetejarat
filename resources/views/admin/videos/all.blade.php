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
                        ویدئو ها
                    </h2>

                </div>
            </div>
            <form action="{{route('video.index')}}" method="get">
                @csrf
                @method('get')
                <div class="row align-items-center">


                    <div class="col-auto ms-auto d-print-none mt-4">
                        <div class="d-flex">
                            <a class="btn btn-success active w-100" href="{{route('video.create')}}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                                ویدئو جدید
                            </a>
                        </div>
                    </div>
                    {{-- <div class="col-auto ms-auto d-print-none mt-4">
                        <div class="d-flex">

                            <input type="search" name="search" value="{{request('search')}}" class="form-control d-inline-block w-9 me-3" placeholder="جستجوی نماینده ">
                    <button class="btn btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <circle cx="10" cy="10" r="7"></circle>
                            <line x1="21" y1="21" x2="15" y2="15"></line>
                        </svg>
                        جستوجو
                    </button>

                </div>
        </div> --}}

    </div>
    </form>

</div>
</div>
</div>
<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">
            @foreach ($vcats as $vcat )
            <div class="col-md-6 col-lg-3">
                <div class="card">
                    <div class="card-body p-4 text-center">
                        <span class="avatar avatar-xl mb-3 avatar-rounded" style="background-image: url({{$vcat->image()}})"></span>
                        <h2 class="m-0 mb-1"><a href="#">
                                {{$vcat->title??' ---------- '}}
                            </a></h2>
                            <div class="text-muted">


                            </div>
                            <div class="mt-3">
                                <span class="badge bg-green-lt">    {{$vcat->videos()->count()}}
                                ویدئو
                                </span>
                              </div>

                    </div>


                    <div class="d-flex">
                        <a href="{{route('video.cat', $vcat->id)}}" class="btn card-btn btn-success">
                            اطلاعات بیشتر
                        </a>
                        <a href="{{route('vcat.edit', $vcat->id)}}" class="card-btn btn-warning"><!-- Download SVG icon from http://tabler-icons.io/i/mail -->
                            ویرایش</a>
                    </div>
                </div>
            </div>

            @endforeach

        </div>
        <div class="d-flex mt-4">
            {{ $vcats->appends(Request::all())->links('admin.section.pagination') }}
        </div>
    </div>
</div>
</div>
</div>

@endcomponent
