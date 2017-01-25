
<?php

class Migration_Adminusers extends CI_Migration {

	public function up() {
		
		$this->dbforge->add_field(array(

				
      'id'=>array(
        'type'=> 'INT',
        'constraint' => 11,
        'auto_increment'=> TRUE
      ),

      'first_name'=>array(
        'type'=> 'VARCHAR',
        'constraint'=> 150
      ),


            'last_name'=>array(
                'type'=> 'VARCHAR',
                'constraint'=> 150
            ),

            'email'=>array(
                'type'=> 'VARCHAR',
                'constraint'=>25
            ),


            'username'=>array(
		'type'=> 'VARCHAR',
		'constraint'=> 150
	  ),
				

      'password'=>array(
        'type'=> 'VARCHAR',
        'constraint'=> 40
      ),



				

		));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('Adminusers');
	}

	public function down() {
		$this->dbforge->drop_table('Adminusers');
	}
}
