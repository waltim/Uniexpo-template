<?php
/**
 * Created by PhpStorm.
 * User: Walter
 * Date: 13/08/2015
 * Time: 14:28
 */

class Visitor extends AppModel{


    public $validate = array(
        'nome' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'O nome é obrigatório'
            )
        ),
        'foto' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'a foto é obrigatória.'
            )
        ),
        'faceId' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'o Id do facebook é obrigatório.'
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