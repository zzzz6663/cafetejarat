<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable=[
        'video_id',
        'q',
        'a',
        'b',
        'c',
        'd',
        'answer',
    ];

    public function video(){
        return $this->belongsTo(Video::class);
    }
}
