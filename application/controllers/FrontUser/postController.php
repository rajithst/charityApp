<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class postController extends Frontend_Controller {

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
		 echo json_encode($data);
	}

	public function loadMore(){
		$data=$this->postModel->loadMore();
		header('Content-type: text/plain'); 
		  // set json non IE
		 header('Content-type: application/json'); 
		 echo json_encode($data);

	}
        
        function neededAmount($postid){
            $ramnt = floatval($this->postModel->receivedAmount($postid));
            $namnt = floatval($this->postModel->neededAmount($postid));
            echo $namnt - $ramnt;
        }

}