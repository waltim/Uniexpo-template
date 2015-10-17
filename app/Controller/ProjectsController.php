<?php
App::uses('AppController', 'Controller');

class ProjectsController extends AppController
{


    public $components = array('Paginator');

    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->loadModel('Archive');
        $this->loadModel('User');
        $this->loadModel('UserImage');
        $this->loadModel('Theme');
        $this->loadModel('Course');
        $this->loadModel('Semester');
        $this->loadModel('Movie');
        $this->loadModel('ProjectImage');
        $this->loadModel('ProjectUser');
    }


    public function aprovar($id = null)
    {
        $this->Project->id = $id;
        if ($this->Session->read('Auth.User.user_type_id') == 1) {
            $usuario = $this->Project->find('first', array('conditions' => array('Project.id' => $id)));
            if ($this->Project->saveField("Aceito", "S")) {
                $this->Session->setFlash(__('O projeto "' . $usuario['Project']['Titulo'] . '"foi aprovado!'));
                $this->redirect(array('action' => 'index'));
            }
        } else {
            $this->Session->setFlash('Você não tem autorização.');
            $this->redirect(array('controller' => 'Users', 'action' => 'perfil'));
        }
    }

    public function desaprovar($id = null)
    {
        $this->Project->id = $id;
        if ($this->Session->read('Auth.User.user_type_id') == 1) {
            $usuario = $this->Project->find('first', array('conditions' => array('Project.id' => $id)));
            if ($this->Project->saveField("Aceito", "N")) {
                $this->Session->setFlash(__('O projeto "' . $usuario['Project']['Titulo'] . '" foi reprovado!'));
                $this->redirect(array('action' => 'index'));
            }
        } else {
            $this->Session->setFlash('Você não tem autorização.');
            $this->redirect(array('controller' => 'Users', 'action' => 'perfil'));
        }
    }

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

        $projetos = $this->ProjectUser->find('all', array('conditions' => array('ProjectUser.user_id' => $this->Session->read('Auth.User.id')
        )));
        $projetosDisponiveis = $this->Project->find('all', array('conditions' => array('Project.user_id !=' => $this->Session->read('Auth.User.id'),
        )));
        $this->set("skills", $projetos);
        $this->set('skillsDisponiveis', $projetosDisponiveis);


        $this->Project->recursive = 2;
        $eventos = $this->Project->find('all', array(
            'conditions' => array('User.id' => $this->Session->read('Auth.User.id')
            )
        ));
        $qntProjetos = $this->Project->find('count', array(
            'conditions' => array('user_id' => $this->Session->read('Auth.User.id'))
        ));
        $qntTotalProjetos = $this->Project->find('count');

        $eventos2 = $this->Project->find('all',array('conditions' => array
        ('User.id !=' => $this->Session->read('Auth.User.id')
        )));

        $porCurso = $this->Project->find('all',array('conditions' => array
        ('User.id !=' => $this->Session->read('Auth.User.id'),
            'Project.course_id' => $this->Session->read('Auth.User.course_id')
        )));

        $this->set('qtdProjeto',$qntProjetos);
        $this->set('qtdTotal',$qntTotalProjetos);
        $this->set('ProjetosPorCurso', $porCurso, $this->paginate());
        $this->set('todosProjetos', $eventos2, $this->paginate());
        $this->set('novidades', $eventos, $this->paginate());

    }

    public function view($id = null,$idUsuario = null) {

        $id2 = $this->Session->read('Auth.User.id');
        $this->User->recursive = 2;
        $options = array('conditions' => array('User.' . $this->User->primaryKey => $id2));
        $this->set('tipo', $this->User->find('first', $options));
        $this->set('idUsuario', $id2);

        $qntFoto = $this->UserImage->find('count', array(
            'conditions' => array('user_id' => $this->Session->read('Auth.User.id'))
        ));
        $this->set('qtd', $qntFoto);


        if (!$this->Project->exists($id)) {
            throw new NotFoundException(__('Projeto está inválido.'));
        }
        $options = array('conditions' => array('Project.' . $this->Project->primaryKey => $id));
        $this->set('novidade', $this->Project->find('first', $options));
        $this->set('idProjeto',$id);

        $qntArquivo = $this->Archive->find('count', array(
            'conditions' => array('Project.user_id' => $idUsuario)
        ));
        $this->set('qntArquivo', $qntArquivo);

        $qntVideo = $this->Movie->find('count', array(
            'conditions' => array('Project.user_id' => $idUsuario)
        ));
        $this->set('qntVideo', $qntVideo);

        $qntImage = $this->ProjectImage->find('count', array(
            'conditions' => array('Project.user_id' => $idUsuario)
        ));
        $this->set('qntImage', $qntImage);

        $this->ProjectUser->recursive = 2;

        $foto = $this->ProjectUser->find('all', array(
            'conditions' => array('ProjectUser.project_id' => $id)
        ));
        $this->set('foto', $foto);

        $qtdfoto = $this->ProjectUser->find('count', array(
            'conditions' => array('ProjectUser.project_id' => $id)
        ));
        $this->set('qtdfoto', $qtdfoto);
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

            if ($this->request->is('post')) {
                $this->Project->create();
                $data['Project']['user_id'] = $this->Session->read('Auth.User.id');
                $data['Project']['course_id'] = $this->Session->read('Auth.User.course_id');
                $data['Project']['semester_id'] = $this->Session->read('Auth.User.semester_id');
                $data['Project']['project_type_id'] = $this->request->data['Project']['project_type_id'];
                $data['Project']['Titulo'] = $this->request->data['Project']['Titulo'];
                $data['Project']['theme_id'] = $this->request->data['Project']['theme_id'];
                $data['Project']['Descricao'] = $this->request->data['Project']['Descricao'];
                $data['Project']['Aceito'] = 'N';
                if ($this->Project->save($data)) {
                    $this->Session->setFlash(__('seu projeto foi salvo com sucesso!'));
                    $this->redirect(array('controller' => 'Projects', 'action' => 'index'));
                } else {
                    $this->Session->setFlash(__('seu projeto nao pode ser salvo, por favor tente novamente.'));
                }
            }
        $novidades = $this->Project->ProjectType->find('list');
        $this->set(compact('novidades'));
        $temas = $this->Project->Theme->find('list');
        $this->set(compact('temas'));
    }


    public function edit($id = null,$idUser = null)
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


        if ($this->Session->read('Auth.User.id') == $idUser) {
        $this->Project->id = $id;
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Project->save($this->request->data)) {
                $this->Session->setFlash(__('Seu projeto foi salvo com sucesso!'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Seu projeto não pode ser salvo, por favor tente novamente.'));
            }
        } else {
            $options = array('conditions' => array('Project.' . $this->Project->primaryKey => $id));
            $this->request->data = $this->Project->find('first', $options);
        }
        $novidades = $this->Project->ProjectType->find('list');
        $this->set(compact('novidades'));
        $temas = $this->Project->Theme->find('list');
        $this->set(compact('temas'));
        } else {
            $this->Session->setFlash('Você não tem autorização.');
            $this->redirect(array('controller' => 'Users', 'action' => 'perfil'));
        }
    }


    public function delete($id = null)
    {

        $this->Project->id = $id;
        if (!$this->Project->exists()) {
            throw new NotFoundException(__('Seu projeto está inválido.'));
        }
        if ($this->Project->delete()) {
            $this->Session->setFlash(__('Seu projeto foi apagado.'));
            $this->redirect(array('controller' => 'Projects', 'action' => 'index'));
        }
        $this->Session->setFlash(__('Seu projeto não pode ser apagado.'));
        $this->redirect(array('controller' => 'Projects', 'action' => 'index'));
    }
}
