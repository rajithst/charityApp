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
        
	public function profile($id)
	{
		//load children of user
		$this->id = $id;
                $data['user'] = $this->User_d->getUser($id);
		$data['career'] = $this->User_d->getCareer($this->id);
		
                $data['children'] = $this->User_d->getChildren($this->id);
		//load children of user ends
		$data['users']=$this->User_d->getUsers();
                
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
        
        public function getNotifications($id){
            echo json_encode($this->User_d->getNotifications($id));
        }
        public function setViewNotifications($id){
            echo (bool)$this->User_d->setViewNotifications($id);
        }

}
