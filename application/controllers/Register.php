<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends Frontend_Controller {
	
	
	function __construct() {
		parent::__construct();
		$this->load->model('User_d');
                $this->load->model('Children_m');
	}

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */

    public function index(){
    	
        $this->load->view('login');
    }
    
    function setRegister() {
    	
    	if((bool)$this->User_d->register()){

            $data['regmsg'] = "<div class='row'>
                                    <div class='col-md-12'>
                                        <div class='alert alert-info'>
                                            <strong><center>You're Signed Up..Please login to continue</center></strong> <br>
                                        </div>
                                    </div>
                                </div>";

            $this->load->view('login',$data);
        }else{
            $this->session->set_flashdata('error','<script>alert("Username already exist");</script>');
            redirect('Login','refresh');
        }
    
    }
    //register child
    function registerChild() {
    	$arr = array(
            'name' => $this->input->post('fname'),
            'lastname' => $this->input->post('lname'),
            'birthdate' => $this->input->post('bdate'),
            'donorID' => $this->session->userdata('id'),
            'email' => $this->input->post('email'),
            'mobile' => $this->input->post('mobilenumber'),
            'address' => $this->input->post('address'),
            'postalcode' => $this->input->post('postalcode'),
            'country' => $this->input->post('country'),
            'country' => $this->input->post('country'),
            'description' => $this->input->post('about'),
            'accnumber' => $this->input->post('accnumber'),
            'registeredDate' => date("Y-m-d"),
            'picture' => 'img/children/child.png'
        );
        echo (bool)$this->Children_m->register($arr);
    }
    
    
    
}
