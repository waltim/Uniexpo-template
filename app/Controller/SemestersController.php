<?php

/**
 * Created by PhpStorm.
 * User: Walterlmm
 * Date: 14/08/2015
 * Time: 00:03
 */

App::uses('AppController', 'Controller');

class SemestersController extends AppController{


    public $components = array('Paginator');

    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->loadModel('User');
        $this->loadModel('UserImage');
        $this->loadModel('Semester');
    }

    public function listar_semestres_json() {
        $this->loadModel('Course');
        $idcurso = $this->request->data['User']['course_id'];
        $semestre = $this->Semester->find('list', array(
            'conditions' => array('Semester.course_id' => $idcurso),
            'recursive' => -1));
        $this->set('semestres', $semestre);
        $this->layout = 'ajax';
    }

    public function index()
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
            $this->Semester->recursive = 0;
            $this->set('tipos', $this->paginate());
        }
        else{
            $this->Session->setFlash('Você não tem autorização.');
            $this->redirect(array('controller' => 'Users', 'action' => 'perfil'));
        }
    }
    public function add(){

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
            if($this->data){
                if($this->Semester->save($this->data))
                    $this->Session->setFlash('O semestre foi salvo com sucesso!', 'default', array('class' => 'success'));
                $this->redirect(array('action' => 'index'));
                $this->data = array();
            }
            $tipos = $this->Semester->Course->find('list');
            $this->set(compact('tipos'));
        }
        else{
            $this->Session->setFlash('Você não tem autorização.');
            $this->redirect(array('controller' => 'Users', 'action' => 'perfil'));
        }
    }

    public function edit($id = null)
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
            $this->Semester->id = $id;
            if ($this->request->is('post') || $this->request->is('put')) {
                if ($this->Semester->save($this->request->data)) {
                    $this->Session->setFlash('O semestre foi salvo com sucesso!', 'default', array('class' => 'success'));
                    $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash(__('O semestre não pode ser salvo, por favor tente novamente.'), 'flash/error');
                }
            } else {
                $options = array('conditions' => array('Semester.' . $this->Semester->primaryKey => $id));
                $this->request->data = $this->Semester->find('first', $options);
            }
            $tipos = $this->Semester->Course->find('list');
            $this->set(compact('tipos'));
        }
        else{
            $this->Session->setFlash('Você não tem autorização.');
            $this->redirect(array('controller' => 'Users', 'action' => 'perfil'));
        }
    }
    public function delete($id = null)
    {
        if ($this->Session->read('Auth.User.user_type_id') == 1) {
            if($id){
                if($this->Semester->delete($id))
                    $this->Session->setFlash('Deletado com sucesso!');
                $this->redirect(array('controller' => 'Courses','action' => 'index'));
            }
            $this->Session->setFlash(__('O semestre não pode ser apagado.'), 'flash/error');
            $this->redirect(array('action' => 'index'));
        }
        else{
            $this->Session->setFlash('Você não tem autorização.');
            $this->redirect(array('controller' => 'Users', 'action' => 'perfil'));
        }
    }
}