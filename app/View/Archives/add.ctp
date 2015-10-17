<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <li class="list-group-item"><?php echo $this->Html->link(__('Visualizar arquivos'), array('action' => 'index')); ?></li>
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
                        <h3 class="box-title">Adicionar arquivo do projeto</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <?php echo $this->Form->create('Archive', array('type' => 'file', 'inputDefaults' => array('label' => false), 'role' => 'form')); ?>
                    <div class="box-body">
                                <div class="form-group">
                                    <?php echo $this->Form->label('filename', 'Selecione um arquivo do tipo (.pdf)'); ?>
                                    <?php echo $this->Form->input('filename', array('class' => 'form-control', 'type' => 'file','accept'=>'application/pdf')); ?>
                                </div>
                                <!-- .form-group -->

                                <div class="form-group">
                                    <?php echo $this->Form->input('dir', array('class' => 'form-control', 'type' => 'hidden')); ?>
                                </div>
                                <!-- .form-group -->

                                <div class="form-group">
                                    <?php echo $this->Form->input('filesize', array('class' => 'form-control', 'type' => 'hidden')); ?>
                                </div>
                                <!-- .form-group -->

                                <div class="form-group">
                                    <?php echo $this->Form->input('mimetype', array('class' => 'form-control', 'type' => 'hidden')); ?>
                                </div>

                                <div class="input text required">
                                    <input name="data[Archive][Aceito]" type="hidden" id="ArchiveAceito" value="N"/>
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