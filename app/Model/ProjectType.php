<?php
/**
 * Created by PhpStorm.
 * User: Walter
 * Date: 13/08/2015
 * Time: 14:16
 */

class ProjectType extends  AppModel{

    public $displayField = 'Sigla';

    public $hasMany = array(
        'Project' => array(
            'className' => 'Project',
            'foreignKey' => 'project_type_id',
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