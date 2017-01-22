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
<<<<<<< HEAD
=======


>>>>>>> 0a1192d90615629523b6e1c30f8a66e4ae1dde51
                //load children of user
                $username = $this->session->userdata('username');
                $this->id = $this->User_d->getUserID($username);
                $data['children'] = $this->User_d->getChildren($this->id);
                //load children of user ends
<<<<<<< HEAD
                
		$this->load->template('FrontUser/home',$data);
=======


                $data['users']=$this->User_d->getUsers();
                


		        if(count($data) > 0)
		        {
		            $this->load->template('FrontUser/home',$data);
		        }else {

		            $this->load->template('FrontUser/home');
		        }

>>>>>>> 0a1192d90615629523b6e1c30f8a66e4ae1dde51
	}

	public function register()
	{
		$this->load->view('registration');
	}

	public function profile()
	{
<<<<<<< HEAD
		$this->load->view('templates/header');
		$this->load->view('FrontUser/profile');
=======
		$this->load->customizeTemplate('header','FrontUser/profile');
>>>>>>> 0a1192d90615629523b6e1c30f8a66e4ae1dde51
	}
}
