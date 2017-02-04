<div class="container-fluid" style="margin-top:12px;">

<form class="form-horizontal">

<legend>Amount of donation</legend>

<!-- amunt-->
<div class="form-group">
  <label class="col-sm-2 control-label" for="State">Enter your own amount</label>  
  <div class="col-sm-2">
  <input id="State" name="State" type="text"  class="form-control " required="">
  </div>
</div>


<!-- Form Name -->
<legend>Billing information</legend>

<?php foreach($user as $users):?>

<!-- first name-->
<div class="form-group">
  <label class="col-sm-2 control-label" for="State">First name</label>  
  <div class="col-sm-6">
  <input id="State" name="State" type="text" placeholder="first name" class="form-control " required="" value="<?= $users->name?>">
  </div>
</div>



<!-- last name-->
<div class="form-group">
  <label class="col-sm-2 control-label" for="State">last name</label>  
  <div class="col-sm-6">
  <input id="State" name="State" type="text" placeholder="last name" class="form-control" required="" value="<?= $users->lastname?>"> 
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
  <input id="State" name="State" type="text" placeholder="last name" class="form-control" required="" value="<?=$users->email ?>"> 
  </div>
</div>

<?php  endforeach; ?>
<legend>payment information</legend>


<label class="radio-inline"><input type="radio" value="credit_card" name="payment_option" checked="checked">Credit card</label>
<label class="radio-inline"><input type="radio" value="paypal" name="payment_option">paypal</label>

<br/><br/>



<!-- CREDIT CARD FORM STARTS HERE -->
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
                    <form role="form" id="payment-form" method="POST" action="javascript:void(0);">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="cardNumber">CARD NUMBER</label>
                                    <div class="input-group">
                                        <input 
                                            type="tel"
                                            class="form-control"
                                            name="cardNumber"
                                            placeholder="Valid Card Number"
                                            autocomplete="cc-number"
                                            required autofocus 
                                        />
                                        <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                                    </div>
                                </div>                            
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-7 col-md-7">
                                <div class="form-group">
                                    <label for="cardExpiry"><span class="hidden-xs">EXPIRATION</span><span class="visible-xs-inline">EXP</span> DATE</label>
                                    <input 
                                        type="tel" 
                                        class="form-control" 
                                        name="cardExpiry"
                                        placeholder="MM / YY"
                                        autocomplete="cc-exp"
                                        required 
                                    />
                                </div>
                            </div>
                            <div class="col-xs-5 col-md-5 pull-right">
                                <div class="form-group">
                                    <label for="cardCVC">CV CODE</label>
                                    <input 
                                        type="tel" 
                                        class="form-control"
                                        name="cardCVC"
                                        placeholder="CVC"
                                        autocomplete="cc-csc"
                                        required
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="couponCode">COUPON CODE</label>
                                    <input type="text" class="form-control" name="couponCode" />
                                </div>
                            </div>                        
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <button class="subscribe btn btn-success btn-lg btn-block" type="button">Start Subscription</button>
                            </div>
                        </div>
                        <div class="row" style="display:none;">
                            <div class="col-xs-12">
                                <p class="payment-errors"></p>
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
                <input type="hidden" name="item_number" value="123">
                <input type="hidden" name="currency_code" value="USD">
                <input type="hidden" name="bn" value="PP-DonationsBF:btn_donateCC_LG.gif:NonHosted">
                <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
                </form>

            </div>
            <!--end of paypal-->




</form>
</div>

<script>

$(document).ready(function(){
 

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


});

</script>