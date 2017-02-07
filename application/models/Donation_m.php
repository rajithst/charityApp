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
        $sql = "SELECT * FROM donations WHERE $where ORDER BY date DESC;";
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

    //paypal queries

    function check_txnid($tnxid){

    $valid_txnid = true;
    //get result set
    $query=$this->db->query("SELECT * FROM 'donations' WHERE txnid ='".$tnxid."'");
    
    if ($query->num_rows()>0) {
        $valid_txnid = false;
    }
    return $valid_txnid;
}


    function check_price($price, $id){
        $valid_price = false;
        //you could use the below to check whether the correct price has been paid for the product
        
        
        // $sql = $this->db->query("SELECT amount FROM 'donations' WHERE id = '$id'");
        // if (mysql_num_rows($sql) != 0) {
        //     while ($row = mysql_fetch_array($sql)) {
        //         $num = (float)$row['amount'];
        //         if($num == $price){
        //             $valid_price = true;
        //         }
        //     }
        // }
        // return $valid_price;
        return true;
        
        
    }

    function updatePayments($data){

        
        if (is_array($data)) {
            $query=$this->db->query("INSERT INTO donations (donorID, recipientID,description,amount, payment_status, txnid,payment_method,postid) VALUES (
                '1','2',null,
                    '".$data['payment_amount']."' ,
                    '".$data['payment_status']."' ,
                    '".$data['txn_id']."',
                    'paypal','11'                               

                )");
            $query->result();

            $query2=$this->db->query("SELECT MAX('id') FROM donations");
            $data=$query2->result();
            return $query2[0]->id;
        
            
        }
    }


}