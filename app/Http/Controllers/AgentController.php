<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Plan;
use App\Models\User;
use App\Models\Vcat;
use App\Models\Ostan;
use App\Models\Payam;
use App\Models\Shahr;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AgentController extends Controller
{
    public function panel()
    {
        $user = auth()->user();
        if (!$user->profile_active_status()) {
            alert()->success('ابتدا مشخصصات خود را کامل کنید ');
            return redirect()->route('agent.info1');
        }
        return view('home.agent.panel', compact('user'));
    }


    public function get_shahr(Ostan $ostan, Shahr $shahr)
    {
        return response()->json([
            'body' => view('home.agent.get_shahr', compact(['ostan', 'shahr']))->render(),
        ]);
    }
    public function info1(Request $request)
    {
        if ($request->isMethod('post')) {
            $user = auth()->user();
            $data = $request->validate([
                'name' => 'required|max:50',
                'family' => 'required|max:50',

                'code' => 'required|string|min:10|max:10|unique:users,id,' . $request->code,
                // 'code'  =>  'required|unique:users,id,'.$id,
                // 'tell'=>'required|digits:11|unique:users',
                'ostan_id' => 'required|max:50',
                'shahr_id' => 'required|max:50',
                'madrak' => 'required|max:50',
                'job' => 'required|max:50',
                'wmobile' => 'nullable|string|min:11|max:11',
                'insta' => 'nullable|max:100',
                'telegram' => 'nullable|max:100',
                'introduced' => 'required|max:50|exists:users,mobile',
            ]);
            if ($user->mobile == $data['introduced']) {
                return redirect()->back()->withErrors(['msg' => 'شما نمی توانید معرف خود باشید   ']);
            }
            $user->update($data);
            return redirect()->route('agent.info2');
        }
        return view('home.agent.info1');
    }
    public function info2(Request $request)
    {
        if ($request->isMethod('post')) {
            $user = auth()->user();
            $data = $request->validate([
                'ability' => 'required|max:800',
                'rel' => 'required|max:800',
                'about' => 'required|max:800',
            ]);
            $user->update($data);
            return redirect()->route('agent.info3');
        }
        return view('home.agent.info2');
    }
    public function info3(Request $request)
    {

        if ($request->isMethod('post')) {
            $user = auth()->user();
            $data = $request->validate([
                'tendency' => 'required|max:800',
                'connector' => 'nullable',
            ]);
            $data['info_complete'] = '1';
            $user->update($data);
            return redirect()->route('agent.info4');
        }
        return view('home.agent.info3');
    }
    public function info4(Request $request)
    {
        $user = auth()->user();
        return view('home.agent.info4', compact('user'));
    }
    public function contact(Request $request)
    {
        $user = auth()->user();
        return view('home.agent.contact', compact('user'));
    }
    public function save_avatar(Request $request)
    {
        $user = \auth()->user();
        $image = $request->bg;
        list($type, $image) = explode(';', $image);
        list(, $image) = explode(',', $image);
        $image = base64_decode($image);
        $image_name = $user->id . '_avatar' . '_' . time() . '.png';
        file_put_contents(public_path('/media/agent/avatar/') . $image_name, $image);
        $user->save_attr('avatar', $image_name);
        return response()->json([
            'url' => asset('/src/avatar/' . $image_name),
        ]);
    }


    public function plans(Request $request){
        $user = auth()->user();
        $plans=Plan::whereActive('1')->where(function($query) use($user){
            $query-> WhereHas('shahr',function($query) use($user){
                $query->where('id', $user->shahr->id);
            })
           ->OrWhereHas('ostan',function($query) use($user){
                $query->where('id', $user->ostan->id);
            });
            if($in=User::where('mobile',$user->introduced)->first()){
                $query->OrWhereHas('user',function($query) use($in){
                    $query->where('id', $in->id);
                });
            }
        //    ->OrWhereHas('user',function($query) use($user){
        //         $query->where('id', $user->ostan->id);
        //     });
        })->latest()->paginate(10);
        return view('home.agent.plans', compact(['user','plans']));
    }

    public function single_plans(Request $request,Plan $plan){
        $user = auth()->user();

        return view('home.agent.single_plans', compact(['user','plan']));
    }
    public function join_plans(Request $request){
        $user = auth()->user();

        $data=$request->validate([
            'plan_id'=>'nullable',
            'producer'=>'nullable',
            'user'=>'nullable',
            'investor'=>'nullable',
            'facilitator'=>'nullable',
        ]);
        $user->plans()->detach([$data['plan_id']]);


        if(  $data['producer']==0 &&  $data['user']==0 &&  $data['investor']==0 &&  $data['facilitator']==0  ){
        alert()->success('  هیچ مووردی برای شما انتخاب نشده
        ');
        return back();
        }
        // if($user->plans->contains($data['plan_id'])){
        //     alert()->success('شما قبلا   به این طرح اضافه شدید');
        //     return back();
        // }

        $user->plans()->attach([$data]);
        alert()->success('اطلاعات شما در این طرح به روز رسانی شد');
        return back();
    }




    public function payams(Request $request){
        $user = auth()->user();
        $payams= $user->payams()->whereActive('1')->latest()->paginate(10);

        return view('home.agent.payams', compact(['user','payams']));
    }

    public function single_payams(Request $request,Payam $payam){
        $user = auth()->user();
        $user->payams()->updateExistingPivot( $payam->id,[
            'seen'=>Carbon::now()]);
        return view('home.agent.single_payams', compact(['user','payam']));
    }

    public function  cats(Request $request ){
        $user = auth()->user();
       $cats=Vcat::latest()->get();
        return view('home.agent.cats', compact(['user','cats']));
    }
    public function  single_vcat (Request $request ,Vcat $vcat ){
        $user = auth()->user();

        $videos=$vcat->videos()->get();
        $my_videos=$user->videos;

        // ->whereHas('user_video',function($query){
        //     $query->wherePivot('seen',null);
        // })

        return view('home.agent.single_vcat', compact(['user','vcat','videos','my_videos']));
    }

    public function  check_video_status (Request $request ,Video $video){
        // بررسی وضعیت ویدئو برای باز و بسته بودن و پولی و رایگان بودن
        $user = auth()->user();
        // dd( $user);

        if( $video->type=='money'  &&  $user->video_pivot_pay($video) !='1'){
            // اگر نوع ویدئو  پولی بود و قبلا پرداخت نکرده بود باید پرداخت شود
            return redirect()->route('agent.send.pay',['video'=>$video]);
        }
        if( $video->model=='close' &&  $user->video_pivot_answer($video) !='1'){
                        // اگر نوع ویدئو  بسته  بود و قبلا   به سوالات پایخ نداده بود بود باید پرداخت شود
            $questions= $video->questions;
            return view('home.agent.video_questions', compact(['user','video' ,'questions']));
        }

        if(!$user->videos->contains($video->id)) {
            $user->videos()->attach([$video->id ]);
        }
        $user->videos()->updateExistingPivot( $video->id,[
            'seen'=>Carbon::now()])   ;

        return view('home.agent.play_video', compact(['user','video']));

    }
    // public function  video_questions (Request $request ,Video $video){
    //     $user = auth()->user();
    //     $questions= $video->questions;
    //     return view('home.agent.video_questions', compact(['user','video' ,'questions']));
    // }
    public function  submit_questions (Request $request ){
        $data =$request->validate([
            'video_id'=>'required',
        ]);
        $video=Video::find($request->video_id);
        $i=1;
        $correct=0;
        foreach($video->questions as $question){
            $q='q'.$i;
            if( $question->answer== $request->$q){
                $correct++;
            }
            $i++;
        }
        $user=auth()->user();


        if($correct>=4 ) {
            if($user->videos->contains($video->id)){
                $user->videos()->updateExistingPivot( $video->id,[
                    'answer'=>'1'])   ;
            }else{
            $user->videos()->attach([$video->id =>['answer'=>'1']]);
            }
            return redirect()->route('agent.check.video.status',['video'=>$video]);
        }
        alert()->error('جواب سوالات شما اشتباه بود');
        return redirect()->route('agent.single.vcat',$video->vcat->id);

    }
}
