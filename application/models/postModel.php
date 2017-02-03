<?php
class postModel extends MY_Model {
	
	function __construct() {
		parent::__construct();
	}

	function savePost(){


		$post_data = array(
		
				'postedby'=>$this->session->userdata('id'),
				'needs'=> $this->input->post('need'),
				'amount'=> $this->input->post('whyHelp'),
				'how_help'=>$this->input->post('amount'),
				'why_help'=>$this->input->post('howHelp'),
				'tags'=>$this->input->post('tags')
				
		);
		
		$res = $this->db->insert('posts', $post_data);
		if ($res) {
			return true;
		}

	}


	function loadPost(){
		$query=$this->db->query("SELECT * FROM posts where status=1");
		return $query->result();
	}


}