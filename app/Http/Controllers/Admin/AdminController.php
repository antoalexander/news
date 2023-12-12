<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;

use Hash;
use Auth;

class AdminController extends Controller
{
    
    public function login(){
      
          return view('admin.login');
    }

    public function adminLogin(Request $request){
        if($request->isMethod('post')){
             $data = $request->all();
             //echo "<pre>"; print_r($data); exit;

              $rules = [
             'email' => 'required|email|max:255',
             'password' => 'required',
            ];

            $customMessages = [
              // Add custom messages here
              'email.required' => 'Email Address is required!',
              'email.email' => 'Valid Email Address is required!',
              'password.required' => 'Password is required'
            ];

            $this->validate($request,$rules,$customMessages);
             
             if(Auth::guard('admin')->attempt(['email'=>$data['email'],'password'=>$data['password']])){
                  return redirect('admin/dashboard');  
             }
             else{
               redirect()->back()->with("error_message","Invalid Email or Password"); 
            }
        }
        return redirect()->back();


    }
    
     public function dashboard(){
         $title = "Admin Dashboard";
         return view('admin.dashboard',compact('title'));
     }

     

      public function logout(){
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }


}
