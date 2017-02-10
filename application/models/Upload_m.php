<?php
class Upload_m extends MY_Model{
    function __construct() {
        parent::__construct();
    }
    //update path in the database
    function setPicturePath($userid,$dbtable,$path){
    	if(strcmp($dbtable,"posts")==0){
    		$sql1="SELECT MAX(id) as id from posts where postedby='".$userid."'";
    		$query1=$this->db->query($sql1);
    		$result1=$query1->result();
    		$ids=$result1[0]->id;
    		$sql2="UPDATE posts set imagepaths='".$path."' where id='".$ids."'";
    		$query2=$this->db->query($sql2);
    		if($query2->result()){
    			return true;
    		}
    		return false;

    	}
    	else{
        $this->db->where('id',$userid);
        return ((bool)$this->db->update($dbtable,array('picture'=>$path)));
    	}
    }
}