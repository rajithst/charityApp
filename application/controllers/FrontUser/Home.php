<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Frontend_Controller {

	public function index()
	{
		$this->load->template('FrontUser/home');
	}

	public function register()
	{
		$this->load->view('registration');
	}
}
