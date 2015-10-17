<?php
App::uses('AppController', 'Controller');
/**
 * EventoImages Controller
 *
 * @property EventoImage $EventoImage
 * @property PaginatorComponent $Paginator
 */
class MoviesController extends AppController {

    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->loadModel('User');
        $this->loadModel('UserImage');
        $this->loadModel('Movie');
    }
	public $components = array('Paginator');

    public function aprovar($id = null,$idProjeto = null, $idUsuario = null){
        $this->Movie->id = $id;
        if ($this->Session->read('Auth.User.user_type_id') == 1) {
            $usuario = $this->Movie->find('first',array('conditions'=>array('Movie.id'=>$id)));
            if($this->Movie->saveField("Aceito","S")){
                $this->Session->setFlash(__('O vídeo do projeto foi aprovado!'));
                $this->redirect(array('controller'=>'Projects','action'=>'view',$idProjeto,$idUsuario));
            }
        }
        else{
            $this->Session->setFlash('Você não tem autorização.');
            $this->redirect(array('controller' => 'Users', 'action' => 'perfil'));
        }
    }

    public function desaprovar($id = null,$idProjeto = null, $idUsuario = null){
        $this->Movie->id = $id;
        if ($this->Session->read('Auth.User.user_type_id') == 1) {
            $usuario = $this->Movie->find('first',array('conditions'=>array('Movie.id'=>$id)));
            if($this->Movie->saveField("Aceito","N")){
                $this->Session->setFlash(__('O vídeo do projeto foi reprovado!'));
                $this->redirect(array('controller'=>'Projects','action'=>'view',$idProjeto,$idUsuario));
            }
        }
        else{
            $this->Session->setFlash('Você não tem autorização.');
            $this->redirect(array('controller' => 'Users', 'action' => 'perfil'));
        }
    }

	public function index() {

        $id2 = $this->Session->read('Auth.User.id');
        $this->User->recursive = 2;
        $options = array('conditions' => array('User.' . $this->User->primaryKey => $id2));
        $this->set('tipo', $this->User->find('first', $options));
        $this->set('idUsuario', $id2);

        $qntFoto = $this->UserImage->find('count', array(
            'conditions' => array('user_id' => $this->Session->read('Auth.User.id'))
        ));
        $this->set('qtd', $qntFoto);

        $this->Movie->recursive = 0;
        $projetoImages = $this->Movie->find('all');

        $this->set('projetoImages',$projetoImages);
	}



    public function add($idProjeto = null, $idUsuario = null) {

        $id2 = $this->Session->read('Auth.User.id');
        $this->User->recursive = 2;
        $options = array('conditions' => array('User.' . $this->User->primaryKey => $id2));
        $this->set('tipo', $this->User->find('first', $options));
        $this->set('idUsuario', $id2);

        $qntFoto = $this->UserImage->find('count', array(
            'conditions' => array('user_id' => $this->Session->read('Auth.User.id'))
        ));
        $this->set('qtd', $qntFoto);


        if ($this->request->is('post')) {
            $qntImagens = $this->Movie->find('count', array(
                'conditions' => array('project_id' =>$idProjeto)
            ));

            if($qntImagens <= 4){

                $this->Movie->create();
                $this->request->data['Movie']['project_id']=$idProjeto;
                if ($this->Movie->save($this->request->data)) {
                    $this->Session->setFlash(__('O vídeo foi salvo com sucesso!'));
                    $this->redirect(array('controller'=>'Projects','action' => 'view',$idProjeto,$idUsuario));
                } else {
                    $this->Session->setFlash(__('O vídeo não pode ser salvo, por favor tente novamente.'));
                }
            }
            else{
                $this->Session->setFlash(__('Você só pode adicionar 05 vídeos por Projeto.'));
            }
        }
        $projetoimages = $this->Movie->Project->find('list');
        $this->set(compact('projetoimages'));
    }


	public function edit($id = null,$idProjeto= null, $idUsuario = null) {

        $id2 = $this->Session->read('Auth.User.id');
        $this->User->recursive = 2;
        $options = array('conditions' => array('User.' . $this->User->primaryKey => $id2));
        $this->set('tipo', $this->User->find('first', $options));
        $this->set('idUsuario', $id2);

        $qntFoto = $this->UserImage->find('count', array(
            'conditions' => array('user_id' => $this->Session->read('Auth.User.id'))
        ));
        $this->set('qtd', $qntFoto);


        $this->Movie->id = $id;
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Movie->save($this->request->data)) {
				$this->Session->setFlash(__('O vídeo do projeto foi salvo com sucesso!'));
                $this->redirect(array('controller'=>'Projects','action' => 'view',$idProjeto,$idUsuario));
			} else {
				$this->Session->setFlash(__('O vídeo não pode ser salvo, por favor tente novamente.'));
			}
		} else {
			$options = array('conditions' => array('Movie.' . $this->Movie->primaryKey => $id));
			$this->request->data = $this->Movie->find('first', $options);
		}
        $projetoimages = $this->Movie->Project->find('list');
        $this->set(compact('projetoimages'));

	}

	public function delete($id = null) {
		$this->Movie->id = $id;
		if (!$this->Movie->exists()) {
			throw new NotFoundException(__('O vídeo está inválido.'));
		}
		if ($this->Movie->delete()) {
			$this->Session->setFlash(__('O vídeo foi apagado.'));
			$this->redirect(array('controller'=>'Projects','action' => 'index'));
		}
		$this->Session->setFlash(__('O vídeo não pode ser apagado.'));
        $this->redirect(array('controller'=>'Projects','action' => 'index'));
	}
}
