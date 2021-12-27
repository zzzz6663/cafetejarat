<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'video_id',
        'type',
        'for',
        'parent',
        'track',
        'price',
        'port',
        'status',
    ];
    public function video(){
        return $this->belongsTo(Video::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
