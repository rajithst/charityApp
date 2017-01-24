<?php
class profileModel extends MY_Model {
	
	function __construct() {
		parent::__construct();
	}



	function searchProf(){
		$name=$this->input->post('name');
	
		$query=$this->db->query("SELECT name FROM users WHERE  name like '%".$name."%'"." UNION "."SELECT name FROM children WHERE name like '%".$name."%' ");
		return $query->result();

	}

}