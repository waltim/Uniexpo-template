<?php
App::uses('AppController', 'Controller');

class ResumesController extends AppController
{

    public $uses = array('User','UserImage','Resume');
    public $components = array('Paginator');


    public function aprovar($id = null){
        $this->Resume->id = $id;
        if ($this->Session->read('Auth.User.user_type_id') == 1) {
            $usuario = $this->Resume->find('first',array('conditions'=>array('Resume.id'=>$id)));
            if($this->Resume->saveField("Aceito","S")){
                $this->Session->setFlash(__('O curriculo do usuário foi aprovado!'), 'flash/success');
                $this->redirect(array('action'=>'index'));
            }
        }
        else{
            $this->Session->setFlash(__('Você não tem autorização.'), 'flash/error');
            $this->redirect(array('controller' => 'Users', 'action' => 'perfil'));
        }
    }

    public function desaprovar($id = null){
        $this->Resume->id = $id;
        if ($this->Session->read('Auth.User.user_type_id') == 1) {
            $usuario = $this->Resume->find('first',array('conditions'=>array('Resume.id'=>$id)));
            if($this->Resume->saveField("Aceito","N")){
                $this->Session->setFlash(__('O curriculo do usuário "'.$usuario['User']['username'].'" foi reprovado!'),'flash/success');
                $this->redirect(array('action'=>'index'));
            }
        }
        else{
            $this->Session->setFlash(__('Você não tem autorização.'), 'flash/error');
            $this->redirect(array('controller' => 'Users', 'action' => 'perfil'));
        }
    }


    public function index(){
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
            $this->Resume->recursive = 2;
            $eventos = $this->Resume->find('all', array(
                'conditions'=>array('User.course_id' => $this->Session->read('Auth.User.course_id'))
            ));
            $this->set('novidadeImages',$eventos, $this->paginate());
            $qntCurriculo = $this->Resume->find('count', array(
                'conditions' => array('user_id' => $this->Session->read('Auth.User.id'))
            ));
            $this->set('qtdCurri', $qntCurriculo);
        }
        else{
            $this->Resume->recursive = 2;
            $eventos = $this->Resume->find('all', array(
                'conditions' => array('User.id' => $this->Session->read('Auth.User.id')
                )
            ));
            $this->set('novidadeImages',$eventos, $this->paginate());
            $qntCurriculo = $this->Resume->find('count', array(
                'conditions' => array('user_id' => $this->Session->read('Auth.User.id'))
            ));
            $this->set('qtdCurri', $qntCurriculo);
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

        $qntResume = $this->Resume->find('count', array(
            'conditions' => array('user_id' => $this->Session->read('Auth.User.id'))
        ));
        if ($qntResume < 1) {
            if ($this->request->is('post')) {
                $this->Resume->create();
                $this->request->data['Resume']['user_id'] = $this->Session->read('Auth.User.id');
                if ($this->Resume->save($this->request->data)) {
                    $this->Session->setFlash(__('Seu curriculo foi salvo com sucesso!'),'flash/success');
                    $this->redirect(array('controller' => 'Resumes', 'action' => 'index'));
                } else {
                    $this->Session->setFlash(__('O curriculo não pode ser salvo, por favor tente novamente.'),'flash/error');
                }
            }
        }
        else {
            $this->Session->setFlash(__('Você só pode adicionar 1 curriculo.'),'flash/info');
            $this->redirect(array('controller' => 'Resumes', 'action' => 'index'));
        }
        $novidades = $this->Resume->User->find('list');
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

        $this->Resume->id = $id;
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Resume->save($this->request->data)) {
                $this->Session->setFlash(__('Seu curriculo foi salvo com sucesso!'),'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Seu curriculo não pode ser salvo, por favor tente novamente.'),'flash/error');
            }
        } else {
            $options = array('conditions' => array('Resume.' . $this->Resume->primaryKey => $id));
            $this->request->data = $this->Resume->find('first', $options);
        }
        $novidades = $this->Resume->User->find('list');
        $this->set(compact('novidades'));
    }


    public function delete($id = null)
    {
        $this->Resume->id = $id;
        if ($this->Resume->delete()) {
            $this->Session->setFlash(__('Seu curriculo foi apagado.'),'flash/success');
            $this->redirect(array('controller' => 'Resumes', 'action' => 'index'));
        }
        $this->Session->setFlash(__('Seu curriculo não pode ser apagado.'),'flash/error');
        $this->redirect(array('controller' => 'Resumes', 'action' => 'index'));
    }
}
