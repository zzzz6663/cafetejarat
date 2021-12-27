<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
    protected $fillable=['ostan_id','shahr_id','user_id','name','image','text','active','type'];
    public function users(){
        return $this->belongsToMany(User::class)->withPivot(['producer','user','investor','facilitator']);
    }
    public function shahr(){
        return $this->belongsTo(Shahr::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function ostan(){
        return $this->belongsTo(Ostan::class);
    }
    public function image(){
        return asset('/media/plan/image/'.$this->image);
    }
}
