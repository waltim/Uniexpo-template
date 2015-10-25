<?php

class VisitorFixture extends CakeTestFixture {


	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'project_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'nome' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 80, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'foto' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 320, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'faceId' => array('type' => 'integer', 'null' => false, 'default' => null),
		'created' => 'datetime',
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB'),
	);


	public $records = array(
		array(
			'id' => 1,
			'project_id' => '1',
			'nome' => 'Walter Lucas',
			'faceId' => 100001800895118,
			'foto' =>'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-xpf1/v/t1.0-1/p160x160/12009750_903807406355947_6699701685095144382_n.jpg?oh=7a3814e13d35857f24a01c4effb032fe&oe=56B6FC9A&__gda__=1455058556_c789c0d9702bbebc61246b9808bd3d1a',
			'created' => '2015-08-14 04:53:03'
		),
        array(
            'id' => 2,
			'project_id' => '1',
			'nome' => 'Walter Lucas',
			'faceId' => 100001800895118,
			'foto' =>'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-xpf1/v/t1.0-1/p160x160/12009750_903807406355947_6699701685095144382_n.jpg?oh=7a3814e13d35857f24a01c4effb032fe&oe=56B6FC9A&__gda__=1455058556_c789c0d9702bbebc61246b9808bd3d1a',
			'created' => '2015-08-14 04:53:03'
        )

	);

}
