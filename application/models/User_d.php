<?php
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
				'gender'=> $this->input->post('reg_gender'),
                    'picture'=> 'img/user/user.png'
		);
		if($this->input->post('picture'))
                    $user_data['picture'] = $this->input->post('picture');
                if($this->input->post('type'))
                    $user_data['type'] = $this->input->post('type');
                $this->db->where('username',$user_data['username']);
                $query=$this->db->get('users');
                if(count($query->result())){
                    return false;
                }
                $res = $this->db->insert('users', $user_data);
                    
		if ($res) {
			return true;
		}
		
	}
        //edit profile data receive from EditProfile_c
        function editUserDetails($id,$data){
            $this->db->where('id',$id);
            return (bool)$this->db->update('users',$data);
        }
        
	/** return all users **/
	function getUsers(){
		$query=$this->db->get('users');
		return $query->result();

	}
		

        //get userID by username
        function getUserID($username){
            $this->db->where('username',$username);
            $query = $this->db->get('users');
            $result = $query->result();
            if(count($result)>0){
               return $result[0]->id;
            }
            else{
                return false;
            }
            
        }
	
        //get userData
        function getUser($id){
            $this->db->where('id',$id);
            $query = $this->db->get('users');
            $result = $query->result();
            if(count($result)>0){
               return $result[0];
            }
            else{
                return false;
            }
        }
        
        //get carers
        function getCareer($id){
            $this->db->where('id',$id);
            $query = $this->db->get('career');
            $result = $query->result();
            return $result;
        }
        
        //get chidlren registered by particular user
        function getChildren($id){
            $this->db->where('donorID',$id);
            $query = $this->db->get('children');
            $result = $query->result();
            return $result;
        }

        function searchChildren(){
            $name=$this->input->post('name');
            $owner=$this->session->userData('id');
            $query=$this->db->query("SELECT * FROM children where name='$name' and donorID='$owner'");
            return $query->result();
        }
        
        function getNotifications($id){
            $this->db->where(array('donorid'=>$id,'viewtime'=>NULL));
            $query = $this->db->get('notifications');
            $result = $query->result();
            return $result;
        }
        function setViewNotifications($id){
            $this->db->where('id',$id);
            return (bool)$this->db->update('notifications',array('viewtime'=>date("Y-m-d")." ".date("H:i:s")));
        }
	}
