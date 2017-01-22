<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//donation data handles by this controller
class Donation_c extends MY_Controller{
    private $id = null;
    public function __construct() {
        parent::__construct();
        $this->load->model('Donation_m');
        $this->load->model('User_d');
        $username = $this->session->userdata('username');
        $this->id = $this->User_d->getUserID($username);
    }
    //add donation
    public function donate(){
        $date = $this->input->post('donationdate');
        $amount = $this->input->post('donationamount');
        $receiver = $this->input->post('receiver');
        if((bool)$this->Donation_m->addDonation(array('donorID'=>$this->id,'recipientID'=>$receiver,'date'=>$date,'amount'=>$amount))){
            echo 'successfully donated';
        }else{
            echo 'donation failsed';
        }
    }
    //get donation data (daily amounts)
    public function getGraphData($startDate,$endDate) {
        $amounts = $this->Donation_m->getAmounts($this->id,$startDate,$endDate);
        //echo $id;
        echo json_encode($amounts);
    }
}