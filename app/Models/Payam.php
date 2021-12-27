<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payam extends Model
{
    use HasFactory;
    protected $fillable=['title','text','active', 'plan_id','shahr_id','ostan_id'];

    public function users(){
        return $this->belongsToMany(user::class)->withPivot(['seen']);
    }
    public function shahr(){
        return $this->belongsTo(Shahr::class);
    }
    public function ostan(){
        return $this->belongsTo(Ostan::class);
    }
}
