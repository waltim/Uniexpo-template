<?php

class MovieFixture extends CakeTestFixture {


	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'project_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'Link' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 320, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
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
			'Aceito' => 'N',
			'Link' =>'https://www.youtube.com/watch?v=-AawUSC6hGY',
			'created' => '2015-08-14 04:53:03'
		),
        array(
            'id' => 2,
            'project_id' => 2,
            'Aceito' => 'N',
            'Link' =>'https://www.youtube.com/watch?v=-AawUSYT6hGY',
            'created' => '2015-08-14 04:53:03'
        )

	);

}
