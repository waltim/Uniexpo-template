<?php

class ProjectUserFixture extends CakeTestFixture {


	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'project_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'Aceito' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 1, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'created' => 'datetime',
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB'),
	);


	public $records = array(
		array(
			'id' => 1,
            'project_id' => 1,
            'user_id' => 1,
            'Aceito' => 'N',
			'created' => '2015-08-14 04:53:03'
		),
        array(
            'id' => 2,
            'project_id' => 1,
            'user_id' => 1,
            'Aceito' => 'N',
            'created' => '2015-08-14 04:53:03'
        )
	);

}
