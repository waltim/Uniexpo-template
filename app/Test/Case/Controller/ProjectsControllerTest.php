<?php
App::uses('TiposController', 'Controller');


class ProjectsControllerTest extends ControllerTestCase
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
        $results1 = $this->testAction('Projects/aprovar/1');
        debug($results1);

        $data = array(
            'Project' => array(
                'id' => 1,
                'Aceito' => 'N',
            )
        );
        $results2 = $this->testAction('Projects/aprovar', array('data' => $data, 'method' => 'post'));
        debug($results2);
    }
    public function testDesaprovar()
    {
        $results1 = $this->testAction('Projects/desaprovar/1');
        debug($results1);

        $data = array(
            'Project' => array(
                'id' => 1,
                'Aceito' => 'S',
            )
        );
        $results2 = $this->testAction('Projects/desaprovar', array('data' => $data, 'method' => 'post'));
        debug($results2);
    }


    public function testIndex()
    {
        $results = $this->testAction('Projects/index/');
        debug($results);
    }

    public function testAdd()
    {
        $data = array(
            'Project' => array(
                'course_id' => 1,
                'semester_id' => 1,
                'user_id' => 1,
                'project_type_id' => 1,
                'theme_id' => 1,
                'Votos' => 0,
                'Titulo' => 'Projeto piloto para teste',
                'Descricao' => 'Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos,
             e vem sendo utilizado desde o século XVI, quando um impressor desconhecido pegou uma bandeja de tipos e os
             embaralhou para fazer um livro de modelos de tipos. Lorem Ipsum sobreviveu não só a cinco séculos, como também
             ao salto para a editoração eletrônica, permanecendo essencialmente inalterado. Se popularizou na década de 60,
             quando a Letraset lançou decalques contendo passagens de Lorem Ipsum, e mais recentemente quando passou a ser
              integrado a softwares de editoração eletrônica como Aldus PageMaker.',
                'Aceito' => 'S',
                'created' => '2015-08-14 04:53:03',
                'modified' => '2015-08-14 04:53:03'
            )
        );
        $results = $this->testAction('Projects/add', array('data' => $data, 'method' => 'post'));
        debug($results);
    }

    public function testEdit()
    {
        $results1 = $this->testAction('Projects/edit/1');
        debug($results1);

        $data = array(
            'Project' => array(
                'id' => 1,
                'course_id' => 2,
                'project_type_id' => 2,
                'semester_id' => 2,
                'user_id' => 2,
                'theme_id' => 2,
                'Votos' => 0,
                'Titulo' => 'Projeto de apoio aos alunos',
                'Descricao' => 'Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos,
             e vem sendo utilizado desde o século XVI, quando um impressor desconhecido pegou uma bandeja de tipos e os
             embaralhou para fazer um livro de modelos de tipos. Lorem Ipsum sobreviveu não só a cinco séculos, como também
             ao salto para a editoração eletrônica, permanecendo essencialmente inalterado. Se popularizou na década de 60,
             quando a Letraset lançou decalques contendo passagens de Lorem Ipsum, e mais recentemente quando passou a ser
              integrado a softwares de editoração eletrônica como Aldus PageMaker.',
                'Aceito' => 'S',
                'created' => '2015-08-14 04:53:03',
                'modified' => '2015-08-14 04:53:03'
            )
        );
        $results2 = $this->testAction('Projects/edit', array('data' => $data, 'method' => 'post'));
        debug($results2);
    }

    public function testDelete()
    {
        $results = $this->testAction('Projects/delete/1');
        debug($results);
    }

}
