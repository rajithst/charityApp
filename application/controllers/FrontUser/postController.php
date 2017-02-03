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



}