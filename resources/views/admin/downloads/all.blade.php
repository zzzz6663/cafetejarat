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
                        دانلود  ها
                    </h2>

                </div>
            </div>
            <form action="{{route('download.index')}}" method="get">
                @csrf
                @method('get')
                <div class="row align-items-center">


                    <div class="col-auto ms-auto d-print-none mt-4">
                        <div class="d-flex">
                            <a class="btn btn-success active w-100" href="{{route('download.create')}}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                                دانلود  جدید
                            </a>
                        </div>
                    </div>
                    {{-- <div class="col-auto ms-auto d-print-none mt-4">
                        <div class="d-flex">

                            <input type="search" name="search" value="{{request('search')}}"
                                class="form-control d-inline-block w-9 me-3" placeholder="جستجوی نماینده ">
                            <button class="btn btn-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
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
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-vcenter card-table">
                        <thead>
                            <tr>
                                <th>ردیف </th>
                                <th>تایتل </th>
                                <th>محتوا </th>
                                {{-- <th>نوع </th> --}}
                                {{-- <th>شروع </th> --}}
                                {{-- <th>پایان </th> --}}
                                <th>اقدام</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($downloads as $download )
                            <tr>
                                <td> {{$loop->iteration}}</td>
                                <td> {{$download->title}}</td>
                                <td> {{$download->content}}</td>
                                <td>
                                    <a class="btn btn-secondary  " href="{{route('download.edit',$download->id)}}">ویرایش</a>
                                <a href="{{$download->img()}}" class="btn btn-primary  " data-lightbox="roadtrip">عکس</a>
                                <form style="display: inline-block" action="{{route('download.destroy',$download->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <input type="submit" class="btn btn-danger " value="حذف"   >
                                </form>
                                </td>


                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="d-flex mt-4">
            {{ $downloads->appends(Request::all())->links('admin.section.pagination') }}
        </div>
    </div>
</div>
</div>
</div>

@endcomponent
