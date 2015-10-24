<?php
App::uses('TiposController', 'Controller');


class user_typesControllerTest extends ControllerTestCase
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
