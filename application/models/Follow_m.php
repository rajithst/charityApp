<?php
class Follow_m extends MY_Model{
    function __construct() {
        parent::__construct();
    }
    function isFollower($followerID,$followingID,$type){
        $where = "followingID = '$followingID' AND followerID = '$followerID' AND type = '$type'";
        $this->db->where($where);
        $query=$this->db->get('follow');
        return (bool)$query->result();
    }
    function follow($followerID,$followingID,$type){
        if((bool)$this->db->insert('follow',array('followerID'=>$followerID,'followingID'=>$followingID,'type'=>$type))){
            if($type=='1'){
                $this->db->where("id = '$followerID'");
                $query=$this->db->get('users');
                $result = $query->result();
                $name = $result[0]->name;
                $this->db->insert('notifications',array('donorid'=>$followingID,'notification'=>"$followerID<aba>$name is following you"));
                return true;
            }
            return false;
        }
    }
    function unfollow($followerID,$followingID,$type){
        $where = "followingID = '$followingID' AND followerID = '$followerID' AND type = '$type'";
        $this->db->where($where);
        return (bool)$this->db->delete('follow');
    }
    function getFollowers($followingID,$type){
        $q = "SELECT * FROM users INNER JOIN follow ON follow.followerID = users.id WHERE follow.followingID = $followingID AND follow.type = $type;";
        $query = $this->db->query($q);
        return $query->result();
    }
    function getFollowings($followerID){
        $q = "SELECT * FROM users INNER JOIN follow ON follow.followingID = users.id WHERE follow.followerID = $followerID AND follow.type = $type;";
        $query = $this->db->query($q);
        return $query->result();
    }
}