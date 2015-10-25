<?php
App::uses('TiposController', 'Controller');


class CoursesControllerTest extends ControllerTestCase
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
        'app.Visitor',
        'app.ProjectUser'
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
