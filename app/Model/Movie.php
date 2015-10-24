<?php
/**
 * Created by PhpStorm.
 * User: Walter
 * Date: 13/08/2015
 * Time: 14:28
 */

class Movie extends AppModel{



    public $validate = array(
        'Link' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Este campo é obrigatorio.'
            )
        )
    );


    public $belongsTo = array(
        'Project' => array(
            'className' => 'Project',
            'foreignKey' => 'project_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

} 