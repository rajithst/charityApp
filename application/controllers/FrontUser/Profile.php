<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends Frontend_Controller {
        private $id = null;
	public function __construct() {
		parent::__construct();
		$this->load->model('User_d');
                $this->load->model('profileModel');
	}

        //set the view of timeline in profile
        public function setTimeline($id,$start,$bound)
        {   
            $this->id = $id;
            $months = ["JAN","FEB","MAR","APR","MAY","JUN","JUL","AUG","SEP","OCT","NOV","DEC"];
            $result = $this->profileModel->loadTimeline($this->id);
            $curDate = "";
            $out = array();
            foreach ($result as $row){
                $orderdate = explode('-', substr($row->date, 0, 10));
                $month = $months[intval($orderdate[1])-1];
                $day   = $orderdate[2];
                $curDate = $month."-".$day;
                if(!isset($out[$curDate])){
                    $out[$curDate] = array();
                    array_push($out[$curDate], array('day'=>$day,'month'=>$month));
                    array_push($out[$curDate], array());
                }
                array_push($out[$curDate][1], $row);
                $prevDate = $curDate;
            }
            /*$donations = $this->Donation_m->getDonations($this->id,(date("Y")-10).'-01-01',(date("Y")+10).'-12-31');
            $posts = $this->postModel->getUserPosts($this->id,(date("Y")-10).'-01-01',(date("Y")+10).'-12-31');
            $n = count($donations);
            $m = count($posts);
            $months = ["JAN","FEB","MAR","APR","MAY","JUN","JUL","AUG","SEP","OCT","NOV","DEC"];
            $post = array();
            $i=$j=0;
            if(($n>0)&&($m>0)){
                $cdatedonation = substr($donations[$i]->date, 0, 10);
                $cdatepost = substr($posts[$j]->posteddate, 0, 10);
                while(($i<$n)&&($j<$m)){
                    while(($i<$n)&&($cdatedonation>=$cdatepost)){
                        list($year,$month,$day) = explode("-", $cdatedonation);
                        $cur = array(
                            'type'=>"donation",
                            'id'=>$donations[$i]->id,
                            'day'=>$day,
                            'month'=>$months[intval($month)-1],
                            'content'=>$donations[$i]->description." ".$donations[$i]->amount,
                            'date'=>$donations[$i]->date
                        );
                        if(!isset($post[$day.$months[intval($month)-1]]))
                            $post[$day.$months[intval($month)-1]] = array();
                        array_push($post[$day.$months[intval($month)-1]],$cur);
                        $i++;
                        if($i<$n)
                            $cdatedonation = substr($donations[$i]->date, 0, 10);
                    }
                    while(($j<$m)&&($cdatedonation<$cdatepost)){
                        list($year,$month,$day) = explode("-", $cdatepost);
                        $cur = array(
                            'type'=>"post",
                            'id'=>$posts[$j]->id,
                            'day'=>$day,
                            'month'=>$months[intval($month)-1],
                            'content'=>$posts[$j]->needs." ".$posts[$j]->amount." ".$posts[$j]->how_help." ".$posts[$j]->why_help." ".$posts[$j]->tags,
                            'date'=>$posts[$j]->posteddate
                        );
                        if(!isset($post[$day.$months[intval($month)-1]]))
                            $post[$day.$months[intval($month)-1]] = array();
                        array_push($post[$day.$months[intval($month)-1]],$cur);
                        $j++;
                        if($j<$m)
                            $cdatepost = substr($posts[$j]->posteddate, 0, 10);
                    }
                }
            }
            while($i<$n){
                $cdatedonation = substr($donations[$i]->date, 0, 10);
                list($year,$month,$day) = explode("-", $cdatedonation);
                $cur = array(
                    'type'=>"donation",
                    'id'=>$donations[$i]->id,
                    'day'=>$day,
                    'month'=>$months[intval($month)-1],
                    'content'=>$donations[$i]->description." ".$donations[$i]->amount,
                    'date'=>$donations[$i]->date
                );
                if(!isset($post[$day.$months[intval($month)-1]]))
                    $post[$day.$months[intval($month)-1]] = array();
                array_push($post[$day.$months[intval($month)-1]],$cur);
                $i++;
            }
            while($j<$m){
                $cdatepost = substr($posts[$j]->posteddate, 0, 10);
                list($year,$month,$day) = explode("-", $cdatepost);
                $cur = array(
                    'type'=>"post",
                    'id'=>$posts[$j]->id,
                    'day'=>$day,
                    'month'=>$months[intval($month)-1],
                    'content'=>$posts[$j]->needs." ".$posts[$j]->amount." ".$posts[$j]->how_help." ".$posts[$j]->why_help." ".$posts[$j]->tags,
                    'date'=>$posts[$j]->posteddate
                );
                if(!isset($post[$day.$months[intval($month)-1]]))
                    $post[$day.$months[intval($month)-1]] = array();
                array_push($post[$day.$months[intval($month)-1]],$cur);
                $j++;
            }*/
            echo json_encode(array_slice($out, $start, $bound));
        }
}
