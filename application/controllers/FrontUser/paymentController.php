<?php
defined('BASEPATH') OR exit('No direct script access allowed');
define('STRIPE_PRIVATE_KEY', 'las;dkjf2l3;nslkj');
define('STRIPE_PUBLIC_KEY', 'Lln;4k2;(jas;ldfkj)');
class paymentController extends CI_Controller {
        
	public function index(){
		$this->load->model('profileModel');
		$data['user']=$this->profileModel->getUser();
                $data['STRIPE_PUBLIC_KEY']=STRIPE_PUBLIC_KEY;
		$this->load->template('payment/payment',$data);
	}



	public function requestResponse(){

		//$this->load->model('Donation_m');
		// PayPal settings
				$paypal_email = 'dulaj.san-facilitator-1@gmail.com';
				$return_url = 'http://charityapp.azurewebsites.net/payment-successful';
				$cancel_url = 'http://charityapp.azurewebsites.net/payment-cancelled';
				$notify_url = 'http://charityapp.azurewebsites.net/payments';

				$item_name = 'donation';
				$item_amount = $_POST['item_number'];
				$transaction_subject="charity project";

			

				// Check if paypal request or response
				if (!isset($_POST["txn_id"]) && !isset($_POST["txn_type"])){
				    $querystring = '';
				 
				    // Firstly Append paypal account to querystring
				    $querystring .= "?business=".urlencode($paypal_email)."&";
				 
				    // Append amount  currency ($) to quersytring so it cannot be edited in html
				 
				    //The item name and amount can be brought in dynamically by querying the $_POST['item_number'] variable.
				    $querystring .= "item_name=".urlencode($item_name)."&";
				    $querystring .= "amount=".urlencode($item_amount)."&";


				 
				    //loop for posted values and append to querystring
				    foreach($_POST as $key => $value) {
				        $value = urlencode(stripslashes($value));
				        $querystring .= "$key=$value&";
				    }
				 
				    // Append paypal return addresses
				    $querystring .= "return=".urlencode(stripslashes($return_url))."&";
				    $querystring .= "cancel_return=".urlencode(stripslashes($cancel_url))."&;";
				    $querystring .= "notify_url=".urlencode($notify_url);
				 
				    // Append querystring with custom field
				    //$querystring .= "&amp;amp;amp;amp;amp;amp;custom=".USERID;
				 
				    // Redirect to paypal IPN
				    header('location:https://www.sandbox.paypal.com/cgi-bin/webscr'.$querystring);
				    exit();
				} else {

				 // Response from PayPal
					 // read the post from PayPal system and add 'cmd'
   			 		$req = 'cmd=_notify-validate';
    				foreach ($_POST as $key => $value) {
       						 $value = urlencode(stripslashes($value));
        						$value = preg_replace('/(.*[^%^0^D])(%0A)(.*)/i','${1}%0D%0A${3}',$value);// IPN fix
        					$req .= "&$key=$value";

   					 }

   					 
				    //assign posted variables to local variables

				    $data['item_name']          = $_POST['item_name'];
				    $data['item_number']        = $_POST['item_number'];
				    $data['payment_status']     = $_POST['payment_status'];
				    $data['payment_amount']     = $_POST['mc_gross'];
				    $data['payment_currency']   = $_POST['mc_currency'];
				    $data['txn_id']             = $_POST['txn_id'];
					$data['receiver_email']     = $_POST['receiver_email'];
					$data['payer_email']        = $_POST['payer_email'];
					$data['custom']             = $_POST['custom'];


					
				    // post back to PayPal system to validate
				    $header = "POST /cgi-bin/webscr HTTP/1.0\r\n";
				    $header .= "Content-Type: application/x-www-form-urlencoded\r\n";
				    $header .= "Content-Length: " . strlen($req) . "\r\n\r\n";  
				    $fp = fsockopen ('ssl://www.sandbox.paypal.com', 443, $errno, $errstr, 30);

			

				     if (!$fp) {
        			// HTTP ERROR
    				} else {

    					fputs($fp, $header . $req);
        				while (!feof($fp)) {
          					  $res = fgets ($fp, 1024);
            						if (strcmp($res, "VERIFIED") == 0) {
     //        							// Used for debugging
            							// mail('user@domain.com', 'PAYPAL POST - VERIFIED RESPONSE', print_r($post, true));

            							// Validate payment (Check unique txnid & correct price)

            							$valid_txnid = $this->Donation_m->check_txnid($data['txn_id']);
            							$valid_price = $this->Donation_m->check_price($data['payment_amount'], $data['item_number']);

            							// PAYMENT VALIDATED & VERIFIED!

            							if ($valid_txnid && $valid_price) {
            								$orderid = $this->Donation_m->updatePayments($data);
            								if ($orderid) {
             									// Payment has been made & successfully inserted to db

             								}else {
             									// Error inserting into DB
            									// E-mail admin or alert user
             									// mail('user@domain.com', 'PAYPAL POST - INSERT INTO DB WENT WRONG', print_r($data, true));

             								}

            							}else{
             								// Payment made but data has been changed
            								// E-mail admin or alert user
            							}


    	 							}else if(strcmp ($res, "INVALID") == 0){
    									// PAYMENT INVALID & INVESTIGATE MANUALY
    									// E-mail admin or alert user

    									// Used for debugging
    	 								//@mail("user@domain.com", "PAYPAL DEBUGGING", "Invalid Response
    									

    								}
    					}

    					fclose ($fp);

    				}
				    


				}
				//end of Response
	}

        //direct payments //stripe
        function stripePay(){
            require_once('vendor/autoload.php');
            // Set your secret key: remember to change this to your live secret key in production
            // See your keys here: https://dashboard.stripe.com/account/apikeys
            \Stripe\Stripe::setApiKey("sk_test_bxLXwdpc8fiFJAj8Jxbh5L3X");

            // Token is created using Stripe.js or Checkout!
            // Get the payment token submitted by the form:
            $token = $this->input->post('stripeToken');
            $amount = $this->input->post('transferamount');
            // Charge the user's card:
            $charge = \Stripe\Charge::create(array(
              "amount" => $amount,
              "currency" => "usd",
              "description" => "Example charge",
              "source" => $token,
            ));
        }


}