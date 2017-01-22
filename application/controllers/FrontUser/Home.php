<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Frontend_Controller {
        //get children registered by user
        private $id = null;
        public function __construct() {
            parent::__construct();
            $this->load->model('User_d');
        }

        public function index()
	{


                //load children of user
                $username = $this->session->userdata('username');
                $this->id = $this->User_d->getUserID($username);
                $data['children'] = $this->User_d->getChildren($this->id);
                //load children of user ends

                $data['users']=$this->User_d->getUsers();
                

				$this->load->template('FrontUser/home',$data);
	}

	public function register()
	{
		$this->load->view('registration');
	}

	public function profile()
	{
		$this->load->view('templates/header');
		$this->load->view('FrontUser/profile');
	}
}
