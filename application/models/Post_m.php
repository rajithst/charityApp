<?php
class Post_m extends MY_Model {
	
	
	protected $_table_name  = 'posts';
	protected $_primary_key = 'id';
	protected $return_type  = 'array';
	
	
	
	function __construct() {
		parent::__construct();
	}


	function  getPendingPosts(){

	    $sql = "SELECT posts.id,posts.postedby,posts.posteddate,posts.posttime,posts.needs, users.name, users.lastname FROM posts INNER JOIN users WHERE posts.postedby=users.id AND posts.status=0 ORDER BY posteddate DESC ";
        $query = $this->db->query($sql);
        $res = $query->result();
        return $res;
    }

    function  getApprovedPosts(){

        $sql = "SELECT posts.id,posts.postedby,posts.posteddate,posts.posttime,posts.approvedate,posts.approvetime,posts.needs, users.name, users.lastname FROM posts INNER JOIN users WHERE posts.postedby=users.id AND posts.status=1 ORDER BY posteddate DESC ";
        $query = $this->db->query($sql);
        $res = $query->result();
        return $res;
    }

    function  getDraftedPosts(){

        $sql = "SELECT posts.id,posts.postedby,posts.posteddate,posts.posttime,posts.approvedate,posts.approvetime,posts.needs, users.name, users.lastname FROM posts INNER JOIN users WHERE posts.postedby=users.id AND posts.status=2 ORDER BY posteddate DESC ";
        $query = $this->db->query($sql);
        $res = $query->result();
        return $res;
    }



    function addtoPublish($id){

        $sql = "UPDATE posts SET status=1,approvedate=CURDATE(),approvetime=CURTIME() WHERE id=$id";
        $query = $this->db->query($sql);

        if ($query){
            return 'true';
        }
    }

    function deletePost($id){

        $sql = "DELETE FROM posts WHERE id=$id";
        $query = $this->db->query($sql);

        if ($query){
            return 'true';
        }
    }

    function draftPost($id){

        $sql = "UPDATE posts SET status=2,approvedate=CURDATE(),approvetime=CURTIME() WHERE id=$id";
        $query = $this->db->query($sql);

        if ($query){
            return 'true';
        }
    }

    function getPostdata($id){

        $sql = "SELECT posts.id,posts.postedby,posts.posteddate,posts.posttime,posts.needs,posts.amount,posts.how_help,posts.why_help,posts.tags,posts.child_profiles, users.name, users.lastname,users.picture,users.email FROM posts  INNER JOIN users WHERE posts.postedby=users.id AND posts.id=$id";
        $query = $this->db->query($sql);
        $res = $query->result();
        return $res;


    }

    function getstat(){

        $sql = "SELECT * FROM users";
        $query = $this->db->query($sql);
        $res = $query->num_rows();
        return $res;


    }


    function getpending(){

        $sql = "SELECT * FROM posts WHERE status=0";
        $query = $this->db->query($sql);
        $res = $query->num_rows();
        return $res;


    }


	}
