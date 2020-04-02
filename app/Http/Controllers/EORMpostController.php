<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EORMpost;
use DB;

class EORMpostController extends Controller
{
    public function beposts(){
        //EORM with model
        $post = EORMpost::all();

        //EORM with query builder
        // $post=DB::table('e_o_r_mposts')
        //     ->join('e_o_r_mcategories','e_o_r_mposts.category_id','e_o_r_mcategories.id')
        //     ->join('e_o_r_musers','e_o_r_mposts.user_id','e_o_r_musers.id')
        //     ->get();
        return view('eormRelation.blongsTo3table', compact('post'));
    }

    public function hasposts(){
        //EORM by Model
        $posts = EORMpost::where('user_id',2)->get();

        //EORM by querry builder
        // $posts=DB::table('e_o_r_mposts')
        //     ->join('e_o_r_mcategories','e_o_r_mposts.category_id','e_o_r_mcategories.id')
        //     ->join('e_o_r_musers','e_o_r_mposts.user_id','e_o_r_musers.id')
        //     ->where('user_id',2)
        //     ->get();
        return view('eormRelation.hasMany',compact('posts'));
    }
}
