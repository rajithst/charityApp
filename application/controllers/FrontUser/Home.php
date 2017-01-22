<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Frontend_Controller {

	public function index()
	{
		$this->load->model('User_d');
		$data['users']=$this->User_d->getUsers();
		$this->load->template('FrontUser/home',$data);
	}

	public function register()
	{
		$this->load->view('registration');
	}
}
