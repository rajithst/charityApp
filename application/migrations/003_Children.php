<?php


class Migration_Children extends CI_Migration {

	public function up() {
		
		$this->dbforge->add_field(array(

				
        'id'=>array(
        'type'=> 'INT',
        'constraint' => 11,
        'auto_increment'=> TRUE
      ),

      'donorID'=>array(
        'type'=> 'INT',
        'constraint' => 11,
      ),
      'name'=>array(
        'type'=> 'VARCHAR',
        'constraint'=> 150
      ),
        'birthDate'=>array(
              'type'=> 'DATE',
        ),
        'registeredDate'=>array(
              'type'=> 'DATE',
        ),
        ));
        $this->dbforge->add_key('id', TRUE);
	$this->dbforge->create_table('Children');
	}

	public function down() {
		$this->dbforge->drop_table('Children');
	}
}
