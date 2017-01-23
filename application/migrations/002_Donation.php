<?php


class Migration_Donation extends CI_Migration {

	public function up() {
		
		$this->dbforge->add_field(array(

       'id'=>array(
        'type'=> 'INT',
        'constraint' => 11,
        'auto_increment'=> TRUE
      ),
      'donorID'=>array(
        'type'=> 'INT',
        'constraint' => 11
      ),

      'recipientID'=>array(
        'type'=> 'INT',
        'constraint' => 11
      ),
      'description'=>array(
        'type'=> 'TEXT'
      ),
				
	  'date'=>array(
		'type'=> 'DATE'
	  ),
				

      'amount'=>array(
        'type'=> 'DOUBLE'
      ),
        ));
        $this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('Donations');
	}

	public function down() {
		//$this->dbforge->drop_table('Donations');
	}
}
