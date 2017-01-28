<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class paymentController extends CI_Controller {

	public function index(){
		$this->load->model('profileModel');
		$data['user']=$this->profileModel->getUser();
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



}