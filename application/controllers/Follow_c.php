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
    public function isFollower($followingID,$type){
        echo (bool)$this->Follow_m->isFollower($this->id,$followingID,$type);
    }
    public function follow($followingID,$type){
        echo (bool)$this->Follow_m->follow($this->id,$followingID,$type);
    }
    public function unfollow($followingID,$type){
        echo (bool)$this->Follow_m->unfollow($this->id,$followingID,$type);
    }
    public function getFollowers($followingID,$type){
        echo json_encode($this->Follow_m->getFollowers($followingID,$type));
    }
}