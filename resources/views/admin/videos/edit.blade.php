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
                    ویرایش ویدئو
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
                    <h4 class="card-title"> ویدئو

                        {{$video->title}}
                    </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-12">
                            @include('home.error')
                            <form action="{{route('video.update',$video->id)}}" class="form-control" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <div class="mb-3">
                                    <label class="form-label">نام</label>
                                    <input type="text" name="title" value="{{old('title',$video->title)}}" class="form-control" name="example-text-input" placeholder="نام      ">
                                </div>



                                <div class="mb-3">
                                    <label class="form-label">توضیحات <span class="form-label-description"></span></label>
                                    <textarea class="form-control" name="content" rows="6" placeholder="Content..">{{old('content',$video->content)}}</textarea>
                                </div>
                                <div class="mb-3">
                                    <div class="form-label"> تصویر کاور</div>
                                    <input style="color: red" type="file" name="cover" accept=".png, .jpg, .jpeg" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <div class="form-label"> ویدئو</div>
                                    <input style="color: red" type="file" name="video" accept=".mp4" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">قیمت</label>
                                    <input type="number" name="price" value="{{old('price',$video->price)}}" class="form-control" name="example-text-input" placeholder="نام دسته بندی  ">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">ترتیب</label>
                                    <input type="number" name="sort" value="{{old('sort',$video->sort)}}" class="form-control" name="example-text-input" placeholder="ترتیب      ">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="">دسته بندی</label>
                                    <select class="form-control" value="{{old('vcat_id',$video->vcat_id)}}" name="vcat_id" id="vcat">
                                        <option selected disabled>دسته بندی</option>
                                        @foreach (\App\Models\Vcat::all() as $vcat )
                                        <option {{old('vcat_id',$video->vcat_id)==$vcat->id?'selected':''}} value="{{$vcat->id}}">{{$vcat->title}}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="type"> نوع قیمت</label>
                                    <select class="form-control" name="type" id="type">
                                        <option value="" disabled> نوع قیمت</option>
                                        <option {{old('type',$video->type)=='free'?'selected':''}} value="free">رایگان </option>
                                        <option {{old('type',$video->type)=='money'?'selected':''}} value="money">پولی</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="model"> نوع پخش</label>
                                    <select class="form-control" name="model" id="model">
                                        <option value="" disabled> نوع پخش</option>
                                        <option {{old('model',$video->model)=='close'?'selected':''}} value="close">بسته </option>
                                        <option {{old('model',$video->model)=='open'?'selected':''}} value="open">باز</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <video   class="js-player" playsinline controls data-poster="{{$video->cover()}}">
                                        <source src="{{$video->video()}}" type="video/mp4" />

                                    </video>
                                </div>
                                <div class="mb-3">
                                    <button class="btn btn-success">ذخیره</button>
                                    <a class="btn btn-danger" href="{{route('video.index')}}">برگشت</a>
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
