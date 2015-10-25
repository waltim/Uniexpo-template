<?php
/**
 * Created by PhpStorm.
 * User: Walterlmm
 * Date: 02/10/2015
 * Time: 21:35
 */

class BanerFixture extends CakeTestFixture{

    public $fields = array(
        'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
        'filesize' => array('type' => 'integer', 'null' => false, 'default' => null),
        'filename' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 255, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'mimetype' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 255, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'dir' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 255, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'Link' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 320, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'created' => 'datetime',
        'indexes' => array(
            'PRIMARY' => array('column' => 'id', 'unique' => 1)
        ),
        'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
    );

    public $records = array(
        array(
            'id' => 1,
            'filesize' => 215084,
            'filename' => 'A_556.jpg',
            'mimetype' => 'image/jpeg',
            'dir' => 'images\uploads\user_image',
            'Link' => 'https://github.com/waltim/Uniexpo-template',
            'created' => '2015-08-14 04:53:03',
        ),
        array(
            'id' => 2,
            'filesize' => 115084,
            'filename' => 'A_456.jpg',
            'mimetype' => 'image/jpeg',
            'dir' => 'images\uploads\user_image',
            'Link' => 'https://github.com/waltim/Uniexpo-template',
            'created' => '2015-08-14 04:53:03',
        )
    );

} 