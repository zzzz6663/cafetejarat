<?php

namespace App\Http\Controllers;

use AliBayat\LaravelCategorizable\Category;
use App\Models\User;
use App\Notifications\SendCodeSms;
use App\Notifications\SendKaveCode;
use App\Notifications\SendSms;
use Hekmatinasser\Verta\Facades\Verta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Facades\Socialite;
use Morilog\Jalali\Jalalian;
use Newsletter;
use function Composer\Autoload\includeFile;

class SignController extends Controller
{

    public function index( ){
        // alert()->success();
        return redirect()->route('login');
    }
    public function logout( ){
            Auth::logout();
            alert()->success('شما با موفقیت از حساب کاربری خود خارج شدید ');
        return redirect()->route('login');
    }
    public function test( ){
        $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('config:cache');
    $exitCode = Artisan::call('route:clear');
    return 'DONE'; //Return anything
    }
    public function login( ){
    if(Auth::check()){
        return redirect()->route('agent.panel');
    }
         return view('home.login');
    }
    public function forget_password(Request $request){
        $data=$request->validate([
            'email'=>'required|email'
        ]);
        $user=User::whereEmail($data['email'])->first();
        if(!$user){
            alert()->error('ایمیلی با این مشخصات پیدا نشد');
            return back();
        }

        alert()->success('رمز عبور شما با موفقیت به ایمیلتان ارسال  شد');
        return back();

    }


    public function admin_login()
    {
        // dd(Crypt::encrypt(12345));

        return view('admin.login');
    }



    public function check_sms(Request $requrest){
        $rnd=session()->get('rnd' );
      $mobile=  session()->get('mobile' );
      $password=  session()->get('password' );

      if ($requrest->code==$rnd){
        $user=User::whereMobile($mobile)->first();
        if (!$user){
            $user=User::create([
                'mobile'=>$mobile,
                'password'=>$password
            ]);
            // $user->notify(new SendKaveCode( $user->mobile,'register','کاربر','',''));
        }
          Auth::loginUsingId($user->id,true);

          return response()->json([
              'status'=>'ok',
              'url'=> route('agent.panel')
          ]);
      }else{
          return response()->json([
              'status'=>'notok',

          ]);
      }

    }



    public function remember_sms(Request $requrest){

        $data=$requrest->validate([
            'mobile'=>'required|min:11|max:11',
        ]);
        // $data['mobile']='09373699317';
        $new=0;

        $is_exist=User::where('mobile',$data['mobile'])->first();

        if ($is_exist){

            $new=1;
            $is_exist->notify(new SendKaveCode( $data['mobile'],'recover',$is_exist->password,'',''));
            return response()->json([
                'status'=>'ok',
                'new'=>$new,
            ]);

        }

        return response()->json([
            $data['mobile']=>'ok',
            'status'=>'ok',
            'new'=>$new,
        ]);
    }
    public function resend_sms(Request $requrest){
        $data=$requrest->validate([
            'mobile'=>'required|min:11|max:11',
        ]);
        $digits = 4;
        $rnd=rand(pow(10, $digits-1), pow(10, $digits)-1);
        $invitedUser = new User;
        $invitedUser->notify(new SendKaveCode( $data['mobile'],'register',$rnd,'',''));
        session()->put('rnd',$rnd);
        session()->put('mobile',$data['mobile']);
        return response()->json([
            'status'=>'ok',
            'rnd'=>$rnd,
        ]);
    }
    public function login_sms(Request $requrest){
        $new=0;
        $data=$requrest->validate([
            'mobile'=>'required|min:11|max:11',
            'password'=>'required|min:6',
        ]);
        $is_exist=User::whereMobile($data['mobile'])->first();

            if($is_exist&& $is_exist->password==$data['password']){
                Auth::loginUsingId($is_exist->id,true);
                $new=1;
                return response()->json([
                    'status'=>'1',
                    'new'=>$new,
                    'url'=>route('agent.panel')
                ]);
        }
        return response()->json([
            'status'=>'ok',
            'new'=>$new,
        ]);

    }
    public function register_sms(Request $requrest){
        $new=1;
        $data=$requrest->validate([
            'mobile'=>'required|min:11|max:11',
            'password'=>'required|min:6',
        ]);

        $is_exist=User::whereMobile($data['mobile'])->first();

        if ($is_exist){
            $new=0;
            return response()->json([
                'status'=>'ok',
                'new'=>$new,
            ]);
        }

        $digits = 4;
        $rnd=rand(pow(10, $digits-1), pow(10, $digits)-1);
        $invitedUser = new User;
        $invitedUser->notify(new SendKaveCode( $data['mobile'],'register',$rnd,'',''));
        session()->put('rnd',$rnd);
        session()->put('mobile',$data['mobile']);
        session()->put('password',$data['password']);
        return response()->json([
            'status'=>'ok',
            'rnd'=>$rnd,
             'new'=>$new,
        ]);
    }



    public function check_login(Request $request){
        $exist_user=User::where('tell',$request->username)->first();
        if ($exist_user){
            $user_pass=Crypt::decryptString($exist_user->password);
            if ($user_pass==$request->password){
                Auth::loginUsingId($exist_user->id,'true');
                return redirect()->route('admin.agents.all');
            }
        }
        alert()->error('اطلاعات شما صحیح نیست ');
        return back();
    }


    }
