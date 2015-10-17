<?php
App::uses('AppController', 'Controller');

class ArchivesController extends AppController
{


    public $components = array('Paginator');

    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->loadModel('User');
    }

    public function aprovar($id = null,$idProjeto = null, $idUsuario = null){
        $this->Archive->id = $id;
        if ($this->Session->read('Auth.User.user_type_id') == 1) {
            $usuario = $this->Archive->find('first',array('conditions'=>array('Archive.id'=>$id)));
            if($this->Archive->saveField("Aceito","S")){
                $this->Session->setFlash(__('O arquivo do projeto foi aprovado!'));
                $this->redirect(array('controller'=>'Projects','action'=>'view',$idProjeto,$idUsuario));
            }
        }
        else{
            $this->Session->setFlash('Você não tem autorização.');
            $this->redirect(array('controller' => 'Users', 'action' => 'perfil'));
        }
    }

    public function desaprovar($id = null,$idProjeto = null, $idUsuario = null){
        $this->Archive->id = $id;
        if ($this->Session->read('Auth.User.user_type_id') == 1) {
            $usuario = $this->Archive->find('first',array('conditions'=>array('Archive.id'=>$id)));
            if($this->Archive->saveField("Aceito","N")){
                $this->Session->setFlash(__('O arquivo do projeto foi reprovado!'));
                $this->redirect(array('controller'=>'Projects','action'=>'view',$idProjeto,$idUsuario));
            }
        }
        else{
            $this->Session->setFlash('Você não tem autorização.');
            $this->redirect(array('controller' => 'Users', 'action' => 'perfil'));
        }
    }


    public function index()
    {
        if ($this->Session->read('Auth.User.user_type_id') == 1) {
            $this->Archive->recursive = 2;
            $eventos = $this->Archive->find('all', array(
                'conditions' => array('Project.course_id' => $this->Session->read('Auth.User.course_id'))
            ));
            $this->set('novidadeImages',$eventos, $this->paginate());
            $qntCurriculo = $this->Archive->find('count', array(
                'conditions' => array('Project.user_id' => $this->Session->read('Auth.User.id'))
            ));
            $this->set('qtd', $qntCurriculo);
        }
        else{
            $this->Session->setFlash('Você não tem autorização.');
            $this->redirect(array('controller' => 'Users', 'action' => 'perfil'));
        }

    }


    public function add($idProjeto = null,$idUsuario = null) {
        if ($this->request->is('post')) {
            $qntImagens = $this->Archive->find('count', array(
                'conditions' => array('project_id' =>$idProjeto)
            ));

            if($qntImagens < 1){

                $this->Archive->create();
                $this->request->data['Archive']['project_id']=$idProjeto;
                if ($this->Archive->save($this->request->data)) {
                    $this->Session->setFlash(__('O arquivo foi salvo com sucesso!'));
                    $this->redirect(array('controller'=>'Projects','action' => 'view',$idProjeto,$idUsuario));
                } else {
                    $this->Session->setFlash(__('O arquivo não pode ser salvo, por favor tente novamente.'));
                }
            }
            else{
                $this->Session->setFlash(__('Você só pode adicionar 1 arquivo por Projeto.'));
            }
        }
        $novidades = $this->Archive->Project->find('list');
        $this->set(compact('novidades'));
    }


    public function edit($id = null,$idProjeto= null) {
        $this->Archive->id = $id;
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Archive->save($this->request->data)) {
                $this->Session->setFlash(__('o arquivo do projeto foi salvo com sucesso!'));
                $this->redirect(array('controller'=>'Projects','action' => 'view',$idProjeto));
            } else {
                $this->Session->setFlash(__('o arquivo não pode ser salva, por favor tente novamente.'));
            }
        } else {
            $options = array('conditions' => array('Archive.' . $this->Archive->primaryKey => $id));
            $this->request->data = $this->Archive->find('first', $options);
        }
        $novidades = $this->Archive->Project->find('list');
        $this->set(compact('novidades'));
    }


    public function delete($id = null)
    {
        $this->Archive->id = $id;
        if ($this->Archive->delete()) {
            $this->Session->setFlash(__('Seu arquivo foi apagado.'));
            $this->redirect(array('controller' => 'Projects', 'action' => 'index'));
        }
        $this->Session->setFlash(__('Seu arquivo não pode ser apagado.'));
        $this->redirect(array('controller' => 'Projects', 'action' => 'index'));
    }
}
