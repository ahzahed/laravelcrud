<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EORMpost extends Model
{
    protected $fillable = [
        'user_id','category_id','title','description'
    ];

    public function category(){
        return $this->belongsTo(EORMcategory::class);
    }
    public function user(){
        return $this->belongsTo(EORMuser::class);
    }
}
