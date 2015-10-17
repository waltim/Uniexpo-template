<?php

/**
 * Created by PhpStorm.
 * User: Walterlmm
 * Date: 14/08/2015
 * Time: 00:03
 */

App::uses('AppController', 'Controller');

class CoursesController extends AppController{



    public $components = array('Paginator');

    public function index()
    {
        if ($this->Session->read('Auth.User.user_type_id') == 1) {
            $this->Course->recursive = 0;
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
                if($this->Course->save($this->data))
                    $this->Session->setFlash('O Curso foi salvo com sucesso!', 'default', array('class' => 'success'));
                $this->redirect(array('action' => 'index'));
                $this->data = array();
            }
            $tipos = $this->Course->Shift->find('list');
            $this->set(compact('tipos'));
        }
        else{
            $this->Session->setFlash('Você não tem autorização.');
            $this->redirect(array('controller' => 'Users', 'action' => 'perfil'));
        }
    }

    public function edit($id = null)
    {
        if ($this->Session->read('Auth.User.user_type_id') == 1) {
            $this->Course->id = $id;
            if ($this->request->is('post') || $this->request->is('put')) {
                if ($this->Course->save($this->request->data)) {
                    $this->Session->setFlash('O Curso foi salvo com sucesso!', 'default', array('class' => 'success'));
                    $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash(__('O Curso não pode ser salvo, por favor tente novamente.'), 'flash/error');
                }
            } else {
                $options = array('conditions' => array('Course.' . $this->Course->primaryKey => $id));
                $this->request->data = $this->Course->find('first', $options);
            }
            $tipos = $this->Course->Shift->find('list');
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
                if($this->Course->delete($id))
                    $this->Session->setFlash('Deletado com sucesso!');
                $this->redirect(array('controller' => 'Courses','action' => 'index'));
            }
            $this->Session->setFlash(__('O curso não pode ser apagado.'), 'flash/error');
            $this->redirect(array('action' => 'index'));
        }
        else{
            $this->Session->setFlash('Você não tem autorização.');
            $this->redirect(array('controller' => 'Users', 'action' => 'perfil'));
        }
    }
}