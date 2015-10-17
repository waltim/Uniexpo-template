<?php
App::uses('AppController', 'Controller');

class SocialsController extends AppController
{

    public $uses = array('User','UserImage','Social');

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


        $this->Social->recursive = 2;
        $eventos = $this->Social->find('all', array(
            'conditions' => array('User.id' => $this->Session->read('Auth.User.id')
            )
        ));
        $qntSociais = $this->Social->find('count', array(
            'conditions' => array('user_id' => $this->Session->read('Auth.User.id'))
        ));
        $this->set('qtdSocial',$qntSociais);
        $this->set('novidadeImages', $eventos, $this->paginate());
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

        $qntSociais = $this->Social->find('count', array(
            'conditions' => array('user_id' => $this->Session->read('Auth.User.id'))
        ));
        if ($qntSociais <= 4) {
            if ($this->request->is('post')) {
                $this->Social->create();
                $this->request->data['Social']['user_id'] = $this->Session->read('Auth.User.id');
                if ($this->Social->save($this->request->data)) {
                    $this->Session->setFlash(__('Sua rede social foi salva com sucesso!'));
                    $this->redirect(array('controller' => 'Socials', 'action' => 'index'));
                } else {
                    $this->Session->setFlash(__('Sua rede social não pode ser salva, por favor tente novamente.'));
                }
            }
        }
        else {
            $this->Session->setFlash(__('Você só pode adicionar 05 redes sociais.'));
            $this->redirect(array('controller' => 'Socials', 'action' => 'index'));
        }
        $novidades = $this->Social->social_types->find('list');
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


        $this->Social->id = $id;
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Social->save($this->request->data)) {
                $this->Session->setFlash(__('Sua rede social foi salva com sucesso!'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Sua rede social não pode ser salva, por favor tente novamente.'));
            }
        } else {
            $options = array('conditions' => array('Social.' . $this->Social->primaryKey => $id));
            $this->request->data = $this->Social->find('first', $options);
        }
        $novidades = $this->Social->social_types->find('list');
        $this->set(compact('novidades'));
    }


    public function delete($id = null)
    {

        $this->Social->id = $id;
        if (!$this->Social->exists()) {
            throw new NotFoundException(__('Sua rede social está inválida.'));
        }
        if ($this->Social->delete()) {
            $this->Session->setFlash(__('Sua rede social foi apagada.'));
            $this->redirect(array('controller' => 'Socials', 'action' => 'index'));
        }
        $this->Session->setFlash(__('Sua rede social não pode ser apagada.'));
        $this->redirect(array('controller' => 'Socials', 'action' => 'index'));
    }
}
