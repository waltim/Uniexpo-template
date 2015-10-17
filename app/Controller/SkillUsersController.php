<?php

/**
 * Created by PhpStorm.
 * User: Walterlmm
 * Date: 14/08/2015
 * Time: 00:03
 */

App::uses('AppController', 'Controller');

class SkillUsersController extends AppController
{

    public $uses = array('User','UserImage','Skill','SkillUser');

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

        if ($this->Session->read('Auth.User.user_type_id') == 1) {
            $this->SkillUser->recursive = 2;
            $eventos = $this->SkillUser->find('all', array(
                'conditions'=>array('Skill.course_id' => $this->Session->read('Auth.User.course_id'))
            ));
            $this->set('tipos',$eventos ,$this->paginate());
        } else {
            $this->Session->setFlash('Você não tem autorização.');
            $this->redirect(array('controller' => 'Users', 'action' => 'perfil'));
        }

    }



    public function linkSkill($idSkill = null)
    {
        if ($idSkill!=null) {
            $this->SkillUser->create();
            $data['SkillUser']['user_id'] = $this->Auth->user('id');
            $data['SkillUser']['skill_id'] = $idSkill;
                if ($this->SkillUser->save($data))
                    $this->Session->setFlash('A habilidade registrada na sua lista de competências!', 'default', array('class' => 'success'));
                $this->redirect(array('controller'=> 'Users' , 'action' => 'perfil'));
                $this->data = array();
        }
        $tipos = $this->SkillUser->Skill->find('list');
        $this->set(compact('tipos'));
        $tipos2 = $this->SkillUser->User->find('list');
        $this->set(compact('tipos2'));
    }



    public function unLinkSkill($idSkill = null){
        $this->SkillUser->id = $idSkill;
        if (!$this->SkillUser->exists()) {
            throw new NotFoundException(__('Skill está inválido.'));
            $this->redirect(array('controller'=> 'Users' , 'action' => 'perfil'));
        }
        if ($this->SkillUser->delete()) {
            $this->Session->setFlash(__('Habilidade retirado da sua lista de competências.'));
            $this->redirect(array('controller'=> 'Users' , 'action' => 'perfil'));
        }
        $this->Session->setFlash(__('Skill não pode ser retirada, tente novamente.'));
        $this->redirect(array('controller'=> 'Users' , 'action' => 'perfil'));
    }


}