<?php
/**
 * Created by PhpStorm.
 * User: Walterlmm
 * Date: 02/10/2015
 * Time: 21:35
 */

class ResumeFixture extends CakeTestFixture{

    public $fields = array(
        'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
        'user_id' => array('type' => 'integer', 'null' => false, 'default' => null),
        'filesize' => array('type' => 'integer', 'null' => false, 'default' => null),
        'filename' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 255, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'mimetype' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 255, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'dir' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 255, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'Aceito' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 1, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'created' => 'datetime',
        'modified' => 'datetime',
        'indexes' => array(
            'PRIMARY' => array('column' => 'id', 'unique' => 1)
        ),
        'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
    );

    public $records = array(
        array(
            'id' => 1,
            'user_id' => 1,
            'filesize' => 32165,
            'filename' => 'curriculum_vitae-0.pdf',
            'mimetype' => 'application/pdf',
            'dir' => 'files\uploads',
            'Aceito' => 'N',
            'created' => '2015-08-14 04:53:03',
            'modified' => '2015-08-14 04:53:03'
        ),
        array(
            'id' => 2,
            'user_id' => 2,
            'filesize' => 32165,
            'filename' => 'curriculum.pdf',
            'mimetype' => 'application/pdf',
            'dir' => 'files\uploads',
            'Aceito' => 'N',
            'created' => '2015-08-14 04:53:03',
            'modified' => '2015-08-14 04:53:03'
        )
    );

} 