
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <li class="list-group-item"><?php echo $this->Html->link(__('Visualizar Projetos'), array('action' => 'index'), array('class' => '')); ?> </li>
        </h1>
        <h1>
            <li class="list-group-item"><?php echo $this->Html->link(__('Novo Projeto'), array('action' => 'add'), array('class' => '')); ?> </li>
        </h1>
    </section>

    <section class="content">
            <h2>Projeto</h2>

            <div class="table-responsive">
                <table class="table-striped table-bordered">
                    <tbody>
                    <tr>
                        <td><strong><?php echo __('Título do projeto'); ?></strong></td>
                        <td>
                            <?php echo h($novidade['Project']['Titulo']); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td><strong><?php echo __('Tema do projeto'); ?></strong></td>
                        <td>
                            <?php echo h($novidade['Theme']['Descricao']); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td><strong><?php echo __('Tipo do projeto'); ?></strong></td>
                        <td>
                            <?php echo h($novidade['ProjectType']['Nome']); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td><strong><?php echo __('Curso'); ?></strong></td>
                        <td>
                            <?php echo h($novidade['Course']['Nome']); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td><strong><?php echo __('Semestre'); ?></strong></td>
                        <td>
                            <?php echo h($novidade['Semester']['Descricao']); ?>
                            &nbsp;
                        </td>
                    </tr>

                    <tr>
                        <td><strong><?php echo __('Descrição'); ?></strong></td>
                        <td>
                            <?php echo $novidade['Project']['Descricao']; ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td><strong><?php echo __('Votos'); ?></strong></td>
                        <td>
                            <?php echo $novidade['Project']['Votos'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td><strong><?php echo __('Data de Criação'); ?></strong></td>
                        <td>
                            <?php echo date("d/m/Y", strtotime($novidade['Project']['created'])); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td><strong><?php echo __('Data e horas da ultima atualização'); ?></strong></td>
                        <td>
                            <?php echo $novidade['Project']['modified']; ?>
                            &nbsp;
                        </td>
                    </tr>
                    </tbody>
                </table>
                <!-- /.table table-striped table-bordered -->
            </div>
            <!-- /.table-responsive -->


        <!-- /.view -->

        <div class="related">

            <h3><?php echo __('Imagens do Projeto'); ?></h3>

            <?php if (!empty($novidade['ProjectImage'])): ?>

                <div class="table-responsive">
                    <table class="table-striped table-bordered">
                        <thead>
                        <tr>
                            <th><?php echo __('Pre Visualização'); ?></th>
                            <?php if ($novidade['Project']['user_id'] == $this->Session->read('Auth.User.id') || $this->Session->read('Auth.User.user_type_id') == 1) : ?>
                                <th>Status</th>
                                <?php if ($novidade['Project']['user_id'] == $this->Session->read('Auth.User.id') || $this->Session->read('Auth.User.user_type_id') == 1 && $this->Session->read('Auth.User.course_id') == $novidade['Project']['course_id']) : ?>
                                    <th class="actions"><?php echo __('Ações'); ?></th>
                                <?php endif; ?>
                            <?php endif; ?>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i = 0;
                        foreach ($novidade['ProjectImage'] as $novidadeImage): ?>
                            <tr>
                                <td>
                                    <?php
                                    $novidadeImage['dir'] = explode('\\', $novidadeImage['dir']);
                                    $novidadeImage['dir'] = implode('/', $novidadeImage['dir']);
                                    $img = $admLocal . $novidadeImage['dir'] . "/" . $novidadeImage['filename'];
                                    ?>
                                    <img src="<?= $img ?>" style="width: 200px;" \>
                                </td>
                                <?php if ($novidade['Project']['user_id'] == $this->Session->read('Auth.User.id') || $this->Session->read('Auth.User.user_type_id') == 1) : ?>
                                    <td>
                                        <?php if ($novidadeImage['Aceito'] == 'S') : ?>
                                            <img src="<?= $admLocal ?>img/aprovado.png" style="width: 30px">
                                        <?php endif; ?>
                                        <?php if ($novidadeImage['Aceito'] == 'N') : ?>
                                            <img src="<?= $admLocal ?>img/reprovado.png" style="width: 30px">
                                        <?php endif; ?>
                                    </td>
                                    <?php if ($novidade['Project']['user_id'] == $this->Session->read('Auth.User.id') || $this->Session->read('Auth.User.user_type_id') == 1 && $this->Session->read('Auth.User.course_id') == $novidade['Project']['course_id']) : ?>
                                        <td class="actions">
                                            <?php if ($this->Session->read('Auth.User.user_type_id') == 1 || $this->Session->read('Auth.User.user_type_id') == 3 && $this->Session->read('Auth.User.course_id') == $novidade['Project']['course_id']) : ?>
                                                <?php
                                                if ($novidadeImage['Aceito'] == 'N'):
                                                    echo $this->Html->link(__('Aprovar imagem'), array('controller' => 'ProjectImages', 'action' => 'aprovar', $novidadeImage['id'], $idProjeto, $idUsuario = $novidade['Project']['user_id']), array('class' => 'btn btn-default btn-xs'));
                                                else:
                                                    echo $this->Html->link(__('Desaprovar imagem'), array('controller' => 'ProjectImages', 'action' => 'desaprovar', $novidadeImage['id'], $idProjeto, $idUsuario = $novidade['Project']['user_id']), array('class' => 'btn btn-default btn-xs'));
                                                endif;
                                                ?>
                                            <?php endif; ?>
                                            <a href="<?= $admLocal ?>ProjectImages/edit/<?php echo $novidadeImage['id'] ?>/<?= $idProjeto ?>/<?= $idUsuario = $novidade['Project']['user_id'] ?>" class="btn btn-default btn-xs">Editar</a>
                                            <?php echo $this->Form->postLink(__('Apagar'), array('controller' => 'ProjectImages', 'action' => 'delete', $novidadeImage['id']), array('class' => 'btn btn-default btn-xs'), __('Tem certeza que deseja apagar este item? %s?', $novidadeImage['id'])); ?>
                                        </td>
                                    <?php endif; ?>
                                <?php endif; ?>

                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
            <?php if ($novidade['Project']['user_id'] == $this->Session->read('Auth.User.id') && ($qntImage < 10)): ?>
                <div class="actions">
                    <a href="<?= $admLocal ?>ProjectImages/add/<?= $idProjeto ?>/<?= $idUsuario = $novidade['Project']['user_id'] ?>"
                       class="btn btn-primary esquerda"><i
                            class="icon-plus icon-white"></i> Nova Imagem</a>
                </div>
            <?php endif; ?>
        </div>

        <div class="related">

            <h3><?php echo __('Vídeos do projeto'); ?></h3>

            <?php if (!empty($novidade['Movie'])): ?>

                <div class="table-responsive">
                    <table class="table-striped table-bordered">
                        <thead>
                        <tr>

                            <th><?php echo __('Pre Visualização'); ?></th>
                            <?php if ($novidade['Project']['user_id'] == $this->Session->read('Auth.User.id') || $this->Session->read('Auth.User.user_type_id') == 1 || $this->Session->read('Auth.User.user_type_id') == 3) : ?>
                                <th class="actions">Status</th>
                                <?php if ($novidade['Project']['user_id'] == $this->Session->read('Auth.User.id') || $this->Session->read('Auth.User.user_type_id') == 1 && $this->Session->read('Auth.User.course_id') == $novidade['Project']['course_id']) : ?>
                                    <th class="actions"><?php echo __('Ações'); ?></th>
                                <?php endif; ?>
                            <?php endif; ?>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i = 0;
                        foreach ($novidade['Movie'] as $videos): ?>
                            <tr>
                                <td>
                                    <?php
                                    $linkVideo = explode("v=", $videos['Link']);
                                    if (!is_array($linkVideo)) {
                                        $linkVideo = explode("youtu.be/", $videos['Link']);

                                    };
                                    $linkVideo = array_pop($linkVideo);
                                    ?>
                                    <iframe width="300" height="200" src="//www.youtube.com/embed/<?= $linkVideo ?>"
                                            frameborder="0" allowfullscreen>

                                    </iframe>

                                </td>
                                <?php if ($novidade['Project']['user_id'] == $this->Session->read('Auth.User.id') || $this->Session->read('Auth.User.user_type_id') == 1) : ?>
                                    <td>
                                        <?php if ($videos['Aceito'] == 'S') : ?>
                                            <img src="<?= $admLocal ?>img/aprovado.png" style="width: 30px">
                                        <?php endif; ?>
                                        <?php if ($videos['Aceito'] == 'N') : ?>
                                            <img src="<?= $admLocal ?>img/reprovado.png" style="width: 30px">
                                        <?php endif; ?>
                                    </td>
                                    <?php if ($novidade['Project']['user_id'] == $this->Session->read('Auth.User.id') || $this->Session->read('Auth.User.user_type_id') == 1 && $this->Session->read('Auth.User.course_id') == $novidade['Project']['course_id']) : ?>
                                        <td class="actions">
                                            <?php if ($this->Session->read('Auth.User.user_type_id') == 1 || $this->Session->read('Auth.User.user_type_id') == 3 && $this->Session->read('Auth.User.course_id') == $novidade['Project']['course_id']) : ?>
                                                <?php
                                                if ($videos['Aceito'] == 'N'):
                                                    echo $this->Html->link(__('Aprovar vídeo'), array('controller' => 'Movies', 'action' => 'aprovar', $videos['id'], $idProjeto, $idUsuario = $novidade['Project']['user_id']), array('class' => 'btn btn-default btn-xs'));
                                                else:
                                                    echo $this->Html->link(__('Desaprovar vídeo'), array('controller' => 'Movies', 'action' => 'desaprovar', $videos['id'], $idProjeto, $idUsuario = $novidade['Project']['user_id']), array('class' => 'btn btn-default btn-xs'));
                                                endif;
                                                ?>
                                            <?php endif; ?>
                                            <?php echo $this->Html->link(__('Editar'), array('controller' => 'Movies', 'action' => 'edit', $videos['id'], $idProjeto, $idUsuario = $novidade['Project']['user_id']), array('class' => 'btn btn-default btn-xs')); ?>
                                            <?php echo $this->Form->postLink(__('Apagar'), array('controller' => 'Movies', 'action' => 'delete', $videos['id']), array('class' => 'btn btn-default btn-xs'), __('Tem certeza que deseja apagar este item? %s?', $videos['id'])); ?>
                                        </td>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                Não foi enviado vídeo.
            <?php endif; ?>
            <?php if ($novidade['Project']['user_id'] == $this->Session->read('Auth.User.id') && ($qntVideo < 5)): ?>
                <div class="actions">
                    <a href="<?= $admLocal ?>Movies/add/<?= $idProjeto ?>/<?= $idUsuario = $novidade['Project']['user_id'] ?>"
                       class="btn btn-primary esquerda"><i
                            class="icon-plus icon-white"></i> Novo vídeo</a>
                </div>
            <?php endif; ?>
        </div>

        <div class="related">

            <h3><?php echo __('Arquivo do Projeto'); ?></h3>

            <?php if ($qntArquivo >= 1): ?>

                <?php if (!empty($novidade['Archive'])): ?>

                    <div class="table-responsive">
                        <table class="table-striped table-bordered">
                            <thead>
                            <tr>
                                <th><?php echo __('Arquivo'); ?></th>
                                <?php if ($novidade['Project']['user_id'] == $this->Session->read('Auth.User.id') || $this->Session->read('Auth.User.user_type_id') == 1) : ?>
                                    <th>Status</th>
                                    <?php if ($novidade['Project']['user_id'] == $this->Session->read('Auth.User.id') || $this->Session->read('Auth.User.user_type_id') == 1 && $this->Session->read('Auth.User.course_id') == $novidade['Project']['course_id']) : ?>
                                        <th class="actions"><?php echo __('Ações'); ?></th>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <?php
                                    $arquivo = $novidade['Archive'];
                                    $arq = explode("\\", $arquivo['dir']);
                                    $arq = implode('/', $arq);
                                    $arq = $admLocal . $arq . '/' . $arquivo['filename'];
                                    ?>
                                    <a href="<?= $arq ?>"
                                       target="_blank"><?php echo $arquivo['filename']; ?>&nbsp;</a>
                                </td>
                                <?php if ($novidade['Project']['user_id'] == $this->Session->read('Auth.User.id') || $this->Session->read('Auth.User.user_type_id') == 1) : ?>
                                    <td>
                                        <?php if ($arquivo['Aceito'] == 'S') : ?>
                                            <img src="<?= $admLocal ?>img/aprovado.png" style="width: 30px">
                                        <?php endif; ?>
                                        <?php if ($arquivo['Aceito'] == 'N') : ?>
                                            <img src="<?= $admLocal ?>img/reprovado.png" style="width: 30px">
                                        <?php endif; ?>
                                    </td>
                                    <?php if ($novidade['Project']['user_id'] == $this->Session->read('Auth.User.id') || $this->Session->read('Auth.User.user_type_id') == 1 && $this->Session->read('Auth.User.course_id') == $novidade['Project']['course_id']) : ?>
                                        <td class="actions">
                                            <?php if ($this->Session->read('Auth.User.user_type_id') == 1 || $this->Session->read('Auth.User.user_type_id') == 3 && $this->Session->read('Auth.User.course_id') == $novidade['Project']['course_id']) : ?>
                                                <?php
                                                if ($arquivo['Aceito'] == 'N'):
                                                    echo $this->Html->link(__('Aprovar Arquivo'), array('controller' => 'Archives', 'action' => 'aprovar', $arquivo['id'], $idProjeto, $idUsuario = $novidade['Project']['user_id']), array('class' => 'btn btn-default btn-xs'));
                                                else:
                                                    echo $this->Html->link(__('Desaprovar Arquivo'), array('controller' => 'Archives', 'action' => 'desaprovar', $arquivo['id'], $idProjeto, $idUsuario = $novidade['Project']['user_id']), array('class' => 'btn btn-default btn-xs'));
                                                endif;
                                                ?>
                                            <?php endif; ?>
                                            <a href="<?= $admLocal ?>Archives/edit/<?php echo $arquivo['id'] ?>/<?= $idProjeto ?>/<?= $idUsuario = $novidade['Project']['user_id'] ?>"class="btn btn-default btn-xs">Editar</a>
                                            <?php echo $this->Form->postLink(__('Apagar'), array('controller' => 'Archives', 'action' => 'delete', $arquivo['id']), array('class' => 'btn btn-default btn-xs'), __('Tem certeza que deseja apagar este item? %s?', $arquivo['id'])); ?>
                                        </td>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
            <?php if ($novidade['Project']['user_id'] == $this->Session->read('Auth.User.id') && ($qntArquivo < 1)): ?>

                <div class="actions">
                    <a href="<?= $admLocal ?>Archives/add/<?= $idProjeto ?>/<?= $idUsuario = $novidade['Project']['user_id'] ?>"
                       class="btn btn-primary esquerda"><i
                            class="icon-plus icon-white"></i> Novo arquivo</a>
                </div>

            <?php endif; ?>
        </div>
        <?php if ($novidade['Project']['user_id'] == $this->Session->read('Auth.User.id')): ?>
            <div class="related">

                <h3><?php echo __('Usuários que participam do projeto'); ?></h3>

                <div class="table-responsive">
                    <table class="table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Foto</th>
                            <th>Nome</th>
                            <th>Curso</th>
                            <th>E-mail</th>
                            <th>Status</th>
                            <th>Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i = 0;
                        foreach ($foto as $fotos): ?>
                            <tr>

                                <td>

                                    <?php $imagem = $fotos['User']; ?>
                                    <?php if (!empty($imagem['UserImage'])): ?>
                                        <?php
                                        $imagem['UserImage']['dir'] = explode('\\', $imagem['UserImage']['dir']);
                                        $imagem['UserImage']['dir'] = implode('/', $imagem['UserImage']['dir']);
                                        $img = $admLocal . $imagem['UserImage']['dir'] . "/" . $imagem['UserImage']['filename'];
                                        ?>
                                        <img src="<?= $img ?>" style="width: 140px;" \>
                                    <?php endif; ?>

                                    <?php if (empty($imagem['UserImage'])): ?>
                                        <?php if ($imagem['Sexo'] == 'Masculino') : ?>
                                            <br>
                                            <img src="<?= $admLocal ?>img/masculino.jpg" style="width: 140px">
                                        <?php endif; ?>
                                        <?php if ($imagem['Sexo'] == 'Feminino') : ?>
                                            <br>
                                            <img src="<?= $admLocal ?>img/feminino.jpg" style="width: 140px">
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php echo $fotos['User']['username']; ?>
                                </td>
                                <td>
                                    <?php echo $imagem['Course']['Nome']; ?>
                                </td>
                                <td>
                                    <?php echo $fotos['User']['Email']; ?>
                                </td>
                                <td>
                                    <?php if ($fotos['ProjectUser']['Aceito'] == 'S') : ?>
                                        <img src="<?= $admLocal ?>img/aprovado.png" style="width: 30px">
                                    <?php endif; ?>
                                    <?php if ($fotos['ProjectUser']['Aceito'] == 'N') : ?>
                                        <img src="<?= $admLocal ?>img/reprovado.png" style="width: 30px">
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php
                                    if ($fotos['ProjectUser']['Aceito'] == 'N'):
                                        echo $this->Html->link(__('Aprovar participante'), array('controller' => 'ProjectUsers', 'action' => 'aprovar', $fotos['ProjectUser']['id'], $idProjeto, $idUsuario = $novidade['Project']['user_id']), array('class' => 'btn btn-default btn-xs'));
                                    else:
                                        echo $this->Html->link(__('Desaprovar participante'), array('controller' => 'ProjectUsers', 'action' => 'desaprovar', $fotos['ProjectUser']['id'], $idProjeto, $idUsuario = $novidade['Project']['user_id']), array('class' => 'btn btn-default btn-xs'));
                                    endif;
                                    ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>

                </div>
            </div>
        <?php endif; ?>

    </section>
</div>