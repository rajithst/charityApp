<?php
class paymentController extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('Donation_m');
        $this->load->model('profileModel');
    }

    public function index($postid){
                $data['alert']='';
                $data['postid']=$postid;
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

        //direct payments //stripe
        function stripePay(){
            require_once('vendor/autoload.php');
            // Set your secret key: remember to change this to your live secret key in production
            // See your keys here: https://dashboard.stripe.com/account/apikeys
            \Stripe\Stripe::setApiKey("sk_test_bxLXwdpc8fiFJAj8Jxbh5L3X");

            // Token is created using Stripe.js or Checkout!
            // Get the payment token submitted by the form:
            $token = $this->input->post('stripeToken');
            $amount = $this->input->post('amount');
            $postid = $this->input->post('postid');
            $email = $this->input->post('email');
            // Charge the user's card:
            $charge = \Stripe\Charge::create(array(
              "amount" => $amount*100,
              "currency" => "usd",
              "description" => "Example charge",
              "source" => $token,
              "receipt_email" => $email
            ));
            //if transfer successed response will be returned
            if(isset($charge->amount)){
                $description = "fughkbijh";
                $receiver = 1;
                $payment_status = "stripe";
                $txnid = "";
                $payment_method = "";
                if((bool)$this->Donation_m->addDonation(array(
                    'donorID'=>$this->session->userdata('id'),
                    'postID'=>$postid,
                    'recipientID'=>$receiver,
                    'description'=>$description,
                    'amount'=>$amount,
                    'payment_status'=>$payment_status,
                    'txnid'=>$txnid,
                    'payment_method'=>$payment_method
                    )))
                {
                    $data['alert']='<script>alert("successfully donated");</script>';
                }else{
                    $data['alert']='<script>alert("data update failed");</script>';
                }
            }else{
                $data['alert']='<script>alert("couldn\'t transfer money");</script>';
            }
            $data['postid']=$postid;
            $data['user']=$this->profileModel->getUser();
            $this->load->template('payment/payment',$data);
        }
}