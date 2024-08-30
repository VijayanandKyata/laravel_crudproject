<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    //
    public function create(){
       
        return view('posts.create');
        //echo 'vijay';
    }


    public function loadAddUserForm(){
        return view('add-user');
    }
    public function store(Request $request){
        // perform form validation
        $request->validate([
            'title'=>'required|string',
            'email'=>'required|email|unique:users',
            'phone_number'=>'required',
            'password'=>'required|confirmed',
        ]);
        
        
        return redirect('/users')->with('success','User Addesd Successfully');
      
        
    }





}