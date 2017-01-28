<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class paymentController extends CI_Controller {

	public function index(){
		$this->load->model('profileModel');
		$data['user']=$this->profileModel->getUser();
		$this->load->template('payment/payment',$data);
	}



}