<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
  
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function login(request $request)
    {
        $email = $request->email;
        $password = $request->password;

        if (!empty($email) && !empty($password)) 
            {
                return view('admin');
            } 
        else
            {
                return back()->with('failed','Email or password not match');
            }
     }

   
    
}
