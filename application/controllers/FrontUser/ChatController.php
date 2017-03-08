<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ChatController extends Frontend_Controller {

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

	public function loadAll(){
		header('Content-type: text/plain'); 
		  // set json non IE
		  header('Content-type: application/json'); 
		$data=$this->chatModel->loadAll();
		echo json_encode($data);
	}


	//update reading status
	public function updateRead(){
		$this->chatModel->updateRead();
	}
}
