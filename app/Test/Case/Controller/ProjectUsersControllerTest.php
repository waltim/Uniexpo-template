<?php
App::uses('TiposController', 'Controller');


class ProjectUsersControllerTest extends ControllerTestCase
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



    public function testAprovar()
    {
        $results1 = $this->testAction('ProjectUsers/aprovar/1');
        debug($results1);

        $data = array(
            'ProjectUser' => array(
                'project_id' => 1,
                'user_id' => 1,
                'Aceito' => 'N',
                'created' => '2015-08-14 04:53:03'
            )
        );
        $results2 = $this->testAction('ProjectUsers/aprovar', array('data' => $data, 'method' => 'post'));
        debug($results2);
    }
    public function testDesaprovar()
    {
        $results1 = $this->testAction('ProjectUsers/desaprovar/1');
        debug($results1);

        $data = array(
            'ProjectUser' => array(
                'project_id' => 1,
                'user_id' => 1,
                'Aceito' => 'S',
                'created' => '2015-08-14 04:53:03'
            )
        );
        $results2 = $this->testAction('ProjectUsers/desaprovar', array('data' => $data, 'method' => 'post'));
        debug($results2);
    }

    public function testParticiparDoProjeto()
    {
        $data = array(
            'ProjectUser' => array(
                'project_id' => 1,
                'user_id' => 1,
                'Aceito' => 'S',
                'created' => '2015-08-14 04:53:03'
            )
        );
        $results = $this->testAction('ProjectUsers/ParticiparDoProjeto', array('data' => $data, 'method' => 'post'));
        debug($results);
    }


    public function testSairDoProjeto()
    {
        $results = $this->testAction('ProjectUsers/SairDoProjeto/1');
        debug($results);
    }

}
