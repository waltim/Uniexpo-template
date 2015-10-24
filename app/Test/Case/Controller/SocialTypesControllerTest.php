<?php
App::uses('TiposController', 'Controller');


class SocialTypesControllerTest extends ControllerTestCase
{


    public $fixtures = array(
        'app.semester',
        'app.course',
        'app.shift',
        'app.User',
        'app.UserType',
        'app.Resume',
        'app.UserImage',
        'app.Project',
        'app.SkillUser',
        'app.Skill',
        'app.Social',
        'app.SocialType',
        'app.Archive',
        'app.Movie',
        'app.theme',
        'app.ProjectImage',
        'app.ProjectType',
        'app.ProjectUser'
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
