<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'family',
        'ostan_id',
        'shahr_id',
        'mobile',
        'code',
        'tell',
        'madrak',
        'job',
        'wmobile',
        'level',
        'insta',
        'connector',
        'telegram',
        'introduced',
        'ability',
        'rel',
        'about',
        'info_complete',
        'fave',
        'tendency',
        'email_verified_at',
        'password',
        'cash',
    ];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function attributes(){
        return $this->hasMany(Attribute::class);
    }
    public function plans(){
        return $this->belongsToMany(Plan::class)->withPivot(['producer','user','investor','facilitator']);
    }
    public function payams(){
        return $this->belongsToMany(Payam::class)->withPivot(['seen']);
    }
    public function plans_pivot($id,$var){
        if($this->plans->where('id',$id)->first()){
            return $this->plans->where('id',$id)->first()->pivot->$var;
        }
        return false;
    }

    public function shahr(){
        return $this->belongsTo(Shahr::class);
    }
    public function ostan(){
        return $this->belongsTo(Ostan::class);
    }
    public function bills(){
        return $this->hasMany(Bill::class);
    }
    public function languages(){
        return $this->belongsToMany(Language::class);
    }
    public function videos(){
        return $this->belongsToMany(Video::class)->withPivot(['answer','pay','seen'])->orderByPivot('seen' ,'desc');;
    }
    public function video_pivot_pay($video){
       if($this->videos()->where('video_id', $video->id)->first()){
           return  $this->videos()->where('video_id', $video->id)->first()->pivot->pay;
       }
        return false;
    }
    public function video_pivot_seen($video){
       if($this->videos()->where('video_id', $video->id)->first()){
           return  $this->videos()->where('video_id', $video->id)->first()->pivot->seen;
       }
        return false;
    }
    public function video_pivot_answer($video){
       if($this->videos()->where('video_id', $video->id)->first()){
           return  $this->videos()->where('video_id', $video->id)->first()->pivot->answer;
       }
        return false;
    }











    public function attr($name){
        $name=trim($name);
        $atr=  $this->hasMany(Attribute::class)->whereName($name)->first();
        if ($atr){
            return $atr->value;
        }
        return  false;
    }
    public function save_attr($key,$val){
        $atr=  $this->hasMany(Attribute::class)->whereName($key)->first();

        if ($atr){
            $atr->update([
                'name'=>$key,
                'value'=>$val,
            ]);
            return false;
        }else{
            $this->attributes()->create([
                'name'=>$key,
                'value'=>$val,
            ]);
            return true;
        }
    }
    public function  profile_active_status(){
        return $this->info_complete? true:false;
    }
    public function  avatar(){
        return asset('/media/agent/avatar/'.$this->attr('avatar'));
    }
    public function  introduced(){
        return User::where('mobile',$this->introduced)->first()??false;
    }
    public function  sub(){
        return User::where('introduced',$this->mobile)->count();
    }
    public function  subs(){
        return User::where('introduced',$this->mobile)->latest()->get();
    }
    public function change_cash($type,$amount ){
        $cash=   $this->cash;
        switch ($type){
            case 'site_share':
                $amount= $cash +$amount;
                $this->update([
                    'cash'=>$amount
                ]);
                break;

            case 'pay_video_by_charge':
            $amount= $cash -$amount;
            $this->update([
                'cash'=>$amount
            ]);
            break;


        }
    }

}
