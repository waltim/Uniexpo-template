<?php

class ShiftFixture extends CakeTestFixture {


	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'descricao' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 10, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);


	public $records = array(
		array(
			'id' => 1,
			'descricao' => 'Noturno'
		),
        array(
            'id' => 2,
            'descricao' => 'Diurno'
        )
	);

}
