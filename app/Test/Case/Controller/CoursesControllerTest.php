<?php
App::uses('TiposController', 'Controller');


class CoursesControllerTest extends ControllerTestCase
{


    public $fixtures = array(
        'app.course',
        'app.shift'
    );

    public function testIndex()
    {
        $results = $this->testAction('Courses/index/');
        debug($results);
    }


    public function testAdd()
    {
        $data = array(
            'Course' => array(
                'shift_id' => 1,
                'Nome' => 'Engenharia civil'
            )
        );
        $results = $this->testAction('Courses/add', array('data' => $data, 'method' => 'post'));
        debug($results);
    }


    public function testEdit()
    {
        $results1 = $this->testAction('Courses/edit/1');
        debug($results1);

        $data = array(
            'Course' => array(
                'id' => 1,
                'shift_id' => 2,
                'Nome' => 'Sistemas'
            )
        );
        $results2 = $this->testAction('Courses/edit', array('data' => $data, 'method' => 'post'));
        debug($results2);
    }


    public function testDelete()
    {
        $results = $this->testAction('Courses/delete/1');
        debug($results);
    }

}
