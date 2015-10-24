<?php
App::uses('TiposController', 'Controller');


class ThemesControllerTest extends ControllerTestCase
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
        $results = $this->testAction('Themes/index/');
        debug($results);
    }


    public function testAdd()
    {
        $data = array(
            'Theme' => array(
                'Descricao' => 'Saúde'
            )
        );
        $results = $this->testAction('Themes/add', array('data' => $data, 'method' => 'post'));
        debug($results);
    }


    public function testEdit()
    {
        $results1 = $this->testAction('Themes/edit/1');
        debug($results1);

        $data = array(
            'Theme' => array(
                'id' => 1,
                'Descricao' => 'Empreendedorismo'
            )
        );
        $results2 = $this->testAction('Themes/edit', array('data' => $data, 'method' => 'post'));
        debug($results2);
    }


    public function testDelete()
    {
        $results = $this->testAction('Themes/delete/1');
        debug($results);
    }

}
