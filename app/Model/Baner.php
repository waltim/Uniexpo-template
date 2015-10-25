<?php
/**
 * Created by PhpStorm.
 * User: Walter
 * Date: 13/08/2015
 * Time: 14:08
 */

class Baner extends AppModel{

    var $actsAs = array(
        'MeioUpload' => array('filename')
    );

    public $validate = array(
        'Link' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Este campo é obrigatorio.'
            )
        )
    );



} 