<?php
/**
 * Created by PhpStorm.
 * User: Walterlmm
 * Date: 02/10/2015
 * Time: 21:35
 */

class UserFixture extends CakeTestFixture{

    public $fields = array(
        'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
        'course_id' => array('type' => 'integer', 'null' => false, 'default' => null),
        'semester_id' => array('type' => 'integer', 'null' => false, 'default' => null),
        'user_type_id' => array('type' => 'integer', 'null' => false, 'default' => null),
        'Matricula' => array('type' => 'string', 'null' => false, 'default' => null),
        'Email' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 255, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'username' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 150, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'password' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 120, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'Sexo' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 10, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'Aceito' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 1, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'Telefone' => array('type' => 'string', 'null' => false, 'default' => null),
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
            'course_id' => 1,
            'semester_id' => 1,
            'user_type_id' => 1,
            'Matricula' => "123456789",
            'Email' => 'Aluno1@unipam.com',
            'username' => 'Tião Carreiro',
            'password' => 'rw65er156wer651wer556wq1er',
            'Sexo' => 'Masculino',
            'Aceito' => 'S',
            'Telefone' => "35741596",
            'created' => '2015-08-14 04:53:03',
            'modified' => '2015-08-14 04:53:03'
        ),
        array(
            'id' => 2,
            'course_id' => 1,
            'semester_id' => 1,
            'user_type_id' => 1,
            'Matricula' => "321456789",
            'Email' => 'Aluno2@unipam.com',
            'username' => 'Capataz',
            'password' => 'rw65er156wer651wer556wq1er',
            'Sexo' => 'Masculino',
            'Aceito' => 'S',
            'Telefone' => "36841596",
            'created' => '2015-08-14 04:53:03',
            'modified' => '2015-08-14 04:53:03'
        )
    );

} 