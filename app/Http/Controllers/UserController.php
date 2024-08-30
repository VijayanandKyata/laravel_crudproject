<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    //
    public function loadAllUsers(){
        $all_users= User::all();
        return view('users',compact('all_users'));
        //echo 'vijay';
    }


    public function loadAddUserForm(){
        return view('add-user');
    }
    public function AddUser(Request $request){
        // perform form validation
        $request->validate([
            'full_name'=>'required|string',
            'email'=>'required|email|unique:users',
            'phone_number'=>'required',
            'password'=>'required|confirmed',
        ]);
        try{
            //registration user here
            
        $new_user = new User;
        $new_user->name = $request->full_name;
        $new_user->email = $request->email;
        $new_user->phone_number = $request->phone_number;
        $new_user->password = Hash::make($request->password);
        $new_user->save();
        
        return redirect('/users')->with('success','User Addesd Successfully');

        }
        catch(\Exception $e){
            return redirect('/add/user')-> with('fail',$e->getMessage());

        }
        
    }



    public function deleteUser($id){
        try{
            User::where('id',$id)->delete();
            return redirect('/users')->with('success','User Deleted Successfully');
        }
        catch(\Throwable $e){
            return redirect('/users')->with('fail',$e->getmessage());
        }
    }





    public function loadEditForm($id){
        $user = User::find($id);
        

        return view('edit-user',compact('user'));
        
    }




    public function EditUser(Request $request){


        Log::info($request->id);
        $request->validate([
            'full_name'=>'required|string',
            'email'=>'required|email|unique:users',
            'phone_number'=>'required',
            
        ]);
        try{
            //update user here
            $update_user = User::where('id',$request->user_id)->update([
                'name' => $request->full_name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
            ]);
        
            return redirect('/users')->with('success','User Updated Successfully');

        }
        catch(\Exception $e){
            Log::info($e->getMessage());
            return redirect('/edit/user')->with('fail',$e->getMessage());

        }
        

    }

    // // app/Http/Controllers/UserController.php
    // public function edit($id)
    // {
    //     $user = User::findOrFail($id);
    //     return view('users.edit', compact('user'));
    // }

    // // app/Http/Controllers/UserController.php
    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|email|max:255|unique:users,email,' . $id,
    //         // Add other validation rules as needed
    //     ]);

    //     $user = User::findOrFail($id);
    //     $user->name = $request->input('name');
    //     $user->email = $request->input('email');
    //     // Update other fields as needed
    //     $user->save();

    //     return redirect('/users')->with('success','User Deleted Successfully');
        // return redirect()->route('users')->with('success', 'User updated successfully');
    // }



}
