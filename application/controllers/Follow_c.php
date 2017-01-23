<?php
class Follow_c extends MY_Controller{
    private $id = null;
    function __construct() {
        parent::__construct();
        $this->load->model('Follow_m');
        $this->load->model('User_d');
        $username = $this->session->userdata('username');
        $this->id = $this->User_d->getUserID($username);
    }
    public function isFollower($followingID){
        echo (bool)$this->Follow_m->isFollower($this->id,$followingID);
    }
    public function follow($followingID){
        echo (bool)$this->Follow_m->follow($this->id,$followingID);
    }
    public function unfollow($followingID){
        echo (bool)$this->Follow_m->unfollow($this->id,$followingID);
    }
    public function getFollowers($followingID){
        echo json_encode($this->Follow_m->getFollowers($followingID));
    }
}