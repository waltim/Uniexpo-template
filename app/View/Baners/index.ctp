<?//=pr($novidades);exit();?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <li class="list-group-item"><?php echo $this->Html->link(__('Novo baner'), array('action' => 'add'), array('class' => '')); ?></li>
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Baners</h3>
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
                            foreach ($novidades as $novidade): ?>
                                <tr>
                                    <td>
                                        <?php if (isset($novidade['Baner']['dir'])):

                                            $novidade['Baner']['dir'] = explode("\\", $novidade['Baner']['dir']);
                                            $novidade['Baner']['dir'] = implode('/', $novidade['Baner']['dir']);

                                            $img = $admLocal.$novidade['Baner']['dir'] . '/' . $novidade['Baner']['filename'] ?>


                                            <img src="<?php echo $img ?>" style="max-width: 250px" alt="">
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo h(date("d/m/Y", strtotime($novidade['Baner']['created']))); ?>&nbsp;</td>
                                    <td class="actions">
                                         <?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $novidade['Baner']['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                        <?php echo $this->Form->postLink(__('Apagar'), array('action' => 'delete', $novidade['Baner']['id']), array('class' => 'btn btn-default btn-xs'), __('Tem certeza que deseja apagar este item? %s?', $novidade['Baner']['id'])); ?>
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