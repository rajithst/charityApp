<?php
class Upload_m extends MY_Model{
    function __construct() {
        parent::__construct();
    }
    //update path in the database
    function setPicturePath($userid,$dbtable,$path){
        $this->db->where('id',$userid);
        return ((bool)$this->db->update($dbtable,array('picture'=>$path)));
    }
}