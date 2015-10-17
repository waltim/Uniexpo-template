<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Habilidades dos usuários
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
                                <th><?php echo $this->Paginator->sort('Aluno'); ?></th>
                                <th><?php echo $this->Paginator->sort('Competencia'); ?></th>
                                <th><?php echo $this->Paginator->sort('Data de registro'); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($tipos as $tipo): ?>
                                <tr>
                                    <td><?php echo h($tipo['User']['username']); ?>&nbsp;</td>
                                    <td><?php echo h($tipo['Skill']['Nome']); ?>&nbsp;</td>
                                    <td> <?php echo date("d/m/Y",strtotime($tipo['Skill']['created'])); ?>&nbsp;</td>

                                </tr>
                            <?php endforeach; ?>

                            </tbody>
                            <tfoot>
                            <tr>
                                <th><?php echo $this->Paginator->sort('Aluno'); ?></th>
                                <th><?php echo $this->Paginator->sort('Competencia'); ?></th>
                                <th><?php echo $this->Paginator->sort('Data de registro'); ?></th>
                            </tr>
                            </tfoot>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->


    </section><!-- /.content -->
</div>