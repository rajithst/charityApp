
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
      'lastname'=>array(
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
      'company'=>array(
        'type'=> 'VARCHAR',
        'constraint'=> 50
      ),
      'email'=>array(
        'type'=> 'VARCHAR',
        'constraint'=> 40
      ),
      'mobile'=>array(
        'type'=> 'VARCHAR',
        'constraint'=> 10
      ),
      'address'=>array(
        'type'=> 'TEXT'
      ),
      'postalcode'=>array(
        'type'=> 'VARCHAR',
        'constraint'=> 10
      ),
      'country'=>array(
        'type'=> 'VARCHAR',
        'constraint'=> 50
      ),
      'about'=>array(
        'type'=> 'TEXT'
      ),
				
				
    'gender'=>array(
          'type'=> 'VARCHAR',
          'constraint'=> 40
     ),
      'picture'=>array(
            'type'=> 'VARCHAR',
            'constraint'=> 100
       )
                    
				

		));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('Users');
	}

	public function down() {
		$this->dbforge->drop_table('Users');
	}
}
