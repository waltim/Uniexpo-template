<?php

/**
 * Created by PhpStorm.
 * User: Walterlmm
 * Date: 09/08/2015
 * Time: 20:08
 */
class Course extends AppModel
{

    public $displayField = 'Nome';

    public $belongsTo = array(
        'Shift' => array(
            'className' => 'Shift',
            'foreignKey' => 'shift_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );
    public $hasMany = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'course_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ),
        'Skill' => array(
            'className' => 'Skill',
            'foreignKey' => 'course_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ),
        'Semester' => array(
            'className' => 'Semester',
            'foreignKey' => 'course_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ),
        'Project' => array(
            'className' => 'Project',
            'foreignKey' => 'course_id',
            'dependent' => false,
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