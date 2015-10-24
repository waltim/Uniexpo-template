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
        'app.ProjectUser'
    );

    public function testIndex()
    {
        $results = $this->testAction('Semesters/index/');
        debug($results);
    }


    public function testAdd()
    {
        $data = array(
            'Semester' => array(
                'course_id' => 1,
                'descricao' => '1º semestre'
            )
        );
        $results = $this->testAction('Semesters/add', array('data' => $data, 'method' => 'post'));
        debug($results);
    }


    public function testEdit()
    {
        $results1 = $this->testAction('Semesters/edit/1');
        debug($results1);

        $data = array(
            'Semester' => array(
                'id' => 1,
                'course_id' => 1,
                'descricao' => '3º semestre'
            )
        );
        $results2 = $this->testAction('Semesters/edit', array('data' => $data, 'method' => 'post'));
        debug($results2);
    }


    public function testDelete()
    {
        $results = $this->testAction('Semesters/delete/1');
        debug($results);
    }

}
