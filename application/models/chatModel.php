<?php
class chatModel extends MY_Model {
	
	
	
	function __construct() {
		parent::__construct();
	}
	
	function messageSave() {
		
		
		$message_data = array(
		
				'message'=>$this->input->post('message'),
				'sender'=> $this->session->userdata('username'),
				'receiver'=> preg_replace('/\s+/', '', $this->input->post('receiver'))
				
		);
		
		$res = $this->db->insert('chat', $message_data);
		if ($res) {
			return true;
		}
		
	}


	function loadMessage(){
		$friend=$this->input->post('receiver');
		$friend=preg_replace('/\s+/', '', $friend);
		$owner=$this->session->userdata('username');

		//echo $friend;

		// $friend='chalith';
		// $owner='dulaj';

		$query=$this->db->query("SELECT message,sender from chat where (sender='".$owner."'  && receiver='".$friend."') || (sender='".$friend."'  && receiver='".$owner."')");

		
		return $query->result();




	}


	function loadAll(){
		$owner=$this->session->userdata('username');
		$query=$this->db->query("SELECT  sender,COUNT(message) as numofmessages from chat where receiver='".$owner."' && is_read=0 GROUP BY sender");
		return $query->result();

	}


	function updateRead(){
		$sender=$this->input->post('name');
		$sender=preg_replace('/\s+/', '', $sender);
		$receiver=$this->session->userdata('username');
		$query=$this->db->query("UPDATE chat set is_read='1' WHERE sender='".$sender."' && receiver='".$receiver."'");
		return true;
	}




}
