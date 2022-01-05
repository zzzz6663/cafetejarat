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
                    ساخت دانلود
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
                    <h4 class="card-title"> دسته دانلود</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-12">
                            @include('home.error')
                            <form autocomplete="off" action="{{route('download.store')}}" class="form-control" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('post')
                                <div class="mb-3">
                                    <label class="form-label">نام</label>
                                    <input type="text" name="title" value="{{old('title')}}" class="form-control" name="example-text-input" placeholder="نام      ">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">توضیحات <span class="form-label-description"></span></label>
                                    <textarea class="form-control" name="content" rows="6" placeholder="Content..">{{old('content')}}</textarea>
                                </div>
                                <div class="mb-3">
                                    <div class="form-label"> تصویر فایل</div>
                                    <input style="color: red" type="file" name="img" accept=".png, .jpg, .jpeg" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <div class="form-label">   فایل</div>
                                    <input style="color: red" type="file" name="file"  mp4" class="form-control">
                                </div>


                                <div class="mb-3">
                                    <button class="btn btn-success">ذخیره</button>
                                    <a class="btn btn-danger" href="{{route('download.index')}}">برگشت</a>
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
