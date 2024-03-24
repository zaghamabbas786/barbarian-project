<?php

$big = "";
$small= "";
                
if($user->payment===4598){
    $big = "hidden";
}
elseif($user->payment===2998){
    $small= "hidden";
} 

 ?>

<head>
    <meta charset="UTF-8">
    <title>Barbarian</title>
    
        @include('MainPage.components.head')
   
</head>
<div id="memberships" class="plans-main">
    <div class="container">
        <div class="row">
            <div class="col-12">

                <ul>
                  <div {{$small}} >


                    <li  >
                        
                        <div class="god-container perseus"></div>
                        <p class="god-name">Perseus</p>
                        <p class="plan-description">Unlimited Haircut</p>
                       <form method="post" action="update-membership">
                            @csrf 
                            <input type="text" value='29' hidden name='samall_member'>
                        <button  class="checkout"  type="submit">
                            Adquirir membresí
                        </button>
                            </form>


                        <p class="plan-price">USD $29.98 / mes</p>
                        <div id="error-message"></div>
                        
                    </li>
                    </div>

                    <div {{$big}} >
                    <li>
                        <div class="god-container zeus"></div>
                        <p class="god-name">Zeus</p>
                        <p class="plan-description">Unlimited Haircut + Beard</p>
                        <form method="post" action="updatemembership-2">
                            @csrf 
                            <input type="text" value='45.98' hidden name='large_member'>
                        <button  class="checkout"  type="submit">
                            Adquirir membresí
                        </button>
                            </form>


                        <p class="plan-price">USD $45.98 / mes</p>
                        <div id="error-message"></div>
                    </li>
                    </div>
                </ul>

            </div>
        </div>
    </div>
</div>




