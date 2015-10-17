<?php
App::uses('TiposController', 'Controller');


class user_typesControllerTest extends ControllerTestCase
{


    public $fixtures = array(
        'app.user_type',
        'app.user',
        'app.course',
        'app.semester',
        'app.shift'
    );

    public function testIndex()
    {
        $results = $this->testAction('Usertypes/index/');
        debug($results);
    }


    public function testAdd()
    {
        $data = array(
            'user_types' => array(
                'Descricao' => 'Aluno'
            )
        );
        $results = $this->testAction('Usertypes/add', array('data' => $data, 'method' => 'post'));
        debug($results);
    }


    public function testEdit()
    {
        $results1 = $this->testAction('Usertypes/edit/1');
        debug($results1);

        $data = array(
            'user_types' => array(
                'id' => 1,
                'descricao' => 'Admin'
            )
        );
        $results2 = $this->testAction('Usertypes/edit', array('data' => $data, 'method' => 'post'));
        debug($results2);
    }


    public function testDelete()
    {
        $results = $this->testAction('Usertypes/delete/1');
        debug($results);
    }

}
