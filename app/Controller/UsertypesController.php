<?php

/**
 * Created by PhpStorm.
 * User: Walterlmm
 * Date: 14/08/2015
 * Time: 00:03
 */

App::uses('AppController', 'Controller');

class UsertypesController extends AppController{

    public $uses = array('User','user_types');


    public $components = array('Paginator');

    public function index()
    {
        if ($this->Session->read('Auth.User.user_type_id') == 1) {
            $this->user_types->recursive = 2;
            $tipos = $this->user_types->find('all');
            $this->set('tipos',$tipos,$this->paginate());
        }
        else{
            $this->Session->setFlash('Você não tem autorização.');
            $this->redirect(array('controller' => 'Users', 'action' => 'perfil'));
        }
    }
    public function add(){
        if ($this->Session->read('Auth.User.user_type_id') == 1) {
            if($this->data){
                if($this->user_types->save($this->data))
                    $this->Session->setFlash('O tipo de usuário foi salvo com sucesso!', 'default', array('class' => 'success'));
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
        if ($this->Session->read('Auth.User.user_type_id') == 1) {
            $this->user_types->id = $id;
            if ($this->request->is('post') || $this->request->is('put')) {
                if ($this->user_types->save($this->request->data)) {
                    $this->Session->setFlash('O tipo de usuário foi salvo com sucesso!', 'default', array('class' => 'success'));
                    $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash(__('O tipo de usuário não pode ser salvo, por favor tente novamente.'), 'flash/error');
                }
            } else {
                $options = array('conditions' => array('user_types.' . $this->user_types->primaryKey => $id));
                $this->request->data = $this->user_types->find('first', $options);
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
                if($this->user_types->delete($id))
                    $this->Session->setFlash('Deletado com sucesso!');
                $this->redirect(array('controller' => 'Usertypes','action' => 'index'));
            }
            $this->Session->setFlash(__('O tipo de usuário não pode ser apagado.'), 'flash/error');
            $this->redirect(array('action' => 'index'));
        }
        else{
            $this->Session->setFlash('Você não tem autorização.');
            $this->redirect(array('controller' => 'Users', 'action' => 'perfil'));
        }
    }
}