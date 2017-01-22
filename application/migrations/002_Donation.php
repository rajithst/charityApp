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
<<<<<<< HEAD
=======

        $this->dbforge->add_key('id', TRUE);
>>>>>>> 0a1192d90615629523b6e1c30f8a66e4ae1dde51
		$this->dbforge->create_table('Donations');
	}

	public function down() {
		$this->dbforge->drop_table('Donations');
	}
}
