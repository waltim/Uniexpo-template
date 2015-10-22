<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <li class="list-group-item"><?php echo $this->Html->link(__('Visualizar tipos de usuário'), array('action' => 'index')); ?></li>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Novo tipo de usuário</h3>
                    </div>

                    <?php echo $this->Form->create('user_types', array('type' => 'file', 'inputDefaults' => array('label' => false), 'role' => 'form')); ?>
                    <div class="box-body">
                                <div class="form-group">
                                    <?php echo $this->Form->label('Descricao', 'Nome do tipo'); ?>
                                    <?php echo $this->Form->input('Descricao', array('class' => 'form-control')); ?>
                                </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.box -->
    </section>
</div>