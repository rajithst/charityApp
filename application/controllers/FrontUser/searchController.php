<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class searchController extends Frontend_Controller {


	public function __construct(){
		parent::__construct();
		
	}


	public function searchProf(){
		$this->load->model('profileModel');
		$data=$this->profileModel->searchProf();
		header('Content-type: text/plain'); 
		 header('Content-type: application/json');
		 echo json_encode($data);

	}




}