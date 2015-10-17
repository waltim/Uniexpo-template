<?php

class SkillUserFixture extends CakeTestFixture {


	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'skill_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'created' => 'datetime',
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB'),
	);


	public $records = array(
		array(
			'id' => 1,
            'skill_id' => 1,
            'user_id' => 1,
			'created' => '2015-08-14 04:53:03'
		),
        array(
            'id' => 2,
            'skill_id' => 1,
            'user_id' => 1,
            'created' => '2015-08-14 04:53:03'
        )
	);

}
