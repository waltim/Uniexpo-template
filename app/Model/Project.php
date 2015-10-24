<?php
/**
 * Created by PhpStorm.
 * User: Walter
 * Date: 13/08/2015
 * Time: 14:13
 */
class Project extends AppModel{

    public $validate = array(
        'Titulo' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'O título não pode ser nulo.'
            )
        ),
        'Descricao' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'preencha a descrição do projeto.'
            )
        ),
    );

    public $hasAndBelongsToMany = array(
        'User' => array(
            'className' => 'User',
            'joinTable' => 'ProjectUser',
            'foreignKey' => 'project_id',
            'associationForeignKey'  => 'user_id',
            'unique' => true,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'finderQuery' => '',
            'with' => 'ProjectUser'
        )
    );
    public $belongsTo = array(
        'ProjectType' => array(
            'className' => 'ProjectType',
            'foreignKey' => 'project_type_id',
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
        ),
        'Semester' => array(
            'className' => 'Semester',
            'foreignKey' => 'semester_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Theme' => array(
            'className' => 'Theme',
            'foreignKey' => 'theme_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Course' => array(
            'className' => 'Course',
            'foreignKey' => 'course_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );
    public $hasMany = array(
        'Movie' => array(
            'className' => 'Movie',
            'foreignKey' => 'project_id',
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
        'ProjectImage' => array(
            'className' => 'ProjectImage',
            'foreignKey' => 'project_id',
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
        'ProjectUser' => array(
            'className' => 'ProjectUser',
            'foreignKey' => 'project_id',
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
    public $hasOne = array(
        'Archive' => array(
            'className' => 'Archive',
            'foreignKey' => 'project_id',
            'dependent' => true
        )
    );
}