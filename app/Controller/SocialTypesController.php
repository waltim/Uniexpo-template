<?php

/**
 * Created by PhpStorm.
 * User: Walterlmm
 * Date: 14/08/2015
 * Time: 00:03
 */

App::uses('AppController', 'Controller');

class SocialTypesController extends AppController{


    public $components = array('Paginator');

    public function index()
    {
        if ($this->Session->read('Auth.User.user_type_id') == 1) {
            $this->SocialType->recursive = 2;
            $this->set('tipos', $this->paginate());
        }
        else{
            $this->Session->setFlash('Você não tem autorização.');
            $this->redirect(array('controller' => 'Users', 'action' => 'perfil'));
        }
    }
    public function add(){
        if ($this->Session->read('Auth.User.user_type_id') == 1) {
            if($this->data){
                if($this->SocialType->save($this->data))
                    $this->Session->setFlash('O tipo de social foi salvo com sucesso!', 'default', array('class' => 'success'));
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
            $this->SocialType->id = $id;
            if ($this->request->is('post') || $this->request->is('put')) {
                if ($this->SocialType->save($this->request->data)) {
                    $this->Session->setFlash('O tipo de social foi salvo com sucesso!', 'default', array('class' => 'success'));
                    $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash(__('O tipo de social não pode ser salvo, por favor tente novamente.'), 'flash/error');
                }
            } else {
                $options = array('conditions' => array('SocialType.' . $this->SocialType->primaryKey => $id));
                $this->request->data = $this->SocialType->find('first', $options);
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
                if($this->SocialType->delete($id))
                    $this->Session->setFlash('Deletado com sucesso!');
                $this->redirect(array('controller' => 'Socials','action' => 'index'));
            }
            $this->Session->setFlash(__('O tipo de social não pode ser apagado.'), 'flash/error');
            $this->redirect(array('action' => 'index'));
        }
        else{
            $this->Session->setFlash('Você não tem autorização.');
            $this->redirect(array('controller' => 'Users', 'action' => 'perfil'));
        }
    }
}