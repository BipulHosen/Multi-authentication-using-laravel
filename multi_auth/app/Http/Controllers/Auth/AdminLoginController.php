<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin');
    }
   public function showloginform()
   {

    return view('admin.adminlogin');
   }

   public function login (Request $request){
      
    // validation 

   $this->validate($request,[
       'email'=>'required|email',
       'password'=> 'required|min:6',
   ]);
 //attempt to log in
 if(Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password], $request->remenber))
 {
  return redirect()->intended(route('admin.dashboard')); 
 } 
 else{
     return redirect()->back()->withInput($request->only('email','remenber'));
 }
}
}
