<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PostController extends Frontend_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('postModel');

	}


	public function savePost(){
		$this->postModel->savePost();
	}


	public function loadPost(){
		$data=$this->postModel->loadPost();
		header('Content-type: text/plain'); 
		  // set json non IE
		 header('Content-type: application/json');
                 foreach ($data as $obj){
                     $children = $this->postModel->getPostChildren($obj->id);
                     $obj->children = $children;
                 }
		 echo json_encode($data);
	}

	public function loadMore($limit){
		$data=$this->postModel->loadMore($limit);
		header('Content-type: text/plain'); 
		  // set json non IE
		 header('Content-type: application/json'); 
		 echo json_encode($data);

	}
        
        public function loadCurrentPost($postid){
            $data = $this->postModel->loadCurrentPost($postid);
            $children = $this->postModel->getPostChildren($data->id);
            $data->children = $children;	 
            echo json_encode($data);
        }

        function neededAmount($postid){
            $ramnt = floatval($this->postModel->receivedAmount($postid));
            $namnt = floatval($this->postModel->neededAmount($postid));
            echo $namnt - $ramnt;
        }

        public function loadPostUserCount($id){
		echo json_encode($this->postModel->loadPostUserCount($id));
	}

        public function sharePost($userid,$postid){
		$this->postModel->sharePost($userid,$postid);
	}


	public function loadChildPost(){

		$data=$this->postModel->loadChildPost();
		header('Content-type: text/plain'); 
		  // set json non IE
		 header('Content-type: application/json'); 
		 echo json_encode($data);

	}
}