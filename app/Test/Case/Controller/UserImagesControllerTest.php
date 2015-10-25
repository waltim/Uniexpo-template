<?php
App::uses('TiposController', 'Controller');


class UserImagesControllerTest extends ControllerTestCase
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
        $results1 = $this->testAction('UserImages/aprovar/1');
        debug($results1);

        $data = array(
            'UserImage' => array(
                'id' => 1,
                'Aceito' => 'N',
            )
        );
        $results2 = $this->testAction('UserImages/aprovar', array('data' => $data, 'method' => 'post'));
        debug($results2);
    }
    public function testDesaprovar()
    {
        $results1 = $this->testAction('UserImages/desaprovar/1');
        debug($results1);

        $data = array(
            'UserImage' => array(
                'id' => 1,
                'Aceito' => 'S',
            )
        );
        $results2 = $this->testAction('UserImages/desaprovar', array('data' => $data, 'method' => 'post'));
        debug($results2);
    }

    public function testAdd()
    {
        $data = array(
            'UserImage' => array(
                'user_id' => 1,
                'filesize' => 215084,
                'filename' => 'A_556.jpg',
                'mimetype' => 'image/jpeg',
                'dir' => 'images\uploads\user_image',
                'Aceito' => 'N',
                'created' => '2015-08-14 04:53:03',
                'modified' => '2015-08-14 04:53:03'
            )
        );
        $results = $this->testAction('UserImages/add', array('data' => $data, 'method' => 'post'));
        debug($results);
    }

    public function testEdit()
    {
        $results1 = $this->testAction('UserImages/edit/1');
        debug($results1);

        $data = array(
            'UserImage' => array(
                'id' => 1,
                'user_id' => 1,
                'filesize' => 215084,
                'filename' => 'AASDASD_556.jpg',
                'mimetype' => 'image/jpeg',
                'dir' => 'images\uploads\user_image',
                'Aceito' => 'S',
                'created' => '2015-08-14 04:53:03',
                'modified' => '2015-08-14 04:53:03'
            )
        );
        $results2 = $this->testAction('UserImages/edit', array('data' => $data, 'method' => 'post'));
        debug($results2);
    }

    public function testDelete()
    {
        $results = $this->testAction('UserImages/delete/1');
        debug($results);
    }

}
