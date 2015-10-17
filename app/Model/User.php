<?php
/**
 * Created by PhpStorm.
 * User: Walterlmm
 * Date: 09/08/2015
 * Time: 19:29
 */
App::uses('AuthComponent', 'Controller/Component');
class User extends AppModel
{
    public $displayField = 'username';
    public $name = 'User';
    public $validate = array(
        'username' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A username is required'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A password is required'
            )
        ),
        'Email' => array(
            'rule' => array('email', true),
            'message' => 'Insira um email válido.'
        )
    );
    public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['password'])) {
            $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
        }
        return true;
    }
    public $belongsTo = array(
        'Semester' => array(
            'className' => 'Semester',
            'foreignKey' => 'semester_id',
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
        ),
        'user_types' => array(
            'className' => 'user_types',
            'foreignKey' => 'user_type_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );
    public $hasAndBelongsToMany = array(
        'Project' => array(
            'className' => 'Project',
            'joinTable' => 'ProjectUser',
            'foreignKey' => 'user_id',
            'associationForeignKey'  => 'project_id',
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
    public $hasOne = array(
        'Resume' => array(
            'className' => 'Resume',
            'foreignKey' => 'user_id',
            'dependent' => true
        ),
        'UserImage' => array(
            'className' => 'UserImage',
            'foreignKey' => 'user_id',
            'dependent' => true
        )
    );
    public $hasMany = array(
        'Project' => array(
            'className' => 'Project',
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
        ),
        'SkillUser' => array(
            'className' => 'SkillUser',
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
        ),
        'Social' => array(
            'className' => 'Social',
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
        ),
        'ProjectUser' => array(
            'className' => 'ProjectUser',
            'foreignKey' => 'user_id',
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