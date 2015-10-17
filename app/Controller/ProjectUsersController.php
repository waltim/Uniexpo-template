<?php

/**
 * Created by PhpStorm.
 * User: Walterlmm
 * Date: 14/08/2015
 * Time: 00:03
 */

App::uses('AppController', 'Controller');

class ProjectUsersController extends AppController
{

    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->loadModel('ProjectUser');
    }

    public $components = array('Paginator');


    public function aprovar($id = null, $idProjeto = null, $idUsuario = null)
    {
        $this->ProjectUser->id = $id;
        if ($this->Session->read('Auth.User.id') == $idUsuario) {
            $usuario = $this->ProjectUser->find('first', array('conditions' => array('ProjectUser.id' => $id)));
            if ($this->ProjectUser->saveField("Aceito", "S")) {
                $this->Session->setFlash(__('A participação do aluno foi aprovada!'));
                $this->redirect(array('controller' => 'Projects', 'action' => 'view', $idProjeto, $idUsuario));
            }
        } else {
            $this->Session->setFlash('Você não tem autorização.');
            $this->redirect(array('controller' => 'Users', 'action' => 'perfil'));
        }
    }

    public function desaprovar($id = null, $idProjeto = null, $idUsuario = null)
    {
        $this->ProjectUser->id = $id;
        if ($this->Session->read('Auth.User.id') == $idUsuario) {
            $usuario = $this->ProjectUser->find('first', array('conditions' => array('ProjectUser.id' => $id)));
            if ($this->ProjectUser->saveField("Aceito", "N")) {
                $this->Session->setFlash(__('A participação do aluno no projeto foi retirada!'));
                $this->redirect(array('controller' => 'Projects', 'action' => 'view', $idProjeto, $idUsuario));
            }
        } else {
            $this->Session->setFlash('Você não tem autorização.');
            $this->redirect(array('controller' => 'Users', 'action' => 'perfil'));
        }
    }


    public function ParticiparDoProjeto($idProjeto = null)
    {
        if ($idProjeto != null) {
            $this->ProjectUser->create();
            $data['ProjectUser']['user_id'] = $this->Auth->user('id');
            $data['ProjectUser']['project_id'] = $idProjeto;
            $data['ProjectUser']['Aceito'] = 'N';
            if ($this->ProjectUser->save($data))
                $this->Session->setFlash('Você solicitou a participação do projeto, aguarde a aprovação do lider!', 'default', array('class' => 'success'));
            $this->redirect(array('controller' => 'Projects', 'action' => 'index'));
            $this->data = array();
        }
        $tipos = $this->ProjectUser->Project->find('list');
        $this->set(compact('tipos'));
        $tipos2 = $this->ProjectUser->User->find('list');
        $this->set(compact('tipos2'));
    }


    public function SairDoProjeto($idProjeto = null)
    {
        $this->ProjectUser->id = $idProjeto;
        if (!$this->ProjectUser->exists()) {
            throw new NotFoundException(__('Projeto está inválido.'));
            $this->redirect(array('controller' => 'Users', 'action' => 'perfil'));
        }
        if ($this->ProjectUser->delete()) {
            $this->Session->setFlash(__('Você saiu deste projeto.'));
            $this->redirect(array('controller' => 'Projects', 'action' => 'index'));
        }
        $this->Session->setFlash(__('Não pode sair deste projeto, tente novamente.'));
        $this->redirect(array('controller' => 'Projects', 'action' => 'index'));
    }


}