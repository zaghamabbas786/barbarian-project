<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use App\Http\Requests\CustomerRegistrationRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index()
    {
    
        
        return view('MainPage.registerUser');

    }
    public function loginPage()
    {
         
        return view('MainPage.loginUser');

    }
    public function dashboard()
    {
        $id =session()->get('user');
        $user = User::where('id',$id)->first();
       
        return view('MainPage.dashboard')->with('user',$user);

    }
    public function customRegistration(Request $request)
    { 
        

      
   
    
        return view("MainPage.loginUser")->withSuccess('ttetststs');
    }
    public function customLogin(Request $request)
    {  

        $validated = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $user = User::where('email', '=', $request['email'])->first();
        $match_password = Hash::check($request['password'], $user['password']);
       
        if($match_password === true){
            session()->put('user',$user->id);
           
            return redirect()->intended('dashboard')
            ->withSuccess('Signed in');
            
        }
        
        else{
           
            return redirect("login")->withSuccess('Login details are not valid');
            }
       
    }
    
}
