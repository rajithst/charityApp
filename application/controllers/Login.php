<?php
class Login extends Frontend_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('Login_m');
                $this->load->model('User_d');
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

                $data['msg'] = "<div class='alert alert-danger'>
                          <strong><center>Login Error !!</center></strong> <br>
                          <center>Username Password Combination not matching</center>
                        </div>";
                $this->load->view('login', $data);
			}

		} 
		
		
		$this->load->view('login');
	}
        function googleLogin(){
            $username = $this->input->post('username');
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $gender = $this->input->post('reg_gender');
            $picture = $this->input->post('picture');
            $existid = $this->User_d->getUserID($username);
            if(!$existid){
                $this->User_d->register();
            }
            $id = $this->User_d->getUserID($username);
            $this->session->set_userdata(
            array(
                'id' => $id,
                'username' => $username,
                'name' =>$name,
                'email' =>$email,
                'gender' =>$gender,
                'loggedin' =>TRUE,
                'google' => TRUE,
                'picture' => $picture
            ));
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