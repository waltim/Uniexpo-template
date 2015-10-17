<?php
/**
 * Created by PhpStorm.
 * User: Walter
 * Date: 13/08/2015
 * Time: 14:39
 */

class ProjectUser extends AppModel{

    public $name = 'ProjectUser';

    public $belongsToMany = array(
        'User' => array(
            'joinTable' => 'ProjectUser',
            'foreignKey' => 'user_id',
            'targetForeignKey'=>'project_id'
        ),
        'Project' => array(
            'joinTable' => 'ProjectUser',
            'foreignKey' => 'project_id',
            'targetForeignKey'=>'user_id'
        )
    );


    public $belongsTo = array(
        'Project' => array(
            'className' => 'Project',
            'foreignKey' => 'project_id',
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