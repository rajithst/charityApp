<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class eventController extends Frontend_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('eventModel');

	}


	public function saveEvent(){
		
	
		$data=$this->eventModel->saveEvent();
		if($data){
			$id=$data[0]->id;
			redirect('events/'.$id);
		}
	
	}


	public function loadEvent($id){
		$data['events']=$this->eventModel->getEventData($id);		
		//$data['name']=$name;
		$this->load->template('FrontUser/events',$data);

	}


}