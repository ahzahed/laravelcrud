<?php

namespace App\Http\Controllers;

use App\EORMphone;
use Illuminate\Http\Request;
use DB;
class EORMphoneController extends Controller
{
    public function beusers(){
        // BelongsTo Relation with Elequent ORM
        $phone = EORMphone::all();

        // Relation with DB Query
        // $phone = DB::table('e_o_r_mphones')
        //     ->join('e_o_r_musers','e_o_r_mphones.user_id','e_o_r_musers.id')
        //     ->get();
        return view('eormRelation.blongsTo', compact('phone'));
    }
}
