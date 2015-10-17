<?php

class SocialFixture extends CakeTestFixture {


	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'social_type_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'Link' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 320, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'created' => 'datetime',
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB'),
	);


	public $records = array(
		array(
			'id' => 1,
            'user_id' => 1,
			'social_type_id' => 1,
			'Link' =>'https://www.facebook.com/',
			'created' => '2015-08-14 04:53:03'
		),
        array(
            'id' => 2,
            'user_id' => 1,
            'social_type_id' => 2,
            'Link' =>'https://www.instagram.com/',
            'created' => '2015-08-14 04:53:03'
        )


	);

}
