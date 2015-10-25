<?php
App::uses('TiposController', 'Controller');


class BanersControllerTest extends ControllerTestCase
{


    public $fixtures = array(
        'app.Baner',
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
        $results = $this->testAction('Baners/index/');
        debug($results);
    }


    public function testAdd()
    {
        $data = array(
            'Baner' => array(
                'filesize' => 215084,
                'filename' => 'A_556.jpg',
                'mimetype' => 'image/jpeg',
                'dir' => 'images\uploads\user_image',
                'Link' => 'https://github.com/waltim/Uniexpo-template',
                'created' => '2015-08-14 04:53:03',
            )
        );
        $results = $this->testAction('Baners/add', array('data' => $data, 'method' => 'post'));
        debug($results);
    }

    public function testEdit()
    {
        $results1 = $this->testAction('Baners/edit/1');
        debug($results1);

        $data = array(
            'Baner' => array(
                'id' => 1,
                'filesize' => 215084,
                'filename' => 'A.jpg',
                'mimetype' => 'image/jpeg',
                'dir' => 'images\uploads\user_image',
                'Link' => 'https://github.com/waltim/Uniexpo-template',
                'created' => '2015-08-14 04:53:03',
            )
        );
        $results2 = $this->testAction('Baners/edit', array('data' => $data, 'method' => 'post'));
        debug($results2);
    }

    public function testDelete()
    {
        $results = $this->testAction('Baners/delete/1');
        debug($results);
    }

}
