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
                    <h4 class="card-title">   سوالات</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-12">
                            @include('home.error')
                            <form action="{{route('question.update' ,$question->id)}}" class="form-control" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <div class="mb-3">
                                    <input type="text" name="video_id" hidden value="{{$video->id}}">
                                    <label class="form-label">سوال  </label>
                                    <input type="text" name="q" value="{{old('q', $question->q)}}" class="form-control" name="example-text-input" placeholder="سوال      ">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">گزینه یک  </label>
                                    <input type="text" name="a" value="{{old('a', $question->a)}}" class="form-control" name="example-text-input" placeholder="گزینه یک      ">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">گزینه دو  </label>
                                    <input type="text" name="b" value="{{old('b', $question->b)}}" class="form-control" name="example-text-input" placeholder="گزینه دو      ">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">گزینه سه  </label>
                                    <input type="text" name="c" value="{{old('c', $question->c)}}" class="form-control" name="example-text-input" placeholder="گزینه سه      ">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">گزینه چهار  </label>
                                    <input type="text" name="d" value="{{old('d', $question->d)}}" class="form-control" name="example-text-input" placeholder="گزینه چهار      ">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="answer">  جواب</label>
                                    <select class="form-control"  name="answer" id="answer">
                                        <option selected disabled>  انتخاب جواب</option>
                                        <option {{old('answer', $question->answer)=='a'?'selected':''}} value="a">گزینه یک</option>
                                        <option {{old('answer', $question->answer)=='b'?'selected':''}} value="b">گزینه دو</option>
                                        <option {{old('answer', $question->answer)=='c'?'selected':''}} value="c">گزینه سه</option>
                                        <option {{old('answer', $question->answer)=='d'?'selected':''}} value="d">گزینه چهار</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <button class="btn btn-success">ذخیره</button>
                                    <a class="btn btn-danger" href="{{route('question.index',['video'=>$video->id])}}">برگشت</a>
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
