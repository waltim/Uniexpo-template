<?php
App::uses('TiposController', 'Controller');


class SkillUsersControllerTest extends ControllerTestCase
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
        $results = $this->testAction('SkillUsers/index/');
        debug($results);
    }


    public function testLinkSkill()
    {
        $data = array(
            'SkillUser' => array(
                'skill_id' => 1,
                'user_id' => 1,
                'created' => '2015-08-14 04:53:03'
            )
        );
        $results = $this->testAction('SkillUsers/linkSkill', array('data' => $data, 'method' => 'post'));
        debug($results);
    }


    public function testUnLinkSkill()
    {
        $results = $this->testAction('SkillUsers/unLinkSkill/1');
        debug($results);
    }

}
