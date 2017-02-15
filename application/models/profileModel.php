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
        
        function loadTimeline($id){
            $q3 = "SELECT posteddate AS date, 'Post', needs, amount, received_amount, how_help, why_help, tags, n_of_children,1,1 FROM posts WHERE postedby = $id";
            $q2 = "SELECT  date, 'Donation', recipientID, amount, 1, description,1,1,1,1,1  FROM donations WHERE donorID = $id";
            $q1 = "SELECT ps.date AS date, 'Shared Post', p.needs, p.amount, p.received_amount, p.how_help, p.why_help, p.tags, p.n_of_children, u.id AS ownerid, u.name AS ownername FROM users u INNER JOIN posts p ON u.id = p.postedby INNER JOIN postshare ps ON ps.postid = p.id WHERE ps.userid = $id";
            $query=$this->db->query("$q1 UNION ALL $q2 UNION ALL $q3 ORDER BY date DESC;");
            return $query->result();
        }

}