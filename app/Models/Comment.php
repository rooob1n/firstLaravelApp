<?php

namespace App\Models;

class Comment extends Model
{
    public function post(){
        return $this->belongsTo(Posts::class);
    }

    public function user(){
        return $this->belongsTo(Posts::class);
    }
}
