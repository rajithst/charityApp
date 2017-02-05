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
		// PayPal settings
				$paypal_email = 'dulaj.san-facilitator@gmail.com';
				$return_url = 'http://domain.com/payment-successful.html';
				$cancel_url = 'http://domain.com/payment-cancelled.html';
				$notify_url = 'http://domain.com/payments.php';

				$item_name = 'donation';
				$item_amount = 15.00;
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
				}
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