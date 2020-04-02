<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class EORMphone extends Model
{
    protected $fillable = [
        'user_id','phone'
    ];

    public function user(){
        return $this->belongsTo(EORMuser::class);
        //OR, return $this->belongsTo('App\EORMuser');
    }
}
