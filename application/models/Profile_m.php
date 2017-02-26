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

        $sql = "SELECT posts.id,posts.postedby,posts.posteddate,posts.needs,posts.status, users.name, users.lastname,users.picture,users.email,users.profilestatus FROM posts INNER JOIN users WHERE posts.postedby=$id AND users.id=$id";
        $query = $this->db->query($sql);
        $res = $query->result();

        return $res;


    }

    public function deleteProfile($key){

        $sql = "DELETE FROM users WHERE id=$key";
        $query = $this->db->query($sql);
        if ($query)
            return TRUE;
        else
            return FALSE;

    }

    public function suspendProfile($key){

        $sql = "UPDATE users SET profilestatus=0 WHERE id=$key";
        $query = $this->db->query($sql);
        if ($query)
            return TRUE;
        else
            return FALSE;

    }

    public function activeProfile($key){

        $sql = "UPDATE users SET profilestatus=1 WHERE id=$key";
        $query = $this->db->query($sql);
        if ($query)
            return TRUE;
        else
            return FALSE;

    }


    public function getPosts($id){




    }

}