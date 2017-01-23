<?php
class Follow_m extends MY_Model{
    function __construct() {
        parent::__construct();
    }
    function isFollower($followerID,$followingID){
        $where = "followingID = '$followingID' AND followerID = '$followerID'";
        $this->db->where($where);
        $query=$this->db->get('follow');
        return (bool)$query->result();
    }
    function follow($followerID,$followingID){
        return (bool)$this->db->insert('follow',array('followerID'=>$followerID,'followingID'=>$followingID));
    }
    function unfollow($followerID,$followingID){
        $where = "followingID = '$followingID' AND followerID = '$followerID'";
        $this->db->where($where);
        return (bool)$this->db->delete('follow');
    }
    function getFollowers($followingID){
        $this->db->where('followingID',$followingID);
        $query=$this->db->get('follow');
        return $query->result();
    }
    function getFollowings($followerID){
        $this->db->where('followerID',$followerID);
        $query=$this->db->get('follow');
        return $query->result();
    }
}