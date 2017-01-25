<?php

class Login_m extends MY_Model{

	protected $_table_name='adminsers';
	protected $_order_by='id';


	public function __construct(){
		parent::__construct();
	}


	function login($data){

        $condition = "username =" . "'" . $data['username'] . "' AND " . "password =" . "'" . $data['password'] . "'";
        $sql = "SELECT * FROM Adminusers WHERE $condition";
        $query = $this->db->query($sql);
        $res = $query->result();
        $rows  = $query->num_rows();


        if ( $rows == 1) {
		
			
			foreach ($res as $result){
			
				 $fname =$result->first_name;
				 $lname =$result->last_name;
				 $email = $result->email;
				 $id = $result->id;
				
			}

		
			$this->session->set_userdata(
		
					array(
							'username' => $data['username'],
							'fname' =>$fname,
							'lname' =>$lname,
							'email' =>$email,
							'id' =>$id,
							'loggedin' =>TRUE
		
		
					));
		
			return  true;
		
		} else {

		    return false;
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