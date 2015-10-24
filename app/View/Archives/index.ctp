<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-xs-12">


                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Arquivos de projetos</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <?php if ($this->Session->read('Auth.User.user_type_id') == 1) : ?>
                                    <th>Projeto</th>
                                <?php endif; ?>
                                <th>Arquivo</th>
                                <th>Status</th>
                                <th class="actions"><?php echo __('Ações'); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($novidadeImages as $novidadeImage): ?>
                                <tr>
                                    <?php if ($this->Session->read('Auth.User.user_type_id') == 1) : ?>
                                        <td>
                                            <?php echo $novidadeImage['Project']['Titulo'] ?>
                                        </td>
                                    <?php endif; ?>
                                    <td>
                                        <?php $arq = explode("\\", $novidadeImage['Archive']['dir']);
                                        $arq = implode('/', $arq);
                                        $arq = $admLocal . $arq . '/' . $novidadeImage['Archive']['filename'];
                                        ?>
                                        <a href="<?= $arq ?>"
                                           target="_blank"><?php echo $novidadeImage['Archive']['filename']; ?>&nbsp;</a>
                                    </td>
                                    <td>
                                        <?php if($novidadeImage['Archive']['Aceito'] == 'S') :?>
                                            <img src="<?=$admLocal?>img/aprovado.png" style="width: 30px">
                                        <?php endif; ?>
                                        <?php if($novidadeImage['Archive']['Aceito'] == 'N') :?>
                                            <img src="<?=$admLocal?>img/reprovado.png" style="width: 30px">
                                        <?php endif; ?>
                                    </td>

                                    <td class="actions">

                                        <?php if ($this->Session->read('Auth.User.user_type_id') == 1) : ?>
                                            <?php
                                            if ($novidadeImage['Archive']['Aceito'] == 'N'):
                                                echo $this->Html->link(__('Aprovar Arquivo'), array('action' => 'aprovar', $novidadeImage['Archive']['id'],$idProjeto=$novidadeImage['Archive']['project_id'],$idUsuario=$novidadeImage['Project']['user_id']), array('class' => 'btn btn-default btn-xs'));
                                            else:
                                                echo $this->Html->link(__('Desaprovar Arquivo'), array('action' => 'desaprovar', $novidadeImage['Archive']['id'],$idProjeto=$novidadeImage['Archive']['project_id'],$idUsuario=$novidadeImage['Project']['user_id']), array('class' => 'btn btn-default btn-xs'));
                                            endif;
                                            ?>
                                        <?php endif; ?>
                                        <?php echo $this->Form->postLink(__('Apagar'), array('action' => 'delete', $novidadeImage['Archive']['id']), array('class' => 'btn btn-default btn-xs'), __('Tem certeza que deseja apagar este item? %s?', $novidadeImage['Archive']['id'])); ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>

                            </tbody>
                            <tfoot>
                            <tr>
                                <?php if ($this->Session->read('Auth.User.user_type_id') == 1) : ?>
                                    <th>Projeto</th>
                                <?php endif; ?>
                                <th>Arquivo</th>
                                <th>Status</th>
                                <th class="actions"><?php echo __('Ações'); ?></th>
                            </tr>
                            </tfoot>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
</div>