<?php
class postModel extends MY_Model {
	
	function __construct() {
		parent::__construct();
	}

	function savePost(){


		$post_data = array(
		
				'postedby'=>$this->session->userdata('id'),
				'needs'=> $this->input->post('need'),
				'amount'=> $this->input->post('amount'),
				'how_help'=>$this->input->post('howHelp'),
				'why_help'=>$this->input->post('whyHelp'),
				'tags'=>$this->input->post('tags')
				
		);
		
		$res = $this->db->insert('posts', $post_data);
		if ($res) {
			return true;
		}

	}

        //get posts posted by user
        public function getUserPosts($id,$startDate,$endDate){
            $where = "status=1 AND postedby=$id AND posteddate >= '$startDate' AND posteddate <= '$endDate'";
            $sql = "SELECT * FROM posts WHERE $where ORDER BY posteddate DESC;";
            $query = $this->db->query($sql);
            return $query->result();
        }
    
	function loadPost(){
		$query=$this->db->query("SELECT * FROM posts where status=1 and amount>received_amount order by posteddate desc limit 20");
		return $query->result();
	}

	function loadMore(){
		$lastid=$this->input->post('lastid');
		$query=$this->db->query("SELECT * FROM posts where status=1 and id<='$lastid' and amount>received_amount order by posteddate desc limit 20");
		return $query->result();

	}


}