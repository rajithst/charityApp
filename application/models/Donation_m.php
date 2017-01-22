<?php
//deals with donation table
class Donation_m extends MY_Model{
    public function __construct() {
        parent::__construct();
    }
    //add a donation
    public function addDonation($data){
        if((bool)$this->db->insert('donations',$data)){
            return true;
        }else{
            return false;
        }
    }
    //daily donations
    public function getAmounts($id,$startDate,$endDate){
        $where = "donorID=$id AND date >= '$startDate' AND date <= '$endDate'";
        $sql = "SELECT date,sum(amount) AS amount FROM donations WHERE $where GROUP BY date;";
        $query = $this->db->query($sql);
        return $query->result();
    }
}