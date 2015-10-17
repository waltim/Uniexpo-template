<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php if($qtdSocial < 5) :?>
                <li class="list-group-item"><?php echo $this->Html->link(__('Adicionar rede social'), array('controller' => 'Socials', 'action' => 'add'), array('class' => '')); ?></li>
            <?php endif; ?>
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-xs-12">


                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Redes sociais</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                            <tr>
                                <th><?php echo $this->Paginator->sort('Tipo'); ?></th>
                                <th><?php echo $this->Paginator->sort('Link'); ?></th>
                                <th class="actions"><?php echo __('Ações'); ?></th>
                            </tr>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($novidadeImages as $novidadeImage): ?>
                                <tr>
                                    <td>
                                        <?php if($novidadeImage['social_types']['Descricao'] == 'Facebook') :?>
                                            <img src="<?=$admLocal?>img/facebook-icon.png" style="width: 56px">
                                        <?php endif; ?>
                                        <?php if($novidadeImage['social_types']['Descricao'] == 'Instagram') :?>
                                            <img src="<?=$admLocal?>img/instagram.png" style="width: 56px">
                                        <?php endif; ?>
                                        <?php if($novidadeImage['social_types']['Descricao'] == 'Twitter') :?>
                                            <img src="<?=$admLocal?>img/twitter.png" style="width: 56px">
                                        <?php endif; ?>
                                        <?php if($novidadeImage['social_types']['Descricao'] == 'Linkedin') :?>
                                            <img src="<?=$admLocal?>img/linkedin.png" style="width: 56px">
                                        <?php endif; ?>
                                        <?php if($novidadeImage['social_types']['Descricao'] == 'Youtube') :?>
                                            <img src="<?=$admLocal?>img/Youtube.png" style="width: 56px">
                                        <?php endif; ?>                            </td>
                                    <td><?php echo $novidadeImage['Social']['Link']; ?>&nbsp;</td>

                                    <td class="actions">
                                        <?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $novidadeImage['Social']['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                        <?php echo $this->Form->postLink(__('Apagar'), array('action' => 'delete', $novidadeImage['Social']['id']), array('class' => 'btn btn-default btn-xs'), __('Tem certeza que deseja apagar este item? %s?', $novidadeImage['Social']['id'])); ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th><?php echo $this->Paginator->sort('Tipo'); ?></th>
                                <th><?php echo $this->Paginator->sort('Link'); ?></th>
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