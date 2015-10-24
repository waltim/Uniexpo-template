<?php

/**
 * Created by PhpStorm.
 * User: Walterlmm
 * Date: 09/08/2015
 * Time: 20:08
 */
class Skill extends AppModel
{

    public $displayField = 'Nome';

    public $validate = array(
        'Nome' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Este campo é obrigatorio.'
            )
        )
    );

    public $belongsTo = array(
        'Course' => array(
            'className' => 'Course',
            'foreignKey' => 'course_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

    public $hasMany = array(
        'SkillUser' => array(
            'className' => 'SkillUser',
            'foreignKey' => 'skill_id',
            'dependent' => true,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        )
    );


}