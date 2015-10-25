
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php if ($qtdCurri < 1) : ?>
                <li class="list-group-item"><?php echo $this->Html->link(__('Cadastrar curriculo'), array('controller' => 'Resumes', 'action' => 'add'), array('class' => '')); ?></li>
            <?php endif; ?>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">
                            <?php if ($this->Session->read('Auth.User.user_type_id') == 1) : ?>
                                <h2>Currículos</h2>
                            <?php endif; ?>
                            <?php if ($this->Session->read('Auth.User.user_type_id') == 2 || $this->Session->read('Auth.User.user_type_id') == 3) : ?>
                                <h2>Meu currículo</h2>
                            <?php endif; ?>
                        </h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <?php if ($this->Session->read('Auth.User.user_type_id') == 1 || $this->Session->read('Auth.User.user_type_id') == 3) : ?>
                                    <th>Aluno</th>
                                <?php endif; ?>
                                <th>Arquivo</th>
                                <th>Status</th>
                                <th >Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($novidadeImages as $novidadeImage): ?>
                                <tr>
                                    <?php if ($this->Session->read('Auth.User.user_type_id') == 1 || $this->Session->read('Auth.User.user_type_id') == 3) : ?>
                                        <td>
                                            <?php echo $novidadeImage['User']['username'] ?>
                                        </td>
                                    <?php endif; ?>
                                    <td>
                                        <?php $arq = explode("\\", $novidadeImage['Resume']['dir']);
                                        $arq = implode('/', $arq);
                                        $arq = $admLocal . $arq . '/' . $novidadeImage['Resume']['filename'];
                                        ?>
                                        <a href="<?= $arq ?>"
                                           target="_blank"><?php echo $novidadeImage['Resume']['filename']; ?>&nbsp;</a>
                                    </td>
                                    <td>
                                        <?php if ($novidadeImage['Resume']['Aceito'] == 'S') : ?>
                                            <img src="<?= $admLocal ?>img/aprovado.png" style="width: 30px">
                                        <?php endif; ?>
                                        <?php if ($novidadeImage['Resume']['Aceito'] == 'N') : ?>
                                            <img src="<?= $admLocal ?>img/reprovado.png" style="width: 30px">
                                        <?php endif; ?>
                                    </td>

                                    <td class="actions">

                                        <?php if ($this->Session->read('Auth.User.user_type_id') == 1 || $this->Session->read('Auth.User.user_type_id') == 3) : ?>
                                            <?php
                                            if ($novidadeImage['Resume']['Aceito'] == 'N'):
                                                echo $this->Html->link(__('Aprovar currículo'), array('action' => 'aprovar', $novidadeImage['Resume']['id']), array('class' => 'btn btn-default btn-xs'));
                                            else:
                                                echo $this->Html->link(__('Desaprovar currículo'), array('action' => 'desaprovar', $novidadeImage['Resume']['id']), array('class' => 'btn btn-default btn-xs'));
                                            endif;
                                            ?>
                                        <?php endif; ?>

                                        <?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $novidadeImage['Resume']['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                        <?php echo $this->Form->postLink(__('Apagar'), array('action' => 'delete', $novidadeImage['Resume']['id']), array('class' => 'btn btn-default btn-xs'), __('Tem certeza que deseja apagar este item? %s?', $novidadeImage['Resume']['id'])); ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <?php if ($this->Session->read('Auth.User.user_type_id') == 1 || $this->Session->read('Auth.User.user_type_id') == 3) : ?>
                                    <th>Aluno</th>
                                <?php endif; ?>
                                <th>Arquivo</th>
                                <th>Status</th>
                                <th >Ações</th>
                            </tr>
                            </tfoot>
                        </table>

                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->


    </section><!-- /.content -->
</div>