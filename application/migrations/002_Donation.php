<?php


class Migration_Donation extends CI_Migration {

	public function up() {
		
		$this->dbforge->add_field(array(

				
      'donorID'=>array(
        'type'=> 'INT',
        'constraint' => 11,
      ),

      'recipientID'=>array(
        'type'=> 'INT',
        'constraint' => 11,
      ),
				
	  'date'=>array(
		'type'=> 'DATE',
	  ),
				

      'amount'=>array(
        'type'=> 'DOUBLE',
      ),
        ));
		$this->dbforge->create_table('Donations');
	}

	public function down() {
		$this->dbforge->drop_table('Donations');
	}
}
