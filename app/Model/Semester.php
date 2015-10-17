<?php
/**
 * Created by PhpStorm.
 * User: Walterlmm
 * Date: 09/08/2015
 * Time: 20:08
 */

class Semester extends AppModel
{

    public $displayField = 'Descricao';


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
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'semester_id',
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
            'foreignKey' => 'semester_id',
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