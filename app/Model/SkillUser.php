<?php
/**
 * Created by PhpStorm.
 * User: Walter
 * Date: 13/08/2015
 * Time: 10:36
 */

class SkillUser extends AppModel{



    public $belongsTo = array(
        'Skill' => array(
            'className' => 'Skill',
            'foreignKey' => 'skill_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );
} 