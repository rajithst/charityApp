<?php


class Migration_Career extends CI_Migration {

	public function up() {
		
		$this->dbforge->add_field(array(

				
        'id'=>array(
        'type'=> 'INT',
        'constraint' => 11,
        'auto_increment'=> TRUE
      ),
      'userID'=>array(
        'type'=> 'INT',
        'constraint' => 11,
      ),
      
      'career'=>array(
        'type'=> 'VARCHAR',
        'constraint' => 100,
      ),
        ));
        $this->dbforge->add_key('id', TRUE);
	$this->dbforge->create_table('Career');
	}

	public function down() {
		$this->dbforge->drop_table('Career');
	}
}
