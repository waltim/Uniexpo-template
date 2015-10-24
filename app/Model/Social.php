<?php

class Social extends AppModel
{

    public $validate = array(
        'Link' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Este campo é obrigatorio.'
            )
        )
    );


    public $belongsTo = array(
        'social_types' => array(
            'className' => 'social_types',
            'foreignKey' => 'social_type_id',
            'dependent' => true,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ),
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id',
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