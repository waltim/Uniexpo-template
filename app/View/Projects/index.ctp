<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <li class="list-group-item"><?php echo $this->Html->link(__('Novo Projeto'), array('action' => 'add'), array('class' => '')); ?></li>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Meus projetos</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Tema</th>
                                <th>Título do projeto</th>
                                <th>Semestre</th>
                                <th>Curso</th>
                                <th>Status</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($novidades as $novidade): ?>
                                <tr>
                                    <td><?php echo h($novidade['Theme']['Descricao']); ?>&nbsp;</td>
                                    <td><?php echo h($novidade['Project']['Titulo']); ?>&nbsp;</td>
                                    <td><?php echo h($novidade['Semester']['Descricao']); ?>&nbsp;</td>
                                    <td><?php echo h($novidade['Course']['Nome']); ?>&nbsp;</td>
                                    <td>
                                        <?php if ($novidade['Project']['Aceito'] == 'S') : ?>
                                            <img src="<?= $admLocal ?>img/aprovado.png" style="width: 30px">
                                        <?php endif; ?>
                                        <?php if ($novidade['Project']['Aceito'] == 'N') : ?>
                                            <img src="<?= $admLocal ?>img/reprovado.png" style="width: 30px">
                                        <?php endif; ?>
                                    </td>
                                    <td class="actions">
                                        <a href="<?=$admLocal?>Projects/view/<?=$novidade['Project']['id']?>/<?=$idUsuario=$novidade['Project']['user_id']?>" class="btn btn-default btn-xs">Detalhar</a>
                                        <a href="<?=$admLocal?>Projects/edit/<?=$novidade['Project']['id']?>/<?=$idUser=$novidade['Project']['user_id']?>" class="btn btn-default btn-xs">Editar</a>
                                        <?php echo $this->Form->postLink(__('Apagar'), array('action' => 'delete', $novidade['Project']['id']), array('class' => 'btn btn-default btn-xs'), __('Tem certeza que deseja apagar este item? %s?', $novidade['Project']['id'])); ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Tema</th>
                                <th>Título do projeto</th>
                                <th>Semestre</th>
                                <th>Curso</th>
                                <th>Status</th>
                                <th>Ações</th>
                            </tr>
                            </tfoot>
                        </table>
                        <?= $this->Session->flash('skills_flash'); ?>


                        <div class="box-header">
                            <h3 class="box-title">Todos os projetos</h3>
                        </div>

                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Titulo</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($skillsDisponiveis as $skillsDisponivel) { ?>
                                <?php $competencia = false ?>
                                <?php foreach ($skills as $skill) { ?>
                                    <?php if ($skill['ProjectUser']['project_id'] == $skillsDisponivel['Project']['id']) {
                                        $competencia = true;
                                    } ?>
                                <?php } ?>
                            <?php if (!$competencia) { ?>
                            <tr>
                                <td><?= $skillsDisponivel['Project']['Titulo'] ?></td>
                                <td class="actions">
                                    <?php echo $this->Html->link(__('Participar'), array('controller' => 'ProjectUsers', 'action' => 'ParticiparDoProjeto', $skillsDisponivel['Project']['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                    <a href="<?=$admLocal?>Projects/view/<?=$skillsDisponivel['Project']['id']?>/<?=$idUsuario=$skillsDisponivel['Project']['user_id']?>" class="btn btn-default btn-xs">Detalhar</a>
                                </td>
                            </tr>
                                <?php } ?>
                            <?php } ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Titulo</th>
                                <th>Ações</th>
                            </tr>
                            </tfoot>
                        </table>
                        <div class="box-header">
                            <h3 class="box-title">Projetos do qual participo</h3>
                        </div>

                        <table id="example3" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Titulo</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($skills as $skill) { ?>
                            <tr>
                                <td> <?= $skill['Project']['Titulo'] ?></td>
                                <td class="actions">
                                    <?php echo $this->Html->link(__('Sair do projeto'), array('controller' => 'ProjectUsers', 'action' => 'SairDoProjeto', $skill['ProjectUser']['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                    <a href="/uniexpo_painel/Projects/view/<?=$skill['Project']['id']?>/<?=$idUsuario=$skill['Project']['user_id']?>" class="btn btn-default btn-xs">Detalhar</a>
                                </td>
                            </tr>
                            <?php } ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Titulo</th>
                                <th>Ações</th>
                            </tr>
                            </tfoot>
                        </table>
                        <?php if ($this->Session->read('Auth.User.user_type_id') == 1): ?>
                            <div class="box-header">
                                <h3 class="box-title">Controle de projetos</h3>
                            </div>
                            <table id="example4" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th><?php echo $this->Paginator->sort('Título do projeto'); ?></th>
                                    <th>Semestre</th>
                                    <th>Curso</th>
                                    <th>Criador do projeto</th>
                                    <th>Status</th>
                                    <th class="actions"><?php echo __('Ações'); ?></th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php
                                foreach ($ProjetosPorCurso as $PCurso): ?>
                                    <tr>

                                        <td><?php echo h($PCurso['Project']['Titulo']); ?>&nbsp;</td>
                                        <td><?php echo h($PCurso['Semester']['Descricao']); ?>&nbsp;</td>
                                        <td><?php echo h($PCurso['Course']['Nome']); ?>&nbsp;</td>
                                        <td><?php echo h($PCurso['User']['username']); ?>&nbsp;</td>
                                        <td>
                                            <?php if ($PCurso['Project']['Aceito'] == 'S') : ?>
                                                <img src="<?= $admLocal ?>img/aprovado.png" style="width: 30px">
                                            <?php endif; ?>
                                            <?php if ($PCurso['Project']['Aceito'] == 'N') : ?>
                                                <img src="<?= $admLocal ?>img/reprovado.png" style="width: 30px">
                                            <?php endif; ?>
                                        </td>
                                        <td class="actions">
                                            <?php
                                            if($PCurso['Project']['Aceito']=='N'):
                                                echo $this->Html->link(__('Aprovar projeto'), array('action' => 'aprovar', $PCurso['Project']['id']), array('class' => 'btn btn-default btn-xs'));
                                            else:
                                                echo $this->Html->link(__('Desaprovar projeto'), array('action' => 'desaprovar', $PCurso['Project']['id']), array('class' => 'btn btn-default btn-xs'));
                                            endif;
                                            ?>
                                            <a href="<?=$admLocal?>Projects/view/<?=$PCurso['Project']['id']?>/<?=$idUsuario=$PCurso['Project']['user_id']?>" class="btn btn-default btn-xs">Detalhar</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Titulo</th>
                                    <th>Curso</th>
                                    <th>Tipo de projeto</th>
                                    <th>Semestre</th>
                                    <th>Usuário criador</th>
                                    <th>Ações</th>
                                </tr>
                                </tfoot>
                            </table>
                        <?php endif; ?>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->


    </section><!-- /.content -->
</div>