U<?php
class User_d extends MY_Model {
	
	
	protected $_table_name  = 'Users';
	protected $_primary_key = 'id';
	protected $return_type  = 'array';
	
	
	
	function __construct() {
		parent::__construct();
	}
	
	function register() {
		
		
		$user_data = array(
		
				'name'=>$this->input->post('name'),
				'username'=> $this->input->post('username'),
				'password'=> $this->input->post('password'),
				'email'=> $this->input->post('email'),
				'gender'=> $this->input->post('reg_gender')
				
		);
		
		$res = $this->db->insert('Users', $user_data);
		if ($res) {
			return true;
		}
		
		}



	/** return all users **/
	function getUsers(){
		$query=$this->db->get('Users');
		return $query->result();

	}
		

        //get userID by username
        function getUserID($username){
            $this->db->where('username',$username);
            $query = $this->db->get('Users');
            $result = $query->result();
            return $result[0]->id;
        }
	
        //get chidlren registered by particular user
        function getChildren($id){
            $this->db->where('donorID',$id);
            $query = $this->db->get('Children');
            $result = $query->result();
            return $result;
        }



	}
