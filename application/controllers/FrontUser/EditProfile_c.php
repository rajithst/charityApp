<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EditProfile_c extends Frontend_Controller {
    private $id = null;
    public function __construct() {
            parent::__construct();
            $this->load->model('User_d');
            $username = $this->session->userdata('username');
            $this->id = $this->User_d->getUserID($username);
		
    }

    public function index()
	{
		//takes user data
		$data['user'] = $this->User_d->getUser($this->id);
		if(count($data) > 0)
		{
			$this->load->customizeTemplate('header',NULL,'FrontUser/edit_profile',$data);
		}
		else
		{
			$this->load->customizeTemplate('header',NULL,'FrontUser/edit_profile');
		}
	}
        //edit profile details id gets from session
        public function editDetails() {
            $arr = array(
                'name' => $this->input->post('fname'),
                'lastname' => $this->input->post('lname'),
                'username' => $this->input->post('username'),
                'company' => $this->input->post('company'),
                'email' => $this->input->post('email'),
                'mobile' => $this->input->post('mobilenumber'),
                'address' => $this->input->post('address'),
                'postalcode' => $this->input->post('postalcode'),
                'country' => $this->input->post('country'),
                'about' => $this->input->post('about'),
            );
            //if password feild is not empty
            $password = $this->input->post('password');
            if(trim($password) != "")    
                $arr['password'] = $password;
                
            echo (bool)$this->User_d->editUserDetails($this->id,$arr);
            
        }
}
