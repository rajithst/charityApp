<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class chatController extends Frontend_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('chatModel');

	}


	public function saveMessage(){

		$this->chatModel->messageSave();
		
	}


	public function loadMessage(){
		$data=$this->chatModel->loadMessage();
		 header('Content-type: text/plain'); 
		  // set json non IE
		  header('Content-type: application/json'); 

		  echo json_encode($data);


	}
}
