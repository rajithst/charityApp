<?php
class eventModel extends MY_Model {
	
	
	function __construct() {
		parent::__construct();
		
	}


	function saveEvent(){

		$event_data = array(
		
				'name'=>$this->input->post('eventName'),
				'description'=> $this->input->post('description'),
				'location'=> $this->input->post('eventLocation'),
				'children'=> $this->input->post('children'),
				'hosted_by'=>$this->session->userdata('username')
				
                               
				
		);
		
		$res = $this->db->insert('events', $event_data);
		if ($res) {
			$query=$id=$this->db->query("SELECT MAX(id) as id FROM events");
			return $query->result();

		}
	}


	//get event data by event name
	function getEventData($id){
		$query=$this->db->query("SELECT * FROM events where id='".$id."'");
		return $query->result();

	}


	//get all events
	function getAll(){
		$query=$this->db->query("SELECT * FROM events");
		return $query->result();

	}

}