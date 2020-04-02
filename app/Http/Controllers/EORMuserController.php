<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EORMuser;
Use DB;
class EORMuserController extends Controller
{
    public function users(){
        //Relation with EORM
        // $user = EORMuser::all();

        // Relation with DB Query
        $user=DB::table('e_o_r_musers')
            ->join('e_o_r_mphones','e_o_r_musers.id','e_o_r_mphones.user_id')
            ->get();
        return view('eormRelation.hasOne', compact('user'));
    }
}
