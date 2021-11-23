<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    // getting all estate to accept or reject
    public function showEstateForAction (Request $request){
        $newEstate=  DB::table('estates')->where(['status' => 0])->get();
        $arr = Array('newEstate'=>$newEstate);
        return view('admin.admin_show' , $arr);
    }

    // Accept estate
    public function acceptEstate ($eId){
      DB::table('estates')->where('eId', $eId)->update(array('status' => 1));
      return redirect('/show' );
    }

    // reject estate
    public function rejectEstate ($eId){
      DB::table('estates')->where('eId', $eId)->update(array('status' => 2));
      return redirect('/show' );
    }

    // block user
    public function showActors (Request $request){
      $newActor=  DB::table('users')->where(['block' => 0])->get();
      $arr = Array('newActor'=>$newActor);
      return view('admin.admin_block' , $arr);
    }

    // making block for actor
    public function blockActor ($uId){
      DB::table('users')->where('uId', $uId)->update(array('block' => 1));
      return redirect('/all_actors' );
    }
}
