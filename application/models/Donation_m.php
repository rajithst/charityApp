<?php
//deals with donation table
class Donation_m extends MY_Model{
    function __construct() {
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
    //get donations
    public function getDonations($id,$startDate,$endDate){
        $where = "donorID=$id AND date >= '$startDate' AND date <= '$endDate'";
        $sql = "SELECT * FROM donations WHERE $where ORDER BY date ASC;";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function getReceivedAmounts($id,$startDate,$endDate){
        $where = "recipientID=$id AND date >= '$startDate' AND date <= '$endDate'";
        $sql = "SELECT date,sum(amount) AS amount FROM donations WHERE $where GROUP BY date;";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function getTotalDonatedAmount($id){
        $where = "donorID=$id";
        $sql = "SELECT sum(amount) AS amount FROM donations WHERE $where;";
        $query = $this->db->query($sql);
        $results = $query->result();
        return $results[0]->amount;
    }
    public function getTotalReceivedAmount($id){
        $where = "recipientID=$id";
        $sql = "SELECT sum(amount) AS amount FROM donations WHERE $where;";
        $query = $this->db->query($sql);
        $results = $query->result();
        return $results[0]->amount;
    }
}