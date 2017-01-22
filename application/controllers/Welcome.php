<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Frontend_Controller {

	public function index()
	{
		$this->load->view('login');
	}

	public function register()
	{
		$this->load->view('registration');
	}
}
