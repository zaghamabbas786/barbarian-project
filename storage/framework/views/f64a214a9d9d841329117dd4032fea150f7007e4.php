<!DOCTYPE html>
<html>
<head>
	<title>Laravel 7 - Integrate Stripe Payment Gateway Example</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>"/>
    
    <link rel="stylesheet" href="<?php echo e(asset('css/main.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/simple-grid.css')); ?>">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.1.1.min.js"> -->
    <style type="text/css">
        
        body{
            background-image: linear-gradient(to right, black ,  grey, black);
        }
        .container {
            margin-top: 40px;
        }
       
        .panel-heading {
        display: inline;
        font-weight: bold;
        }
        .flex-table {
            display: table;
        }
        .display-tr {
            display: table-row;
        }
        .display-td {
            display: table-cell;
            vertical-align: middle;
            width: 55%;
        }

        .display_none-s{
            display: none;
        }

        .row_center-s{
            display: flex;
            justify-content: center;
        }

        .pt_1rem-s{
            padding-top: 1rem;
        }

        .w_100-s{
            width: 100%;
        }

        .panel-heading {
            padding: 0px !important;
            border-bottom: none !important;
            border-top-left-radius: 0px !important;
            border-top-right-radius: 0px !important;
        }

        .panel-heading .row {
            padding-top: 23px;
        }

        .m_0px-s{
            margin: 0.5rem 0% !important;
        }
        .ml_-8px-s{
            margin-left: -8px !important;
        }
        #send{
            width: 80px;
            margin-left: 80px;
        }
      
        .pay-modal{
    display: inline-block;
    margin: 0;
    padding: 4px 8px;
    float:left  /* second part */
}
#signup{
    margin-top: 50px;
    height: 297px;
    width: 350px;
    margin-left: 409px;
    margin-right: -45px;
    border-radius: 19px;
}
    
    </style>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
</head>
<body>

<div class="pay-modal" >

<img id="signup" src= "<?php echo e(url('/')); ?>/image/newimage.jpg" alt="" srcset="">


</div>


    <div class="pay-modal"   >
        <div class='email'>

            <form class="form" id='email-form' method="post" name="login">
                    <?php echo csrf_field(); ?>
                    <!-- <h1 class="login-title">Email</h1> -->
                    <input type="text" class="login-input w_100-s" id ='user-name' class="signup" style=' padding: 15px;' name="name" placeholder="User Name" autofocus="true"/>
                    <input type="number" class="login-input w_100-s" id ='phone' name="phone" style=' padding: 15px;' class="signup" placeholder="Contact" autofocus="true"/>
                    <input type="email" class="login-input w_100-s" id ='email' name="email" style=' padding: 15px;' class="signup" placeholder="Email" autofocus="true"/>
                    
                    <input type="button" id ='send' value="Pay" style=' padding-left: inherit'  name="submit" class="login-button submit_btn"/> 
            </form>

        </div>
    </div>
  
<div class="container display_none-s">  
    <div class="row row_center-s">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row text-center">
                        <h3 class="panel-heading">Payment Details</h3>
                    </div>                    
                </div>
                <div class="panel-body">
  
                    <?php if(Session::has('success')): ?>
                        <div class="alert alert-success text-center">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <p><?php echo e(Session::get('success')); ?></p>
                        </div>
                    <?php endif; ?>
  
                    <form role="form" action="<?php echo e(route('stripe.payment')); ?>" method="post" class="validation"
                                                     data-cc-on-file="false"
                                                    data-stripe-publishable-key="<?php echo e(env('STRIPE_KEY')); ?>"
                                                    id="payment-form">
                        <?php echo csrf_field(); ?>
  
                        <div class='form-row row'>
                            <div class='col-xs-12 form-group required'>
                                <label class='control-label'>Name on Card</label> <input
                                    class='form-control' size='4' type='text'>
                            </div>
                        </div>
  
                        <div class='form-row row'>
                            <div class='col-xs-12 form-group card required'>
                                <label class='control-label'>Card Number</label> <input
                                    autocomplete='off' class='form-control card-num' size='20'
                                    type='text'>
                            </div>
                        </div>
  
                        <div class='form-row row ml_-8px-s'>
                            <div class='col-xs-12 col-md-6 m_0px-s form-group cvc required'>
                                <label class='control-label'>CVC</label> 
                                <input autocomplete='off' class='form-control card-cvc' placeholder='e.g 415' size='4'
                                    type='text'>
                            </div>
                            <div class='col-xs-12 col-md-6 m_0px-s form-group expiration required'>
                                <label class='control-label'>Expiration Month</label> <input
                                    class='form-control card-expiry-month' placeholder='MM' size='2'
                                    type='text'>
                            </div>
                            <div class='col-xs-12 col-md-6 m_0px-s form-group expiration required'>
                                <label class='control-label'>Expiration Year</label> <input
                                    class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                    type='text'>
                            </div>
                        </div>
  
                        <div class='form-row row'>
                            <div class='col-md-12 hide error form-group'>
                                <div class='alert-danger alert'>Fix the errors before you begin.</div>
                            </div>
                        </div>
  
                        <div class="row pt_1rem-s">
                            <div class="col-xs-12">
                                <button class="btn btn-danger btn-lg btn-block" type="submit">Pay Now (₹100)</button>
                            </div>
                        </div>
                          
                    </form>
                </div>
            </div>        
        </div>
    </div>
</div>
  
</body>  
<script>
    $(document).ready(()=>{
        var a = false;
        
        $('.submit_btn').click((e)=>{
            let email = $('#email').val();
            let username = $('#user-name').val();
            let phone = $('#phone').val();
            jQuery.ajax({
                url : "<?php echo e(route('user.email')); ?>",
                type : "POST",
                data : {
                    _token:"<?php echo e(csrf_token()); ?>",
                    'email' : email,
                    'name' :username,
                    'phone': phone
                },
                success : function(r){
                  
                    console.log('r',r);
                    $(".pay-modal").hide();
                    $(".container").show();
                }
            });
        });
    });
    
</script>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    
<script type="text/javascript">
    $(function() {
        
        console.log('console....');
    var $form = $(".validation");
    $('form.validation').bind('submit', function(e) {
        var $form         = $(".validation"),
            inputVal = ['input[type=email]', 'input[type=password]',
                            'input[type=text]', 'input[type=file]',
                            'textarea'].join(', '),
            $inputs       = $form.find('.required').find(inputVal),
            $errorStatus = $form.find('div.error'),
            valid         = true;
            $errorStatus.addClass('hide');
    
            $('.has-error').removeClass('has-error');
        $inputs.each(function(i, el) {
        var $input = $(el);
        if ($input.val() === '') {
            $input.parent().addClass('has-error');
            $errorStatus.removeClass('hide');
            e.preventDefault();
        }
        });
    
        if (!$form.data('cc-on-file')) {
        e.preventDefault();
        Stripe.setPublishableKey($form.data('stripe-publishable-key'));
        Stripe.createToken({
            number: $('.card-num').val(),
            cvc: $('.card-cvc').val(),
            exp_month: $('.card-expiry-month').val(),
            exp_year: $('.card-expiry-year').val()
        }, stripeHandleResponse);
        }
    
    });
    
    function stripeHandleResponse(status, response) {
            if (response.error) {
                $('.error')
                    .removeClass('hide')
                    .find('.alert')
                    .text(response.error.message);
            } else {
                var token = response['id'];
                $form.find('input[type=text]').empty();
                $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                $form.get(0).submit();
            }
        }
    
    });
</script>
</html><?php /**PATH F:\project\Barbarain\resources\views/MainPage/strip.blade.php ENDPATH**/ ?>