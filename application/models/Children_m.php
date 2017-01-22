<?php
class Children_m extends MY_Model{
    function __construct() {
        parent::__construct();
    }
    //get all the data fileds in children table
    public function getChildData($id){
        $this->db->where('id',$id);
        $query = $this->db->get('children');
        $result = $query->result();
        return $result;
    }
}