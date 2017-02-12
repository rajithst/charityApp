<?php
class profileModel extends MY_Model {
	
	function __construct() {
		parent::__construct();
	}



	function searchProf(){
		$name=$this->input->post('name');
		$query=$this->db->query("SELECT id,name FROM users WHERE  name like '%".$name."%';");
                $users = $query->result();
                $query=$this->db->query("SELECT id,name FROM children WHERE name like '%".$name."%';");
                $children = $query->result();
                $res = array('users'=>$users,'children'=>$children);
		return $res;

	}

	//current logged  user details

	function getUser(){
		$uname=$this->session->userdata('username');
		$query=$this->db->query("SELECT * FROM users WHERE username='".$uname."'");
	return $query->result();

	}

}