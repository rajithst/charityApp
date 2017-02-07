<div class="container-fluid" style="margin-top:12px;">

<form class="form-horizontal">

<legend>Amount of donation</legend>

<!-- amunt-->
<div class="form-group">
  <label class="col-sm-2 control-label" for="State">Enter your own amount</label>  
  <div class="col-sm-2">
  <input id="amount" name="amount" type="text"  class="form-control " required="">
  </div>
</div>


<!-- Form Name -->
<legend>Billing information</legend>

<?php foreach($user as $users):?>

<!-- first name-->
<div class="form-group">
  <label class="col-sm-2 control-label" for="State">First name</label>  
  <div class="col-sm-6">
  <input id="fname" name="fname" type="text" placeholder="first name" class="form-control " required="" value="<?= $users->name?>">
  </div>
</div>



<!-- last name-->
<div class="form-group">
  <label class="col-sm-2 control-label" for="State">last name</label>  
  <div class="col-sm-6">
  <input id="lname" name="lname" type="text" placeholder="last name" class="form-control" required="" value="<?= $users->lastname?>"> 
  </div>
</div>


<!-- billing address-->
<div class="form-group">
  <label class="col-sm-2 control-label" for="address1">Billing address</label>  
  <div class="col-sm-6">
  <input id="address1" name="address1" type="text" placeholder="" class="form-control" value="<?= $users->address?>">
  <span class="help-block">Street address, P.O. box, company name, c/o</span>  
  </div>
</div>

<!-- address line 2-->
<div class="form-group">
  <label class="col-sm-2 control-label" for="Address2">Address Line2</label>  
  <div class="col-sm-6">
  <input id="Address2" name="Address2" type="text" placeholder="" class="form-control" >
  <span class="help-block">Apartment, suite , unit, building, floor, etc.</span>  
  </div>
</div>


<!-- city-->
<div class="form-group">
  <label class="col-sm-2 control-label" for="city">City/Town</label>  
  <div class="col-sm-6">
  <input id="city" name="city" type="text" placeholder="city or town" class="form-control" required="">
    
  </div>
</div>


<!-- state-->
<div class="form-group">
  <label class="col-sm-2 control-label" for="State">State</label>  
  <div class="col-sm-6">
  <input id="State" name="State" type="text" placeholder="state" class="form-control" required="">
  <span class="help-block">Enter Source state</span>  
  </div>
</div>

<!-- zip-->
<div class="form-group">
  <label class="col-sm-2 control-label" for="zip">Zip/Postal code</label>  
  <div class="col-sm-6">
  <input id="zip" name="zip" type="text" placeholder="zip or postal code" class="form-control" required="" value="<?=$users->postalcode?>">
    
  </div>
</div>


<!-- country -->
<div class="form-group">
  <label class="col-sm-2 control-label" for="Country">Country</label>
  <div class="col-sm-6">
    <select id="Country" name="Country" class="form-control">
      <option value="IR">IR Iran</option>
      <option value="USA">United States</option>
    </select>
  </div>
</div>

<!--email-->

<div class="form-group">
  <label class="col-sm-2 control-label" for="State">email</label>  
  <div class="col-sm-6">
  <input id="email" name="email" type="text" placeholder="last name" class="form-control" required="" value="<?=$users->email ?>"> 
  </div>
</div>

</form>
<?php  endforeach; ?>
<legend>payment information</legend>


<label class="radio-inline"><input type="radio" value="credit_card" name="payment_option" checked="checked">Credit card</label>
<label class="radio-inline"><input type="radio" value="paypal" name="payment_option">paypal</label>

<br/><br/>



<!-- CREDIT CARD FORM STARTS HERE -->
<!-- Stripe payment starts here -->
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">
  Stripe.setPublishableKey('pk_test_nBSQ2RBMfHBInqDT8bFyXPmT');
</script>
<script>
$(function() {
  var $form = $('#payment-form');
  $form.submit(function(event) {
    // Disable the submit button to prevent repeated clicks:
    $form.find('.submit').prop('disabled', true);

    // Request a token from Stripe:
    Stripe.card.createToken($form, stripeResponseHandler);

    // Prevent the form from being submitted:
    return false;
  });
});
function stripeResponseHandler(status, response) {
  // Grab the form:
  var $form = $('#payment-form');

  if (response.error) { // Problem!

    // Show the errors on the form:
    $form.find('.payment-errors').text(response.error.message);
    $form.find('.submit').prop('disabled', false); // Re-enable submission

  } else { // Token was created!

    // Get the token ID:
    var token = response.id;

    // Insert the token ID into the form so it gets submitted to the server:
    $form.append($('<input type="hidden" name="stripeToken">').val(token));

    // Submit the form:
    $form.get(0).submit();
  }
};
</script>
<!-- Stripe payment sends here -->

 <div class="col-xs-12 col-md-6" id="credit_card_view">
            <div class="panel panel-default credit-card-box" style="padding:8px;">
                <div class="panel-heading display-table" >
                    <div class="row display-tr" >
                        <h3 class="panel-title display-td" >Payment Details</h3>
                        <div class="display-td" >                            
                            <img class="img-responsive pull-right" src="http://i76.imgup.net/accepted_c22e0.png">
                        </div>
                    </div>                    
                </div>
                <div class="panel-body">
                    <form action="<?php echo base_url() ?>index.php/FrontUser/paymentController/stripePay" class="form-horizontal" method="POST" id="payment-form">
                        <span class="payment-errors"></span>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Amount</label>  
                            <div class="col-sm-6">
                                <input placeholder="Amount" readonly="" class="form-control" required="" id="stripeamnt" name="transferamount"> 
                            </div>
                        </div>
                        <script>
                            $('#amount').keyup(function (){
                                document.getElementById("stripeamnt").value = $('#State').val();
                            });
                        </script>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Card Number</label>  
                            <div class="col-sm-6">
                            <input placeholder="XXXX XXXX XXXX XXXX" class="form-control" required="" size="20" data-stripe="number"> 
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Expiration (MM/YY)</label>  
                            <div class="col-sm-6">
                            <div class="form-control">
                            <input class="col-sm-2" placeholder="MM" required="" type="text" size="2" data-stripe="exp_month">
                            <span class="col-sm-1"> / </span>
                            <input class="col-sm-2" placeholder="YY" required="" type="text" size="2" data-stripe="exp_year">
                            </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">CVC</label>  
                            <div class="col-sm-6">
                            <input placeholder="XXX" class="form-control" required="" type="text" size="4" data-stripe="cvc"> 
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6 center-block">
                            <input type="submit" class="btn btn-primary submit" value="Submit Payment">
                            </div>
                        </div>
                      </form>

                </div>
            </div>     
            </div>       
            <!-- CREDIT CARD FORM ENDS HERE -->


            <!--paypal -->
            <div class="col-xs-12 col-md-6" id="paypal_view" style="display:none; height:400px;">

               <p style="margin-bottom:20px;"> Thank you for selecting Pay Pal. To proceed with your donation please click Donate Now below.</p>

                <form action="<?php echo base_url('payments'); ?>" method="post" target="_top">
                <input type="hidden" name="cmd" value="_donations">
               
                <input type="hidden" name="lc" value="LK">
                <input type="hidden" name="item_name" value="HelpMe-Non profit organization">
                <input type="hidden" name="item_number" id="paypal_val" value="">

                <input type="hidden" name="currency_code" value="USD">
                <input type="hidden" name="bn" value="PP-DonationsBF:btn_donateCC_LG.gif:NonHosted">
                <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
                </form>

            </div>
            <!--end of paypal-->




</div>

<script>

$(document).ready(function(){
 
  //payment selection paypal or direct
   $('input:radio[name="payment_option"]').change(function(){

    if($(this).val() == 'credit_card'){
        $("#paypal_view").hide();
       $("#credit_card_view").show();
    }

    if($(this).val() == 'paypal'){
      //alert("ok");
      $("#credit_card_view").hide();
      $("#paypal_view").show();

    }
});

   //-----paypal parameter set scripts

   //auto para
   $("#paypal_val").val($("#amount").val());
   // $("#paypal_fname").val($("#amount").val());
   // $("#paypal_lname").val($("#amount").val());
   // $("#paypal_email").val($("#amount").val());
  
   //manual edit para
$('#amount').keyup(function (){
  $("#paypal_val").val($("#amount").val());
  
   });

// $('#fname').keyup(function (){
//   $("#paypal_fname").val($("#amount").val());
  
//    });

// $('#lname').keyup(function (){
//   $("#paypal_lname").val($("#amount").val());
  
//    });

// $('#email').keyup(function (){
//   $("#paypal_email").val($("#amount").val());
  
//    });


});



                     

</script>