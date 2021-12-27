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
                   ساخت دسته بندی
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
                    <h4 class="card-title">  دسته بندی جدید</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-12">
                            @include('home.error')
                            <form action="{{route('vcat.store')}}" class="form-control" method="post"  enctype="multipart/form-data">
                                @csrf
                                @method('post')
                            <div class="mb-3">
                                <label class="form-label">نام</label>
                                <input type="text" name="title" value="{{old('title')}}" class="form-control" name="example-text-input" placeholder="نام دسته بندی  ">
                            </div>



                            <div class="mb-3">
                                <label class="form-label">توضیحات <span class="form-label-description"></span></label>
                                <textarea class="form-control" name="content" rows="6" placeholder="Content..">{{old('content')}}</textarea>
                            </div>
                            <div class="mb-3">
                                <div class="form-label">    تصویر دسته بندی</div>
                                <input style="color: red" type="file" name="image" accept=".png, .jpg, .jpeg" class="form-control">
                              </div>
                              <div class="mb-3">
                                <button class="btn btn-success">ذخیره</button>
                                <a  class="btn btn-danger" href="{{route('vcat.index')}}">برگشت</a>
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
