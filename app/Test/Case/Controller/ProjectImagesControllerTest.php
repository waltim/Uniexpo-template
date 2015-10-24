<?php
App::uses('TiposController', 'Controller');


class ProjectImagesControllerTest extends ControllerTestCase
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

    public function testAprovar()
    {
        $results1 = $this->testAction('ProjectImages/aprovar/1');
        debug($results1);

        $data = array(
            'ProjectImage' => array(
                'id' => 1,
                'Aceito' => 'N',
            )
        );
        $results2 = $this->testAction('ProjectImages/aprovar', array('data' => $data, 'method' => 'post'));
        debug($results2);
    }
    public function testDesaprovar()
    {
        $results1 = $this->testAction('ProjectImages/desaprovar/1');
        debug($results1);

        $data = array(
            'ProjectImage' => array(
                'id' => 1,
                'Aceito' => 'S',
            )
        );
        $results2 = $this->testAction('ProjectImages/desaprovar', array('data' => $data, 'method' => 'post'));
        debug($results2);
    }


    public function testAdd()
    {
        $data = array(
            'ProjectImage' => array(
                'project_id' => 1,
                'filesize' => 215084,
                'filename' => 'A_556.jpg',
                'mimetype' => 'image/jpeg',
                'dir' => 'images\uploads\user_image',
                'Aceito' => 'N',
                'created' => '2015-08-14 04:53:03',
                'modified' => '2015-08-14 04:53:03'
            )
        );
        $results = $this->testAction('ProjectImages/add', array('data' => $data, 'method' => 'post'));
        debug($results);
    }

    public function testEdit()
    {
        $results1 = $this->testAction('ProjectImages/edit/1');
        debug($results1);

        $data = array(
            'ProjectImage' => array(
                'id' => 1,
                'project_id' => 1,
                'filesize' => 215084,
                'filename' => 'AASDASD_556.jpg',
                'mimetype' => 'image/jpeg',
                'dir' => 'images\uploads\user_image',
                'Aceito' => 'S',
                'created' => '2015-08-14 04:53:03',
                'modified' => '2015-08-14 04:53:03'
            )
        );
        $results2 = $this->testAction('ProjectImages/edit', array('data' => $data, 'method' => 'post'));
        debug($results2);
    }

    public function testDelete()
    {
        $results = $this->testAction('ProjectImages/delete/1');
        debug($results);
    }

}
