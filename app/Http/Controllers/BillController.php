<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Video;
use Illuminate\Http\Request;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment as shetabit;

class BillController extends Controller
{
   public function send_pay(Request $request){
    $user=auth()->user();
    $port='zarinpal';

    $video=Video::find($request->video);
    $price=0;
    $video_id=null;
    $type='wallet_charge';
    $for='';
    $parent=null;
    if( $video){
        $price=$video->price;
        $video_id=$video->id;
        $for='video';

    }

    $invoice = (new Invoice) ;
    $invoice->amount($price);
    return   shetabit::via($port)->callbackUrl(route('agent.verify.pay'))->purchase($invoice,function($driver, $transactionId) use ( $user,$invoice,$type,$video_id,$for,$parent,$price,$port) {
        $payment= Bill::create([
            'track'=>($transactionId),
            'user_id'=>$user->id,
            'video_id'=>$video_id,
            'type'=>$type,
            'for'=>$for,
            'parent'=>$parent,
            'price'=>$price,
            'port'=>$port,
        ]);
    })->pay()->render();

   }


   public function verify_pay(Request $request)
    {
        $bill = Bill::where('track', $request->Authority)->first();
        $status=0;
        $user = $bill->user;
        $video=$bill->video;

        if ($request->Status == 'OK') {

            switch ($bill->type) {
                case 'wallet_charge':
                    $bill->update(['remain'=>$user->cash + $bill->price , 'status'=>'1'] ); // شارژ کیف
                    // $user->change_cash($bill->type, $amount);
                    $newTask = $bill->replicate();
                    $newTask->type = 'pay_video_by_charge'; // the new project_id
                    $newTask->remain = $user->cash; // پرداخت با کیف
                    $newTask->save();
                    $user->videos()->attach([$video->id =>['pay'=>'1']]);
                    return redirect()->route('agent.check.video.status',['video'=>$video]);

                    break;
            }
        }
        alert()->error('پرداخت انجام نشد');

         return redirect()->route('agent.single.vcat',$video->vcat->id);
    }




}
