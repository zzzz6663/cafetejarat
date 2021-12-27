<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{

    use HasFactory;
    protected $fillable=[
        'title',
        'vcat_id',
        'video',
        'cover',
        'content',
        'type',
        'model',
        'price',
        'sort',
    ];


    public function questions(){
        return $this->hasMany(Question::class);
    }
    public function vcat(){
        return $this->belongsTo(Vcat::class);
    }
    public function users(){
        return $this->belongsToMany(user::class)->withPivot(['answer','pay','seen'])->orderByPivot('seen' ,'desc');
    }
    public function video(){
        return asset('/media/video/video/'.$this->video);
    }
    public function cover(){
        return asset('/media/video/cover/'.$this->cover);
    }

    public function bills(){
        return $this->hasMany(Video::class)->where('parent',null);
    }
}
