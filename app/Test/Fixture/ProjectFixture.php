<?php
/**
 * Created by PhpStorm.
 * User: Walterlmm
 * Date: 02/10/2015
 * Time: 21:35
 */

class ProjectFixture extends CakeTestFixture{

    public $fields = array(
        'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
        'course_id' => array('type' => 'integer', 'null' => false, 'default' => null),
        'semester_id' => array('type' => 'integer', 'null' => false, 'default' => null),
        'user_id' => array('type' => 'integer', 'null' => false, 'default' => null),
        'project_type_id' => array('type' => 'integer', 'null' => false, 'default' => null),
        'theme_id' => array('type' => 'integer', 'null' => false, 'default' => null),
        'Votos' => array('type' => 'integer', 'null' => false, 'default' => null),
        'Titulo' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 120, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'Aceito' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 1, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'Descricao' => array('type' => 'string', 'null' => false, 'default' => null),
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
            'user_id' => 1,
            'theme_id' => 1,
            'project_type_id' => 1,
            'Votos' => 0,
            'Titulo' => 'Projeto piloto para teste',
            'Descricao' => 'Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos,
             e vem sendo utilizado desde o século XVI, quando um impressor desconhecido pegou uma bandeja de tipos e os
             embaralhou para fazer um livro de modelos de tipos. Lorem Ipsum sobreviveu não só a cinco séculos, como também
             ao salto para a editoração eletrônica, permanecendo essencialmente inalterado. Se popularizou na década de 60,
             quando a Letraset lançou decalques contendo passagens de Lorem Ipsum, e mais recentemente quando passou a ser
              integrado a softwares de editoração eletrônica como Aldus PageMaker.',
            'Aceito' => 'S',
            'created' => '2015-08-14 04:53:03',
            'modified' => '2015-08-14 04:53:03'
        ),
        array(
            'id' => 2,
            'course_id' => 1,
            'semester_id' => 1,
            'project_type_id' => 2,
            'user_id' => 2,
            'theme_id' => 1,
            'Votos' => 0,
            'Titulo' => 'Projeto de teste',
            'Descricao' => 'Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos,
             e vem sendo utilizado desde o século XVI, quando um impressor desconhecido pegou uma bandeja de tipos e os
             embaralhou para fazer um livro de modelos de tipos. Lorem Ipsum sobreviveu não só a cinco séculos, como também
             ao salto para a editoração eletrônica, permanecendo essencialmente inalterado. Se popularizou na década de 60,
             quando a Letraset lançou decalques contendo passagens de Lorem Ipsum, e mais recentemente quando passou a ser
              integrado a softwares de editoração eletrônica como Aldus PageMaker.',
            'Aceito' => 'S',
            'created' => '2015-09-14 04:53:03',
            'modified' => '2015-09-14 04:53:03'
        )
    );

} 