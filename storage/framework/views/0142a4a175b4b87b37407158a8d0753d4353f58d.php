

<div id="memberships" class="plans-main">
    <div class="container">
        <div class="row">
            <div class="col-12">

                <ul>

                    <li>
                        <div class="god-container perseus"></div>
                        <p class="god-name">Perseus</p>
                        <p class="plan-description">Unlimited Haircut</p>
                       
                        


                        <form method="post" action="membership">
                            <?php echo csrf_field(); ?> 
                            <input type="text" value='29' hidden name='samall_member'>
                        <button  class="checkout"  type="submit">
                            Adquirir membresí
                        </button>
                            </form>

 <!-- <button id="price_1JBgfYKvuUaiijuT1mZsc3Fk" class="checkout" role="link" type="button">
                            Adquirir membresía
                        </button> -->
                        <p class="plan-price">USD $29.98 / mes</p>
                        <div id="error-message"></div>
                    </li>

                    <li>
                        <div class="god-container zeus"></div>
                        <p class="god-name">Zeus</p>
                        <p class="plan-description">Unlimited Haircut + Beard</p>
                        <form method="post" action="membership-2">
                            <?php echo csrf_field(); ?> 
                            <input type="text" value='45.98' hidden name='large_member'>
                        <button  class="checkout"  type="submit">
                            Adquirir membresí
                        </button>
                            </form>


                        <p class="plan-price">USD $45.98 / mes</p>
                        <div id="error-message"></div>
                    </li>

                </ul>

            </div>
        </div>
    </div>
</div>

<!--    TITAN-->
<!-- <script>
    $(function() {
        $(".checkout").on('click', function(e) {
            e.preventDefault();
            // alert('clicked');
            var stripe = Stripe('pk_live_8hKB6UWk4MVjBJi17xfzUu9u00hG1WGDzj');
            var data = {
                'id': $(this).attr('id')
            };
            fetch("./create_session.php", {
                    method: "POST",
                    body: JSON.stringify(data)
                })
                .then(function(response) {
                    return response.json();
                })
                .then(function(session) {
                    return stripe.redirectToCheckout({
                        sessionId: session.id
                    });
                })
                .then(function(result) {
                    if (result.error) {
                        alert(result.error.message);
                    }
                })
                .catch(function(error) {
                    console.error("Error:", error);
                });
        });
    });
</script> -->



<?php /**PATH F:\project\Barbarain\resources\views/MainPage/components/plans.blade.php ENDPATH**/ ?>