<?php
App::uses('TiposController', 'Controller');


class SocialsControllerTest extends ControllerTestCase
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
        $results = $this->testAction('Socials/index/');
        debug($results);
    }


    public function testAdd()
    {
        $data = array(
            'Course' => array(
                'user_id' => 1,
                'social_type_id' => 1,
                'Link' =>'https://www.facebook.com/',
                'created' => '2015-08-14 04:53:03'
            )
        );
        $results = $this->testAction('Socials/add', array('data' => $data, 'method' => 'post'));
        debug($results);
    }


    public function testEdit()
    {
        $results1 = $this->testAction('Socials/edit/1');
        debug($results1);

        $data = array(
            'Course' => array(
                'id' => 1,
                'user_id' => 2,
                'social_type_id' => 1,
                'Link' =>'https://www.facebook.com/',
                'created' => '2015-08-14 04:53:03'
            )
        );
        $results2 = $this->testAction('Socials/edit', array('data' => $data, 'method' => 'post'));
        debug($results2);
    }


    public function testDelete()
    {
        $results = $this->testAction('Socials/delete/1');
        debug($results);
    }

}
