<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    // sign up function
    public function signUp (Request $request){
      if($request->isMethod('post')){
        // getting data from view
        $fullname = $request->input('fullname') ;
        $username = $request->input('username') ;
        $password = $request->input('password') ;
        $repassword = $request->input('repassword') ;
        // check validation
        if($fullname == "" || $username == "" || $password == "" || $repassword == "" ||
           $fullname == " " || $username == " " || $password == " " || $repassword == " "){
            echo "<script>window.alert(\"Please Complete Your Data\");</script>";
        }else if($password != $repassword){
            echo "<script>window.alert(\"password is not match\");</script>";
        }else if( strlen($password) < 7 ){
          echo "<script>window.alert(\"Please enter password gratter than 7 letter\");</script>";
        }else{
          // check if the data is exists or not
          $ifExists = DB::table('users')
              ->where(['fullname'=>$fullname , 'username'=>$username ,'password'=>$password ])->get();
              // check if found or not
               if(count($ifExists) > 0 ){
                 echo "<script>window.alert(\"This Account is exists\");</script>";
               }else{
                 // save data to database
                 DB::table('users')->insert(
                     ['fullname' => $fullname,
                      'username' => $username,
                      'password' => $password,
                      'type'=> "actor"]
                 );
                 // redirect to login
                 return redirect('/login');
               }
        }
      }
      return view('main.index');
    }
    // login function
    public function login (Request $request){
      if($request->isMethod('post')){
        // getting data from view
        $username = $request->input('username') ;
        $password = $request->input('password') ;
        // check validation
        if($username == "" || $password == "" || $username == " " || $password == " "){
          echo "<script>window.alert(\"Please Complete Your Data\");</script>";
        }else if($username == "admin" && $password == "admin"){
          return redirect ('/index_admin');
        }else{
          // check if exit
          $ifExists = DB::table('users')
              ->where(['username'=>$username ,'password'=>$password ])->get();


              if(count($ifExists) > 0){
                 // found
                // set data to session
                foreach($ifExists as $obj)
                  if($obj->block == "0"){
                      $usernameValue = $request->session()->put('username' , $username);
                      $passwordValue = $request->session()->put('password' , $password);
                      return redirect('/index');
                  }else if($obj->block == "1"){
                    echo "<script>window.alert(\"you are blocked\");</script>";
                  }
              }else{
                echo "<script>window.alert(\"username or password are wrong\");</script>";
              }



        }

        return view('main.login');
      }
      return view('main.login');
    }

    // logout
    public function logout (Request $request){
      return redirect('/');
    }
}
