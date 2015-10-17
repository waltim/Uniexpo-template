<?php

class SkillFixture extends CakeTestFixture {


	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'course_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'Nome' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 60, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'created' => 'datetime',
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB'),
	);


	public $records = array(
		array(
			'id' => 1,
            'course_id' => 1,
			'Nome' =>'PHP',
			'created' => '2015-08-14 04:53:03'
		),
        array(
			'id' => 2,
			'course_id' => 1,
			'Nome' =>'SQL',
			'created' => '2015-08-14 04:53:03'
        )


	);

}
