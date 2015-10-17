<?php
App::uses('AppController', 'Controller');

class UserImagesController extends AppController
{


    public $components = array('Paginator');



    public function aprovar($id = null){
        $this->UserImage->id = $id;
        if ($this->Session->read('Auth.User.user_type_id') == 1) {
            $usuario = $this->UserImage->find('first',array('conditions'=>array('UserImage.id'=>$id)));
            if($this->UserImage->saveField("Aceito","S")){
                $this->Session->setFlash(__('A foto do usuário "'.$usuario['User']['username'].'"foi aprovada!'));
                $this->redirect(array('controller' => 'Users', 'action' => 'view/'.$usuario['User']['id']));
            }
        }
        else{
            $this->Session->setFlash('Você não tem autorização.');
            $this->redirect(array('controller' => 'Users', 'action' => 'perfil'));
        }
    }

    public function desaprovar($id = null){
        $this->UserImage->id = $id;
        if ($this->Session->read('Auth.User.user_type_id') == 1) {
            $usuario = $this->UserImage->find('first',array('conditions'=>array('UserImage.id'=>$id)));
            if($this->UserImage->saveField("Aceito","N")){
                $this->Session->setFlash(__('A foto do usuário "'.$usuario['User']['username'].'" foi reprovada!'));
                $this->redirect(array('controller' => 'Users', 'action' => 'view/'.$usuario['User']['id']));
            }
        }
        else{
            $this->Session->setFlash('Você não tem autorização.');
            $this->redirect(array('controller' => 'Users', 'action' => 'perfil'));
        }
    }

    public function add()
    {
        $qntResume = $this->UserImage->find('count', array(
            'conditions' => array('user_id' => $this->Session->read('Auth.User.id'))
        ));
        if ($qntResume < 1) {
            if ($this->request->is('post')) {
                $this->UserImage->create();
                $this->request->data['UserImage']['user_id'] = $this->Session->read('Auth.User.id');
                if ($this->UserImage->save($this->request->data)) {
                    $this->Session->setFlash(__('Sua foto foi salva com sucesso!, aguarde a aprovação de um administrador.'));
                    $this->redirect(array('controller' => 'Users', 'action' => 'perfil'));
                } else {
                    $this->Session->setFlash(__('Sua foto não foi salva, por favor tente novamente.'));
                }
            }
        }
        else {
            $this->Session->setFlash(__('Você só pode adicionar 1 foto.'));
            $this->redirect(array('controller' => 'Users', 'action' => 'perfil'));
        }
        $novidades = $this->UserImage->User->find('list');
        $this->set(compact('novidades'));
    }


    public function edit($id = null)
    {
        $this->UserImage->id = $id;
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->UserImage->save($this->request->data)) {
                $this->Session->setFlash(__('Sua foto foi editada com sucesso!, aguarde a aprovação de um administrador.'));
                $this->redirect(array('controller' => 'Users', 'action' => 'perfil'));
            } else {
                $this->Session->setFlash(__('Sua foto não pode ser salva, por favor tente novamente.'));
            }
        } else {
            $options = array('conditions' => array('UserImage.' . $this->UserImage->primaryKey => $id));
            $this->request->data = $this->UserImage->find('first', $options);
        }
        $novidades = $this->UserImage->User->find('list');
        $this->set(compact('novidades'));
    }


    public function delete($id = null)
    {
        $this->UserImage->id = $id;
        if ($this->UserImage->delete()) {
            $this->Session->setFlash(__('Sua foto foi apagada.'));
            $this->redirect(array('controller' => 'Users', 'action' => 'perfil'));
        }
        $this->Session->setFlash(__('Sua foto não pode ser apagada.'));
        $this->redirect(array('controller' => 'Users', 'action' => 'perfil'));
    }
}
