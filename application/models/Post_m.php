<?php
class Post_m extends MY_Model {
	
	
	protected $_table_name  = 'Posts';
	protected $_primary_key = 'id';
	protected $return_type  = 'array';
	
	
	
	function __construct() {
		parent::__construct();
	}


	function  getPendingPosts(){

	    $sql = "SELECT Posts.id,Posts.postedby,Posts.posteddate,Posts.posttime,Posts.subject, Users.name, Users.lastname FROM Posts INNER JOIN Users WHERE Posts.postedby=Users.id AND Posts.status=0 ORDER BY posteddate DESC ";
        $query = $this->db->query($sql);
        $res = $query->result();
        return $res;
    }

    function  getApprovedPosts(){

        $sql = "SELECT Posts.id,Posts.postedby,Posts.posteddate,Posts.posttime,Posts.approvedate,Posts.approvetime,Posts.subject, Users.name, Users.lastname FROM Posts INNER JOIN Users WHERE Posts.postedby=Users.id AND Posts.status=1 ORDER BY posteddate DESC ";
        $query = $this->db->query($sql);
        $res = $query->result();
        return $res;
    }

    function addtoPublish($id){

        $sql = "UPDATE Posts SET status=1,approvedate=CURDATE(),approvetime=CURTIME() WHERE id=$id";
        $query = $this->db->query($sql);

        if ($query){
            return 'true';
        }
    }

    function deletePost($id){

        $sql = "DELETE FROM Posts WHERE id=$id";
        $query = $this->db->query($sql);

        if ($query){
            return 'true';
        }
    }

    function draftPost($id){

        $sql = "UPDATE Posts SET status=2,approvedate=CURDATE(),approvetime=CURTIME() WHERE id=$id";
        $query = $this->db->query($sql);

        if ($query){
            return 'true';
        }
    }


	}
