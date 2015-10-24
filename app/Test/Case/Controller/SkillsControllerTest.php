<?php
App::uses('TiposController', 'Controller');


class SkillsControllerTest extends ControllerTestCase
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
        $results = $this->testAction('Skills/index/');
        debug($results);
    }


    public function testAdd()
    {
        $data = array(
            'Skill' => array(
                'course_id' => 1,
                'Nome' =>'SQL 2015',
                'created' => '2015-08-14 04:53:03'
            )
        );
        $results = $this->testAction('Skills/add', array('data' => $data, 'method' => 'post'));
        debug($results);
    }


    public function testEdit()
    {
        $results1 = $this->testAction('Skills/edit/1');
        debug($results1);

        $data = array(
            'Skill' => array(
                'id' => 3,
                'course_id' => 1,
                'Nome' =>'SQL',
                'created' => '2015-08-14 04:53:03'
            )
        );
        $results2 = $this->testAction('Skills/edit', array('data' => $data, 'method' => 'post'));
        debug($results2);
    }


    public function testDelete()
    {
        $results = $this->testAction('Skills/delete/1');
        debug($results);
    }

}
