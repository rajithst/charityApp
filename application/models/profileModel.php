<?php
class profileModel extends MY_Model {
	
	function __construct() {
		parent::__construct();
	}



	function searchProf(){
		$name=$this->input->post('name');
		$query1=$this->db->query("SELECT name,id,picture,type,username FROM users WHERE  name like '%".$name."%';");
		$query2=$this->db->query("SELECT name,id,picture FROM children WHERE name like '%".$name."%';");
		$data = array('users'=>$query1->result(),'children'=>$query2->result());
		return $data;

	}

	//current logged  user details

	function getUser(){
		$uname=$this->session->userdata('username');
		$query=$this->db->query("SELECT * FROM users WHERE username='".$uname."'");
	return $query->result();

	}

}