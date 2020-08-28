<?php

namespace App\Http\Controllers\Auth;
// use App\Http\Controllers\Hash;
use Illuminate\Support\Facades\Hash;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class AdminRegisterController extends Controller
{
    //
    public function showregisterform()
    {
        return view('admin.adminregistration');
    }

    public function register(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|unique:admins|max:255',
            'email' => 'required|unique:admins',
            'password' => 'required',
        ]);
         $data=array();
         $data['name']=$request->name; 
         $data['email']=$request->email;
         $data['password']=Hash::make($request->password);
         DB::table('admins')->insert($data);
         return redirect()->route('admin.login');
    }
}
