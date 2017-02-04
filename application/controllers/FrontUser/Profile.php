<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class edit_Profile extends Frontend_Controller {
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
                if(count($data) > 0)
		{
			$this->load->customizeTemplate('header',NULL,'FrontUser/edit_profile',$data);
		}
		else
		{
			$this->load->customizeTemplate('header',NULL,'FrontUser/edit_profile');
		}
	}
}
