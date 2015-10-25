<?php
App::uses('TiposController', 'Controller');


class MoviesControllerTest extends ControllerTestCase
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
        $results1 = $this->testAction('Movies/aprovar/1');
        debug($results1);

        $data = array(
            'Movie' => array(
                'id' => 1,
                'Aceito' => 'N',
            )
        );
        $results2 = $this->testAction('Movies/aprovar', array('data' => $data, 'method' => 'post'));
        debug($results2);
    }
    public function testDesaprovar()
    {
        $results1 = $this->testAction('Movies/desaprovar/1');
        debug($results1);

        $data = array(
            'Movie' => array(
                'id' => 1,
                'Aceito' => 'S',
            )
        );
        $results2 = $this->testAction('Movies/desaprovar', array('data' => $data, 'method' => 'post'));
        debug($results2);
    }

    public function testIndex()
    {
        $results = $this->testAction('Movies/index/');
        debug($results);
    }


    public function testAdd($idProjeto = 3, $idUsuario = 1)
    {
        $data = array(
            'Movie' => array(
                'project_id' => 1,
                'Aceito' => 'N',
                'Link' =>'https://www.youtube.com/watch?v=-AawUSC6hGY',
                'created' => '2015-08-14 04:53:03'
            )
        );
        $results = $this->testAction('Movies/add/'.$idProjeto.'/'.$idUsuario, array('data' => $data, 'method' => 'post'));
        debug($results);
    }

    public function testEdit()
    {
        $results1 = $this->testAction('Movies/edit/1');
        debug($results1);

        $data = array(
            'Movie' => array(
                'id' => 1,
                'project_id' => 1,
                'Aceito' => 'N',
                'Link' =>'https://www.youtube.com/watch?v=-wqeUSC6hGY',
                'created' => '2015-08-14 04:53:03'
            )
        );
        $results2 = $this->testAction('Movies/edit', array('data' => $data, 'method' => 'post'));
        debug($results2);
    }

    public function testDelete()
    {
        $results = $this->testAction('Movies/delete/1');
        debug($results);
    }

}
