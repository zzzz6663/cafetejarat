<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vcat extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'content',
        'image',
        'active',
    ];
    public function videos(){
        return $this->hasMany(Video::class);
    }
    public function image(){
        return asset('/media/vcat/image/'.$this->image);
    }
}
