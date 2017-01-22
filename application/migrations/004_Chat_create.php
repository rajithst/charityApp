
<?php

class Migration_Chat_create extends CI_Migration {

	public function up() {
		
		$this->dbforge->add_field(array(

				
      'id'=>array(
        'type'=> 'INT',
        'constraint' => 11,
        'auto_increment'=> TRUE
      ),

				
	  'message'=>array(
		'type'=> 'VARCHAR',
		'constraint'=> 250
	  ),
				

      'sender'=>array(
        'type'=> 'VARCHAR',
        'constraint'=> 40
      ),

      'receiver'=>array(
        'type'=> 'VARCHAR',
        'constraint'=> 40
      ),
				
				
	  'created_at'=>array(
		'type'=> 'TIMESTAMP'
	
	   ),
				

		));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('Chat');
	}

	public function down() {
		$this->dbforge->drop_table('Chat');
	}
}
