<?php
App::uses('TiposController', 'Controller');


class ArchivesControllerTest extends ControllerTestCase
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
        $results1 = $this->testAction('Archives/aprovar/1');
        debug($results1);

        $data = array(
            'Archive' => array(
                'id' => 1,
                'Aceito' => 'N',
            )
        );
        $results2 = $this->testAction('Archives/aprovar', array('data' => $data, 'method' => 'post'));
        debug($results2);
    }
    public function testDesaprovar()
    {
        $results1 = $this->testAction('Archives/desaprovar/1');
        debug($results1);

        $data = array(
            'Archive' => array(
                'id' => 1,
                'Aceito' => 'S',
            )
        );
        $results2 = $this->testAction('Archives/desaprovar', array('data' => $data, 'method' => 'post'));
        debug($results2);
    }

    public function testIndex()
    {
        $results = $this->testAction('Archives/index/');
        debug($results);
    }


    public function testAdd()
    {
        $data = array(
            'Archive' => array(
                'project_id' => 1,
                'filesize' => 32165,
                'filename' => 'curriculum_vitae-0.pdf',
                'mimetype' => 'application/pdf',
                'dir' => 'files\uploads',
                'Aceito' => 'N',
                'created' => '2015-08-14 04:53:03',
                'modified' => '2015-08-14 04:53:03'
            )
        );
        $results = $this->testAction('Archives/add', array('data' => $data, 'method' => 'post'));
        debug($results);
    }

    public function testEdit()
    {
        $results1 = $this->testAction('Archives/edit/1');
        debug($results1);

        $data = array(
            'Archive' => array(
                'id' => 1,
                'project_id' => 1,
                'filesize' => 32165,
                'filename' => 'curriculum.pdf',
                'mimetype' => 'application/pdf',
                'dir' => 'files\uploads',
                'Aceito' => 'N',
                'created' => '2015-09-14 04:53:03',
                'modified' => '2015-09-14 04:53:03'
            )
        );
        $results2 = $this->testAction('Archives/edit', array('data' => $data, 'method' => 'post'));
        debug($results2);
    }

    public function testDelete()
    {
        $results = $this->testAction('Archives/delete/1');
        debug($results);
    }

}
