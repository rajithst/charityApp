<?php
class Login extends Frontend_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('Login_m');

	}

	public function login(){


            $data = array(
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password')
            );


            $home = 'Dashboard';
            $log = $this->Login_m->login($data);

            if ($log == true) {
                redirect($home);
            } else {

                $data['msg'] = "<div class='alert alert-danger'>
                          <strong><center>Login Error !!</center></strong> <br>
                          <center>Username Password Combination not matching</center>
                        </div>";

                $this->load->view('templates/header');
                $this->load->view('login', $data);
            }


        }

		
		



	public function logout(){

		$this->Login_m->logout();
		$data['msg'] = "<div class='alert alert-info'>
                          <strong><center>You're Logged out</center></strong> <br>
                          <center></center>
                        </div>";

                $this->load->view('templates/header');
                $this->load->view('login', $data);

	}
}