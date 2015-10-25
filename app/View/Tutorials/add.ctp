<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <li class="list-group-item"><?php echo $this->Html->link(__('Novo tutorial'), array('controller' => 'Tutorials', 'action' => 'add')); ?> </li>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6 center">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="col-md-12 center">
                        <div class="box-header">
                            <h3 class="box-title">Novo tutorial</h3>
                        </div>
                        <?php echo $this->Form->create('Tutorial', array('type' => 'file', 'inputDefaults' => array('label' => false), 'role' => 'form')); ?>
                        <div class="box-body">

                            <div class="form-group">
                                <?php echo $this->Form->label('Link', 'Cole aqui o link do vídeo no youtube(ex: https://www.youtube.com/watch?v=M8J8adOvzu0).'); ?>
                                <?php echo $this->Form->input('Link', array('class' => 'form-control', 'required')); ?>
                            </div>

                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.box -->
    </section>
</div>