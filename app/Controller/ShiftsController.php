<?php

/**
 * Created by PhpStorm.
 * User: Walterlmm
 * Date: 14/08/2015
 * Time: 00:03
 */

App::uses('AppController', 'Controller');

class ShiftsController extends AppController{


    public $components = array('Paginator');

    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->loadModel('User');
        $this->loadModel('UserImage');
        $this->loadModel('Shift');
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
            $this->Shift->recursive = 0;
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
                if($this->Shift->save($this->data))
                    $this->Session->setFlash('O período foi salvo com sucesso!', 'default', array('class' => 'success'));
                $this->redirect(array('action' => 'index'));
                $this->data = array();
            }
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
            $this->Shift->id = $id;
            if ($this->request->is('post') || $this->request->is('put')) {
                if ($this->Shift->save($this->request->data)) {
                    $this->Session->setFlash('O período foi salvo com sucesso!', 'default', array('class' => 'success'));
                    $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash(__('O período não pode ser salvo, por favor tente novamente.'), 'flash/error');
                }
            } else {
                $options = array('conditions' => array('Shift.' . $this->Shift->primaryKey => $id));
                $this->request->data = $this->Shift->find('first', $options);
            }
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
                if($this->Shift->delete($id))
                    $this->Session->setFlash('Deletado com sucesso!');
                $this->redirect(array('controller' => 'Shifts','action' => 'index'));
            }
            $this->Session->setFlash(__('O período não pode ser apagado.'), 'flash/error');
            $this->redirect(array('action' => 'index'));
        }
        else{
            $this->Session->setFlash('Você não tem autorização.');
            $this->redirect(array('controller' => 'Users', 'action' => 'perfil'));
        }
    }
}