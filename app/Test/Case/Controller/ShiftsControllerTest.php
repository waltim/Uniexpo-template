<?php
App::uses('TiposController', 'Controller');


class ShiftsControllerTest extends ControllerTestCase
{


    public $fixtures = array(
        'app.shift'
    );

    public function testIndex()
    {
        $results = $this->testAction('Shifts/index/');
        debug($results);
    }


    public function testAdd()
    {
        $data = array(
            'Shift' => array(
                'descricao' => 'Integral'
            )
        );
        $results = $this->testAction('Shifts/add', array('data' => $data, 'method' => 'post'));
        debug($results);
    }


    public function testEdit()
    {
        $results1 = $this->testAction('Shifts/edit/1');
        debug($results1);

        $data = array(
            'Shift' => array(
                'id' => 1,
                'descricao' => 'Diurno'
            )
        );
        $results2 = $this->testAction('Shifts/edit', array('data' => $data, 'method' => 'post'));
        debug($results2);
    }


    public function testDelete()
    {
        $results = $this->testAction('Shifts/delete/1');
        debug($results);
    }

}
