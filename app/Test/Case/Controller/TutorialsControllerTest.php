<?php
App::uses('TiposController', 'Controller');


class TutorialsControllerTest extends ControllerTestCase
{


    public $fixtures = array(
        'app.Tutorial',
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
        'app.Visitor',
        'app.ProjectUser'
    );


    public function testIndex()
    {
        $results = $this->testAction('Tutorials/index/');
        debug($results);
    }


    public function testAdd()
    {
        $data = array(
            'Tutorial' => array(
                'Link' =>'https://www.youtube.com/watch?v=-AawUSC6hGY',
                'created' => '2015-08-14 04:53:03'
            )
        );
        $results = $this->testAction('Tutorials/add', array('data' => $data, 'method' => 'post'));
        debug($results);
    }

    public function testEdit()
    {
        $results1 = $this->testAction('Tutorials/edit/1');
        debug($results1);

        $data = array(
            'Tutorial' => array(
                'id' => 1,
                'Link' =>'https://www.youtube.com/watch?v=-ShyI7C6hGY',
                'created' => '2015-09-14 04:53:03'
            )
        );
        $results2 = $this->testAction('Tutorials/edit', array('data' => $data, 'method' => 'post'));
        debug($results2);
    }

    public function testDelete()
    {
        $results = $this->testAction('Tutorials/delete/1');
        debug($results);
    }

}
