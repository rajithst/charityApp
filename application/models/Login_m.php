<?php

class Login_m extends MY_Model{

	protected $_table_name='Users';
	protected $_order_by='name';
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
			

		
		$sql = "SELECT * FROM Users WHERE username='$username' AND password ='$password'";
		//echo $sql;
		//die();
		$query = $this->db->query($sql);
		$res  = $query->result();
		$rows  = $query->num_rows();
		
		
		
		if ($rows == 1) {
		
			
			foreach ($res as $result){
                                
                $id =$result->id;
				$name =$result->name;
				$email =$result->email;
				$gender =$result->gender;
				
			}
		
			$this->session->set_userdata(
		
					array(
                            'id' => $id,
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