<?php

class user_types extends AppModel
{

    public $displayField = 'Descricao';


    public $validate = array(
        'Descricao' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Este campo é obrigatorio.'
            )
        )
    );


    public $hasMany = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_type_id',
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