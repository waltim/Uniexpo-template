<?php
App::uses('TiposController', 'Controller');


class SocialTypesControllerTest extends ControllerTestCase
{


    public $fixtures = array(
        'app.social_type'
    );

    public function testIndex()
    {
        $results = $this->testAction('SocialTypes/index/');
        debug($results);
    }


    public function testAdd()
    {
        $data = array(
            'SocialType' => array(
                'Descricao' => 'Facebook'
            )
        );
        $results = $this->testAction('SocialTypes/add', array('data' => $data, 'method' => 'post'));
        debug($results);
    }


    public function testEdit()
    {
        $results1 = $this->testAction('SocialTypes/edit/1');
        debug($results1);

        $data = array(
            'SocialType' => array(
                'id' => 1,
                'Descricao' => 'Instagram'
            )
        );
        $results2 = $this->testAction('SocialTypes/edit', array('data' => $data, 'method' => 'post'));
        debug($results2);
    }


    public function testDelete()
    {
        $results = $this->testAction('SocialTypes/delete/1');
        debug($results);
    }

}
