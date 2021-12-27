@foreach($comments as $comment)

    @if(isset($sub))
        @php($level++)
    @endif
    @php($v=verta($comment->created_at))



    <div id="comment_{{$comment->id}}" class="comment">

        <div class="blog-post-comments">
            <div class="top">
                <div class="right">
                    @if($comment->user_id)
                        <div class="img" style="background: url('{{asset('/src/avatar/'.$comment->user->attr('avatar'))}}');"></div>
                    @else
                        <div class="img" style="background: url('/home/images/teacher.png');"></div>
                    @endif
                </div>
                <div class="left">

                        <span class="blog-post-comment-name">    {{$comment->name}}    </span> <span class="date">{{$v->format('%B %d، %Y')}}</span>

                </div>
            </div>
            <div class="bottom">
                <p>
                    @if(isset($sub))
                        {{$level}}
                    @endif
                    {{$comment->comment}}
                </p>
                @if(  $level<4)

                    <a data-id="{{$comment->id}}"  class="pull-left bl pointer answer_com text-gray reply"  >
							       				<span class="icon">
							       					<svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M4.27722 6.74736L6.81322 9.28336L5.39922 10.6974L0.449219 5.74736L5.39922 0.797359L6.81322 2.21136L4.27722 4.74736H11.4492C13.571 4.74736 15.6058 5.59021 17.1061 7.09051C18.6064 8.5908 19.4492 10.6256 19.4492 12.7474C19.4492 14.8691 18.6064 16.9039 17.1061 18.4042C15.6058 19.9045 13.571 20.7474 11.4492 20.7474H2.44922V18.7474H11.4492C13.0405 18.7474 14.5666 18.1152 15.6919 16.99C16.8171 15.8648 17.4492 14.3387 17.4492 12.7474C17.4492 11.1561 16.8171 9.62994 15.6919 8.50472C14.5666 7.3795 13.0405 6.74736 11.4492 6.74736H4.27722Z" fill="#57BA7E"></path>
													</svg>
							       				</span>
                        <span class="text">پاسخ</span>
                    </a>
                @endif

                <div id="respond" class="par_com comment-respond"  style="display: none">

                    <h3 id="reply-title" class="comment-reply-title">ارسال پاسخ
                        برای
                        {{$comment->name}}
                        <span class="dele_com" style="float: left;border-radius: 5px; border: 1px solid #000; font-size: 12px;display: inline-block; padding: 3px 5px; cursor: pointer">لغو پاسخ</span>
                    </h3>


                    <div class="form">
                        <h4>دیدگاهتان را بنویسید</h4>
                        <p>نشانی ایمیل شما منتشر نخواهد شد. بخش‌های موردنیاز علامت‌گذاری شده‌اند *</p>
                        <form id="par_{{$comment->id}}"  class="comment-form par_for" action="{{route('home.comment.article',$article->id)}}" method="post">
                            @csrf
                            @method('post')
                            <div class="row">

                                <div class="col-lg-6 col-sm-12">
                                    <div>
                                        <div class="input-container icon">
                                            <span>نام*</span>
                                            <i class="right-bg">
                                                <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M10.9414 20.634C8.9636 20.634 7.0302 20.0475 5.38571 18.9487C3.74122 17.8499 2.45949 16.2881 1.70262 14.4608C0.945739 12.6336 0.747706 10.6229 1.13356 8.68307C1.51941 6.74326 2.47182 4.96143 3.87034 3.56291C5.26887 2.16438 7.0507 1.21198 8.99051 0.826124C10.9303 0.440272 12.941 0.638305 14.7682 1.39518C16.5955 2.15206 18.1573 3.43378 19.2561 5.07827C20.3549 6.72277 20.9414 8.65616 20.9414 10.634C20.9414 13.2861 19.8878 15.8297 18.0125 17.705C16.1371 19.5804 13.5936 20.634 10.9414 20.634ZM10.9414 18.634C12.5237 18.634 14.0704 18.1648 15.386 17.2857C16.7016 16.4067 17.7269 15.1573 18.3324 13.6954C18.9379 12.2336 19.0964 10.6251 18.7877 9.07325C18.479 7.52141 17.7171 6.09594 16.5983 4.97712C15.4794 3.8583 14.054 3.09638 12.5021 2.78769C10.9503 2.47901 9.34175 2.63744 7.87994 3.24294C6.41813 3.84844 5.16871 4.87382 4.28965 6.18941C3.4106 7.50501 2.94141 9.05173 2.94141 10.634C2.94141 12.7557 3.78427 14.7905 5.28456 16.2908C6.78485 17.7911 8.81968 18.634 10.9414 18.634ZM5.94141 10.634H7.94141C7.94141 11.4296 8.25748 12.1927 8.82009 12.7553C9.3827 13.3179 10.1458 13.634 10.9414 13.634C11.7371 13.634 12.5001 13.3179 13.0627 12.7553C13.6253 12.1927 13.9414 11.4296 13.9414 10.634H15.9414C15.9414 11.9601 15.4146 13.2318 14.4769 14.1695C13.5393 15.1072 12.2675 15.634 10.9414 15.634C9.61533 15.634 8.34356 15.1072 7.40588 14.1695C6.46819 13.2318 5.94141 11.9601 5.94141 10.634Z" fill="#8895BA"></path>
                                                </svg>
                                            </i>
                                            <input  data-valid="لطفا نام خود را وارد کنید " id="author" class="form-control" required name="name" type="text" value="" size="30" aria-required="true">

                                        </div>
                                    </div>
                                </div>


                                <div class="col-lg-6 col-sm-12">
                                    <div>
                                        <div class="input-container icon">
                                            <span>آدرس ایمیل*</span>
                                            <i class="right-bg">
                                                <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M18.2305 10.4489C18.2303 8.6658 17.6344 6.93385 16.5374 5.52811C15.4404 4.12236 13.9052 3.1234 12.1756 2.68985C10.446 2.2563 8.62111 2.41302 6.99075 3.13512C5.36039 3.85722 4.018 5.1033 3.17676 6.6755C2.33551 8.2477 2.04363 10.0559 2.34746 11.8129C2.65129 13.57 3.53342 15.1751 4.85377 16.3736C6.17412 17.572 7.857 18.2949 9.63518 18.4276C11.4134 18.5603 13.1849 18.0951 14.6685 17.1059L15.7785 18.7699C14.1367 19.8676 12.2054 20.4521 10.2305 20.4489C4.70747 20.4489 0.230469 15.9719 0.230469 10.4489C0.230469 4.92591 4.70747 0.448914 10.2305 0.448914C15.7535 0.448914 20.2305 4.92591 20.2305 10.4489V11.9489C20.2306 12.6977 19.9906 13.4267 19.5457 14.029C19.1008 14.6312 18.4745 15.0749 17.7588 15.2949C17.0431 15.5149 16.2757 15.4996 15.5694 15.2512C14.863 15.0028 14.2549 14.5345 13.8345 13.9149C13.167 14.6089 12.3134 15.0954 11.3762 15.316C10.4389 15.5366 9.45794 15.4819 8.55103 15.1585C7.64413 14.835 6.8499 14.2566 6.26377 13.4927C5.67765 12.7288 5.32455 11.8119 5.24691 10.8522C5.16927 9.8925 5.37038 8.93077 5.82609 8.08259C6.2818 7.2344 6.97272 6.53583 7.81584 6.07082C8.65896 5.6058 9.61841 5.39411 10.5789 5.46118C11.5394 5.52825 12.4602 5.87123 13.2305 6.44891H15.2305V11.9489C15.2305 12.3467 15.3885 12.7283 15.6698 13.0096C15.9511 13.2909 16.3326 13.4489 16.7305 13.4489C17.1283 13.4489 17.5098 13.2909 17.7911 13.0096C18.0724 12.7283 18.2305 12.3467 18.2305 11.9489V10.4489ZM10.2305 7.44891C9.43482 7.44891 8.67176 7.76498 8.10915 8.32759C7.54654 8.8902 7.23047 9.65326 7.23047 10.4489C7.23047 11.2446 7.54654 12.0076 8.10915 12.5702C8.67176 13.1328 9.43482 13.4489 10.2305 13.4489C11.0261 13.4489 11.7892 13.1328 12.3518 12.5702C12.9144 12.0076 13.2305 11.2446 13.2305 10.4489C13.2305 9.65326 12.9144 8.8902 12.3518 8.32759C11.7892 7.76498 11.0261 7.44891 10.2305 7.44891Z" fill="#8895BA"></path>
                                                </svg>
                                            </i>

                                            <input  data-valid="لطفا ایمیل خود را وارد کنید "  id="email" name="email" required class="form-control" type="email" value="" size="30" aria-required="true">

                                        </div>
                                    </div>
                                </div>


                                <div class="col-lg-12">
                                    <div>
                                        <div class="input-container textarea icon">
                                            <span>نظرتان را بنویسید*</span>
                                            <i class="right-bg">
                                                <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8 0.948914H12C14.1217 0.948914 16.1566 1.79177 17.6569 3.29206C19.1571 4.79235 20 6.82718 20 8.94891C20 11.0706 19.1571 13.1055 17.6569 14.6058C16.1566 16.1061 14.1217 16.9489 12 16.9489V20.4489C7 18.4489 0 15.4489 0 8.94891C0 6.82718 0.842855 4.79235 2.34315 3.29206C3.84344 1.79177 5.87827 0.948914 8 0.948914ZM10 14.9489H12C12.7879 14.9489 13.5681 14.7937 14.2961 14.4922C15.0241 14.1907 15.6855 13.7487 16.2426 13.1916C16.7998 12.6344 17.2417 11.973 17.5433 11.245C17.8448 10.5171 18 9.73685 18 8.94891C18 8.16098 17.8448 7.38077 17.5433 6.65281C17.2417 5.92486 16.7998 5.26342 16.2426 4.70627C15.6855 4.14912 15.0241 3.70716 14.2961 3.40564C13.5681 3.10411 12.7879 2.94891 12 2.94891H8C6.4087 2.94891 4.88258 3.58105 3.75736 4.70627C2.63214 5.83149 2 7.35761 2 8.94891C2 12.5589 4.462 14.9149 10 17.4289V14.9489Z" fill="#8895BA"></path>
                                                </svg>
                                            </i>
                                            <input type="text" id="paretn" value="{{$comment->id}}" hidden="" name="parent_id">

                                            <textarea class="form-control msg-box" data-valid="لطفا نظر خود را وارد کنید "  required   name="comment" cols="45" rows="8" aria-required="true"></textarea>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div>
                                        <div class="button">
                                            <span data-id="{{$comment->id}}" class="bt sub_com pointer send" style="line-height: 45px; height: 45px; padding: 0 45px">ارسال نظر </span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

        @include('home.section.comment',['comments'=>$comment->child,'sub'=>'1'])

    </div>



@endforeach