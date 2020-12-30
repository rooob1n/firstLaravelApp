<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Posts extends Model
{
    use SoftDeletes;
    public function comments(){

        return $this -> hasMany(Comment::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function scopeFilter($query,$filters){
        
        if(count($filters)){
            if($month = $filters['month']){
                $query -> wheremonth('created_at',Carbon::parse($month)->month);
            }
    
            if($year = $filters['year']){
                $query -> whereyear('created_at',$year);
            }
        }
    }

    public static function archives(){
        return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) cnt')
        ->groupby('year','month')
        ->orderbyraw('min(month) asc')
        ->get()
        ->toarray();

    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
}
