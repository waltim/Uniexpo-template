<?php
App::uses('AppController', 'Controller');
/**
 * EventoImages Controller
 *
 * @property EventoImage $EventoImage
 * @property PaginatorComponent $Paginator
 */
class ProjectImagesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');


    public function aprovar($id = null, $idProjeto = null, $idUsuario = null){
        $this->ProjectImage->id = $id;
        if ($this->Session->read('Auth.User.user_type_id') == 1) {
            $usuario = $this->ProjectImage->find('first',array('conditions'=>array('ProjectImage.id'=>$id)));
            if($this->ProjectImage->saveField("Aceito","S")){
                $this->Session->setFlash(__('A imagem do projeto foi aprovada!'));
                $this->redirect(array('controller'=>'Projects','action'=>'view',$idProjeto,$idUsuario));
            }
        }
        else{
            $this->Session->setFlash('Você não tem autorização.');
            $this->redirect(array('controller' => 'Users', 'action' => 'perfil'));
        }
    }

    public function desaprovar($id = null,$idProjeto = null, $idUsuario = null){
        $this->ProjectImage->id = $id;
        if ($this->Session->read('Auth.User.user_type_id') == 1) {
            $usuario = $this->ProjectImage->find('first',array('conditions'=>array('ProjectImage.id'=>$id)));
            if($this->ProjectImage->saveField("Aceito","N")){
                $this->Session->setFlash(__('A imagem do projeto foi reprovada!'));
                $this->redirect(array('controller'=>'Projects','action'=>'view',$idProjeto,$idUsuario));
            }
        }
        else{
            $this->Session->setFlash('Você não tem autorização.');
            $this->redirect(array('controller' => 'Users', 'action' => 'perfil'));
        }
    }



	public function index() {
        $this->ProjectImage->recursive = 0;
        $projetoImages = $this->ProjectImage->find('all');

        $this->set('projetoImages',$projetoImages);
	}



    public function add($idProjeto = null,$idUsuario = null) {
        if ($this->request->is('post')) {
            $qntImagens = $this->ProjectImage->find('count', array(
                'conditions' => array('project_id' =>$idProjeto)
            ));

            if($qntImagens <= 9){

                $this->ProjectImage->create();
                $this->request->data['ProjectImage']['project_id']=$idProjeto;
                if ($this->ProjectImage->save($this->request->data)) {
                    $this->Session->setFlash(__('A imagem foi salva com sucesso!'));
                    $this->redirect(array('controller'=>'Projects','action' => 'view',$idProjeto,$idUsuario));
                } else {
                    $this->Session->setFlash(__('A imagem não pode ser salva, por favor tente novamente.'));
                }
            }
            else{
                $this->Session->setFlash(__('Você só pode adicionar 10 imagens por Projeto.'));
            }
        }
        $projetoimages = $this->ProjectImage->Project->find('list');
        $this->set(compact('projetoimages'));
    }


	public function edit($id = null,$idProjeto= null) {
        $this->ProjectImage->id = $id;
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ProjectImage->save($this->request->data)) {
				$this->Session->setFlash(__('a imagem do projeto foi salva com sucesso!'));
                $this->redirect(array('controller'=>'Projects','action' => 'view',$idProjeto));
			} else {
				$this->Session->setFlash(__('A imagem não pode ser salva, por favor tente novamente.'));
			}
		} else {
			$options = array('conditions' => array('ProjectImage.' . $this->ProjectImage->primaryKey => $id));
			$this->request->data = $this->ProjectImage->find('first', $options);
		}
        $projetoimages = $this->ProjectImage->Project->find('list');
        $this->set(compact('projetoimages'));

	}

	public function delete($id = null,$idProjeto= null) {
		$this->ProjectImage->id = $id;
		if (!$this->ProjectImage->exists()) {
			throw new NotFoundException(__('A imagem está inválida.'));
		}
		if ($this->ProjectImage->delete()) {
			$this->Session->setFlash(__('A Imagem foi apagada.'));
			$this->redirect(array('controller'=>'Projects','action' => 'index'));
		}
		$this->Session->setFlash(__('A Imagem não pode ser apagada.'));
        $this->redirect(array('controller'=>'Projects','action' => 'index'));
	}
}
