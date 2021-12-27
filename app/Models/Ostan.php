<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ostan extends Model
{
    use HasFactory;

    public function shahrs(){
        return $this->hasMany(Shahr::class);
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
