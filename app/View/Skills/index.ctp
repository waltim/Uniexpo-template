<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <li class="list-group-item"><a href="<?=$admLocal?>Skills/add/<?=$idCurso=$this->Session->read('Auth.User.course_id')?>">Nova habilidade</a></li>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"> Lista de habilidades</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th><?php echo $this->Paginator->sort('Curso'); ?></th>
                                <th><?php echo $this->Paginator->sort('Nome'); ?></th>
                                <th><?php echo $this->Paginator->sort('Data de registro'); ?></th>
                                <th class="actions"><?php echo __('Ações'); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($tipos as $tipo): ?>
                                <tr>
                                    <td><?php echo $tipo['Course']['Nome']; ?>&nbsp;</td>
                                    <td><?php echo h($tipo['Skill']['Nome']); ?>&nbsp;</td>
                                    <td> <?php echo date("d/m/Y",strtotime($tipo['Skill']['created'])); ?>&nbsp;</td>
                                    <td class="actions">
                                        <?php if($this->Session->read('Auth.User.user_type_id') == 2) :?>
                                            <a href="<?=$admLocal?>SkillUsers/add/<?=$idSkill=$tipo['Skill']['id'];?>/<?=$idUser=$this->Session->read('Auth.User.user_type_id');?>" class="btn btn-primary"><i class="icon-plus icon-white"></i> Vincular habilidade</a>
                                        <?php endif; ?>
                                        <?php if($this->Session->read('Auth.User.user_type_id') == 1) :?>
                                            <?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $tipo['Skill']['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                            <?php echo $this->Form->postLink(__('Apagar'), array('action' => 'delete', $tipo['Skill']['id']), array('class' => 'btn btn-default btn-xs'), __('Tem certeza que deseja apagar este item? %s?', $tipo['Skill']['id'])); ?>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>

                            </tbody>
                            <tfoot>
                            <tr>
                                <th><?php echo $this->Paginator->sort('Curso'); ?></th>
                                <th><?php echo $this->Paginator->sort('Nome'); ?></th>
                                <th><?php echo $this->Paginator->sort('Data de registro'); ?></th>
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