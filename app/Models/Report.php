<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'content',
        'cover',
        'video',
        'type',
        'start',
        'end',
    ];

    public function video(){
        return asset('/media/report/video/'.$this->video);
    }
    public function video_path(){
        return public_path('/media/report/video/' . $this->video);
    }
    public function cover(){
        return asset('/media/report/cover/'.$this->cover);
    }
    public function cover_path(){
        return public_path('/media/report/cover/' . $this->cover);
    }
}
