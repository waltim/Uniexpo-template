<?php

class ProjectTypeFixture extends CakeTestFixture
{

    public $fields = array(
        'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
        'Nome' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 60, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'Sigla' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 10, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'indexes' => array(
            'PRIMARY' => array('column' => 'id', 'unique' => 1)
        ),
        'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
    );

    public $records = array(
        array(
            'id' => 1,
            'Nome' => 'Projeto Integrador',
            'Sigla' => 'PI'
        ),
        array(
            'id' => 2,
            'Nome' => 'Tese de Conclusão de Curso',
            'Sigla' => 'TCC'
        )
    );

}
