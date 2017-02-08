<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Frontend_Controller {
        //get children registered by user
	private $id = null;
	public function __construct() {
		parent::__construct();
		$this->load->model('User_d');
                $this->load->model('Donation_m');
                $this->load->model('postModel');
	}

    public function index()
	{
            $data['users']=$this->User_d->getUsers();
            //load children of user ends

            if(count($data) > 0)
            {
                $this->load->template('FrontUser/home',$data);
            }else {

            }
	}

	public function register()
	{
		$this->load->view('registration');
	}
        
        //set the view of timeline in profile
        public function setTimeline()
        {
            $donations = $this->Donation_m->getDonations($this->id,date("Y").'-01-01',date("Y").'-12-31');
            $posts = $this->postModel->getUserPosts($this->id,date("Y").'-01-01',date("Y").'-12-31');
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
            }
            
            return $post;
        }
        
	public function profile($id)
	{
		//load children of user
		$this->id = $id;
                $data['user'] = $this->User_d->getUser($id);
		$data['career'] = $this->User_d->getCareer($this->id);
		
                $data['children'] = $this->User_d->getChildren($this->id);
		//load children of user ends
		$data['users']=$this->User_d->getUsers();
                $data['timelinecontent'] = $this->setTimeline();
		
		if(count($data) > 0)
		{
			$this->load->customizeTemplate('header',NULL,'FrontUser/profile',$data);
		}
		else
		{
			$this->load->customizeTemplate('header',NULL,'FrontUser/profile');
		}
	}
        
        public function getPicture($id)
	{
		$this->id = $id;
                $user = $this->User_d->getUser($id);
		echo $user->picture;
	}
        public function loadChildren($id){
            $children = $this->User_d->getChildren($id);
            $result = array();
            foreach ($children as $row){
                array_push($result, array('id'=>$row->id,'name' => $row->name." ".$row->lastname, 'picture' => $row->picture));
            }
            echo json_encode($result);
        }


        public function searchChildren(){
            $children=$this->User_d->searchChildren();
            header('Content-type: text/plain'); 
          // set json non IE
            header('Content-type: application/json'); 
            echo json_encode($children);



        }

}
