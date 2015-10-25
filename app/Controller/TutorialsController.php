<?php
App::uses('AppController', 'Controller');

class TutorialsController extends AppController
{

    public $uses = array('User', 'UserImage', 'Tutorial');

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

            $this->Tutorial->recursive = 0;
            $Baner = $this->Tutorial->find('all');
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

        // aqui começa o codigo de add
        if ($this->Session->read('Auth.User.user_type_id') == 3) {
            if ($this->request->is('post')) {

                $this->Tutorial->create();

                if ($this->Tutorial->save($this->request->data)) {

                    $this->Session->setFlash(__('O tutorial foi salvo com sucesso!'), 'flash/success');

                    $this->redirect(array('action' => 'index'));

                } else {

                    $this->Session->setFlash(__('O tutorial não pode ser salvo, por favor tente novamente.'), 'flash/error');

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

        if ($this->Session->read('Auth.User.user_type_id') == 3) {
            $this->Tutorial->id = $id;
            if ($this->request->is('post') || $this->request->is('put')) {

                if ($this->Tutorial->save($this->request->data)) {

                    $this->Session->setFlash(__('O tutorial foi salvo com sucesso!'), 'flash/success');

                    $this->redirect(array('action' => 'index'));

                } else {

                    $this->Session->setFlash(__('O tutorial não pode ser salvo, por favor tente novamente.'), 'flash/error');

                }

            } else {

                $options = array('conditions' => array('Tutorial.' . $this->Tutorial->primaryKey => $id));

                $this->request->data = $this->Tutorial->find('first', $options);

            }
        } else {
            $this->Session->setFlash(__('Você não tem autorização.'), 'flash/error');
            $this->redirect(array('controller' => 'Users', 'action' => 'perfil'));
        }


    }


    public function delete($id = null)
    {
        if ($this->Session->read('Auth.User.user_type_id') == 3) {
            $this->Tutorial->id = $id;
            if ($this->Tutorial->delete()) {
                $this->Session->setFlash(__('O tutorial foi apagado.'), 'flash/success');
                $this->redirect(array('controller' => 'Tutorials', 'action' => 'index'));
            }
            $this->Session->setFlash(__('O tutorial não pode ser apagado.'), 'flash/error');
            $this->redirect(array('controller' => 'Tutorials', 'action' => 'index'));
        } else {
            $this->Session->setFlash(__('Você não tem autorização.'), 'flash/error');
            $this->redirect(array('controller' => 'Users', 'action' => 'perfil'));
        }
    }
}
