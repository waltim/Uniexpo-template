<style type="text/css">

    .RedesSociais a {
        margin-left: 13px;
        float: right;
    }

    .RedesSociais h1 {
        clear: both;
        float: right;
        font-size: 30px;
    }

    .DadosUusuario {
        margin-left: 15px;
    }

    .DadosUusuario table {
        margin-top: 15px;
    }

    .FotoUsuario {
        margin-left: 15px;
    }
</style>
<div class="content-wrapper">
    <section class="content-header">
        <h1> <li class="list-group-item"><a href="<?=$admLocal?>Users/edit/<?php echo $tipo['User']['id'] ?>">Atualizar informações</a></li></h1>
    </section>
    <section class="content">
        <div class="RedesSociais">
            <h1>Redes sociais</h1><br><br><br>
            <?php
            foreach ($novidadeImages as $novidadeImage): ?>

                <?php if ($novidadeImage['social_types']['Descricao'] == 'Facebook') : ?>
                    <a href="<?php echo $novidadeImage['Social']['Link']; ?>" target="_blank"> <img
                            src="<?= $admLocal ?>img/facebook-icon.png" style="width: 56px"></a>
                <?php endif; ?>
                <?php if ($novidadeImage['social_types']['Descricao'] == 'Instagram') : ?>
                    <a href="<?php echo $novidadeImage['Social']['Link']; ?>" target="_blank"> <img
                            src="<?= $admLocal ?>img/instagram.png" style="width: 56px"></a>
                <?php endif; ?>
                <?php if ($novidadeImage['social_types']['Descricao'] == 'Twitter') : ?>
                    <a href="<?php echo $novidadeImage['Social']['Link']; ?>" target="_blank"> <img
                            src="<?= $admLocal ?>img/twitter.png" style="width: 56px"></a>
                <?php endif; ?>
                <?php if ($novidadeImage['social_types']['Descricao'] == 'Linkedin') : ?>
                    <a href="<?php echo $novidadeImage['Social']['Link']; ?>" target="_blank"> <img
                            src="<?= $admLocal ?>img/linkedin.png" style="width: 56px"></a>
                <?php endif; ?>
                <?php if ($novidadeImage['social_types']['Descricao'] == 'Youtube') : ?>
                    <a href="<?php echo $novidadeImage['Social']['Link']; ?>" target="_blank"> <img
                            src="<?= $admLocal ?>img/Youtube.png" style="width: 56px"></a>
                <?php endif; ?>

            <?php endforeach; ?>
        </div>

        <div class="FotoUsuario">
            <?php if ($qtd >= 1) : ?>
                <?php if ($tipo['UserImage']['Aceito'] == 'S') : ?>
                   Foto aprovada.
                <?php endif; ?>
                <?php if ($tipo['UserImage']['Aceito'] == 'N') : ?>
                    Aguardando aprovação.
                <?php endif; ?>
                <?php echo $this->Html->link(__('Editar'), array('controller' => 'UserImages', 'action' => 'edit', $tipo['UserImage']['id']), array('class' => 'btn btn-default btn-xs')); ?>
                <?php echo $this->Form->postLink(__('Apagar'), array('controller' => 'UserImages', 'action' => 'delete', $tipo['UserImage']['id']), array('class' => 'btn btn-default btn-xs'), __('Tem certeza que deseja apagar este item? %s?', $tipo['UserImage']['id'])); ?>
            <?php endif; ?>
            <?php if ($qtd < 1) : ?>
                <a href="<?= $admLocal ?>UserImages/add/<?= $idUsuario ?>"
                   class="btn btn-primary"><i class="icon-plus icon-white"></i> Cadastrar foto</a>
            <?php endif; ?>

            <?php if ($qtd == 1) : ?>
                <?php
                $tipo['UserImage']['dir'] = explode('\\', $tipo['UserImage']['dir']);
                $tipo['UserImage']['dir'] = implode('/', $tipo['UserImage']['dir']);
                $img = $admLocal . $tipo['UserImage']['dir'] . "/" . $tipo['UserImage']['filename'];
                ?>
                <br>
                <img src="<?= $img ?>" style="width: 135px;" \>
            <?php endif; ?>
            <?php if ($qtd == 0) : ?>
                <?php if ($this->Session->read('Auth.User.Sexo') == 'Masculino') : ?>
                    <br>
                    <img src="<?= $admLocal ?>img/masculino.jpg" style="width: 135px;">
                <?php endif; ?>

                <?php if ($this->Session->read('Auth.User.Sexo') == 'Feminino') : ?>
                    <br>
                    <img src="<?= $admLocal ?>img/feminino.jpg" style="width: 135px;">
                <?php endif; ?>
            <?php endif; ?>
        </div>

        <div class="DadosUusuario">
            <table>
                <tr>
                    <td><strong>Matrícula &nbsp </strong></td>
                    <td>
                        <?php echo $tipo['User']['Matricula']; ?>
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <td><strong>Curso &nbsp</strong></td>
                    <td>
                        <?php echo $tipo['Course']['Nome']; ?>
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <td><strong>Semestre &nbsp </strong></td>
                    <td>
                        <?php echo $tipo['Semester']['Descricao']; ?>
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <td><strong>Email &nbsp</strong></td>
                    <td>
                        <?php echo $tipo['User']['Email']; ?>
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <td><strong>Telefone &nbsp</strong></td>
                    <td>
                        <?php echo $tipo['User']['Telefone']; ?>
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <td><strong>Sexo &nbsp</strong></td>
                    <td>
                        <?php echo $tipo['User']['Sexo']; ?>
                        &nbsp;
                    </td>
                </tr>
            </table>
        </div>

                <?= $this->Session->flash('skills_flash'); ?>

                <div id="page-content" class="col-sm-5" style="float:left; margin-top: 40px;">

                    <ul class="list-group">
                        <li class="list-group-item border-color-green">

                                <span
                                    style="font-weight:bolder; color: #004680;">Habilidades marcadas como competências</span>

                        </li>
                        <?php foreach ($skills as $skill) { ?>

                            <li class="list-group-item border-color-green">

                                <?= $skill['Skill']['Nome'] ?>
                                <?php echo $this->Html->link(__('Desmarcar'), array('controller' => 'SkillUsers', 'action' => 'unLinkSkill', $skill['SkillUser']['id']), array('style' => 'float:right; margin-right:1%;', 'class' => 'btn btn-default btn-xs')); ?>

                            </li>
                        <?php } ?>

                    </ul>
                </div>

                <div id="page-content" class="col-sm-5" style="float:left; margin-top: 40px;">

                    <ul class="list-group">
                        <li class="list-group-item border-color-green">

                            <span style="font-weight:bolder; color: #004680;">Habilidades disponíveis</span>

                        </li>
                        <?php foreach ($skillsDisponiveis as $skillsDisponivel) { ?>
                            <?php $competencia = false ?>
                            <?php foreach ($skills as $skill) { ?>

                                <?php if ($skill['SkillUser']['skill_id'] == $skillsDisponivel['Skill']['id']) {
                                    $competencia = true;
                                } ?>


                            <?php } ?>
                            <?php if (!$competencia) { ?>
                                <li class="list-group-item border-color-green">

                                    <?= $skillsDisponivel['Skill']['Nome'] ?>
                                    <?php echo $this->Html->link(__('Competência'), array('controller' => 'SkillUsers', 'action' => 'linkSkill', $skillsDisponivel['Skill']['id']), array('style' => 'float:right; margin-right:1%;', 'class' => 'btn btn-default btn-xs')); ?>
                                </li>
                            <?php } ?>
                        <?php } ?>
                    </ul>
                </div>

    </section>
</div>
