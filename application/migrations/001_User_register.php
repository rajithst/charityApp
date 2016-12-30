
<?php

class Migration_User_register extends CI_Migration {

	public function up() {
		
		$this->dbforge->add_field(array(

				
      'id'=>array(
        'type'=> 'INT',
        'constraint' => 11,
        'auto_increment'=> TRUE
      ),

      'name'=>array(
        'type'=> 'VARCHAR',
        'constraint'=> 150
      ),
				
	  'username'=>array(
		'type'=> 'VARCHAR',
		'constraint'=> 150
	  ),
				

      'password'=>array(
        'type'=> 'VARCHAR',
        'constraint'=> 40
      ),

      'email'=>array(
        'type'=> 'VARCHAR',
        'constraint'=> 40
      ),
				
				
	  'gender'=>array(
		'type'=> 'VARCHAR',
		'constraint'=> 40
	   ),
				

		));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('Users');
	}

	public function down() {
		$this->dbforge->drop_table('Users');
	}
}
