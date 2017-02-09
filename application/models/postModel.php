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
				'tags'=>$this->input->post('tags'),
				'child_profiles'=>$this->input->post('profiles')
				
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
		$query=$this->db->query("SELECT p.id,p.imagepaths,p.needs,p.how_help,p.why_help,p.amount,p.received_amount,u.username,u.picture,u.id as ids FROM posts as p inner join users as u on p.postedby=u.id where p.status=1 and p.amount>p.received_amount order by p.id desc limit 6");
		return $query->result();
	}

	function loadMore(){
		$lastid=$this->input->post('lastid');
		$query=$this->db->query("SELECT p.id,p.imagepaths,p.needs,p.how_help,p.why_help,p.amount,p.received_amount,u.username,u.picture,u.id as ids FROM posts as p inner join users as u on p.postedby=u.id where p.status=1 and p.id<='$lastid' and p.amount>p.received_amount order by p.id desc limit 6");
		return $query->result();

	}
        
        function receivedAmount($postid){
            $this->db->where('id',$postid);
            $query = $this->db->get('posts');
            $result = $query->result();
            return $result[0]->received_amount;
        }
        
        function neededAmount($postid){
            $this->db->where('id',$postid);
            $query = $this->db->get('posts');
            $result = $query->result();
            return $result[0]->amount;
        }
        
        function updateReceived($postid,$amount){
            $sql = "UPDATE posts SET received_amount = received_amount+$amount WHERE id = $postid;";
            $this->db->query($sql);
        }

}