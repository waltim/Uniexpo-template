<?php
App::uses('TiposController', 'Controller');


class ResumesControllerTest extends ControllerTestCase
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
        $results = $this->testAction('Resumes/index/');
        debug($results);
    }


    public function testAdd()
    {
        $data = array(
            'Resume' => array(
                'user_id' => 1,
                'filesize' => 32165,
                'filename' => 'curriculum_vitae-0.pdf',
                'mimetype' => 'application/pdf',
                'dir' => 'files\uploads',
                'Aceito' => 'N',
                'created' => '2015-08-14 04:53:03',
                'modified' => '2015-08-14 04:53:03'
            )
        );
        $results = $this->testAction('Resumes/add', array('data' => $data, 'method' => 'post'));
        debug($results);
    }

    public function testEdit()
    {
        $results1 = $this->testAction('Resumes/edit/1');
        debug($results1);

        $data = array(
            'Resume' => array(
                'id' => 1,
                'user_id' => 1,
                'filesize' => 32165,
                'filename' => 'curriculum.pdf',
                'mimetype' => 'application/pdf',
                'dir' => 'files\uploads',
                'Aceito' => 'N',
                'created' => '2015-09-14 04:53:03',
                'modified' => '2015-09-14 04:53:03'
            )
        );
        $results2 = $this->testAction('Resumes/edit', array('data' => $data, 'method' => 'post'));
        debug($results2);
    }

    public function testDelete()
    {
        $results = $this->testAction('Resumes/delete/1');
        debug($results);
    }

}
