<?php

namespace App;
use App\EORMphone;
use Illuminate\Database\Eloquent\Model;
class EORMuser extends Model
{
    protected $fillable = [
        'name','email'
    ];

    // public function phone()
    // {
    //     return $this->hasOne(EORMphone::class);
    // }

    public function post(){
        return $this->hasMany(EORMpost::class);
    }
}
