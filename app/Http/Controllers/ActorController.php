<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ActorController extends Controller
{
    // getting index view of actor
    public function getIndex (Request $request){
      $newEstate=  DB::table('estates')->where(['status' => 1])->get();
      $arr = Array('newEstate'=>$newEstate);
      return view('actor.actor_index' , $arr);
    }

    // adding new Estate
    public function addEstate (Request $request){
      if($request->isMethod('post')){
        // getting data from View
        $type = $request->input('type');
        $address = $request->input('address');
        $length = $request->input('length');
        $width = $request->input('width');
        $area = $length * $width;
        $mobile = $request->input('contact');
        $name = $request->session()->get('username');
        // check validation
        if($type == "" || $address == "" || $length == "" ||
           $width == "" || $mobile == ""){
             // echo "<script>window.alert(\"Please Complete Your Data\");</script>";
             return "Error";
           }elseif($name == ""){
              echo "<script>window.alert(\"session not work\");</script>";
           }else if( strlen($mobile) > 11 || strlen($mobile) < 11){
             echo "<script>window.alert(\"Please insert valid number\");</script>";
           }else{
             // save data to database
             DB::table('estates')->insert(
                 ['type' => $type,
                  'address' => $address,
                  'length' => $length,
                  'width' => $width,
                  'area' => $area,
                  'mobile' => $mobile,
                  'name'=> $name]
             );
             // redirect to login
             return redirect('/add');
           }
      }
      return view('actor.actor_add_estate');
    }

    // finding estate
    public function findEstate (Request $request){
      session()->forget('msg');
      return view('actor.actor_find_estate');
    }

    // get data from view and save it to session
    public function saveSession(Request $request){
      if($request->isMethod('post')){

        // getting data
        $length = $request->input('length');
        $width = $request->input('width');
        // save them to session
        $lengthValue = $request->session()->put('length' , $length);
        $widthValue = $request->session()->put('width' , $width);

        // get data from session
        $lengthResult = $request->session()->get('length');
        $widthResult = $request->session()->get('width');


        return redirect('/filter');
      }
    }

    // get Result View Of Filteration
    public function filter (Request $request){
      // get data from session
      $lengthResult = $request->session()->get('length');
      $widthResult = $request->session()->get('width');
      // Filteration Query
      // $newEstate=  DB::table('estates')
      // ->where(['length' => $lengthResult , 'status' => 1])
      // ->orWhere(['width' => $widthResult , 'status' => 1])->get();

      $newEstate=  DB::table('estates')->where(['status' => 1])->get();

      if( count($newEstate) > 0 ){
        $newEstate=  DB::table('estates')
        ->where(['length' => $lengthResult])
        ->orWhere(['width' => $widthResult])->get();

        $arr = Array('newEstate'=>$newEstate);
        return view('actor.actor_result' , $arr);
      }else{
        return redirect('/find')->with('message' , 'No Data Found');
      }


      // Check if Found Or Not


    }

}
