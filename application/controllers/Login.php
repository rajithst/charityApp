<?php
class Login extends Frontend_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('Login_m');

	}

	public function login(){

	
	     $home = 'Home';
		if ($this->Login_m->loggedin() == true) {
			redirect($home);
		}

		$rules= $this->Login_m->rules;
		$this->form_validation->set_rules($rules);

		if($this->form_validation->run()==TRUE) {

			if ($this->Login_m->login() == true) {
				redirect($home);

			}else {

				$this->session->set_flashdata('error','That email password combination does not exist');
				redirect('Login','refresh');
			}

		} 
		
		
		$this->load->view('login');
	}


	public function facebook(){
		if($this->Login_m->facebook()==true){
			return true;
		}


	}



	public function logout(){

		$this->Login_m->logout();
		redirect('Login');

	}
}