<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shahr extends Model
{
    use HasFactory;
    public function ostan(){
        return $this->belongsTo(Ostan::class);
    }
    public function other_shahr(){
        return $this->ostan->shahrs;
    }
    public function users(){
        return $this->hasMany(User::class);
    }
    public function plans(){
        return $this->hasMany(Plan::class);
    }
    public function deactive_user(){
        return $this->hasMany(User::class)->where('info_complete','0');
    }
    public function active_user(){
        return $this->hasMany(User::class)->where('info_complete','1');
    }
}
