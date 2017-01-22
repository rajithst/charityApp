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
            $data['users']=$this->User_d->getUsers();

            if(count($data) > 0)
            {
                $this->load->template('FrontUser/home',$data);
            }else {

            }
	}

	public function register()
	{
		$this->load->view('registration');
	}

	public function profile()
	{
		//load children of user
		$username = $this->session->userdata('username');
		$this->id = $this->User_d->getUserID($username);
		$data['children'] = $this->User_d->getChildren($this->id);
		//load children of user ends
		$data['users']=$this->User_d->getUsers();
		if(count($data) > 0)
		{
			$this->load->customizeTemplate('header',NULL,'FrontUser/profile',$data);
		}
		else
		{
			$this->load->customizeTemplate('header',NULL,'FrontUser/profile');
		}
	}
}
