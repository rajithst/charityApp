<?php

/**
 * Created by PhpStorm.
 * User: rajith
 * Date: 2/3/17
 * Time: 10:04 PM
 */
class Profile_m extends MY_Model{



    public function __construct(){
        parent::__construct();
    }


    public function getProfileData($id){

        $sql = "SELECT * FROM users WHERE id=$id";
        $query = $this->db->query($sql);
        $res = $query->result();
        return $res;


    }

}