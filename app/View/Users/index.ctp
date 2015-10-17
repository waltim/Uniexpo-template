<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Lista de usuários
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-xs-12">


                <div class="box">
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Semestre</th>
                                <th>Telefone</th>
                                <th>Email</th>
                                <th>Data de cadastro</th>
                                <th>Status</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($users as $user): ?>
                                <tr>
                                    <td><?php echo h($user['User']['username']); ?>&nbsp;</td>
                                    <td><?php echo h($user['Semester']['Descricao']); ?>&nbsp;</td>
                                    <td><?php echo h($user['User']['Telefone']); ?>&nbsp;</td>
                                    <td><?php echo h($user['User']['Email']); ?>&nbsp;</td>
                                    <td><?php echo date("d/m/Y",strtotime($user['User']['created'])); ?>&nbsp;</td>
                                    <td>
                                        <?php if($user['User']['Aceito'] == 'S') :?>
                                            <img src="<?=$admLocal?>img/aprovado.png" style="width: 30px">
                                        <?php endif; ?>
                                        <?php if($user['User']['Aceito'] == 'N') :?>
                                            <img src="<?=$admLocal?>img/reprovado.png" style="width: 30px">
                                        <?php endif; ?>
                                    </td>
                                    <td class="actions">
                                        <?php
                                        if($user['User']['Aceito']=='N'):
                                            echo $this->Html->link(__('Aprovar usuário'), array('action' => 'aprovar', $user['User']['id']), array('class' => 'btn btn-default btn-xs'));
                                        else:
                                            echo $this->Html->link(__('Desaprovar usuário'), array('action' => 'desaprovar', $user['User']['id']), array('class' => 'btn btn-default btn-xs'));
                                        endif;
                                        ?>
                                        <?php echo $this->Html->link(__('Detalhar'), array('action' => 'view', $user['User']['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Semestre</th>
                                <th>Nome</th>
                                <th>Telefone</th>
                                <th>Email</th>
                                <th>Data de cadastro</th>
                                <th>Status</th>
                                <th>Ações</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->


    </section><!-- /.content -->
</div><!-- /.content-wrapper -->