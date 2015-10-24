<?php

/**
 * Created by PhpStorm.
 * User: Walterlmm
 * Date: 09/08/2015
 * Time: 19:30
 */
App::uses('AppController', 'Controller');
class UsersController extends AppController
{

    public $helpers = array('Js');

    public $name = 'Users';

    public $uses = array('User', 'ProjectUser', 'SkillUser', 'Skill', 'Project', 'Social', 'social_types', 'UserImage','user_types','Theme');

    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->loadModel('Course');
        $this->loadModel('Semester');
    }

    public function perfil()
    {
        $id = $this->Session->read('Auth.User.id');
        $this->User->recursive = 2;
        $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
        $this->set('tipo', $this->User->find('first', $options));
        $this->set('idUsuario', $id);

        $skills = $this->SkillUser->find('all', array('conditions' => array('SkillUser.user_id' => $this->Session->read('Auth.User.id'))));
        $skillsDisponiveis = $this->Skill->find('all', array('conditions' => array('Skill.course_id' => $this->Session->read('Auth.User.course_id'))));
        $this->set("skills", $skills);
        $this->set('skillsDisponiveis', $skillsDisponiveis);

        $eventos = $this->Social->find('all', array(
            'conditions' => array('User.id' => $this->Session->read('Auth.User.id')
            )
        ));
        $this->set('novidadeImages', $eventos, $this->paginate());


        $qntFoto = $this->UserImage->find('count', array(
            'conditions' => array('user_id' => $this->Session->read('Auth.User.id'))
        ));
        $this->set('qtd', $qntFoto);
    }

    public function view($id = null)
    {
        $id2 = $this->Session->read('Auth.User.id');
        $this->User->recursive = 2;
        $options = array('conditions' => array('User.' . $this->User->primaryKey => $id2));
        $this->set('tipo', $this->User->find('first', $options));
        $this->set('idUsuario', $id2);

        $qntFoto = $this->UserImage->find('count', array(
            'conditions' => array('user_id' => $this->Session->read('Auth.User.id'))
        ));
        $this->set('qtd', $qntFoto);
        if ($this->Session->read('Auth.User.user_type_id') == 1) {
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            $this->set('tipoView', $this->User->find('first', $options));
        } else {
            $this->Session->setFlash(__('Você não tem autorização.'), 'flash/error');
            $this->redirect(array('controller' => 'Users', 'action' => 'perfil'));
        }
    }


    public function aprovar($id = null)
    {
        $this->User->id = $id;
        if ($this->Session->read('Auth.User.user_type_id') == 1) {
            $usuario = $this->User->find('first', array('conditions' => array('User.id' => $id)));
            if ($this->User->saveField("Aceito", "S")) {
                $this->Session->setFlash(__('O usuário foi aprovado!'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            }
        } else {
            $this->Session->setFlash(__('Você não tem autorização.'), 'flash/error');
            $this->redirect(array('controller' => 'Users', 'action' => 'perfil'));
        }
    }

    public function desaprovar($id = null)
    {
        $this->User->id = $id;
        if ($this->Session->read('Auth.User.user_type_id') == 1) {
            $usuario = $this->User->find('first', array('conditions' => array('User.id' => $id)));
            if ($this->User->saveField("Aceito", "N")) {
                $this->Session->setFlash(__('O usuário foi desaprovado!'), 'flash/info');
                $this->redirect(array('action' => 'index'));
            }
        } else {
            $this->Session->setFlash(__('Você não tem autorização.'), 'flash/error');
            $this->redirect(array('controller' => 'Users', 'action' => 'perfil'));
        }
    }
    public function login()
    {
        if (!empty($this->request->data)) {
            $username = $this->request->data['User']['username'];
            $find_by_email = $this->User->find('first', array(
                    'conditions' => array('email' => $this->request->data['User']['Email']),
                    'fields' => 'username'
                )
            );
            if (!empty($find_by_email)) {
                $this->request->data['User']['username'] = $find_by_email['User']['username'];
            }
            $this->Auth->authenticate = array('Form' => array('userModel' => 'User',
                'fields' => array(
                    'username' => 'username',
                    'password' => 'password'
                )
            ));
            if ($this->Auth->login()) {
                $this->Session->setFlash(__('Seja bem vindo Sr(a) '.$find_by_email['User']['username']), 'flash/info');
                $this->redirect(array('controller' => 'Users', 'action' => 'perfil'));
            } else {
                $this->Session->setFlash(__('Email e senha não conferem ou você ainda não foi aprovado por um coordenador.'), 'flash/error');
                $this->redirect($this->Auth->loginAction);
            }
        }
    }
    public function index()
    {
        if ($this->Session->read('Auth.User.user_type_id') == 1) {

            $id = $this->Session->read('Auth.User.id');
            $this->User->recursive = 2;
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            $this->set('tipo', $this->User->find('first', $options));
            $this->set('idUsuario', $id);

            $qntFoto = $this->UserImage->find('count', array(
                'conditions' => array('user_id' => $this->Session->read('Auth.User.id'))
            ));
            $this->set('qtd', $qntFoto);

            $this->User->recursive = 2;
            $eventos = $this->User->find('all', array(
                'conditions' => array('User.course_id' => $this->Session->read('Auth.User.course_id'),
                    'User.id !=' => $this->Session->read('Auth.User.id')
                )
            ));
            $this->set('users', $eventos, $this->paginate());
        } else {
            $this->Session->setFlash(__('Você não tem autorização.'), 'flash/error');
            $this->redirect(array('controller' => 'Users', 'action' => 'perfil'));
        }
    }


    public function add()
    {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('Usuário registrado com sucesso!, aguarde sua aprovação por um administrador.'), 'flash/success');
                $this->redirect(array('controller' => 'users', 'action' => 'login'));
            } else {
                $this->Session->setFlash(__('O usuário não foi salvo, tente novamente.'), 'flash/error');
            }
        }
        $semestres = $this->User->Semester->find('list');
        $cursos = $this->User->Semester->Course->find('list');
        $this->set(compact('semestres','cursos'));

        $tipos = $this->User->user_types->find('list', array('fields' => array('id', 'Descricao')));
        $this->set('tipos', $tipos);
        $sexo = array('Masculino' => 'Masculino',
            'Feminino' => 'Feminino');
        $this->set(compact('sexo'));
    }
    public function edit($id = null)
    {
        $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
        $this->set('tipo', $this->User->find('first', $options));
        $this->User->id = $id;
        if ($this->Session->read('Auth.User.id') == $id) {
            if ($this->request->is('post') || $this->request->is('put')) {
                if ($this->User->save($this->request->data)) {
                    $this->Session->setFlash(__('Informações atualizadas com sucesso.'), 'flash/success');
                    $this->redirect(array('action' => 'perfil'));
                } else {
                    $this->Session->setFlash(__('Usuário não pode ser salvo, por favor tente novamente.'), 'flash/error');
                }
            } else {
                $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
                $this->request->data = $this->User->find('first', $options);
            }
        } else {
            $this->Session->setFlash(__('Você não tem autorização.'), 'flash/error');
            $this->redirect(array('controller' => 'Users', 'action' => 'perfil'));
        }
        $semestres = $this->User->Semester->find('list');
        $cursos = $this->User->Semester->Course->find('list');
        $this->set(compact('semestres','cursos'));
        $tipos = $this->User->user_types->find('list', array('fields' => array('id', 'Descricao')));
        $this->set('tipos', $tipos);
        $sexo = array('Masculino' => 'Masculino',
            'Feminino' => 'Feminino');
        $this->set(compact('sexo'));
    }
    public function logout()
    {
        $this->Session->setFlash(__('Deslogado com sucesso!'), 'flash/success');
        $this->redirect($this->Auth->logout());
    }


}