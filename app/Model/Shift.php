<?php

class Shift extends AppModel
{

    public $displayField = 'Descricao';

    public $hasMany = array(
        'Course' => array(
            'className' => 'Course',
            'foreignKey' => 'shift_id',
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