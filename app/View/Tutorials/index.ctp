<?//=pr($novidades);exit();?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <li class="list-group-item"><?php echo $this->Html->link(__('Novo tutorial'), array('action' => 'add'), array('class' => '')); ?></li>
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Vídeos tutoriais</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Previsualização</th>
                                <th><?php echo $this->Paginator->sort('created', 'Criado Dia'); ?></th>
                                <th class="actions"><?php echo __('Ações'); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i = 0;
                            foreach ($novidades as $videos): ?>
                                <tr>
                                    <td>
                                        <?php
                                        $linkVideo = explode("v=", $videos['Tutorial']['Link']);
                                        if (!is_array($linkVideo)) {
                                            $linkVideo = explode("youtu.be/", $videos['Tutorial']['Link']);

                                        };
                                        $linkVideo = array_pop($linkVideo);
                                        ?>
                                        <iframe width="300" height="200" src="//www.youtube.com/embed/<?= $linkVideo ?>"
                                                frameborder="0" allowfullscreen>

                                        </iframe>

                                    </td>
                                    <td><?php echo h(date("d/m/Y", strtotime($videos['Tutorial']['created']))); ?>&nbsp;</td>
                                    <td class="actions">
                                         <?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $videos['Tutorial']['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                        <?php echo $this->Form->postLink(__('Apagar'), array('action' => 'delete', $videos['Tutorial']['id']), array('class' => 'btn btn-default btn-xs'), __('Tem certeza que deseja apagar este item? %s?', $videos['Tutorial']['id'])); ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>

                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Previsualização</th>
                                <th><?php echo $this->Paginator->sort('created', 'Criado Dia'); ?></th>
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