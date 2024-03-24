<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class Membershipcontroller extends Controller
{
    

    public function membership1(Request $r ){
            
       
        if(isset($r)){
            Session::put('small', $r->samall_member);
            
          return redirect('stripe-payment');
        }
    }


    public function membership2(Request $r){

        if(isset($r)){
            Session::put('large', $r->large_member);
            
          return redirect('stripe-payment');
        }
    }
   
}
