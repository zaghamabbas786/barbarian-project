<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Hash;

class ProfileController extends Controller
{
    
    public function userprofile(){
      
        $id =session()->get('user');
        $user = User::where('id',$id)->first();
        
        
        return view('Mainpage.components.profile')->with('user',$user);
    }

    public function updateprofile(Request $r){
       

        $imagename = time() . '.'.$r->file->extension();
        $r->file->move(public_path('image'),$imagename);

     
        $id =session()->get('user');

        

        User::where('id',$id)->update(
            [
                'username' => $r->username,
                'email' => $r->email,
                'password'=>Hash::make($r->password),
                'cpassword'=>Hash::make($r->password),
                'image'=> $imagename
             ]
        );

           
            // $us->username=$r->username;
            // $us->email=$r->email;
            // $us->password=$r->password;
            // $use->cpassword = $r->password;
            // $us->image='abc';
            // $us->update();
      
       
        return redirect()->back();

    }
    public function updatepackage(){
        
        $id =session()->get('user');
        $user = User::where('id',$id)->first();

        return view('Mainpage.components.updateplane')->with('user',$user);
    }

    public function updatemembership1(Request $r ){
            
      
        if(isset($r)){
            session()->put('updatesmall', $r->samall_member);
        }
        
        return redirect('refund');
    }


    public function updatemembership2(Request $r){
       
        if(isset($r)){
            session()->put('updatelarge', $r->large_member);
            
       
        }
        return redirect('refund');
    }

    public function logout(){
        session()->forget('user');
        return redirect("login");
    }
}
