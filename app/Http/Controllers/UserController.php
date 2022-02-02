<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
class UserController extends Controller
{
    //
    function register(){
        return view('users/register');
    }
    
    function store(Request $request)
    {
        //validation 
        
        //user model 
        $user=new User();
        $user->email=$request->email;
        $user->password=\Hash::make($request->password);
        $user->save();
        
        return $user->password;
    }

     //login 
     function loginform(){
        return view('users/login');
    }
    function handleloign(Request $request)
    {
        //validation
        
        //auth
        $cred=array('email'=>$request->email,'password'=>$request->password);
        if(Auth::attempt($cred))
        {
            return redirect('books/list');
        }
        else
        {
            return back();
        }
        
        
    }
    function logout(){
        Auth::logout();
        return redirect('/users/login');
    }


}
