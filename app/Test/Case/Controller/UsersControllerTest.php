<?php
App::uses('TiposController', 'Controller');


class UsersControllerTest extends ControllerTestCase
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
        $results = $this->testAction('Users/index/');
        debug($results);
    }

    public function testPerfil()
    {
        $results = $this->testAction('Users/perfil/');
        debug($results);
    }


    public function testAdd()
    {
        $data = array(
            'User' => array(
                'course_id' => 1,
                'semester_id' => 1,
                'user_type_id' => 1,
                'Matricula' => "123456789",
                'Email' => 'Aluno1@unipam.com',
                'username' => 'Capataz Carreiro',
                'password' => 'rw65er156wer651wer556wq1er',
                'Sexo' => 'Masculino',
                'Aceito' => 'S',
                'Telefone' => "35741596",
                'created' => '2015-08-14 04:53:03',
                'modified' => '2015-08-14 04:53:03'
            )
        );
        $results = $this->testAction('Users/add', array('data' => $data, 'method' => 'post'));
        debug($results);
    }

    public function testAprovar()
    {
        $results1 = $this->testAction('Users/aprovar/1');
        debug($results1);

        $data = array(
            'User' => array(
                'id' => 1,
                'Aceito' => 'N',
            )
        );
        $results2 = $this->testAction('Users/aprovar', array('data' => $data, 'method' => 'post'));
        debug($results2);
    }
    public function testDesaprovar()
    {
        $results1 = $this->testAction('Users/desaprovar/1');
        debug($results1);

        $data = array(
            'User' => array(
                'id' => 1,
                'Aceito' => 'S',
            )
        );
        $results2 = $this->testAction('Users/desaprovar', array('data' => $data, 'method' => 'post'));
        debug($results2);
    }


    public function testEdit()
    {
        $results1 = $this->testAction('Users/edit/1');
        debug($results1);

        $data = array(
            'User' => array(
                'id' => 1,
                'course_id' => 2,
                'semester_id' => 2,
                'user_type_id' => 2,
                'Matricula' => "123456789",
                'Email' => 'Aluno1@unipam.com',
                'username' => 'Tião Carreiro',
                'password' => 'rw65er156wer651wer556wq1er',
                'Sexo' => 'Masculino',
                'Aceito' => 'S',
                'Telefone' => "35741596",
                'created' => '2015-09-14 04:53:03',
                'modified' => '2015-09-14 04:53:03'
            )
        );
        $results2 = $this->testAction('Users/edit', array('data' => $data, 'method' => 'post'));
        debug($results2);
    }


}
