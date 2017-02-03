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

	



}