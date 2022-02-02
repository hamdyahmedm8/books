<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\User;
use Auth;

class apiController extends Controller
{
    function books(){
        $books=Book::select('id','name','desc')->get();
        return response()->json($books);
    }
    
     function users(){
        $users=User::select('id','email','is_admin','access_token')->get();
        return response()->json($users);
    }
    
    function register(Request $request)
    {
        $user=new User();
        $user->email=$request->email;
        $user->password=\Hash::make($request->password);
        //generate access_token
        $user->access_token=\Str::random(64);
        $user->save();
        
        return response()->json(['access-token'=>$user->access_token]);
        
    }
    
    function login(Request $request){
        
        $cred=array('email'=>$request->email,'password'=>$request->password);
        if(Auth::attempt($cred))
        {
            if(Auth::user()->access_token==null)
            {
                Auth::user()->access_token=\Str::random(64);
                Auth::user()->save();
            }
            return response()->json(['access_token'=>Auth::user()->access_token]);
        }else
        {
            return  response()->json(['error'=>'not valid']);
        }
        
    }


}
