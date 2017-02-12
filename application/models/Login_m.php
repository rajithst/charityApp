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
							'loggedin' =>TRUE,
							'fb'=>false
		
		
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



    //login with face book
    function facebook(){
    	
    	
    	$emails=$this->input->post('email');
    
    	
    	

    
    	$query=$this->db->query("SELECT * FROM Users WHERE email='$emails'");
    	$res=$query->result();

    	if($query->num_rows()==1){
    		foreach ($res as $result){
                                
                $id =$result->id;
				$name =$result->name;
				$email =$result->email;
				$gender =$result->gender;
				$username=$result->username;
				
			}
		
			$this->session->set_userdata(
		
					array(
                            'id' => $id,
							'username' => $username,
							'name' =>$name,
							'email' =>$email,
							'gender' =>$gender,
							'loggedin' =>TRUE,
							'fb'=>true
		
		
					));
		
			return  true;

    	}

    	else{

    		$user_data = array(
		
				'name'=>$this->input->post('fname'),
				'lastname'=>$this->input->post('lname'),
				'username'=> $this->input->post('id'),
				'password'=> '',
				'email'=> $this->input->post('email'),
				'gender'=> $this->input->post('gender')
                
				
			);
			
			$res = $this->db->insert('Users', $user_data);
			if ($res) {
				$mail=$this->input->post('email');
				$query2=$this->db->query("SELECT * FROM Users WHERE email='$mail'");
    			$res2=$query2->result();
    			if($query2->num_rows()==1){
    					foreach ($res2 as $results){
                                
			                $id =$results->id;
							$name =$results->name;
							$email =$results->email;
							$gender =$results->gender;
							$username=$results->username;
							
						}
					
						$this->session->set_userdata(
					
								array(
			                            'id' => $id,
										'username' => $username,
										'name' =>$name,
										'email' =>$email,
										'gender' =>$gender,
										'loggedin' =>TRUE,
										'fb'=>true
					
					
								));
						return true;
		
    			}

				
			}


    	}



    }


    /* function hash($string){
        return hash('md5',$string.config_item('encryption_key'));

    } */
}