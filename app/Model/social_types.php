<?php

class social_types extends AppModel
{

    public $displayField = 'Descricao';

    public $hasMany = array(
        'Social' => array(
            'className' => 'Social',
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
        )
    );


}