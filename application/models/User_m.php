<?php

class User_m extends MY_Model
{


    public function __construct()
    {
        parent::__construct();
    }

    function add($data)
    {

        $res = $this->db->insert('adminusers', $data);
        if ($res){
            return true;
        }else{
            return false;
        }


    }


    function all()
    {

        $res = $this->db->query("SELECT * FROM adminusers");
        $r = $res->result();
        if ($r){
            return $r;
        }else{
            return false;
        }


    }
}