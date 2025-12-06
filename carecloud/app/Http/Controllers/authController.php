<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\user;

class authController extends Controller
{
    function register(Request $req){
        $data=$req->validate([
            'name'=>"required",
            'email'=>"required|email|unique:users,email",
            'password'=>"required",
           

        ]);


        $user=user::create($data);
        if($user){
            return redirect()->route('login')->with('success','Registration Successful');
        }else{
            return back()->with('fail','Something went wrong');
    }
}
 function login(Request $LReq)
{

      $logindata=$LReq->validate([
            
            'email'=>"required",
            'password'=>"required",
            ]);

if(Auth::attempt($logindata)){
                return redirect()->route('patient.dashboard');
            }
            else{
                return back()->with('fail','Invalid Credentials');
            }

            // if(Auth::attempt($logindata)){
            //    return redirect()->route('patient.dashboard');
            // }
            // else{
            //     return back()->with('fail','Invalid Credentials');
            // }
   
}

}