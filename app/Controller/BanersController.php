<?php
App::uses('AppController', 'Controller');

class BanersController extends AppController
{

    public $uses = array('User', 'UserImage', 'Baner');

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
        if ($this->Session->read('Auth.User.user_type_id') == 3) {
            $this->Baner->recursive = 0;
            $Baner = $this->Baner->find('all');
            $this->set('novidades', $Baner, $this->paginate());
        } else {
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

        if ($this->Session->read('Auth.User.user_type_id') == 3) {
            if ($this->request->is('post')) {

                $this->Baner->create();

                if ($this->Baner->save($this->request->data)) {

                    $this->Session->setFlash(__('Imagem do baner foi salva com sucesso!'), 'flash/success');

                    $this->redirect(array('action' => 'index'));

                } else {

                    $this->Session->setFlash(__('Imagem do baner não pode ser salva, por favor tente novamente.'), 'flash/error');

                }

            }
        } else {
            $this->Session->setFlash(__('Você não tem autorização.'), 'flash/error');
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


        $this->Baner->id = $id;

        if ($this->Session->read('Auth.User.user_type_id') == 3) {
            if ($this->request->is('post') || $this->request->is('put')) {

                if ($this->Baner->save($this->request->data)) {

                    $this->Session->setFlash(__('Imagem do baner foi salva com sucesso!'), 'flash/success');

                    $this->redirect(array('action' => 'index'));

                } else {

                    $this->Session->setFlash(__('Imagem do baner não pode ser salva, por favor tente novamente.'), 'flash/error');

                }

            } else {

                $options = array('conditions' => array('Baner.' . $this->Baner->primaryKey => $id));

                $this->request->data = $this->Baner->find('first', $options);

            }
        } else {
            $this->Session->setFlash(__('Você não tem autorização.'), 'flash/error');
            $this->redirect(array('controller' => 'Users', 'action' => 'perfil'));
        }


    }


    public function delete($id = null)
    {
        if ($this->Session->read('Auth.User.user_type_id') == 3) {
            $this->Baner->id = $id;
            if ($this->Baner->delete()) {
                $this->Session->setFlash(__('O baner foi apagado.'), 'flash/success');
                $this->redirect(array('controller' => 'Baners', 'action' => 'index'));
            }
            $this->Session->setFlash(__('O baner não pode ser apagado.'), 'flash/error');
            $this->redirect(array('controller' => 'Baners', 'action' => 'index'));
        } else {
            $this->Session->setFlash(__('Você não tem autorização.'), 'flash/error');
            $this->redirect(array('controller' => 'Users', 'action' => 'perfil'));
        }
    }
}
