<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EventController extends Frontend_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('eventModel');
		$this->load->model('User_d');

	}


	public function saveEvent(){
		
	
		$data=$this->eventModel->saveEvent();
		if($data){
			$id=$data[0]->id;
			redirect('events/'.$id);
		}
	
	}


	public function loadEvent($id){
		$data['users']=$this->User_d->getUsers();
		$data['events']=$this->eventModel->getEventData($id);		
		//$data['name']=$name;
		$this->load->template('FrontUser/events',$data);

	}

	public function loadAll(){
		$data['users']=$this->User_d->getUsers();
		$data['events']=$this->eventModel->getAll();
		$this->load->template('FrontUser/allEvents.php',$data);
	}


}