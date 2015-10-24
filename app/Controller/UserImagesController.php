<?php
App::uses('AppController', 'Controller');

class UserImagesController extends AppController
{

    public $uses = array('User','UserImage');

    public $components = array('Paginator');



    public function aprovar($id = null){
        $this->UserImage->id = $id;
        if ($this->Session->read('Auth.User.user_type_id') == 1) {
            $usuario = $this->UserImage->find('first',array('conditions'=>array('UserImage.id'=>$id)));
            if($this->UserImage->saveField("Aceito","S")){
                $this->Session->setFlash(__('A foto do usuário foi aprovada!'), 'flash/success');
                $this->redirect(array('controller' => 'Users', 'action' => 'view/'.$usuario['User']['id']));
            }
        }
        else{
            $this->Session->setFlash(__('Você não tem autorização.'), 'flash/error');
            $this->redirect(array('controller' => 'Users', 'action' => 'perfil'));
        }
    }

    public function desaprovar($id = null){
        $this->UserImage->id = $id;
        if ($this->Session->read('Auth.User.user_type_id') == 1) {
            $usuario = $this->UserImage->find('first',array('conditions'=>array('UserImage.id'=>$id)));
            if($this->UserImage->saveField("Aceito","N")){
                $this->Session->setFlash(__('A foto do usuário foi reprovada!'), 'flash/info');
                $this->redirect(array('controller' => 'Users', 'action' => 'view/'.$usuario['User']['id']));
            }
        }
        else{
            $this->Session->setFlash(__('Você não tem autorização.'), 'flash/error');
            $this->redirect(array('controller' => 'Users', 'action' => 'perfil'));
        }
    }

    public function add()
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

        $qntResume = $this->UserImage->find('count', array(
            'conditions' => array('user_id' => $this->Session->read('Auth.User.id'))
        ));
        if ($qntResume < 1) {
            if ($this->request->is('post')) {
                $this->UserImage->create();
                $this->request->data['UserImage']['user_id'] = $this->Session->read('Auth.User.id');
                if ($this->UserImage->save($this->request->data)) {
                    $this->Session->setFlash(__('Sua foto foi salva com sucesso!, aguarde a aprovação de um administrador.'), 'flash/success');
                    $this->redirect(array('controller' => 'Users', 'action' => 'perfil'));
                } else {
                    $this->Session->setFlash(__('Sua foto não foi salva, por favor tente novamente.'), 'flash/error');
                }
            }
        }
        else {

            $this->Session->setFlash(__('Você só pode adicionar 1 foto.'), 'flash/info');
            $this->redirect(array('controller' => 'Users', 'action' => 'perfil'));
        }
        $novidades = $this->UserImage->User->find('list');
        $this->set(compact('novidades'));
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

        $this->UserImage->id = $id;
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->UserImage->save($this->request->data)) {
                $this->Session->setFlash(__('Sua foto foi editada com sucesso!, aguarde a aprovação de um administrador.'), 'flash/success');
                $this->redirect(array('controller' => 'Users', 'action' => 'perfil'));
            } else {
                $this->Session->setFlash(__('Sua foto não pode ser salva, por favor tente novamente.'), 'flash/error');
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
            $this->Session->setFlash(__('Sua foto foi apagada.'), 'flash/success');
            $this->redirect(array('controller' => 'Users', 'action' => 'perfil'));
        }
        $this->Session->setFlash(__('Sua foto não pode ser apagada.'), 'flash/error');
        $this->redirect(array('controller' => 'Users', 'action' => 'perfil'));
    }
}
