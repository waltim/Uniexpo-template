<?php

/**
 * Created by PhpStorm.
 * User: Walterlmm
 * Date: 14/08/2015
 * Time: 00:03
 */

App::uses('AppController', 'Controller');

class SkillsController extends AppController
{

    public $uses = array('User','UserImage','Skill');

    public $components = array('Paginator');

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
            $this->Skill->recursive = 1;
            $eventos = $this->Skill->find('all', array(
                'conditions'=>array('Skill.course_id' => $this->Session->read('Auth.User.course_id'))
            ));
            $this->set('tipos',$eventos ,$this->paginate());
        } else {
            $this->Session->setFlash('Você não tem autorização.');
            $this->redirect(array('controller' => 'Users', 'action' => 'perfil'));
        }

    }

    public function add($idCurso = null)
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
            if ($this->request->is('post')) {
                $this->Skill->create();
                $this->request->data['Skill']['course_id']=$idCurso;
                if ($this->Skill->save($this->request->data))
                    $this->Session->setFlash('A habilidade foi salva com sucesso!', 'default', array('class' => 'success'));
                $this->redirect(array('action' => 'index'));
                $this->data = array();
            }
            $tipos = $this->Skill->Course->find('list');
            $this->set(compact('tipos'));
        } else {
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
            $this->Skill->id = $id;
            if ($this->request->is('post') || $this->request->is('put')) {
                if ($this->Skill->save($this->request->data)) {
                    $this->Session->setFlash('A habilidade foi salva com sucesso!', 'default', array('class' => 'success'));
                    $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash(__('A habilidade não pode ser salva, por favor tente novamente.'), 'flash/error');
                }
            } else {
                $options = array('conditions' => array('Skill.' . $this->Skill->primaryKey => $id));
                $this->request->data = $this->Skill->find('first', $options);
            }
            $tipos = $this->Skill->Course->find('list');
            $this->set(compact('tipos'));
        } else {
            $this->Session->setFlash('Você não tem autorização.');
            $this->redirect(array('controller' => 'Users', 'action' => 'perfil'));
        }
    }

    public function delete($id = null)
    {
        if ($this->Session->read('Auth.User.user_type_id') == 1) {
            if ($id) {
                if ($this->Skill->delete($id))
                    $this->Session->setFlash('Deletado com sucesso!');
                $this->redirect(array('controller' => 'Skills', 'action' => 'index'));
            }
            $this->Session->setFlash(__('A habilidade não pode ser apagada.'), 'flash/error');
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Session->setFlash('Você não tem autorização.');
            $this->redirect(array('controller' => 'Users', 'action' => 'perfil'));
        }
    }


}