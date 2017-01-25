<?php

class Login_m extends MY_Model{

	protected $_table_name='adminsers';
	protected $_order_by='id';
	public    $rules=array(

			'username'=>array(

					'field'=>'username',
					'rules'=>'required'

			),

			'password'=>array(

					'field'=>'password',
					'rules'=>'trim|required'

			)

	);


	public function __construct(){
		parent::__construct();
	}

	function login(){

		$username = $this->input->post('username');
		$password = $this->input->post('password');



        $res=get_by(username = $username)
		$rows  = $query->num_rows();
		
		
		
		if ($rows == 1) {
		
			
			foreach ($res as $result){
			
				$name =$result->name;
				$email =$result->email;
				$gender =$result->gender;
				
				
			}
		
			$this->session->set_userdata(
		
					array(
							'username' => $username,
							'name' =>$name,
							'email' =>$email,
							'gender' =>$gender,
							'loggedin' =>TRUE
		
		
					));
		
			return  true;
		
		}
		

    }

    function logout(){

        $this->session->sess_destroy();

    }

    function loggedin(){

        return (bool)$this->session->userdata('loggedin');

    }


    /* function hash($string){
        return hash('md5',$string.config_item('encryption_key'));

    } */
}