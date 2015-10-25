<?php
App::uses('AppController', 'Controller');

class ProjectImagesController extends AppController {

public $uses = array('User','UserImage','ProjectImage');

	public $components = array('Paginator');


    public function aprovar($id = null, $idProjeto = null, $idUsuario = null){
        $this->ProjectImage->id = $id;
        if ($this->Session->read('Auth.User.user_type_id') == 1 || $this->Session->read('Auth.User.user_type_id') == 3) {
            $usuario = $this->ProjectImage->find('first',array('conditions'=>array('ProjectImage.id'=>$id)));
            if($this->ProjectImage->saveField("Aceito","S")){
                $this->Session->setFlash(__('A imagem do projeto foi aprovada!'), 'flash/success');
                $this->redirect(array('controller'=>'Projects','action'=>'view',$idProjeto,$idUsuario));
            }
        }
        else{
            $this->Session->setFlash(__('Você não tem autorização.'), 'flash/error');
            $this->redirect(array('controller' => 'Users', 'action' => 'perfil'));
        }
    }

    public function desaprovar($id = null,$idProjeto = null, $idUsuario = null){
        $this->ProjectImage->id = $id;
        if ($this->Session->read('Auth.User.user_type_id') == 1 || $this->Session->read('Auth.User.user_type_id') == 3) {
            $usuario = $this->ProjectImage->find('first',array('conditions'=>array('ProjectImage.id'=>$id)));
            if($this->ProjectImage->saveField("Aceito","N")){
                $this->Session->setFlash(__('A imagem do projeto foi reprovada!'), 'flash/success');
                $this->redirect(array('controller'=>'Projects','action'=>'view',$idProjeto,$idUsuario));
            }
        }
        else{
            $this->Session->setFlash(__('Você não tem autorização.'), 'flash/error');
            $this->redirect(array('controller' => 'Users', 'action' => 'perfil'));
        }
    }


    public function add($idProjeto = null,$idUsuario = null) {

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
            $qntImagens = $this->ProjectImage->find('count', array(
                'conditions' => array('project_id' =>$idProjeto)
            ));

            if($qntImagens <= 9){

                $this->ProjectImage->create();
                $this->request->data['ProjectImage']['project_id']=$idProjeto;
                if ($this->ProjectImage->save($this->request->data)) {
                    $this->Session->setFlash(__('A imagem foi salva com sucesso!'), 'flash/success');
                    $this->redirect(array('controller'=>'Projects','action' => 'view',$idProjeto,$idUsuario));
                } else {
                    $this->Session->setFlash(__('A imagem não pode ser salva, por favor tente novamente.'), 'flash/error');
                }
            }
            else{
                $this->Session->setFlash(__('Você só pode adicionar 10 imagens por Projeto.'), 'flash/info');
            }
        }
        $projetoimages = $this->ProjectImage->Project->find('list');
        $this->set(compact('projetoimages'));
    }


	public function edit($id = null,$idProjeto= null,$idUsuario = null) {

        $id2 = $this->Session->read('Auth.User.id');
        $this->User->recursive = 2;
        $options = array('conditions' => array('User.' . $this->User->primaryKey => $id2));
        $this->set('tipo', $this->User->find('first', $options));
        $this->set('idUsuario', $id2);

        $qntFoto = $this->UserImage->find('count', array(
            'conditions' => array('user_id' => $this->Session->read('Auth.User.id'))
        ));
        $this->set('qtd', $qntFoto);

        $this->ProjectImage->id = $id;
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ProjectImage->save($this->request->data)) {
				$this->Session->setFlash(__('a imagem do projeto foi salva com sucesso!'), 'flash/success');
                $this->redirect(array('controller'=>'Projects','action' => 'view',$idProjeto,$idUsuario));
			} else {
				$this->Session->setFlash(__('A imagem não pode ser salva, por favor tente novamente.'), 'flash/error');
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
            $this->Session->setFlash(__('A imagem está inválida.'), 'flash/error');
		}
		if ($this->ProjectImage->delete()) {
			$this->Session->setFlash(__('A Imagem foi apagada.'), 'flash/success');
			$this->redirect(array('controller'=>'Projects','action' => 'index'));
		}
		$this->Session->setFlash(__('A Imagem não pode ser apagada.'), 'flash/error');
        $this->redirect(array('controller'=>'Projects','action' => 'index'));
	}
}
