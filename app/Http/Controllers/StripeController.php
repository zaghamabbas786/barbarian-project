<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Stripe;
use Session;
use App\Models\User;
use Illuminate\Support\Str;
use Hash;


class StripeController extends Controller
{
   
    public function handleGet()
    {
      return view('MainPage.strip');
    }
    public function email(Request $request)
    {
       
        $validated = $request->validate([
            'email' => 'required',
            'name' =>  'required',
            'phone' => 'required',
        ]);

        
          
      

        Session::put('email', $request->email);
        Session::put('name', $request->name);
        Session::put('phone', $request->phone);


       // return redirect("/stripe-payment");
       return response()->json(['success' => 'success']);
    }
    public function email_send(){
    
        return view('MainPage.Mail');
    }
    public function handlePost(Request $request)
    {
      
        $email =Session::get('email'); 
         $plan ="";
        $amount = 0;
       if( session()->has('small')){
            $amount =2998;
            $plan ="samll plan";
            session()->forget('small');
           
       }
       elseif(session()->has('large')){
        $amount =4598;
        $plan = "large plan";
        session()->forget('large');
      }
      
      Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
      
      $customer = \Stripe\Customer::create(array(
        
        "source" => $request->stripeToken,
        "email" => $email 
        ));
       
      
        $plansub= Stripe\Plan::create ([
            "product" => [ 
                "name" => $plan 
            ], 
            "amount" => $amount, 
            "currency" => "usd", 
            "interval" => 'month', 
            "interval_count" => 1 
        ]);

     
        $subscription = \Stripe\Subscription::create(array( 
            "customer" => $customer->id, 
            "items" => array( 
                array( 
                    "plan" => $plansub->id, 
                ), 
            ), 
        )); 

       
        // $ss = \Stripe\Customer::retrieve($customer->id);
        // $latest_invoice = \Stripe\Invoice::retrieve($subscription->latest_invoice);
        //    $latest_charge_id = $latest_invoice->charge;

        //    $refund = \Stripe\Refund::create([
        //     'charge' => $latest_charge_id,
        //     'amount' => "2000",
        // ]);
        
        
        Session::flash('success', 'Payment has been successfully processed.'.$email);
        $pasword =Str::random(10);
        $pasword ="123456";
        $details = [
            'title' => 'Your pasword is below',
            'body' =>  $pasword 
        ];

        $name = session()->get('name');
        $phone = session()->get('phone');
//   \Mail::to($email)->send(new \App\Mail\MyTestMail($details));
        $user = User::create([
            'username' => $name,
            'email' => $email,
            'contact' => $phone,
            'password' => Hash::make($pasword),
            'cpassword' => Hash::make($pasword),
            'image' => 'img_avatar.png',
            'payment'=>$amount,
            'sub_id' => $subscription->id,
            'invoice'=>$subscription->latest_invoice,
            'customer_id'=>$customer->id
        ]);

        
        // session()->put('amount',$amount);
        session()->put('pasword',$pasword);
       return redirect("login");
       
    }

    public function refund(){
        
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        
        
        
        $small = false;
        $larg = false;
     
        if(session()->has('updatesmall')){
            $small = true;
            session()->forget('updatesmall');
           
        }
        if(session()->has('updatelarge')){
            $larg =true;
            session()->forget('updatelarge');
        }
    
        $id =session()->get('user');
        // dd( $id);
        
        $user = User::where('id',$id)->first();
       
        $carbon=Carbon::now();
        $invoice= $user->invoice;
        
        $subid=$user->sub_id;
        $subcriptiondat=$user->created_at;
    //   dd($larg);
    
        if($user){
            if($small){
               

                $amount =0;
           
                if($user->payment===4598){

                     if($carbon->year === $subcriptiondat->year && $carbon->month ===$subcriptiondat->month)
                    {

                       $days = $carbon->day - $subcriptiondat->day;
    
                        if($days <= 2){
                        $amount = $user->payment;
                      
                        }
                      elseif ($days <= 10){
                        $amount = $user->payment/10;
                       }
                     else
                     {
                         $subscription = \Stripe\Subscription::retrieve($subid);
                          $subscription->cancel();
                          return redirect('dashboard');
                     }
                
                }
    
            }
          
            $latest_invoice = \Stripe\Invoice::retrieve($invoice);
            
            $latest_charge_id = $latest_invoice->charge;
            
           
            $refund = \Stripe\Refund::create([
             
             'charge' => $latest_charge_id,
             'amount' => $amount ,
            ]);
            $subscription = \Stripe\Subscription::retrieve($subid);
            $subscription->cancel();
            $testamount =2998;

            $plansub= Stripe\Plan::create ([
                "product" => [ 
                    "name" => "test plan" 
                ], 
                "amount" => $testamount, 
                "currency" => "usd", 
                "interval" => 'month', 
                "interval_count" => 1 
            ]);
    
         
            $subscription = \Stripe\Subscription::create(array( 
                "customer" => $user->customer_id, 
                "items" => array( 
                    array( 
                        "plan" => $plansub->id, 
                    ), 
                ), 
            )); 

            $user->update([
                'payment'=>$testamount
            ]);
            session()->put('amount',"29.98");
            
            
            }
            elseif($larg){
                
                $amount =0;
                // dd($user->payment);
               
            if($user->payment===2998){

                if($carbon->year === $subcriptiondat->year && $carbon->month ===$subcriptiondat->month){

                    $days = $carbon->day - $subcriptiondat->day;
    
                    if($days <= 2){
                        $amount = $user->payment;
                       
                    }
                    elseif ($days <= 10){
                        $amount = $user->payment/10;
                    }
                    else{
                          $subscription = \Stripe\Subscription::retrieve($subid);
                          $subscription->cancel();
                          return redirect('dashboard');

                    }
                
                }
    
            }
           
            $subscription = \Stripe\Subscription::retrieve($subid);
            $subscription->cancel();


            $testamount =4598;

            $plansub= Stripe\Plan::create ([
                "product" => [ 
                    "name" => "new test plan" 
                ], 
                "amount" => $testamount, 
                "currency" => "usd", 
                "interval" => 'month', 
                "interval_count" => 1 
            ]);
    
         
            $subscription = \Stripe\Subscription::create(array( 
                "customer" => $user->customer_id, 
                "items" => array( 
                    array( 
                        "plan" => $plansub->id, 
                    ), 
                ), 
            )); 


         
            $latest_invoice = \Stripe\Invoice::retrieve($invoice);
            
            $latest_charge_id = $latest_invoice->charge;
          
           
            $refund = \Stripe\Refund::create([
             
                'charge' => $latest_charge_id,
                'amount' => $amount ,
               ]);
           

            $user->update([
                'payment'=>$testamount
            ]);
            session()->put('amount',"45.98");
          
           

            session()->forget('updatelarge');

            }
          
    
            return redirect('dashboard');
        }
    
    }

 }

