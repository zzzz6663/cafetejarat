<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Download extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'content',
        'img',
        'file',
    ];
    public function file(){
        return asset('/media/download/file/'.$this->file);
    }
    public function img(){
        return asset('/media/download/image/'.$this->img);
    }
    public function file_path(){
        return public_path('/media/download/file/' . $this->file);
    }

    public function image_path(){
        return public_path('/media/download/image/' . $this->img);
    }
}
