<?php


class Migration_Follow extends CI_Migration {

	public function up() {
		
		$this->dbforge->add_field(array(

				
        'id'=>array(
        'type'=> 'INT',
        'constraint' => 11,
        'auto_increment'=> TRUE
      ),
      'followingID'=>array(
        'type'=> 'INT',
        'constraint' => 11,
      ),
      
      'followerID'=>array(
        'type'=> 'INT',
        'constraint' => 11,
      ),
        ));
        $this->dbforge->add_key('id', TRUE);
	$this->dbforge->create_table('Follow');
	}

	public function down() {
		$this->dbforge->drop_table('Follow');
	}
}
