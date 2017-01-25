
<?php

class Migration_events extends CI_Migration {

	public function up() {
		
		$this->dbforge->add_field(array(

				
      'id'=>array(
        'type'=> 'INT',
        'auto_increment'=> TRUE
      ),

      'name'=>array(
        'type'=> 'VARCHAR',
        'constraint'=> 150
      ),

      'description'=>array(
        'type'=> 'VARCHAR',
        'constraint'=> 150
      ),
				
	  'location'=>array(
		'type'=> 'VARCHAR',
		'constraint'=> 150
	  ),
				

      'children'=>array(
        'type'=> 'VARCHAR',
        'constraint'=> 40
      ),
      'created_at'=>array(
        'type'=> 'TIMESTAMP',
       
      ),

      'hosted_by'=>array(
        'type'=>'VARCHAR',
        'constraint'=>40
        )
    
                     
				

		));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('events');
	}

	public function down() {
		$this->dbforge->drop_table('events');
	}
}
