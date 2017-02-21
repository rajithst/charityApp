<?php
//deals with donation table
class Donation_m extends MY_Model{
    function __construct() {
        parent::__construct();
    }
    //add a donation
    public function addDonation($data){
        if((bool)$this->db->insert('donations',$data)){
            $donorid = $data['donorID'];
            $postid = $data['postID'];
            $amount = $data['amount'];
            $this->db->where("id = '$donorid'");
            $query=$this->db->get('users');
            $result = $query->result();
            $donorname = $result[0]->name;
            $this->db->where("id = '$postid'");
            $query=$this->db->get('posts');
            $result = $query->result();
            $ownerid = $result[0]->postedby;
            $this->db->insert('notifications',array('donorid'=>$ownerid,'notification'=>"$donorid<aba>$donorname donated $amount to your post"));
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
    
    public function getTotalDonatedCount($id){
        $where = "donorID=$id";
        $sql = "SELECT COUNT(*) AS count FROM donations WHERE $where;";
        $query = $this->db->query($sql);
        $results = $query->result();
        return $results[0]->count;
    }
    
    public function getReceivedAmounts($id,$startDate,$endDate){
        $where = "pc.childid=$id AND d.date >= '$startDate' AND d.date <= '$endDate'";
        $sql = "SELECT CAST(d.date AS DATE) AS date,sum(d.amount) AS amount,p.n_of_children AS n_of_children FROM donations d INNER JOIN postchildren pc INNER JOIN posts p WHERE d.postID=pc.postid AND pc.postid=p.id AND $where GROUP BY CAST(d.date AS DATE)";
        $query = $this->db->query($sql);
        $result = $query->result();
        $data = array();
        foreach ($result as $row){
            $amount = floatval($row->amount);
            $date = $row->date;
            $nc = intval($row->n_of_children);
            if($nc>1){
                $amount = $amount/$nc;
            }
            array_push($data, array('date' => $date, 'amount' => $amount));
        }
        return $data;
    }
    public function getTotalDonatedAmount($id){
        $where = "donorID=$id";
        $sql = "SELECT sum(amount) AS amount FROM donations WHERE $where;";
        $query = $this->db->query($sql);
        $results = $query->result();
        return $results[0]->amount;
    }
    public function getTotalReceivedAmount($id){
        $where = "pc.childid=$id";
        $sql = "SELECT sum(d.amount) AS amount,p.n_of_children AS n_of_children FROM donations d INNER JOIN postchildren pc INNER JOIN posts p WHERE d.postID=pc.postid AND pc.postid=p.id AND $where";
        $query = $this->db->query($sql);
        $result = $query->result();
        $data = array();
        foreach ($result as $row){
            $amount = floatval($row->amount);
            $date = $row->date;
            $nc = intval($row->n_of_children);
            if($nc>1){
                $amount = $amount/$nc;
            }
            array_push($data, array('date' => $date, 'amount' => $amount));
        }
        return $data[0]->amount;
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
            $query=$this->db->query("INSERT INTO donations (donorID, postID,recipientID, description,amount, payment_status, txnid,payment_method) VALUES (
                '".$data['member_id']."','".$data['postid']."',null,null,
                    '".$data['payment_amount']."' ,
                    '".$data['payment_status']."' ,
                    '".$data['txn_id']."',
                    'paypal'                              

                )");
            $query->result();

            $query2=$this->db->query("SELECT MAX('id') FROM donations");
            $data=$query2->result();
            return $data[0]->id;
        
            
        }
    }


}